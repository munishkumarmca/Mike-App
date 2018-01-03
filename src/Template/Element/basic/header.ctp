<?php
use Cake\Core\Configure;
?>
<nav class="navbar navbar-dark bg-inverse navbar-full navbar-light bg-faded">
	<a class="navbar-brand" href="#"><?php Configure::read('App.title'); ?></a>
	<?php //echo $this->element('basic/header-right'); ?>
</nav>

<div class="sidebar app-aside" id="sidebar">
	<div class="sidebar-container perfect-scrollbar">
		<div class="navbar-title">
			<span>Main Navigation</span>
		</div>
		<?php echo $this->cell('Navigation'); ?>
	</div>
</div>