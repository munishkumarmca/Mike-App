<?php 
	$currentController = !empty($this->request->params['controller']) ? $this->request->params['controller'] : '';
	$currentAction = !empty($this->request->params['action']) ? $this->request->params['action'] : '';  
?>
<ul class="navbar-nav ml-auto">	
	<?php 
		foreach($pages as $page){ 
		$active = ($currentController == $page['controller'] && $currentAction == $page['action'] ) ? '<span class="sr-only">(current)</span>' : '';		
		$activeC = ($currentController == $page['controller'] && $currentAction == $page['action'] ) ? 'active' : '';
	?>
	<li class="nav-item <?php echo $activeC; ?>">
		<a class="<?php echo $page['class']; ?>" href="<?php echo $page['link']; ?>"><?php echo $page['menu_title']; ?>
			<?php echo $active; ?>
		</a>
	</li>
	
	<li></li>
	<?php } ?>
</ul>
