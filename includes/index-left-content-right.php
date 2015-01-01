<?php ?>

<div class="row">
	<div class="bb col-md-3">		<?php get_sidebar('zone-one'); ?>
    </div>
	<div class="bb col-md-6">   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div <?php post_class(); ?>>
            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                <h3><?php the_title();?></h3>
            </a>
            <p class="meta">
                <?php echo bootstrapwp_posted_on();?>
            </p>

            <div class="">
                <?php // Post thumbnail conditional display.
                if ( bootstrapwp_autoset_featured_img() !== false ) : ?>
                <div class="">
                    <a href="<?php the_permalink(); ?>" title="<?php  the_title_attribute( 'echo=0' ); ?>">
                        <?php echo bootstrapwp_autoset_featured_img(); ?>
                    </a>
                </div>
                <div class="">
                    <?php else : ?>
                    <div class="">
                        <?php endif; ?>
                        <?php the_excerpt(); ?>
                    </div>
                </div><!-- /.row -->

                <hr/>
            </div><!-- /.post_class -->
            <?php endwhile; endif; ?></div>
	<div class="bb col-md-3"><?php get_sidebar('zone-two'); ?></div>
</div>

