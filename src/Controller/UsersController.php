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
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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
		//$this->Auth->allow(['*', 'register', 'logout', 'forgotPassword']);
    }
    public function index(){
	
		$settings = $this->Common->getAllSettings();	
		$globalSetting = array();
        if (!empty($settings)) {
            foreach ($settings as $setting) {
                $globalSetting[$setting['setting_key']] = $setting['value'];
            }
        }		
		$this->set('globalSetting', $globalSetting);

         $this->paginate = [
			'contain' => ['Roles'],
            'limit' => $globalSetting['pagination_limit'] ? $globalSetting['pagination_limit'] : 25,
            'order' => ['Memberships.created' => 'asc'],
            'conditions' => ['Users.deleted' => 0, 'Users.id <>' => 1 ]
        ];
        $users = $this->paginate($this->Users);
        
        $this->set(compact('users'));
		
		$this->Breadcrumb->add([
			['title' => 'Dashboard', 'url' => ['controller' => 'dashboard', 'action' => 'index']],
			['title' => 'All Users List', 'url' => []]
		]);
		$this->set('breadcrumb', $this->Breadcrumb->render());
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$settings = $this->Common->getAllSettings();	
		$globalSetting = array();
        if (!empty($settings)) {
            foreach ($settings as $setting) {
                $globalSetting[$setting['setting_key']] = $setting['value'];
            }
        }		
		$this->set('globalSetting', $globalSetting);
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Archive-images', 'Attachments', 'Comments', 'Forums', 'Newsletters', 'Pages', 'Payments']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->set('scripts', ["plugins/select2/dist/js/select2.min", 'admins/update_profile', 'plugins/dropjone', "plugins/datepicker/js/bootstrap-datepicker.min", "plugins/tinymce/js/tinymce/tinymce.min"]);
        $this->set('styles', ["plugins/select2/dist/css/select2.min", "plugins/dropjone"]);
        $user = $this->Users->newEntity();
		
		$settings = $this->Common->getAllSettings();	
		$globalSetting = array();
        if (!empty($settings)) {
            foreach ($settings as $setting) {
                $globalSetting[$setting['setting_key']] = $setting['value'];
            }
        }		
		$this->set('globalSetting', $globalSetting);
		
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
				return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please check your inputs and try again.'));
        }
		
        $roles = $this->Users->Roles->find('list', ['limit' => 200, 'conditions' => ['id !=' => 1 ]]);
        $this->set(compact('user', 'roles'));
		
		$this->Breadcrumb->add([
			['title' => 'Dashboard', 'url' => ['controller' => 'actions', 'action' => 'dashboard']],
			['title' => 'All Team Members List', 'url' => ['controller' => 'admins', 'action' => 'index']],
			['title' => 'Add Team Member', 'url' => []]
		]);
		$this->set('breadcrumb', $this->Breadcrumb->render());
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$settings = $this->Common->getAllSettings();	
		$globalSetting = array();
        if (!empty($settings)) {
            foreach ($settings as $setting) {
                $globalSetting[$setting['setting_key']] = $setting['value'];
            }
        }		
		$this->set('globalSetting', $globalSetting);
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
		$user->modified = Time::now();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			$user->modified = Time::now();
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
		$user->deleted = 1;
        $user->modified = Time::now();
        $settings = $this->Common->getAllSettings();
        $globalSetting = array();
        if (!empty($settings)) {
            foreach ($settings as $setting) {
                $globalSetting[$setting['setting_key']] = $setting['value'];
            }
        }
        if (empty($globalSetting)) {
            throw new UnauthorizedException(__('Unauthorized Access to Login Page.'));
        }
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user can not be deleted.'));
		}
        return $this->redirect(['action' => 'index']);
    }
	
	
	public function login(){
		$this->viewBuilder()->setLayout('cover');
		$settings = $this->Common->getAllSettings();	
		$globalSetting = array();
		if(!empty($settings)) {
			foreach($settings as $setting){
				$globalSetting[$setting['setting_key']] = $setting['value'];		
			}
		}
		if(empty($globalSetting)){
			throw new UnauthorizedException(__('Unauthorized Access to Login Page.'));
		}
		if($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$userData = $this->User->find('all')
				 ->where(['Users.deleted' => 0])
				 ->where(['Users.id' => $user['id']])
				 ->order(['Users.id' => 'DESC'])
				 ->first();
				 $userData->last_logged_in = Time::now();
				 $userData->save($userData);				
				if(!empty($adminData)){
					$this->Auth->setUser($adminData);
					return $this->redirect($this->Auth->redirectUrl());
				}
			} else {
				$error = true;				
				$this->Flash->error(__('Invalid Username or Password, try again.'));
				$this->set('error', $error);				
			}
		}
		
		$this->set('globalSetting', $globalSetting);
	}

}
