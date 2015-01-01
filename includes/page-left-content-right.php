<?php ?>

<div class="row">
        <div class="span12">
            <?php if (function_exists('bootstrapwp_breadcrumbs')) {
            bootstrapwp_breadcrumbs();
        } ?>
        </div><!--/.span12 -->
    </div><!--/.row -->
	
	
	

<div class="row">
	<div class="bb col-md-3">Left</div>
	
	
	<div class="bb col-md-6">
	<?php while (have_posts()) : the_post(); ?>
	<header class="page-title">
        <h1><?php the_title();?></h1>
    </header>

  <div class="">
    <div class="">
        <?php the_content(); ?>
        <?php wp_link_pages( array('before' => '<div class="page-links">' . __('Pages:', 'bootstrapwp'), 'after' => '</div>')); ?>
        <?php edit_post_link(__('Edit', 'bootstrapwp'), '<span class="edit-link">', '</span>'); ?>
        <?php endwhile; // end of the loop. ?>
    </div><!-- /.span8 -->
	
	</div>
	</div>
	
	
	<div class="bb col-md-3">Right</div>
</div>

