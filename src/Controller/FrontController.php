<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Component;
use Cake\Datasource\Exception\InvalidPrimaryKeyException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

/**
 * Memberships Controller
 *
 * @property \App\Model\Table\MembershipsTable $Memberships
 *
 * @method \App\Model\Entity\Membership[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrontController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
 public function initialize(){
        parent::initialize();
	}
	
	public function beforeFilter(Event $event){
        parent::beforeFilter($event);
		$this->loadComponent('Common');
		$this->viewBuilder()->layout('front');
		$this->Auth->allow();
    }
	
	public function index($page = 'home'){
		$this->loadModel('Pages');
		$page_data = $this->Pages->find('all', ['conditions' => ['Pages.deleted' => '0', 'Pages.is_static' => 'yes', 'Pages.status' => 'active', 'Pages.unique_str' => $page]])->first();
		$this->set('page_data', $page_data);
	
	}
	
	public function register(){	
		debug($this->request->session()->read());
		$this->set('scripts', ["plugins/select2/dist/js/select2.min", 'admins/update_profile', 'plugins/dropjone', "plugins/datepicker/js/bootstrap-datepicker.min", "plugins/tinymce/js/tinymce/tinymce.min"]);
			$this->set('styles', ["plugins/select2/dist/css/select2.min", "plugins/dropjone"]);
		$this->loadModel('Users');$user = $this->Users->newEntity();
		$this->set('user', $user);
		$settings = $this->Common->getAllSettings();
        $globalSetting = array();
        if (!empty($settings)) {
            foreach ($settings as $setting) {
                $globalSetting[$setting['setting_key']] = $setting['value'];
            }
        }		
		$user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $emailExists = $this->Common->isEmailexist($user->email);
            $unameExists = $this->Common->isUsernameexist($user->login);
            if (!empty($emailExists)) {
                $this->Flash->error(__('This email is already taken.'));
            } else if (!empty($unameExists)) {
                $this->Flash->error(__('This username is already taken.'));
            } else {
                         
                if ($this->Users->save($user)) {
					$inputArgsA['globalSetting'] = $globalSetting;
					$inputArgsA['to'] = $globalSetting['notification_email']; 
					$inputArgsA['subject'] = "New user registered to website." ;
					$inputArgsA['viewVars'] = ['recName' => 'Admin', 'headText' => 'New user registration'];
					$inputArgsA['message'] = "A new user has registered to website. Please login to admin panel for more details.";
					$this->Common->sendMail($inputArgsA);
					
					$inputArgs['globalSetting'] = $globalSetting;
					$inputArgs['to'] = $user->email; 
					$inputArgs['subject'] = "New user registered to website." ;
					$inputArgs['viewVars'] = ['recName' => $user->first_name." ".$user->last_name, 'headText' => 'Account created'];
					$inputArgs['message'] = "Your account has been created successfully.";
					$this->Common->sendMail($inputArgs);
					$this->Auth->identify();
					$this->Auth->setUser($user);
					$this->Flash->success(__('Your account has been created successfully.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Your account can not be created due to an error. Please try again after some time.'));
                }
            }
        } 
	}
	

}