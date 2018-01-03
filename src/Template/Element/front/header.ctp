<?php 
use Cake\Core\Configure;
?>
<div id = "wrap">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark-top fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><?php echo Configure::read('App.title'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
			<?php echo $this->cell('FrontNav'); ?>
        </div>
      </div>
    </nav>

    <!-- Header - set the background image for the header in the line below -->
    <header class="py-5 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1076');">
      <img class="img-fluid d-block mx-auto" src="http://placehold.it/200x100&text=Logo Placeholder" alt="">
    </header>