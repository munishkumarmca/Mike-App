<?php 
$status = ['active' => 'Active', 'inactive' => 'Inactive'];	
$validity_types = ['days' => 'Days', 'months' => 'Months', 'years' => 'Years'];
?>
<div class="admindetails form large-9 medium-8 columns content">
   
	<section id="page-title">
		<div class="row">
			<div class="col-sm-7">
				<h1 class="mainTitle"><?= __('Add New Membership Package') ?></h1>				
			</div>
			<div class = "col-md-5">
				<?php echo $this->element('basic/breadcrumb', array('breadcrumb' => @$breadcrumb)); ?>					
			</div>
		</div>
	</section>
	<div class = "row">
		<div class = "container">
			<div class="btns-group">
				<?php echo $this->Html->link(__('Dashboard'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'button btn-info btn-large btn']); ?>
				<?php echo $this->Html->link(__('Membership Packages Listing'), ['controller' => 'Memberships', 'action' => 'index'], ['class' => 'button btn-info btn-large btn']); ?>
			</div>
		</div>
	</div>
<?= $this->Form->create($membership, [ 'class' => 'dropzone1 pageform validateForm', 'novalidate' => 'novalidate']); ?>
<fieldset>

    <?php
	
	echo $this->element('basic/front-errors'); 
    echo $this->Form->control('name', ['maxlength' => '500']);
    echo $this->Form->control('status', ['options' =>$status, 'value' => 'active', 'class' => 'select2']); ?>
	<div class = 'clear' style = "clear: both;"></div>
	<?php 
    echo $this->Form->control('price', ['type' => 'number', 'step' => '0.10', 'min' => '1.00', 'max' => '100.00']);
	
    echo $this->Form->control('validity', ['label' => 'Validity', 'type' => 'number', 'step' => '1', 'min' => '1', 'max' => '1000']);
    echo $this->Form->control('validity_type', ['options' =>$validity_types, 'value' => 'days', 'class' => 'select2']);	
    echo $this->Form->control('description',['class' => 'tinymce']);	
    ?><div style = "clear: both;">&nbsp;</div>
    <?= $this->Form->button(__('Submit'), ['id' => 'submitForm', 'class' => 'btn btn-o btn-primary']) ?>
    <?= $this->Html->link(__('Cancel'), ['controller' => 'memberships', 'action' => 'index'], ['class' => 'btn  btn-o btn-danger']); ?>
	</fieldset>
    <?= $this->Form->end() ?>
</div>