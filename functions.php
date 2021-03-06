<?php
/**
 * BootstrapWP Theme Functions
 *
 * @author Rachel Baker <rachel@rachelbaker.me>
 * @package WordPress
 * @subpackage BootstrapWP
 */

 
/**
 * Maximum allowed width of content within the theme.
 */
if (!isset($content_width)) {
    $content_width = 770;
}

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );
 
/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );
 
/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );
/**
 * Theme Options
 */
//include_once( 'includes/theme-options.php' );


/**
 * Setup Theme Functions
 *
 */
if (!function_exists('bootstrapwp_theme_setup')):
    function bootstrapwp_theme_setup() {

        load_theme_textdomain('bootstrapwp', get_template_directory() . '/lang');

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' ));

        register_nav_menus(
            array(
                'main-menu' => __('Main Menu', 'bootstrapwp'),
            ));
        // load custom walker menu class file
        require 'includes/class-bootstrapwp_walker_nav_menu.php';
    }
endif;
add_action('after_setup_theme', 'bootstrapwp_theme_setup');

/**
 * Define post thumbnail size.
 * Add two additional image sizes.
 *
 */
function bootstrapwp_images() {

    set_post_thumbnail_size(260, 180); // 260px wide x 180px high
    add_image_size('bootstrap-small', 300, 200); // 300px wide x 200px high
    add_image_size('bootstrap-medium', 360, 270); // 360px wide by 270px high
}





//my functions
function new_excerpt_more( $more ) {
	return ' ...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );




///function slider
function slider_in_home(){

	$slider_on = ot_get_option('slider_on');
	if($slider_on == "on"){
	
		$slider = '<div class="uk-slidenav-position" data-uk-slideshow> <ul class="uk-slideshow">' ;
		$slideshow = '' ;
		$nav = '';
	
		//news, count and offset
		$get_post = new WP_Query(array(
            'post_type'=>'marv_slider'
        ));
	
	
		while ( $get_post->have_posts() ) : $get_post->the_post();
		
		$slideshow .= "<li>" . the_post_thumbnail(array(50,50)) . "</li>";
		$nav .= "<li  data-uk-slideshow-item='". $get_post->ID ."'></li>";
		endwhile; wp_reset_postdata();
		
		$slider .= $slideshow;
		$slider .= "</ul>";
		$slider .= "<ul class='uk-dotnav'>";
		$slider .= $nav;
		$slider .= "</ul>";
		$slider .= "</div>";
		
		
		echo $slider;
	}

}



/**
 * Define theme's widget areas.
 *
 */
function bootstrapwp_widgets_init() {
	
	//Home Widgets
    register_sidebar(
        array(
            'name'          => __('Home Sidebar Right', 'bootstrapwp'),
            'id'            => 'sidebar-home-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	register_sidebar(
        array(
            'name'          => __('Home Sidebar Left', 'bootstrapwp'),
            'id'            => 'sidebar-home-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	register_sidebar(
        array(
            'name'          => __('Home Content', 'bootstrapwp'),
            'id'            => 'content-home',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	//Pages Widgets
    register_sidebar(
        array(
            'name'          => __('Pages Sidebar Right', 'bootstrapwp'),
            'id'            => 'sidebar-pages-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	register_sidebar(
        array(
            'name'          => __('Pages Sidebar Left', 'bootstrapwp'),
            'id'            => 'sidebar-pages-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	register_sidebar(
        array(
            'name'          => __('Pages Content', 'bootstrapwp'),
            'id'            => 'content-pages',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	//Posts Widgets
    register_sidebar(
        array(
            'name'          => __('Posts Sidebar Right', 'bootstrapwp'),
            'id'            => 'sidebar-posts',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	register_sidebar(
        array(
            'name'          => __('Posts Sidebar Left', 'bootstrapwp'),
            'id'            => 'sidebar-posts-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	register_sidebar(
        array(
            'name'          => __('Posts Content', 'bootstrapwp'),
            'id'            => 'content-posts',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	//Category Widgets
	register_sidebar(
        array(
            'name'          => __('Category Sidebar Right', 'bootstrapwp'),
            'id'            => 'sidebar-category-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	register_sidebar(
        array(
            'name'          => __('Category Sidebar Left', 'bootstrapwp'),
            'id'            => 'sidebar-posts-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
	
	register_sidebar(
        array(
            'name'          => __('Posts Content', 'bootstrapwp'),
            'id'            => 'content-posts',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    

}
add_action('init', 'bootstrapwp_widgets_init');




//////////// Define Post Type and meta box //////////////////

add_action( 'init', 'marvpress_post_type' );
function marvpress_post_type() {
	   
	$labels_slider = array(
        'singular_name'       => 'Slider',
        'menu_name'           => 'Slider',
        'parent_item_colon'   => 'Main',
        'all_items'           => 'All',
        'view_item'           => 'Show',
        'add_new_item'        => 'Add new slider',
        'add_new'             => 'Add',
        'edit_item'           => 'Edit',
        'update_item'         => 'Update',
        'search_items'        => 'Search',
        'not_found'           => 'Not Found!',
        'not_found_in_trash'  => 'Not Found In Trash!',
    );
    $args_slider = array(
        'label'               => 'Slider',
        'description'         => 'Slider',
        'labels'              => $labels_slider,
        'supports'            => array( 'title', 'thumbnail'),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
		'register_meta_box_cb' => 'add_slider_metaboxes'
    );
	//slider post type
	register_post_type( 'marv_slider', $args_slider );
	
	
	  
	$labels = array(
        'singular_name'       => 'Gallery',
        'menu_name'           => 'Gallery',
        'parent_item_colon'   => 'Main',
        'all_items'           => 'All',
        'view_item'           => 'Show',
        'add_new_item'        => 'Add New',
        'add_new'             => 'Add',
        'edit_item'           => 'Edit',
        'update_item'         => 'Update',
        'search_items'        => 'Search',
        'not_found'           => 'Not Found!',
        'not_found_in_trash'  => 'Not Found In Trash!',
    );
    $args = array(
        'label'               => 'Gallery',
        'description'         => 'Gallery',
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail'),
		'taxonomies' => array(''),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
		'register_meta_box_cb' => 'add_vedio_metaboxes'
    );
	  //gallery post type
	  register_post_type( 'marv_gallery', $args );
}



register_taxonomy('name of taxonomy', 'marv_gallery',
array(
	"hierarchical" => true,
	"label" => "Category",
	"singular_label" => "label of taxonomy",
	'update_count_callback' => '_update_post_term_count',
	'query_var' => true,
	'rewrite' => array( 
		'slug' => 'slug name of new registered taxonomy',
		'with_front' => false 
	),
	'public' => true,'show_ui' => true,
	'show_tagcloud' => true,
	'_builtin' => false,
	'show_in_nav_menus' => false
	)
 );


//add slider meta box
add_action( 'add_meta_boxes', 'add_slider_metaboxes' );
function add_slider_metaboxes() {
	add_meta_box('wpt_vedio_code', 'Slider link', 'wpt_slider_link', 'marv_slider', 'normal', 'default');
}

//add video meta box
add_action( 'add_meta_boxes', 'add_vedio_metaboxes' );
function add_vedio_metaboxes() {
	add_meta_box('wpt_vedio_code', 'Youtube link', 'wpt_vedio_code', 'marv_gallery', 'normal', 'default');
}

//add post meta box
add_action( 'add_meta_boxes', 'add_post_metaboxes' );
function add_post_metaboxes() {
    add_meta_box('wpt_post_second_title', 'اعدادات اضافة للخبر', 'wpt_post_meta_box', 'post', 'normal', 'default');
}

function wpt_post_meta_box() {
    global $post;

    // Noncename needed to verify where the data originated
    wp_nonce_field( 'post_meta_box', 'post_meta_box_nonce' );

    // Get the second title data if its already been entered
    $sec_title = get_post_meta($post->ID, 'post_second_title', true);
    $post_sources = get_post_meta($post->ID, 'post_sources', true);
    $fex_post = get_post_meta($post->ID, 'post_fexid', true);

    // Echo out the field
    echo '<label for="second_title">العنوان الثانوي</label><input type="text" placeholder="العنوان الثانوي" name="second_title" value="' . $sec_title  . '" class="widefat" /><br /><br />';
    echo '<label for="po_sources">مصدر الخبر</label><input type="text" placeholder="مصدر الخبر" name="po_sources" value="' . $post_sources  . '" class="widefat" /><br /><br />';
    echo '<input type="checkbox" name="fexid" ', $fex_post ? ' checked="checked"' : '', ' /> خبر مثبت';
}

function wpt_vedio_code() {
	global $post;
	
	// Noncename needed to verify where the data originated
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );
	
	// Get the video url data if its already been entered
	$location = get_post_meta($post->ID, 'video_url_key', true);
	
	// Echo out the field
	echo '<input type="text" placeholder="قم باضافة رابط الفيديو من موقع اليوتيوب" name="video_url" value="' . $location  . '" class="widefat" />
	<br /><span class="description">مثال: https://www.youtube.com/watch?v=DhLIjHb-niI</span>';

}

//add video thumbnail after save post
add_action('save_post', 'wds_video_sideload_post_thumb');
function wds_video_sideload_post_thumb() {
global $post;

	$old = get_post_meta($post->ID, 'video_url_key', true);
    $new = $_POST['video_url'];
    if ($new && $new != $old) {
        update_post_meta($post->ID, 'video_url_key', $new);
    } elseif ('' == $new && $old) {
        delete_post_meta($post->ID, 'video_url_key', $old);
    }

    $youtube_url = get_post_meta( $post->ID, 'video_url_key', true );
    $youtubeid = youtubeid($youtube_url);
        $thumb_url = 'http://img.youtube.com/vi/'. $youtubeid .'/hqdefault.jpg';

        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        set_time_limit(300);

        if ( ! empty($thumb_url) ) {
            // Download file to temp location
            $tmp = download_url( $thumb_url );

            // Set variables for storage
            // fix file filename for query strings
            preg_match('/[^\?]+\.(jpg|JPG|jpe|JPE|jpeg|JPEG|gif|GIF|png|PNG)/', $thumb_url, $matches);
            $file_array['name'] = basename($matches[0]);
            $file_array['tmp_name'] = $tmp;

            // If error storing temporarily, unlink
            if ( is_wp_error( $tmp ) ) {
                @unlink($file_array['tmp_name']);
                $file_array['tmp_name'] = '';
            }

            // do the validation and storage stuff
            $thumbid = media_handle_sideload( $file_array, $post->ID, $desc );
            // If error storing permanently, unlink
            if ( is_wp_error($thumbid) ) {
                @unlink($file_array['tmp_name']);
                return $thumbid;
            }
        }

        set_post_thumbnail( $post, $thumbid );
}

function youtubeid($url) {
    $domain = parse_url( $url, PHP_URL_HOST );
    $url = esc_url( $url );
    if ( $domain == 'www.youtube.com' || $domain == 'youtube.com' ) {
        parse_str( parse_url( $url, PHP_URL_QUERY ) );
        $youtubeid = $v;
    } elseif ( $domain == 'youtu.be' ) {
        $youtubeid = substr( parse_url( $url, PHP_URL_PATH ), 1 ) ;
    } else {
        $youtubeid = '';
    }
    return $youtubeid;
}

function save_my_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_meta_box' ) ) {
		return;
	}


	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['video_url'] ) ) {
		return;
	}


	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['video_url'] );
	$my_sec_title = sanitize_text_field( $_POST['second_title'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'video_url_key', $my_data );
}
add_action( 'save_post', 'save_my_meta_box_data', 99 );


function save_my_meta_box_data2( $post_id ) {

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */


    // Check if our nonce is set.
    if ( ! isset( $_POST['post_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['post_meta_box_nonce'], 'post_meta_box' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if ( ! isset( $_POST['second_title'] ) ) {
        return;
    }
    // Make sure that it is set.
    if ( ! isset( $_POST['fexid'] ) ) {
        return;
    }
    // Make sure that it is set.
    if ( ! isset( $_POST['po_sources'] ) ) {
        return;
    }

    // Sanitize user input.
    $my_sec_title = sanitize_text_field( $_POST['second_title'] );
    $my_post_sources = sanitize_text_field( $_POST['po_sources'] );
    $my_fexid = sanitize_text_field( $_POST['fexid'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, 'post_second_title', $my_sec_title );
    update_post_meta( $post_id, 'post_sources', $my_post_sources );
    update_post_meta( $post_id, 'post_fexid', $my_fexid );
}
add_action( 'save_post', 'save_my_meta_box_data2', 99 );


//////////// Define Post Type and meta box //////////////////







/**
 * Display page next/previous navigation links.
 *
 */
if (!function_exists('bootstrapwp_content_nav')):
    function bootstrapwp_content_nav($nav_id) {

        global $wp_query, $post;

        if ($wp_query->max_num_pages > 1) : ?>

        <nav id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
            <h1 class="assistive-text"><?php _e('Post navigation', 'bootstrapwp'); ?></h1>
        
            <div class="nav-next alignright"><?php previous_posts_link(
                __('Newer posts <span class="meta-nav">&rarr;</span>', 'bootstrapwp')
            ); ?></div>
        </nav><!-- #<?php echo $nav_id; ?> .navigation -->

        <?php endif;
    }
endif;

/**
 * Display template for comments and pingbacks.
 *
 */
if (!function_exists('bootstrapwp_comment')) :
    function bootstrapwp_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' : ?>

                <li class="comment media" id="comment-<?php comment_ID(); ?>">
                    <div class="media-body">
                        <p>
                            <?php _e('Pingback:', 'bootstrapwp'); ?> <?php comment_author_link(); ?>
                        </p>
                    </div><!--/.media-body -->
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post; ?>

                <li class="comment media" id="li-comment-<?php comment_ID(); ?>">
                        <a href="<?php echo $comment->comment_author_url;?>" class="pull-left">
                            <?php echo get_avatar($comment, 64); ?>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading comment-author vcard">
                                <?php
                                printf('<cite class="fn">%1$s %2$s</cite>',
                                    get_comment_author_link(),
                                    // If current post author is also comment author, make it known visually.
                                    ($comment->user_id === $post->post_author) ? '<span class="label"> ' . __(
                                        'Post author',
                                        'bootstrapwp'
                                    ) . '</span> ' : ''); ?>
                            </h4>

                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="comment-awaiting-moderation"><?php _e(
                                    'Your comment is awaiting moderation.',
                                    'bootstrapwp'
                                ); ?></p>
                            <?php endif; ?>

                            <?php comment_text(); ?>
                            <p class="meta">
                                <?php printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                            esc_url(get_comment_link($comment->comment_ID)),
                                            get_comment_time('c'),
                                            sprintf(
                                                __('%1$s at %2$s', 'bootstrapwp'),
                                                get_comment_date(),
                                                get_comment_time()
                                            )
                                        ); ?>
                            </p>
                            <p class="reply">
                                <?php comment_reply_link( array_merge($args, array(
                                            'reply_text' => __('Reply <span>&darr;</span>', 'bootstrapwp'),
                                            'depth'      => $depth,
                                            'max_depth'  => $args['max_depth']
                                        )
                                    )); ?>
                            </p>
                        </div>
                        <!--/.media-body -->
                <?php
                break;
        endswitch;
    }
endif;


/**
 * Display template for post meta information.
 *
 */
if (!function_exists('bootstrapwp_posted_on')) :
    function bootstrapwp_posted_on()
    {
        printf(__('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>','bootstrapwp'),
            esc_url(get_permalink()),
            esc_attr(get_the_time()),
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_attr(sprintf(__('View all posts by %s', 'bootstrapwp'), get_the_author())),
            esc_html(get_the_author())
        );
    }
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 */
function bootstrapwp_body_classes($classes)
{
    if (!is_multi_author()) {
        $classes[] = 'single-author';
    }
    return $classes;
}
add_filter('body_class', 'bootstrapwp_body_classes');


/**
 * Add post ID attribute to image attachment pages prev/next navigation.
 *
 */
function bootstrapwp_enhanced_image_navigation($url)
{
    global $post;
    if (wp_attachment_is_image($post->ID)) {
        $url = $url . '#main';
    }
    return $url;
}
add_filter('attachment_link', 'bootstrapwp_enhanced_image_navigation');


/**
 * Checks if a post thumbnails is already defined.
 *
 */
function bootstrapwp_is_post_thumbnail_set()
{
    global $post;
    if (get_the_post_thumbnail()) {
        return true;
    } else {
        return false;
    }
}


/**
 * Set post thumbnail as first image from post, if not already defined.
 *
 */
function bootstrapwp_autoset_featured_img()
{
    global $post;

    $post_thumbnail = bootstrapwp_is_post_thumbnail_set();
    if ($post_thumbnail == true) {
        return get_the_post_thumbnail();
    }
    $image_args     = array(
        'post_type'      => 'attachment',
        'numberposts'    => 1,
        'post_mime_type' => 'image',
        'post_parent'    => $post->ID,
        'order'          => 'desc'
    );
    $attached_images = get_children($image_args, ARRAY_A);
    $first_image = reset($attached_images);
    if (!$first_image) {
        return false;
    }

    return get_the_post_thumbnail($post->ID, $first_image['ID']);

}


/**
 * Define default page titles.
 *
 */
function bootstrapwp_wp_title($title, $sep)
{
    global $paged, $page;
    if (is_feed()) {
        return $title;
    }
    // Add the site name.
    $title .= get_bloginfo('name');
    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title = "$title $sep $site_description";
    }
    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', 'bootstrapwp'), max($paged, $page));
    }
    return $title;
}
add_filter('wp_title', 'bootstrapwp_wp_title', 10, 2);

/**
 * Display template for breadcrumbs.
 *
 */
function bootstrapwp_breadcrumbs()
{
    $home      = 'Home'; // text for the 'Home' link
    $before    = '<li class="active">'; // tag before the current crumb
    $sep       = '<span class="divider">/</span>';
    $after     = '</li>'; // tag after the current crumb

    if (!is_home() && !is_front_page() || is_paged()) {

        echo '<ul class="breadcrumb">';

        global $post;
        $homeLink = home_url();
            echo '<li><a href="' . $homeLink . '">' . $home . '</a> '.$sep. '</li> ';
            if (is_category()) {
                global $wp_query;
                $cat_obj   = $wp_query->get_queried_object();
                $thisCat   = $cat_obj->term_id;
                $thisCat   = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0) {
                    echo get_category_parents($parentCat, true, $sep);
                }
                echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
            } elseif (is_day()) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                    'Y'
                ) . '</a></li> ';
                echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time(
                    'F'
                ) . '</a></li> ';
                echo $before . get_the_time('d') . $after;
            } elseif (is_month()) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                    'Y'
                ) . '</a></li> ';
                echo $before . get_the_time('F') . $after;
            } elseif (is_year()) {
                echo $before . get_the_time('Y') . $after;
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug      = $post_type->rewrite;
                    echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>'.$sep.'</li> ';
                    echo $before . get_the_title() . $after;
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo '<li>'.get_category_parents($cat, true, $sep).'</li>';
                    echo $before . get_the_title() . $after;
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;
            } elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $cat    = get_the_category($parent->ID);
                $cat    = $cat[0];
                echo get_category_parents($cat, true, $sep);
                echo '<li><a href="' . get_permalink(
                    $parent
                ) . '">' . $parent->post_title . '</a></li> ';
                echo $before . get_the_title() . $after;

            } elseif (is_page() && !$post->post_parent) {
                echo $before . get_the_title() . $after;
            } elseif (is_page() && $post->post_parent) {
                $parent_id   = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page          = get_page($parent_id);
                    $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title(
                        $page->ID
                    ) . '</a>' . $sep . '</li>';
                    $parent_id     = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) {
                    echo $crumb;
                }
                echo $before . get_the_title() . $after;
            } elseif (is_search()) {
                echo $before . 'Search results for "' . get_search_query() . '"' . $after;
            } elseif (is_tag()) {
                echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . 'Articles posted by ' . $userdata->display_name . $after;
            } elseif (is_404()) {
                echo $before . 'Error 404' . $after;
            }
            // if (get_query_var('paged')) {
            //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
            //     ) {
            //         echo ' (';
            //     }
            //     echo __('Page', 'bootstrapwp') . $sep . get_query_var('paged');
            //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
            //     ) {
            //         echo ')';
            //     }
            // }

        echo '</ul>';

    }
}



/**
 * This theme was built with PHP, Semantic HTML, CSS, love, and a bootstrap.
 */


function custom_rewrite_rule() {
    add_rewrite_rule('^nutrition/([^/]*)/([^/]*)/?','index.php?page_id=12&food=$matches[1]&variety=$matches[2]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);


//Add new function
    function new_fun($name){
        echo $name;
    }