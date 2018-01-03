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


    function sendMail($inputArgs) {

        $globalSetting = $inputArgs['globalSetting'];
        $to = $inputArgs['to'];
        $subject = $inputArgs['subject'];
        $viewVars = $inputArgs['viewVars'];
        $message = $inputArgs['message'];

        $email = new Email('default');
        $emailFrom = !empty($globalSetting['default_from_email']) ? $globalSetting['default_from_email'] : 'support@hobbyapp.com';
        $fromName = !empty($globalSetting['default_from_name']) ? $globalSetting['default_from_name'] : 'Hobby App';

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
	
	public function isEmailexist($email = '', $id = 0) {
        $data = false;
		$this->controler->loadModel('Users');
        if (!empty($email)) {
            $users = TableRegistry::get('Users');
            if ($id != 0) {
                $data = $this->controler->Users->find()
                        ->select(['id', 'email'])
                        ->where(['id !=' => $id])
                        ->where(['email' => $email])
                        ->where(['deleted != ' => 1])
                        ->order(['created' => 'DESC'])
                        ->toArray();
            } else {
                $data = $this->controler->Users->find()
                        ->select(['id', 'email'])
                        ->where(['email' => $email])
                        ->where(['deleted != ' => 1])
                        ->order(['created' => 'DESC'])
                        ->toArray();
            }
        }
        return $data;
    }

    public function isUsernameexist($login = '', $id = 0) {
        $data = false;		
		$this->controler->loadModel('Users');
        if (!empty($login)) {
            $admins = TableRegistry::get('Users');
            if ($id != 0) {
                $data = $this->controler->Users->find()
                        ->select(['id', 'login'])
                        ->where(['id !=' => $id])
                        ->where(['login' => $login])
                        ->where(['deleted != ' => 1])
                        ->order(['created' => 'DESC'])
                        ->toArray();
            } else {
                $data = $this->controler->Users->find()
                        ->select(['id', 'login'])
                        ->where(['login' => $login])
                        ->where(['deleted != ' => 1])
                        ->order(['created' => 'DESC'])
                        ->toArray();
            }
        }
        return $data;
    }
}
