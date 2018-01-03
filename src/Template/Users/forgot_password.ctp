<div class="logo margin-top-30">
	<div class="panel-body"> 
		<div class="users formw">			
			<?= $this->Form->create(null,[ 'id' => 'forgotPassword', 'class' => 'pageform','autocomplete'=>'off' ]) ?>
				<fieldset>
					<legend><?= __('Please enter your email address') ?></legend>
					<?php echo $this->element('basic/front-errors'); ?>
					<?= $this->Form->input('admin_email',['required' => true,'email'=>true, 'data-afterHtml' => "<i class='fa fa-envelope-o'></i>", 'required' => true, 'label' => 'Email', 'placeholder' => 'Email']) ?>
					<hr>
					<div class = 'form-group fomr-actions'>
						<?= $this->Form->button(__('Submit<i class="fa fa-arrow-circle-right"></i>'), array('class' => 'primary large btn btn-primary pull-right afterhtmlOpen', 'data-afterhtml' => "<i class='fa fa-arrow-circle-right'></i>" ) ); ?>
			
						<?php echo $this->Html->link('Login <i class="fa fa-chevron-circle-left"></i>',['controller' => 'actions', 'action' => 'admin-login'], ['class' => 'btn btn-primary btn-o', 'escape' => false]); ?>
					</div>
				</fieldset>
			<?= $this->Form->end() ?>
		</div> 
	</div> 
</div>