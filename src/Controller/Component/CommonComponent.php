<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
use Cake\Mailer\Email;
use Cake\I18n\Time;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

class CommonComponent extends Component {

    public function initialize(array $config) {
        $this->controler = $this->_registry->getController();
    }

    public function getClientIp() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    function getAllSettings() {
        $settings = Cache::read('settings');
        if ($settings === false) {
            $this->controler->loadModel('Settings');
            $appSettigns = $this->controler->Settings->find('all');
            $allSettings = array();
            foreach ($appSettigns as $appSetting) {
                $allSettings[] = $appSetting;
            }
            Cache::write('settings', $allSettings);
            $settings = $allSettings;
        }
        return $settings;
    }

    function getUpload($uploadId = 0) {
        if ($uploadId) {
            $this->controler->loadModel('Uploads');
            if ($this->controler->Uploads->exists(['id' => $uploadId])) {
                $upload = $this->controler->Uploads->get($uploadId);
                if ($upload) {
                    return $upload;
                }
            }
        }
        return false;
    }

    function saveActivity($postData) {
        $this->controler->loadModel('ActivityLogs');

        $activityLogT = TableRegistry::get('ActivityLogs');
        $activityLogObj = $activityLogT->newEntity();

        $activityLogObj->activity_id = $postData['activity_id'];
        $activityLogObj->application_id = $postData['application_id'];
        $activityLogObj->activity_str = $postData['activity_str'];
        $activityLogObj->module_id = $postData['module_id'];
        $activityLogObj->status = $postData['status'];

        $userDataTemp = $this->request->session()->read();
        $userData = !empty($userDataTemp['Auth']['User']) ? $userDataTemp['Auth']['User'] : false;
        $user_id = !empty($userData['id']) ? $userData['id'] : 0;

        $activityLogObj->user_ip = $this->getClientIp();
        $activityLogObj->user_id = $user_id;
        $activityLogObj->created = Time::now();
        $activityLogObj->post_data = json_encode($this->request->data());

        $activityLogT->save($activityLogObj);
    }

    function sendMail($inputArgs) {

        $globalSetting = $inputArgs['globalSetting'];
        $to = $inputArgs['to'];
        $subject = $inputArgs['subject'];
        $viewVars = $inputArgs['viewVars'];
        $message = $inputArgs['message'];

        $email = new Email('default');
        $emailFrom = !empty($globalSetting['default_from_email']) ? $globalSetting['default_from_email'] : 'support@bmeconsole.com';
        $fromName = !empty($globalSetting['default_from_name']) ? $globalSetting['default_from_name'] : 'BME Console Support';

        $email = new Email('default');
        return $email->from([$emailFrom => $fromName])
                        ->emailFormat('html')
                        ->template('default')
                        ->to($to)
                        ->subject($subject)
                        ->viewVars($viewVars)
                        ->send($message);
    }

    function addEmailDigest($inputArgs) {
        $this->controler->loadModel('EmailDigests');

        $subject = $inputArgs['subject'];
        $content = $inputArgs['content'];

        $emailDigestsT = TableRegistry::get('EmailDigests');
        $emailDigest = $emailDigestsT->newEntity();

        $emailDigest->subject = $subject;
        $emailDigest->content = $content;
        $emailDigest->created = Time::now();
        return $emailDigestsT->save($emailDigest);
    }

    public function clientIp() {
        if ($this->controler->trustProxy && $this->controler->env('HTTP_X_FORWARDED_FOR')) {
            $ipaddr = preg_replace('/(?:,.*)/', '', $this->controler->env('HTTP_X_FORWARDED_FOR'));
        } else {
            if ($this->controler->env('HTTP_CLIENT_IP')) {
                $ipaddr = $this->controler->env('HTTP_CLIENT_IP');
            } else {
                $ipaddr = $this->controler->env('REMOTE_ADDR');
            }
        }

        if ($this->controler->env('HTTP_CLIENTADDRESS')) {
            $tmpipaddr = $this->controler->env('HTTP_CLIENTADDRESS');
            if (!empty($tmpipaddr)) {
                $ipaddr = preg_replace('/(?:,.*)/', '', $tmpipaddr);
            }
        }
        return trim($ipaddr);
    }

    function hasPermission($inputArgs) {
        return true;
    }

    function getAppModules($appId) {
        if (empty($appId)) {
            return false;
        } else {
            $this->controler->loadModel('Modules');
            $modulesTable = TableRegistry::get('Modules');
            $allModules = $modulesTable->find('all')
                    ->where(['application_id' => $appId, 'is_manageable' => 1, 'deleted' => 0])
                    ->order(['id' => 'desc'])
                    ->toArray();
            return $allModules;
        }
        return false;
    }

    function getAppModuleAccess($roleId, $moduleId) {
        if (empty($roleId) || empty($moduleId)) {
            return false;
        } else {
            $this->controler->loadModel('AdminRoleModules');
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

    function getClients() {
        $clientsObj = $this->controler->loadModel('Admins');
        $clientsT = $clientsObj->find('All', [
                    'conditions' => [
                        'Admins.deleted' => 0,
                        'Admins.admin_type_id' => Configure::read("ADMINTYPE.client_id"),
                        'Admins.admin_role_id' => Configure::read("ADMINROLE.client_id")
                    ],
                    'contain' => ['Admindetails'],
                    'limit' => 200])
                ->select(['Admins.id', 'Admins.admin_email', 'Admindetails.first_name', 'Admindetails.last_name', 'Admindetails.contact_email'])
                ->toArray();
        $response = [];
        foreach ($clientsT as $sClient) {
            //debug($sClient);
            $responseReal[] = ['email' => $sClient->admin_email, 'name' => $sClient->admindetail->first_name . ' ' . $sClient->admindetail->last_name, 'contact_email' => $sClient->admindetail->contact_email];
            $response[$sClient->id] = $sClient->admindetail->first_name . ' ' . $sClient->admindetail->last_name;
        }
        return $response;
    }

    function getAdmins() {
        $adminObj = $this->controler->loadModel('Admins');
        $excludeSuperAdmin = Configure::read("SUPERADMIN.id");
        $clientsT = $adminObj->find('All', [
                    'conditions' => [
                        'Admins.deleted' => 0,
                        'Admins.admin_type_id' => Configure::read("ADMINTYPE.admin_id"),
                        'Admins.id <>' => $excludeSuperAdmin
                    ],
                    'contain' => ['Admindetails'],
                    'limit' => 200])
                ->select(['Admins.id', 'Admins.admin_email', 'Admindetails.first_name', 'Admindetails.last_name', 'Admindetails.contact_email'])
                ->toArray();
        $response = [];
        foreach ($clientsT as $sClient) {
            //debug($sClient);
            $responseReal[] = ['email' => $sClient->admin_email, 'name' => $sClient->admindetail->first_name . ' ' . $sClient->admindetail->last_name, 'contact_email' => $sClient->admindetail->contact_email];
            $response[$sClient->id] = $sClient->admindetail->first_name . ' ' . $sClient->admindetail->last_name;
        }
        return $response;
    }

    function getProjectAdmins($projectId = 0) {

        if (empty($projectId)) {
            return false;
        }
        $adminObj = $this->controler->loadModel('Admins');
        $adminObj2 = $this->controler->loadModel('ProjectsAdmins');
        $selectedAdmins = $this->controler->ProjectsAdmins->find('list', ['keyField' => 'id', 'valueField' => 'admin_id', 'conditions' => ['deleted' => 0, 'project_id' => $projectId]])->toArray();
        $excludeSuperAdmin = Configure::read("SUPERADMIN.id");
        $adminIds = [0];
        foreach ($selectedAdmins as $sk => $sV) {
            $adminIds[] = $sV;
        }
        $clientsT = $adminObj->find('All', [
                    'conditions' => [
                        'Admins.deleted' => 0,
                        'Admins.admin_type_id' => Configure::read("ADMINTYPE.admin_id"),
                        'Admins.id <>' => $excludeSuperAdmin,
                        'Admins.id IN' => $adminIds
                    ],
                    'contain' => ['Admindetails'],
                    'limit' => 200])
                ->select(['Admins.id', 'Admins.admin_email', 'Admindetails.first_name', 'Admindetails.last_name', 'Admindetails.contact_email'])
                ->toArray();
        $response = [];
        foreach ($clientsT as $sClient) {
            //debug($sClient);
            $responseReal[] = ['email' => $sClient->admin_email, 'name' => $sClient->admindetail->first_name . ' ' . $sClient->admindetail->last_name, 'contact_email' => $sClient->admindetail->contact_email];
            $response[$sClient->id] = $sClient->admindetail->first_name . ' ' . $sClient->admindetail->last_name;
        }
        return $response;
    }

    function getAdminDetails($id = 0) {
        if (!empty($id)) {
            $adminObj = $this->controler->loadModel('Admindetails');
            return $adminObj->find('all', [
                        'conditions' => ['Admindetails.admin_id' => $id],
                        'order' => ['Admindetails.created' => 'DESC']
                    ])->first();
        } else {
            return false;
        }
    }

    function encode($str) {
        return join(array_map(function ($n) {
                    return sprintf('%03d', $n);
                }, unpack('C*', $str)));
    }

    function decode($str) {
        return join(array_map('chr', str_split($str, 3)));
    }

    function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    function getUserProjects() {
        $userId = $this->request->session()->read('Auth.User.id');

        /* Reverse lookup to find if any project assigned to user */
        $this->controler->loadModel("ProjectsAdmins");
        $assignedProject = $this->controler->ProjectsAdmins->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'project_id',
                    'conditions' => ['admin_id' => $userId, 'deleted' => 0]
                ])->toArray();
        return $assignedProject;
    }

    function getProjectTasks($projectId = false, $adminId = false) {
        if (empty($projectId)) {
            return false;
        } else {
            $conditions['project_id'] = $projectId;
            $conditions['deleted'] = 0;
            $conditions['task_id'] = 0;
            if (!empty($adminId)) {
                $this->controler->loadModel("TasksAdmins");
                $adminTasksList = $this->controler->TasksAdmins->find('list', [
                            'keyField' => 'id',
                            'valueField' => 'task_id',
                            'conditions' => ['admin_id' => $adminId, 'deleted' => 0]
                        ])->toArray();
                $adminTasksF = [0];
                if (!empty($adminTasksList)) {
                    foreach ($adminTasksList as $k => $adminTasks) {
                        $adminTasksF[] = $adminTasks;
                    }
                }
                $conditions["OR"] = ["Tasks.assigned_to" => $adminId, 'Tasks.id IN' => $adminTasksF];
            }

            /* Reverse lookup to find if any project assigned to user */
            $this->controler->loadModel("Tasks");
            $projectTasks = $this->controler->Tasks->find('list', [
                        'keyField' => 'id',
                        'valueField' => 'title',
                        'conditions' => $conditions
                    ])->toArray();
            return $projectTasks;
        }
    }

    public function getActiveTimeSheet() {
        $userId = $this->request->session()->read('Auth.User.id');
        $this->controler->loadModel("Timesheets");
        $activeTimeSheet = $this->controler->Timesheets->find('all', ['conditions' => ['task_type' => 'auto', 'tracking_status' => 1, 'deleted' => 0, 'admin_id' => $userId], 'order' => ['id' => 'DESC']])->first();
        if (!empty($activeTimeSheet)) {
            return $activeTimeSheet;
        } else {
            return false;
        }
        return false;
    }

    public function getTimeSheetRealTracked($timeSheetid = 0) {
        if (empty($timeSheetid) || $timeSheetid == 0) {
            return false;
        } else {
            $this->controler->loadModel("Timetrackers");
			
           $activeTimeLogs = $this->controler->Timetrackers->find('all', [ 'conditions' => ['timesheet_id' => $timeSheetid, 'deleted' => 0], 'order' => ['id' => 'DESC']])->toArray();
            
            if (!empty($activeTimeLogs)) {
                $logged = 0;
                foreach($activeTimeLogs as $activeTimeLog){
                    $diff = 0;
                    $end_time = strtotime($activeTimeLog->end_time);
                    $start_time = strtotime($activeTimeLog->start_time);
                    $diff = round(abs($end_time - $start_time) / 60,2);
                    if($diff > 0 && $diff <= 11){
                        $logged += $diff;
                    }
                }
                return $logged;
            } else {
                return false;
            } 
            return false;
        }
    }
    function getTimeZoneDiff(){
        $dateTimeZoneTaipei = new DateTimeZone("UTC");
        $dateTimeZoneJapan = new DateTimeZone("Asia/Tokyo");
    }
	
	function getProjectType($id = 0){		
		$this->controler->loadModel('Projecttypes');
		$pType = $this->controler->Projecttypes->find('all', [
							'field' => ['id', 'name'],
							'conditions' => ['id' => $id]
						])->first();
		if(!empty($pType)){
			return $pType->name;
		} else {
			return '-';
		}
	}
	
	function getUserType(){
		$allSession = $this->request->session()->read();
		if(!empty($allSession['Auth']['User'])){
			if($allSession['Auth']['User']->admin_type_id == 1){
				return 'team_member';
			} else if($allSession['Auth']['User']->admin_type_id == 2){
				return 'client';
			} else{
				return 'guest';
			}
			
		} else {
			return 'guest';
		}
	}
}
