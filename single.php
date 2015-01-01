<?php get_header(); ?>


<div class="container">

    
<?php
if ( function_exists( 'ot_get_option' ) ) {
	$post_part = ot_get_option( 'post_part', array() );
	
	switch ($post_part) {
		case 'left-content-right':
			include('includes/post-left-content-right.php');	
		break;
		
		case 'content-left-right':
			include('includes/post-content-left-right.php');
		break;
		
		case 'content-only':
			include('includes/post-content-only.php');
		break;
		
		case 'content-right':
			include('includes/post-content-right.php');
		break;
		
		case 'left-content':
			include('includes/post-left-content.php');
		break;
		
		case 'left-right-content':
			include('includes/post-left-right-content.php');
		break;
		
		default:
			include('includes/post-content-only.php');
	}
}
?>	
	
</div>


<?php get_footer(); ?>