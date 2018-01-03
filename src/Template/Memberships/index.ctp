<div class = 'table tableMain'>	
	<section id="page-title">
		<div class="row">
			<div class="col-sm-7">
				<h1 class="mainTitle"> <?php echo __('All Memebrship Packages'); ?></h1>				
			</div>
			<div class = "col-md-5">
				<?php echo $this->element('basic/breadcrumb', array('breadcrumb' => @$breadcrumb)); ?>					
			</div>
		</div>
	</section>
	<div class = "row">
		<div class = "container">
			<div class="btns-group">
				<?php 
				//echo $this->Html->link(__('Dashboard'), ['controller' => 'Actions', 'action' => 'dashboard', 'prefix' => 'admin'], ['class' => 'button btn-info btn-large btn']);
					echo $this->Html->link(__('Add Membership Package'), ['controller' => 'Memberships', 'action' => 'add'], ['class' => 'button btn-info btn-large btn']);
			
				?>
			</div>
		</div>
	</div>	
	<?php //echo $this->element('search/search_team_member'); ?>
    <table class="table table-striped table-condensed table-bordered" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id'); ?></th>
				<th><?= $this->Paginator->sort('name'); ?></th>
				<th><?= $this->Paginator->sort('status'); ?></th>
				<th><?= $this->Paginator->sort('price'); ?></th>
				<th><?= $this->Paginator->sort('validity_type'); ?></th>
			
				<th><?= $this->Paginator->sort('created'); ?></th>
				<th class="actions"><?= __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberships as $membership) {  ?>
                <tr>
					<td><?= $this->Number->format($membership->id) ?></td>
					<td><?= h($membership->name) ?></td>
					<td><?= h($membership->status) ?></td>
					<td><?= $this->Number->format($membership->price) ?></td>
					<td><?= h($membership->validity_type) ?></td>
					<td><?= h($membership->created) ?></td>
					<td class="actions">
						<?= $this->Html->link('', ['action' => 'view', $membership->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
						<?= $this->Html->link('', ['action' => 'edit', $membership->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
						<?= $this->Form->postLink('', ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
					</td>
                </tr> 
            <?php } ?>
        </tbody>
    </table>
    <?php echo $this->element('basic/pagination'); ?>
</div>