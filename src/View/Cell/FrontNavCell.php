<?php

namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
use Cake\Mailer\Email;
use Cake\I18n\Time;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Routing\Router;

class FrontNavCell extends Cell {

    public function display() {
        $userId = $this->request->session()->read('Auth.User.id');
        //debug($roleId);
        //$this->loadComponent('Common');      
		$this->loadModel("Pages");
		$pagesA = $this->Pages->find('all', ['fields' => ['Pages.unique_str', 'Pages.menu_title', 'Pages.is_home', 'Pages.is_static', 'Pages.controller', 'Pages.action'], 'conditions' => ['Pages.deleted' => 0, 'Pages.is_menu' => 'yes', 'Pages.status' => 'active'], 'order' => 'Pages.order ASC'])->toArray();
	
		foreach($pagesA as $pagesC){
			$sitem = [];	
			if($pagesC->is_static == 'yes'){
				$sitem = [
					'controller' => 'Front', 
					'action' => 'index', 
					'class' => 'nav-link',
					'unique_str' => $pagesC->unique_str, 
					'menu_title' => $pagesC->menu_title,
					'link' => ($pagesC->is_home == 'yes') ? Router::url('/', true) : Router::url(['controller' => 'Front', 'action' => 'index', $pagesC->unique_str], true)
				];
			}else{
				$sitem = [
					'controller' => 'Front', 
					'action' => 'index', 
					'class' => 'nav-link',
					'unique_str' => $pagesC->unique_str, 
					'menu_title' => $pagesC->menu_title,
					'link' => Router::url(['controller' => $pagesC->controller, 'action' => $pagesC->action], true)
				];
			}
			$pages[] = $sitem;
		}
		
		/*register and login / dashboard */
		$pages[] = [
					'controller' => 'Front', 
					'action' => 'register', 
					'class' => 'btn btn-primary',
					'unique_str' => 'register', 
					'menu_title' => 'Register',
					'link' => Router::url(['controller' => 'Front', 'action' => 'register'], true)
				];
		$pages[] = [
					'controller' => 'Front', 
					'action' => 'login', 
					'class' => 'btn btn-warning',
					'unique_str' => 'login', 
					'menu_title' => 'Login',
					'link' => Router::url(['controller' => 'Front', 'action' => 'login'], true)
				];
		 	
		
		$this->set('pages', $pages);
    }
}
