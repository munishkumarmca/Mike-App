<div class = 'table tableMain'>	
	<section id="page-title">
		<div class="row">
			<div class="col-sm-7">
				<h1 class="mainTitle"> <?php echo __('All Users List'); ?></h1>				
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
				if (!empty($moduleAccess->add_access) || !empty($superadmin)) {
					echo $this->Html->link(__('Add User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'button btn-info btn-large btn']);
				}
				?>
			</div>
		</div>
	</div>	
	<?php //echo $this->element('search/search_team_member'); ?>
    <table class="table table-striped table-condensed table-bordered" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('first_name', __('First Name')); ?></th>
                <th><?= $this->Paginator->sort('last_name', __('Last Name')); ?></th>
                <th><?= $this->Paginator->sort('login', __('Login')); ?></th>
                <th><?= $this->Paginator->sort('email', __('Email')); ?></th>
                <th>Role</th>
                <th><?= $this->Paginator->sort('status', __('Status')); ?></th>
                <th><?= $this->Paginator->sort('created', __('Created')); ?></th>
                <th class="actions"><?= __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) {  ?>
                <tr>
                    <td><?= h($user->first_name) ?></td>       
                    <td><?= h($user->last_name) ?></td>
                    <td><?= h($user->login) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?php echo $user->role->name; ?></td>

                    <td><?= $user->status; ?></td>
                    <td><?= date($globalSetting['date_format'], strtotime(h($user->created))); ?></td>
                    <td class="actions">
						<?php 
							echo $this->Html->link('', ['action' => 'view', $user->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']);

                            echo $this->Html->link('', ['action' => 'edit', $user->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']);
                      
                            echo $this->Form->postLink('', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']);

                        ?>
                    </td>
                </tr> 
            <?php } ?>
        </tbody>
    </table>
    <?php echo $this->element('basic/pagination'); ?>
</div>