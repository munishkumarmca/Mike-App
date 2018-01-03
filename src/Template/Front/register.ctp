<div class="admindetails form large-9 medium-8 columns content">
	<section id="page-title">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<h1 class="mainTitle"><?= __('Create you account') ?></h1>				
				</div>			
			</div>
		</div>
	</section>
	<?= $this->Form->create($user, ['type' => 'file', 'id' => 'my-awesome-dropzone', 'class' => 'dropzone1 pageform validateForm', 'novalidate' => 'novalidate']) ?>
		<fieldset>
			<div class="container">
				<div class = "row">
					<?php 
						echo $this->element('basic/front-errors');  
						echo $this->Form->control('first_name', ['placeholder' => 'Your first name']);
						echo $this->Form->control('last_name', ['placeholder' => 'Your last name']);
						echo $this->Form->control('login', ['placeholder' => 'Your login. This will be used to login next time.']);
						echo $this->Form->control('email', ['email' => 'email', 'placeholder' => 'Your email address. Will be used for all email notifications.']);
						echo $this->Form->control('password', ['minlength' => '7', 'placeholder' => 'Your password. Please use a secure password.']);
						echo $this->Form->control('display_name', ['placeholder' => 'Your display name. This will displayed to other users.']);
						//echo $this->Form->control('image');
    
					?>
					<div style = "clear: both;">&nbsp;</div>
					<?= $this->Form->button(__('Submit'), ['id' => 'submitForm', 'class' => 'btn btn-o btn-primary']) ?>
					<?= $this->Html->link(__('Cancel'), ['controller' => 'Front', 'action' => 'index'], ['class' => 'buttonLink btn btn-o btn-danger']); ?>
				</div>
			</div>
		</fieldset>
    <?= $this->Form->end() ?>
</div>