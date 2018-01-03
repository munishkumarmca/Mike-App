<?php

use Cake\Core\Configure;

if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s" class="no-js">', Configure::read('App.language'));
    $this->end();
}

if (!$this->fetch('title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}


if (!$this->fetch('tb_footer')) {
    $this->start('tb_footer');
    printf('&copy;%s %s', date('Y'), Configure::read('App.title'));
    $this->end();
}


$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->controller, $this->request->action]) . '" ');
if (!$this->fetch('tb_body_start')) {
    $this->start('tb_body_start');
    echo '<body' . $this->fetch('tb_body_attrs') . '>';
    $this->end();
}

if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}

if (!$this->fetch('tb_body_end')) {
    $this->start('tb_body_end');
    echo '</body>';
    $this->end();
}


$this->prepend('meta', $this->Html->meta('author', null, ['name' => 'author', 'content' => Configure::read('App.author')]));
$this->prepend('meta', $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']));

/**
 * Prepend `css` block with Bootstrap stylesheets and append
 * the `$html5Shim`.
 */
$html5Shim =
<<<HTML
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
HTML;

if(!empty($styles)){
	foreach($styles as $st){
		if($st == 'plugins/fullcalendar/fullcalendar.print'){
			$this->prepend('css', $this->Html->css([$st], ['type' =>'media']));
		} else {
			$this->prepend('css', $this->Html->css([$st]));
		}
	}
}
//$this->prepend('css', $this->Html->css(['bootstrap/bootstrap', 'common', 'loggedin', 'plugins/nprogress/nprogress', 'plugins/jquery.confirm/jquery-confirm']));

$this->prepend('css', $this->Html->css(['bootstrap/bootstrap', 'loggedin','common-style', 'plugins/themify-icons/themify-icons.min.css', 'plugins/animate.css/animate.min.css', 'plugins/fontawesome/css/font-awesome.min.css', 'plugins/hide-show-password/css/example.wink.css', 'plugins/perfect-scrollbar/perfect-scrollbar.min.css', 'plugins/switchery/switchery.min.css', 'theme2/css/styles.css', 'theme2/css/plugins.css','theme2/css/themes/theme-1.css' ]));


$this->append('css', $html5Shim);
 
/**
 * Prepend `script` block with jQuery and Bootstrap scripts
 */
if(!empty($scripts)){
	foreach($scripts as $sc){
		$this->prepend('script', $this->Html->script([$sc ]));
	}
}

$this->prepend('script', $this->Html->script(['jquery/jquery','initialjs/initial', 'admins/script', 'bootstrap/bootstrap', 'global/variables', 'global/functions', 'plugins/nprogress/nprogress' , 'plugins/jquery.confirm/jquery-confirm', 'plugins/jquerycookie',  'plugins/modernizr/modernizr','plugins/hide-show-password/hide-show-password',  'plugins/switchery/switchery.min',  'plugins/perfect-scrollbar/perfect-scrollbar.min', 'theme2/js/main']));

?>
<!DOCTYPE html>
	<?= $this->fetch('html') ?>
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?= $this->Html->charset() ?>
        <title><?= $this->fetch('title') ?></title>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
		<?php echo $this->element('basic/feedback-widget'); ?>
    </head>
    <?php
    echo $this->fetch('tb_body_start');
	echo '<div id="app">';
	echo $this->element('basic/loader');
		echo $this->element('basic/vs2/top-sidebar');
		echo '<div class="app-content">';
			echo $this->element('basic/vs2/action-menu');
			echo $this->element('basic/before-content');
			echo $this->fetch('tb_flash');
			echo $this->fetch('content');
			echo $this->element('basic/after-content');
		echo '</div>';
	echo '</div>';
	echo $this->element('basic/footer');    
	//echo $this->fetch('tb_footer');
    echo $this->fetch('script');	
	?>
	<script>
			$(document).ready(function() {
				Main.init();
			});
		</script>
	<?php 
    echo $this->fetch('tb_body_end');
    ?>

</html>
