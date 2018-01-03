<?php
use Cake\Core\Configure;
?>
<div class="sidebar app-aside" id="sidebar">
	<div class="sidebar-container perfect-scrollbar">
		<nav>						
			<!-- start: MAIN NAVIGATION MENU -->
			<div class="navbar-title">
				<span><i class="ti-time"></i>&nbsp;&nbsp;&nbsp<?php echo Configure::read('App.title'); ?></span>
			</div>
			<?php echo $this->cell('Navigation'); ?>						
		</nav>
	</div>
</div>