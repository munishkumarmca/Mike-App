<div class="users form">
<?php var_dump($this->cell('TicketType')); ?>			
		<?= $this->Form->create('SupportTicket', ['id' => 'SupportTicket', 'novalidate']) ?>
		<fieldset>
			<legend><?= __('Please fill the form below to contact our support.') ?></legend>
			<?php echo $this->element('basic/front-errors'); ?>
			<?= $this->Form->input('name', ['required' => true, 'templateVars' => ['class'=>'col-md-6'] ] ) ?>
			<?= $this->Form->input('email', ['type' => 'email', 'required' => true, 'email', 'templateVars' => ['class'=>'col-md-6']]) ?>
			<?= $this->Form->input('support_subject', ['required' => true, 'type' => 'text', 'templateVars' => ['class'=>'col-md-12']]); ?>
			<?= $this->Form->input('support_message', ['label' => __('Support Message'), 'required' => true, 'type' => 'textarea', 'templateVars' => ['class'=>'col-md-12']]); ?>
		</fieldset>
	<?= $this->Form->button(__('Create Support Request'), ['class' => 'primary large sendSupport', 'templateVars' => ['class'=>'col-md-12'] ]); ?>
	<?= $this->Form->end() ?>
</div> 