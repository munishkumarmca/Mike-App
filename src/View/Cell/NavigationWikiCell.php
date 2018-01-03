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

class NavigationWikiCell extends Cell {

    public function display() {
        //
        $roleId = $this->request->session()->read('Auth.User.admin_role_id');
        $userId = $this->request->session()->read('Auth.User.id');
        //debug($roleId);
        //$this->loadComponent('Common');       
        $navigationArray = ['block' => [
                [
                    'controller' => 'Actions',
                    'action' => 'dashboard',
                    'arguments' => [],
                    'link_text' => 'Dashboard',
                    'fav_icon' => 'fa fa-dashboard fa-lg',
                    'controller_id' => 1,
                    'module_id' => 1,
                    'prefix' => 'admin',
                    'sub_nav' => [],
                    'access' => true,
                    'all_access' => true
                ], [
                    'controller' => 'Wikicategories',
                    'action' => 'index',
                    'arguments' => [],
                    'link_text' => 'Manage Categories',
                    'fav_icon' => 'fa fa-tasks',
                    'controller_id' => 1,
                    'module_id' => 1,
                    'prefix' => 'wiki',
                    'access' => $this->getAppModuleAccess($roleId, Configure::read('Modules.wiki')),
                    'sub_nav' => [
                        [
                            'controller' => 'Wikicategories',
                            'action' => 'index',
                            'arguments' => [],
                            'link_text' => 'List All Categories',
                            'fav_icon' => '',
                            'controller_id' => 1,
                            'module_id' => 1,
                            'prefix' => 'wiki',
                            'access' => $this->hasListingAccess($roleId, Configure::read('Modules.wiki')),
                            'sub_nav' => []
                        ], [
                            'controller' => 'Wikicategories',
                            'action' => 'add',
                            'arguments' => [],
                            'link_text' => 'Add New Category',
                            'fav_icon' => '',
                            'controller_id' => 1,
                            'prefix' => 'wiki',
                            'module_id' => 1,
                            'access' => $this->getAppModuleAccess($roleId, Configure::read('Modules.wiki')),
                            'sub_nav' => []
                        ]
                    ]
                ], 
				[
                    'controller' => 'Wikitags',
                    'action' => 'index',
                    'arguments' => [],
                    'link_text' => 'Manage Tags',
                    'fav_icon' => 'fa fa-tags',
                    'controller_id' => 1,
                    'module_id' => 1,
                    'prefix' => 'wiki',
                    'access' => $this->getAppModuleAccess($roleId, Configure::read('Modules.wiki')),
                    'sub_nav' => [
                        [
                            'controller' => 'Wikitags',
                            'action' => 'index',
                            'arguments' => [],
                            'link_text' => 'List All Tags',
                            'fav_icon' => '',
                            'controller_id' => 1,
                            'module_id' => 1,
                            'prefix' => 'wiki',
                            'access' => $this->hasListingAccess($roleId, Configure::read('Modules.wiki')),
                            'sub_nav' => []
                        ], [
                            'controller' => 'Wikitags',
                            'action' => 'add',
                            'arguments' => [],
                            'link_text' => 'Add New Tag',
                            'fav_icon' => '',
                            'controller_id' => 1,
                            'prefix' => 'wiki',
                            'module_id' => 1,
                            'access' => $this->getAppModuleAccess($roleId, Configure::read('Modules.wiki')),
                            'sub_nav' => []
                        ]
                    ]
                ],
				[
                    'controller' => 'Wikiposts',
                    'action' => 'index',
                    'arguments' => [],
                    'link_text' => 'Manage Posts',
                    'fav_icon' => 'fa fa-list-alt',
                    'controller_id' => 1,
                    'module_id' => 1,
                    'prefix' => 'wiki',
                    'access' => $this->getAppModuleAccess($roleId, Configure::read('Modules.wiki')),
                    'sub_nav' => [
                        [
                            'controller' => 'Wikiposts',
                            'action' => 'index',
                            'arguments' => [],
                            'link_text' => 'List All Posts',
                            'fav_icon' => '',
                            'controller_id' => 1,
                            'module_id' => 1,
                            'prefix' => 'wiki',
                            'access' => $this->hasListingAccess($roleId, Configure::read('Modules.wiki')),
                            'sub_nav' => []
                        ], [
                            'controller' => 'Wikiposts',
                            'action' => 'add',
                            'arguments' => [],
                            'link_text' => 'Add New Post',
                            'fav_icon' => '',
                            'controller_id' => 1,
                            'prefix' => 'wiki',
                            'module_id' => 1,
                            'access' => $this->getAppModuleAccess($roleId, Configure::read('Modules.wiki')),
                            'sub_nav' => []
                        ]
                    ]
                ]
            ]
        ];
        $navigationArrayAdmin = [] ; //not for client
        if($this->request->session()->read('Auth.User.admin_role_id') == Configure::read("ADMINTYPE.client_id")){
            
            $this->set('navigationArray', $navigationArrayAdmin);
        } else {
            $this->set('navigationArray', $navigationArray);
        }
        $userId = $this->request->session()->read('Auth.User.id');
        //Not for superadmin", 2);
        $superAdmin = false;
        if ($userId == Configure::read('SUPERADMIN.id')) {
            $superAdmin = true;
        }
        $this->set('superAdmin', $superAdmin);
    }

    function getAppModuleAccess($roleId, $moduleId) {
        if (empty($roleId) || empty($moduleId)) {
            return false;
        } else {
            $this->loadModel('AdminRoleModules');
            $adminRoleModulesTable = TableRegistry::get('AdminRoleModules');
            $adminRoleModulesa = $adminRoleModulesTable->find('all')
                    ->where(['admin_role_id' => $roleId, 'module_id' => $moduleId, 'deleted' => 0, 'no_access' => 0])
                    ->order(['id' => 'desc'])
                    ->first();
            return $adminRoleModulesa;
        }
        return false;
    }

    function hasListingAccess($roleId, $moduleId) {
        $hasListingAccess = $this->getAppModuleAccess($roleId, $moduleId);
        if (empty($hasListingAccess)) {
            return false;
        } else if (!empty($hasListingAccess->listing_access) || !empty($hasListingAccess->edit_access) || !empty($hasListingAccess->edit_access)) {
            return $hasListingAccess;
        } else {
            return false;
        }
    }

    function hasProjectsAccess($roleId, $moduleId = 15) {
        /*
          Project Listing will always be there if user has  even if user has no access.
         */
        $userId = $this->request->session()->read('Auth.User.id');
        $projectAdmins = $this->loadModel('ProjectAdmins');
        return $projectAdmins->find('all', ['conditions' => ['Project']])->
                        contain([
                            'ProjectAdmins' => function ($q) {
                                return $q->where(['ProjectAdmins.admin_id' => $userId]);
                            }
        ]);
        $this->loadModel('Projects');
        $projectsTable = TableRegistry::get('Projects');
        $pData = $projectsTable->find('all')
                ->where(['admin_role_id' => $roleId, 'module_id' => $moduleId, 'deleted' => 0, 'no_access' => 0])
                ->order(['id' => 'desc'])
                ->first();


        $hasListingAccess = $this->getAppModuleAccess($roleId, $moduleId);
        if (empty($hasListingAccess)) {
            return false;
        } else if (!empty($hasListingAccess->listing_access) || !empty($hasListingAccess->edit_access) || !empty($hasListingAccess->edit_access)) {
            return $hasListingAccess;
        } else {
            return false;
        }
    }

}
