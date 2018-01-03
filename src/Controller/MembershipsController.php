<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Mailer\Email;
use Cake\Routing\Router;


use Cake\Datasource\Exception\InvalidPrimaryKeyException;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

/**
 * Memberships Controller
 *
 * @property \App\Model\Table\MembershipsTable $Memberships
 *
 * @method \App\Model\Entity\Membership[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MembershipsController extends AppController
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
            'limit' => $globalSetting['pagination_limit'] ? $globalSetting['pagination_limit'] : 25,
            'order' => ['Memberships.created' => 'asc'],
            'conditions' => ['Memberships.deleted' => 0 ]
        ];
        $memberships = $this->paginate($this->Memberships);
        
        $this->set(compact('memberships'));
		
		$this->Breadcrumb->add([
			['title' => 'Dashboard', 'url' => ['controller' => 'dashboard', 'action' => 'index']],
			['title' => 'All Membership Packages', 'url' => []]
		]);
		$this->set('breadcrumb', $this->Breadcrumb->render());
    }


    /**
     * View method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => []
        ]);

        $this->set('membership', $membership);
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
        $membership = $this->Memberships->newEntity();
        if ($this->request->is('post')) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $this->set(compact('membership'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->set('scripts', ["plugins/select2/dist/js/select2.min", 'admins/update_profile', 'plugins/dropjone', "plugins/datepicker/js/bootstrap-datepicker.min", "plugins/tinymce/js/tinymce/tinymce.min"]);
        $this->set('styles', ["plugins/select2/dist/css/select2.min", "plugins/dropjone"]);
        $membership = $this->Memberships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $this->set(compact('membership'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membership = $this->Memberships->get($id);
        if ($this->Memberships->delete($membership)) {
            $this->Flash->success(__('The membership has been deleted.'));
        } else {
            $this->Flash->error(__('The membership could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
