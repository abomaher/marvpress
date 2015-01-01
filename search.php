<?php
/**
 * Search Results Template
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>


<div class="container">

<?php

$ss = $_GET['s'];
$cat = $_GET['cat'];

$dropmenu = array();
if ( function_exists( 'ot_get_option' ) ) {
  
	/* get the slider array */
	$soc = ot_get_option( 'cat2', array() );
				  
	if ( ! empty( $soc ) ) {
				
		foreach( $soc as $socs ) {
					
			$dropmenu += array( $socs['value'] => get_cat_name($socs['value']));
					
		}
	}
				  
}

?>



<div class="row">
	<div class="col-md-4">
		<form action='' method='GET'>
		Keyword: <input type='text' name='s' value='<?= $ss ?>' /><br />  
		<select name='cat'>
		<?php
		echo "<option value=''>All</option>";
		foreach($dropmenu as $key=>$value){
	
			$cat == $key ? $selected = "selected" : $selected = "";
			echo "<option value='".$key."' ".$selected.">".$value."</option>";
			
		}

		?>
		</select><br />
		
		<input type='submit' name='' value='Search' />
		</form>
	</div>
	
	<div class="col-md-8">
		<?php
		$args = array(
			's' => $ss,
			'cat' => $cat,
			'post_type' => 'post',

		);

		$the_query = new WP_Query($args);

		if($the_query->have_posts()){
			$the_query->the_post();
				echo '
				<div class="media">
					<a class="pull-right" href="#">' . the_post_thumbnail(array(64,64)) . '</a>
					<div class="media-body">
						<h4 class="media-heading">' . the_title() . '</h4>
						' . the_excerpt(120) . '
					</div>
				</div>';			
		}else{
			echo "no found";

		}
		
		// types will be a list of the post type names
    $types = get_post_types();

    // get the registered data about each post type with get_post_type_object
    foreach( $types as $type )
    {
        $typeobj = get_post_type_object( $type );
		echo $typeobj->name . "<br />";
		
	}
		
		
		?>
	</div>
</div>

</div>




<?php get_footer(); ?>