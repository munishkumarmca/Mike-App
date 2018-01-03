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

class NavigationCell extends Cell {

    public function display() {
        //
       
        $userId = $this->request->session()->read('Auth.User.id');
        //debug($roleId);
        //$this->loadComponent('Common');       
        $navigationArray = ['block' => [
					[
						'controller' => 'Users',
						'action' => 'index',
						'arguments' => [],
						'link_text' => 'Users',
						'fav_icon' => 'fa fa-dashboard fa-lg',
						'controller_id' => 1,
						'module_id' => 1,
						'sub_nav' => [],
						'access' => true,
						'all_access' => true,
						'prefix' => ''
					], [
						'controller' => 'Users',
						'action' => 'index',
						'arguments' => [],
						'link_text' => 'Manage Users',
						'fav_icon' => 'fa fa-users fa-lg',
						'controller_id' => 1,
						'module_id' => 1,
						'prefix' => '',
						'access' => true,
						'sub_nav' => [
							[
								'controller' => 'Users',
								'action' => 'index',
								'arguments' => [],
								'link_text' => 'List All Users',
								'fav_icon' => '',
								'controller_id' => 1,
								'module_id' => 1,
								'access' => true,
								'sub_nav' => [],
								'prefix' => ''
							], [
								'controller' => 'Users',
								'action' => 'add',
								'arguments' => [],
								'link_text' => 'Add New User',
								'fav_icon' => '',
								'controller_id' => 1,
								'module_id' => 1,
								'access' =>'true',
								'sub_nav' => [],
								'prefix' => ''
							]
						]
					],
					[
						'controller' => 'Memberships',
						'action' => 'index',
						'arguments' => [],
						'link_text' => 'Manage Membership Packages',
						'fav_icon' => 'fa fa-table fa-lg',
						'controller_id' => 1,
						'module_id' => 1,
						'prefix' => '',
						'access' => true,
						'sub_nav' => [
							[
								'controller' => 'Memberships',
								'action' => 'index',
								'arguments' => [],
								'link_text' => 'Manage Membership Packages',
								'fav_icon' => '',
								'controller_id' => 1,
								'module_id' => 1,
								'access' => true,
								'sub_nav' => [],
								'prefix' => ''
							], [
								'controller' => 'Memberships',
								'action' => 'add',
								'arguments' => [],
								'link_text' => 'Add New Membership Package',
								'fav_icon' => '',
								'controller_id' => 1,
								'module_id' => 1,
								'access' =>'true',
								'sub_nav' => [],
								'prefix' => ''
							]
						]
					]
				]
			];         
		$this->set('navigationArray', $navigationArray);		
		$this->set('navigationArrayAdmin', $navigationArray);
    }
}
