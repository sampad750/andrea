<?php
/**
 * andrea's functions and definitions
 *
 * @package andrea
 * @since andrea 1.0
 */

 /**
* Path Define
*/

define( 'ANDREA_THEME_DIR', get_template_directory() );

/**
 * First, let's set the maximum content width based on the theme's
 * design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800; /* pixels */
}


if ( ! function_exists( 'andrea_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function andrea_setup() {

		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'andrea', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'editor-styles' );
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'main_menu'   => __( 'Main Menu', 'andrea' ),
		) );

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		//add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));
	}
endif; // myfirsttheme_setup
add_action( 'after_setup_theme', 'andrea_setup' );


/**
 * Load All Classes.
 */
require_once ANDREA_THEME_DIR .'/inc/class/theme-autoload.php';

/**
 * Theme's helper functions
 */
require_once ANDREA_THEME_DIR . '/inc/class/andrea_helper.php';

/**
 * Walker Comment's
 */
require_once ANDREA_THEME_DIR . '/inc/class/andrea-walker-comment.php';

/**
 * Post View Count
 */
require_once ANDREA_THEME_DIR . '/inc/post-view.php';


/**
 * Register Sidebar Widgets
 */
//require_once ANDREA_THEME_DIR . '/inc/sidebars.php';



/**
 * Register Sidebar and footer widget
 */
function andrea_register_widgets() {
	/* Register Andrea sidebar widget */
	register_sidebar(
		array(
			'id'            => 'andrea_sidebar',
			'name'          => __( 'Andrea Sidebar', 'andrea' ),
			'description'   => __( 'WordPress sidebar widget: Customize and display various content in the sidebar area of your website.', 'andrea' ),
			'before_widget' => '<div id="%1$s" class="widget sidebar-box ftco-animate %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="sidebar-heading">',
			'after_title'   => '</h3>',
		),
	);
	// left Sidebar
	register_sidebar(
		array(
			'id'            => 'andrea_left_sidebar',
			'name'          => __( 'Andrea Left Sidebar', 'andrea' ),
			'description'   => __( 'WordPress sidebar widget: Customize and display various content in the sidebar area of your website.', 'andrea' ),
			'before_widget' => '<div id="%1$s" class="widget sidebar-box ftco-animate %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		),
	);
	
}
add_action( 'widgets_init', 'andrea_register_widgets' );



// Wrap up the Categories count in span tag /
add_filter( 'wp_list_categories', function ( $links ) {
	$links = str_replace( '</a> (', '<span>(', $links );
	$links = str_replace( ')', ')</span> </a>', $links );

	return $links;
} );

// post comment reply link class name replace /
function andrea_comment_reply_link_class( $class ) {
	$class = str_replace( "class='comment-reply-link", "class='reply", $class );
	return $class;
}
add_filter( 'comment_reply_link', 'andrea_comment_reply_link_class' );

// post love button /
function andrea_love_btn(){
	$post_id 		= $_POST['post_id'] ?? '';
	$prev_ids 		= get_user_meta(get_current_user_id(), 'love_btn_id', true);
	$prev_ids 		= $prev_ids ? $prev_ids : 0;
	$updated_ids 	= $prev_ids .','. $post_id;
    update_user_meta( get_current_user_id(), 'love_btn_id', $updated_ids );
}
add_action('wp_ajax_andrea_love_btn', 'andrea_love_btn');
add_action('wp_ajax_noprive_andrea_love_btn', 'andrea_love_btn');

// Register Block Style
if ( function_exists( 'register_block_style' ) ) {
    register_block_style(
        'core/quote',
        array(
            'name'         => 'blue-quote',
            'label'        => __( 'Blue Quote', 'andrea' ),
            'is_default'   => true,
            'inline_style' => '.wp-block-quote.is-style-blue-quote { color: blue; }',
        )
    );
}




















