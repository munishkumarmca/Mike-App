<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
use Cake\Mailer\Email;
use Cake\I18n\Time;


class TicketTypeCell extends Cell
{
	public function display(){
		$status = array();
		$this->loadModel('Tickettypes');
		$this->loadModel('Tickets');
		$this->loadModel('ActivityLogs');
		$this->loadModel('ActivityLogs');
		$this->loadModel('Logs');
		
		$this->loadModel('Settings');
		$appSettigns = $this->Settings->find('all')->toArray();	
		$allSettings = array();
		foreach($appSettigns as $appSetting){
			$allSettings[] = $appSetting;
		}
		
		foreach($allSettings as $key => $setting){
			$settings[] = $setting;
		}
		
		if(!empty($settings)) {
			foreach($settings as $setting){
				$globalSetting[$setting['setting_key']] = $setting['value'];		
			}
		}
		
		$activityLog = TableRegistry::get('ActivityLogs');	
		$tickets = TableRegistry::get('Tickets');	
		
		$tickettypess = TableRegistry::get('Tickettypes');		
		$allOptions = $tickettypess->find('all')
					 ->select(['id', 'text'])
					 ->where(['deleted' => 0])
					 ->toArray();
		$options = array();
		foreach($allOptions as $sOption){
			$options[$sOption->id] = $sOption->text;
		}
		$this->set('ticketTypes', $options);
		if ($this->request->is('post')) {
		
			$ticket = $tickets->newEntity();			
			$ticket = $tickets->patchEntity($ticket, $this->request->data());
			if($ticket->errors()){
				$status = ['response' => false, 'message' => __('You have errors in form. Please recheck fields and submit form again.')];			
			} else {
				if($tickets->save($ticket)){
					
					/*Send Mail*/
					
					
					$to = $ticket->email;
					$subject =  __("Ticket Submitted Successfully");
					$viewVars = ['recName' => $ticket->name, 'headText' => '' ];
					$message = __('Your support ticket is submitted successfully.');
					
					$toAdmin = $ticket->email;
					$subjectAdmin =  __("New Support Ticket Submitted");
					$viewVarsAdmin = ['recName' => $ticket->name, 'headText' => '' ];
					$messageAdmin = __('A new support ticket is submitted on website.');
					
					$email = new Email('default');		
					$emailFrom = !empty($globalSetting['default_from_email']) ? $globalSetting['default_from_email'] : 'support@bmeconsole.com' ;
					$fromName = !empty($globalSetting['default_from_name']) ? $globalSetting['default_from_name'] : 'BME Console Support' ;

					$email = new Email('default');		
					$email->from([$emailFrom => $fromName])
						->emailFormat('html')
						->template('default')
						->to($to)
						->subject($subject)
						->viewVars($viewVars)
						->send($message);
									
					$emailAdmin = new Email('default');		
					$emailAdmin->from([$emailFrom => $fromName])
						->emailFormat('html')
						->template('default')
						->to($globalSetting['notification_email'])
						->subject($subjectAdmin)
						->viewVars($viewVarsAdmin)
						->send($messageAdmin); 
					/*Send Mail Ends*/
					
					$this->loadModel('Logs');
					
					/*Save Log*/
					$logsTable = TableRegistry::get('Logs');
					$log = $logsTable->newEntity();

					$log->log_small_text = __('New Support ticket Submitted.');
					$log->log_big_text = '';
					
					$log->user_data = json_encode($this->request->data);
					$log->user_ip = $ticket->user_ip;
					$log->data = json_encode($ticket);
					$log->created = date('Y-m-d H:i:s');
					if ($logsTable->save($log)) {					
						$id = $log->id;
					}
					/*Save Log Ends*/
					
					
					
					/*Save Digest*/
					$this->loadModel('Email');
					
					/*Save Log*/
					$this->loadModel('EmailDigests');
					$emailDigestsT = TableRegistry::get('EmailDigests');
					$emailDigest = $emailDigestsT->newEntity();
					$emailDigest->subject = __('New support ticket created.');
					$emailDigest->content = __('New support ticket created.');
					$emailDigest->created = Time::now();
					$emailDigestsT->save($emailDigest);
					/*Save Digest Ends*/				
					
					$status = ['response' => true, 'message' => __('Your ticket has been submitted successfully. One of our repesentative will get back to you.')];
				} else {
					$status = ['response' => false, 'message' => __('Internal error occurred. Please try again after some time.')];
				}
			}
			$this->set('status', $status);
		}
    }
}
