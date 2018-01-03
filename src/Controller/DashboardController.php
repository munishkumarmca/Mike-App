<?php 


namespace App\Controller\Admin;

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
 * ApplicationSettings Controller
 *
 * @property \App\Model\Table\ApplicationSettingsTable $ApplicationSettings
 */
class DashboardController extends AppController{
	
	/**captcha_server_key
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
	public $app_id = 1;
	
	
	public function initialize(){
		parent::initialize();		
		$this->loadComponent('Common');		
	}
	
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
		$this->Auth->allow(['add', 'logout', 'forgotPassword', 'getSupportTypes','reset']);
    }
	
	public function index(){
	}

}

?>