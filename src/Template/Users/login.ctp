<div class="logo margin-top-30">
	<!--div class="panel-heading">
		<h3 class="panel-title">Administative Login</h3> 
	</div--> 
	<div class=""> 
		<div class="users formw">			
			<?= $this->Form->create(null,['autocomplete'=>'off', 'class' => 'form-login pageform' ]) ?>
				<fieldset>
					<legend><?= __('Signin to your account') ?></legend>
					<?= $this->Form->input('login',['data-afterHtml' => "<i class='fa fa-user'></i>", 'required' => true, 'label' => 'Username', 'placeholder' => 'Username']); ?><br>
					<?= $this->Form->input('password',['type' => 'password', 'required' => true, 'data-afterHtml' => "<i class='fa fa-lock'></i>".$this->Html->link('Forgot Password?',['controller' => 'users', 'action' => 'forgot-password'], ['class' => 'forgot']), 'required' => true, 'label' => 'Password', 'placeholder' => 'Password']); ?>
					<?php if(isset($showCaptcha) && $showCaptcha == true){
						?>
							<br>	
							<div class="g-recaptcha" data-sitekey="<?= $globalSetting['captcha_client_key']; ?>"></div><br>
						<?php 
					}					
					?>
					<hr>
					<?= $this->Form->button(__("Login <i class='fa fa-arrow-circle-right'></i>"), array('value' => "Login", 'class' => 'primary large btn btn-primary pull-right', 'escape' => false ) ); ?>&nbsp;&nbsp;
					<?php //echo $this->Html->link('Forgot Password?',['controller' => 'actions', 'action' => 'forgot-password']); ?>
					<?= $this->Form->end() ?>
					<br>
				</fieldset>
		</div> 
	</div> 
</div>