<?php
/**
 * Default Page Header
 *
 * @package WP-Bootstrap
 * @subpackage WP-Bootstrap
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
          href="<?php echo get_template_directory_uri();?>/assets/ico/apple-touch-icon-57-precomposed.png">
    <?php wp_head(); ?>
	
	<?php $bg_body = ot_get_option( 'bg_body', array() ); ?> 
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/uikit.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/uikit-theme.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/owl.theme.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
			<script src="//code.jquery.com/jquery-1.11.1.js"></script>
		<script src="<?php echo get_template_directory_uri();?>/assets/js/uikit.min.js"></script>

			<script src="<?php echo get_template_directory_uri();?>/assets/js/owl.carousel.min.js"></script>

	
	
	<style>
		body
		{ 
		background-color: <?php if($bg_body['background-color']){echo $bg_body['background-color'] ; }else{ echo '#ffffff';} ?>;
		background-repeat:<?php if($bg_body['background-repeat']){echo $bg_body['background-repeat'] ; }else{ echo 'repeat-x';} ?>;
		background-attachment:<?php if($bg_body['background-attachment']){echo $bg_body['background-attachment'] ; }else{ echo 'fixed';} ?>;
		background-position:<?php if($bg_body['background-position']){echo $bg_body['background-position'] ; }else{ echo 'top';} ?>;
		background-image:url(<?php if($bg_body['background-image']){echo $bg_body['background-image'] ; }else{ echo get_template_directory_uri().'/images/bg.png';} ?>) ;
		color: <?php echo ot_get_option('colorm'); ?>  ;
		}
		a{
		color: <?php echo ot_get_option('colora'); ?>  ;
		}
		a:hover{
		color: <?php echo ot_get_option('colorh'); ?>  ;
		}
		.navbar .nav {
		background:<?php echo ot_get_option('colormm'); ?>
		}
		.navbar .nav > li a{
		color: <?php echo ot_get_option('mcolora'); ?>  ;
		}
		.navbar .nav > li a:hover{
		color: <?php echo ot_get_option('mcolorh'); ?>  ;
		background: <?php echo ot_get_option('mbuttonch'); ?>  ;
		}
	</style>
	
</head>
<body <?php body_class(); ?>  data-spy="scroll" data-target=".bs-docs-sidebar" data-offset="10">
    <div class="uk-container uk-container-center uk-margin-top">
			<a class="" href="layouts_frontpage.html"><h3>Brand</h3></a>
            <?php if ( function_exists( 'ps_012_multilingual_list' ) ) $gs = ps_012_multilingual_list(); ?>
			<?php wp_nav_menu(
                        array(
                            'menu' => 'main-menu',
                            'container_class' => 'uk-navbar',
                            'menu_class' => 'uk-navbar-nav uk-hidden-small',
                            'fallback_cb' => '',
                            'menu_id' => 'main-menu'
                        )
                    ); 
					
					
			 slider_in_home();
			
			?>
					
	
	<script>
	
	$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 1,

 
  });
 
});
	
	</script>
	<div id="owl-demo">
          
  <div class="item"><img src="http://www.online-image-editor.com/styles/2013/images/example_image.png" alt="Owl Ima7gdde"></div>
  <div class="item"><img src="http://www.online-image-editor.com/styles/2013/images/example_image.png" alt="Owl Im6age"></div>
  <div class="item"><img src="http://www.online-image-editor.com/styles/2013/images/example_image.png" alt="Owl Im5age"></div>
  <div class="item"><img src="http://www.online-image-editor.com/styles/2013/images/example_image.png" alt="Owl Ima4ge"></div>
  <div class="item"><img src="http://www.online-image-editor.com/styles/2013/images/example_image.png" alt="Owl Imadge"></div>
  <div class="item"><img src="http://www.online-image-editor.com/styles/2013/images/example_image.png" alt="Owl Ima4ge"></div>
  <div class="item"><img src="http://www.online-image-editor.com/styles/2013/images/example_image.png" alt="Owl I7magee"></div>
  <div class="item"><img src="http://www.online-image-editor.com/styles/2013/images/example_image.png" alt="Owl Image"></div>
  <div class="item"><img src="http://www.online-image-editor.com/styles/2013/images/example_image.png" alt="Owl Imadge"></div>
  <div class="item"><img src="http://www.online-image-editor.com/styles/2013/images/example_image.png" alt="Owl Image"></div>

  
  
  

  
 
</div>



	<div style="width: 200px;">
  <?php if ( is_home() ) { if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-home-right') ) : else :  endif; } else { } ?>
	</div>

	