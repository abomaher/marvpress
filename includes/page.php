<?php


if ( function_exists( 'ot_get_option' ) ) {
	$post_part = ot_get_option( 'post_part', array() );
	
	switch ($post_part) {
		case 'left-content-right':
			echo 'left content right';		
		break;
		
		case 'content-left-right':
			echo 'left content right';
		break;
		
		case 'content-only':
			echo 'content only';
		break;
		
		case 'content-right':
			echo 'content right';
		break;
		
		case 'left-content':
			echo 'left content';
		break;
		
		case 'left-right-content':
			echo 'left right content';
		break;
		
		default:
			echo 'default';
	}
}


?>