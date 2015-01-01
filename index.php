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
 

?>	

<div class="uk-slidenav-position" data-uk-slideshow>
    <ul class="uk-slideshow" style="height:200px">
        <li >
			aaaa
			<div class="uk-cover-background uk-position-cover" style="background-image: url(http://getuikit.com/docs/images/placeholder_800x400_3.jpg);"></div>
		</li>
        <li >
			<div class="uk-cover-background uk-position-cover" style="background-image: url(http://getuikit.com/docs/images/placeholder_800x400_2.jpg);"></div>
		</li>
    </ul>
    <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
    <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next"></a>
    <ul class="uk-dotnav">
        <li data-uk-slideshow-item="0"><a href=""></a></li>
        <li data-uk-slideshow-item="1"><a href=""></a></li>
    </ul>
</div>


	
</div>

    
<?php get_footer(); ?>