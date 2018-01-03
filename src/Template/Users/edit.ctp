<?php 
$status = ['active' => 'Active', 'inactive' => 'Inactive', 'paid' => 'Paid'];	
	
?>
<div class="admindetails form large-9 medium-8 columns content">
    <?php //$timezones = DateTimeZone::listIdentifiers( DateTimeZone::ALL ); debug($timezones); ?>
	<section id="page-title">
		<div class="row">
			<div class="col-sm-7">
				<h1 class="mainTitle"><?= __('Add New User') ?></h1>				
			</div>
			<div class = "col-md-5">
				<?php echo $this->element('basic/breadcrumb', array('breadcrumb' => @$breadcrumb)); ?>					
			</div>
		</div>
	</section>
	<div class = "row">
		<div class = "container">
			<div class="btns-group">
				<?php echo $this->Html->link(__('Dashboard'), ['controller' => 'actions', 'action' => 'dashboard'], ['class' => 'button btn-info btn-large btn']); ?>
				<?php echo $this->Html->link(__('Team Members Listing'), ['controller' => 'users', 'action' => 'index'], ['class' => 'button btn-info btn-large btn']); ?>
			</div>
		</div>
	</div>
<?= $this->Form->create($user, ['type' => 'file', 'id' => 'my-awesome-dropzone', 'class' => 'dropzone1 pageform validateForm', 'novalidate' => 'novalidate']) ?>
    <fieldset>
	<?php echo $this->element('basic/front-errors'); 
    echo $this->Form->control('login');
    echo $this->Form->control('email', ['email' => 'email']);
    echo $this->Form->control('password');
    echo $this->Form->control('first_name');
    echo $this->Form->control('last_name');
    echo $this->Form->control('display_name');
    //echo $this->Form->control('image');
    //echo $this->Form->control('last_logged_in');
    echo $this->Form->control('role_id', ['options' => $roles, 'empty' => 'Select Role', 'class' => 'select2']);
	echo $this->Form->control('status', ['options' => $status, 'empty' => 'Select Status', 'class' => 'select2 fancySelect']);
    //echo $this->Form->control('end_date');
    //echo $this->Form->control('dob');
   // echo $this->Form->control('deleted');
    ?><div style = "clear: both;">&nbsp;</div>
    <?= $this->Form->button(__('Submit'), ['id' => 'submitForm', 'class' => 'btn btn-o btn-primary']) ?>
    <?= $this->Html->link(__('Cancel'), ['controller' => 'users', 'action' => 'index'], ['class' => 'btn  btn-o btn-danger']); ?></fieldset>
    <?= $this->Form->end() ?>
</div>