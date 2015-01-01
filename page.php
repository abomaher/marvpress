<?php
/**
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>


<div class="container">


<?php
$postid = get_the_ID();

$p = ot_get_option('home_page');

if($postid != $p){
	//page
	if ( function_exists( 'ot_get_option' ) ) {
		$post_part = ot_get_option( 'page_part', array() );
		
		switch ($post_part) {
			case 'left-content-right':
				include('includes/page-left-content-right.php');	
			break;
			
			case 'content-left-right':
				include('includes/page-content-left-right.php');
			break;
			
			case 'content-only':
				include('includes/page-content-only.php');
			break;
			
			case 'content-right':
				include('includes/page-content-right.php');
			break;
			
			case 'left-content':
				include('includes/page-left-content.php');
			break;
			
			case 'left-right-content':
				include('includes/page-left-right-content.php');
			break;
			
			default:
				include('includes/page-content-only.php');
		}
	}

}else{
	//index
	if ( function_exists( 'ot_get_option' ) ) {
		$post_part = ot_get_option( 'index_part', array() );
		
		switch ($post_part) {
			case 'left-content-right':
				include('includes/index-left-content-right.php');	
			break;
			
			case 'content-left-right':
				include('includes/index-content-left-right.php');
			break;
			
			case 'content-only':
				include('includes/index-content-only.php');
			break;
			
			case 'content-right':
				include('includes/index-content-right.php');
			break;
			
			case 'left-content':
				include('includes/index-left-content.php');
			break;
			
			case 'left-right-content':
				include('includes/index-left-right-content.php');
			break;
			
			default:
				include('includes/index-content-only.php');
		}
	}

}
?>	
	
</div>


    
<?php get_footer(); ?>