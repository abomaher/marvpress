<?php ?>

<div class="row">
        <div class="span12">
            <?php if (function_exists('bootstrapwp_breadcrumbs')) {
            bootstrapwp_breadcrumbs();
        } ?>
        </div><!--/.span12 -->
    </div><!--/.row -->

<div class="row">
	<div class="bb col-md-3"> <?php get_sidebar('zone-one') ?></div>
	
	
	
	<div class="bb col-md-6">
	
		<?php while (have_posts()) : the_post(); ?>

		<header class="post-title">
			<h1><?php the_title();?></h1>
		</header>

		<div class="">
			<div class="">
				 <p class="meta"><?php echo bootstrapwp_posted_on();?></p>
				<?php the_content(); ?>
				<?php the_tags('<p>Tags: ', ', ', '</p>'); ?>
				<?php endwhile; // end of the loop. ?>
				<hr/>

				<?php comments_template(); ?>
				<?php bootstrapwp_content_nav('nav-below'); ?>
			</div><!-- /.span8 -->
			
		</div>
	</div>
	
	<div class="bb col-md-3">Right</div>
</div>

