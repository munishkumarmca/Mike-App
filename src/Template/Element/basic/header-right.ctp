<div class = 'header-right'>
	<ul class = 'loggedin-nav'>
		<li class = 'profile-image'>
			<?php 
				$userDataTemp = $this->request->session()->read();
				$userData = $userDataTemp['Auth']['User']; 
				if(!empty($userData->admindetail->uploads)){
				?>
					<span><img class = 'img-circle profile-image' src = '<?php  echo $this->request->webroot.$userData->admindetail->uploads->path; ?>' /></span>
				<?php 
				}
			?>
		</li>
		<li>
			<a href = 'javascript: void(null)' ><span>Welcome </span><br><?php echo $userData->admindetail->first_name.' '.$userData->admindetail->last_name; ?></a>
		</li>
		<li>
			<?php echo $this->Html->link('Update Profile', ['controller' => 'Admins', 'action' => 'updateProfile', 'admin' => true ], ['class' => 'button']); ?>
		</li>
		<li>
			<?php echo $this->Html->link('Create Support Ticket', ['controller' => 'Tickets', 'action' => 'add', 'admin' => true ], ['class' => 'button']); ?>
		</li>
		<li>
			<?php echo $this->Html->link('Logout', ['controller' => 'Actions', 'action' => 'logout', 'admin' => true], ['class' => 'button']); ?>
		</li>
	</ul>	
</div>