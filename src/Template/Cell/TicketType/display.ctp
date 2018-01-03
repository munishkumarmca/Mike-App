<?php 
$myTemplates = [
    'inputContainer' => '<div class="form-group input {{class}} {{type}}{{required}}">{{content}}</div>',
    'inputContainerError' => '<div class="input {{class}} {{type}}{{required}} error">{{content}}{{error}}</div>'
];
$this->Form->templates($myTemplates);


?>
	<div class="users form">	
		<?php
			if(!empty($status)){
				if(!empty($status['response'])){
					echo $this->element('basic/custom_success', ['message' => $status['message']]);
				} else {
					echo $this->element('basic/custom_error', ['message' => $status['message'] ]);
				}
			}
			$this->element('patched/patches');			
		?>
		<?= $this->Form->create('Ticket', ['id' => 'SupportTicket', 'novalidate']); ?>
		<fieldset>
			<div class="btn-group-top">
				<legend><?= __('Please fill the form below to contact our support.') ?>
				<div class="btns-group">
					<?php echo $this->Html->link(__('Dashboard'), ['controller' => 'actions', 'action' => 'dashboard'], ['class' => 'button btn-info btn-large btn']);?>
					<?php echo $this->Html->link(__('Tickets Listing'), ['controller' => 'tickets', 'action' => 'index'], ['class' => 'button btn-info btn-large btn']);?>
				</div>
				</legend>
			</div>	
			<?= $this->Form->input('user_ip', ['type' => 'hidden', 'required' => true, 'value' => getClientIp(), 'templateVars' => ['class'=>'col-md-6'] ] ) ?>
			<?= $this->Form->input('name', ['required' => true, 'templateVars' => ['class'=>'col-md-6'] ] ) ?>
			<?= $this->Form->input('email', ['type' => 'email', 'required' => true, 'email', 'templateVars' => ['class'=>'col-md-6']]) ?>
			<?= $this->Form->input('tickettype_id', ['type' => 'select',  'required' => true, 'options' => $ticketTypes, 'templateVars' => ['class'=>'col-md-12']]); ?>
			<?= $this->Form->input('message', ['label' => __('Support Message'), 'required' => true, 'type' => 'textarea', 'templateVars' => ['class'=>'col-md-12']]); ?>
		</fieldset>
		<hr>
		<?= $this->Form->button(__('Create Support Request'), ['class' => 'btn btn-success sendSupport', 'templateVars' => ['class'=>'col-md-12'] ]); ?>
		<?= $this->Form->end() ?>
	</div> 