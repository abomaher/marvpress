<?php



add_action( 'admin_init', 'rw_register_meta_boxes' );
function rw_register_meta_boxes(){
$meta_boxes = array();









$meta_boxes[] = array(
	'title' => __('خيارات الفيديو'),
	'pages' => array( 'marv_gallery' ),
	'fields' => array(
	array(
	'name' => __('كود الفيديو - من اليوتيوب'),
	'id' => 'video_id',
	'type' => 'text',
	'desc' => __( "<span style='color:black'>مثال:</span> http://www.youtube.com/watch?v=<span style='color:red'>btAl8L1PWSo</span>" ),

	),
));

    $meta_boxes[] = array(
        'title' => __('خيارات الحساب'),
        'pages' => array( 'premium_account' ),
        'fields' => array(
            array(
                'name' => __('اسم الحساب'),
                'id' => 'premium_account_id',
                'type' => 'text',

            ),
        ));

$meta_boxes[] = array(
	'title' => __('خيار البنر'),
	'pages' => array( 'banners' ),
	'fields' => array(
        array(
        'name' => __('الرابط'),
        'id' => 'url',
        'type' => 'text',
        ),
        array(
            'name' => __('مكان الإعلان'),
            'id' => 'place',
            'type' => 'select',
            'options'=> array(
                'header' =>'اسفل الهيدر',
                'bottom_acount_twitter' =>'اسفل حسابات مميزة في الرئيسية',
                'single' =>'في صفحة الارشيف و الخبر',

            ),
        ),
        array(
            'name' => __('كود خارجي'),
            'id' => 'code',
            'type' => 'textarea',
            'desc' =>'سيتم تجاهل هذا الخيار في حالة تم رفع صورة'
        ),
));





foreach ( $meta_boxes as $meta_box ){

//new RW_Meta_Box( $meta_box );
}

}

function rw_maybe_include( $conditions ) {

// Include in back-end only

if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {

return false;

}



// Always include for ajax

if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {

return true;

}



if ( isset( $_GET['post'] ) ) {

$post_id = $_GET['post'];

}

elseif ( isset( $_POST['post_ID'] ) ) {

$post_id = $_POST['post_ID'];

}

else {

$post_id = false;

}



$post_id = (int) $post_id;

$post = get_post( $post_id );



foreach ( $conditions as $cond => $v ) {

// Catch non-arrays too

if ( ! is_array( $v ) ) {

$v = array( $v );

}



switch ( $cond ) {

case 'id':

if ( in_array( $post_id, $v ) ) {

return true;

}

break;

case 'parent':

$post_parent = $post->post_parent;

if ( in_array( $post_parent, $v ) ) {

return true;

}

break;

case 'slug':

$post_slug = $post->post_name;

if ( in_array( $post_slug, $v ) ) {

return true;

}

break;

case 'template':

$template = get_post_meta( $post_id, '_wp_page_template', true );

if ( in_array( $template, $v ) ) {

return true;

}

break;

}

}



// If no condition matched

return false;

}