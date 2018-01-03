<div class = "wrap">
<section class="py-5">
    <div class="container">
        <?php echo $page_data->show_title == 'yes' ? '<h1>'.$page_data->title.'</h1>' : ''; ?>
        <?php echo $page_data->show_sub_title == 'yes' ? '<p class = "lead">'.$page_data->sub_title.'</p>' : ''; ?>
		<?php echo $page_data->content; ?>
    </div>
</section>

    