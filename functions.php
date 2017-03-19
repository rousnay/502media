<?php
/**
 * 502MEDIA functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 502MEDIA
 */

if ( ! function_exists( 'theme_502media_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_502media_setup() {
    // This theme styles the visual editor to resemble the theme style.
	add_editor_style( 
		array( 
			'style.css'
			) 
		);
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on 502MEDIA, use a find and replace
	 * to change 'theme_502media' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'theme_502media', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'theme_502media_feature_img', 1000, 310, array( 'center', 'center' ) );

	add_image_size( 'theme_502media_blog_listing', 500, 500, array( 'center', 'center' ) );

	add_image_size( 'theme_502media_related_post', 475, 280, array( 'center', 'center' ) );


	/*
	 * Enable support for Shortcode in text widget
	 *
	 */
	add_filter('widget_text', 'do_shortcode');
	
	/*
	 * Default HTML5 Form
	 *
	 * @link https://codex.wordpress.org/Function_Reference/get_search_form
	 */
	add_theme_support( 'html5', array( 'search-form' ) ); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'theme_502media' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'theme_502media_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
}
endif;
add_action( 'after_setup_theme', 'theme_502media_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_502media_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme_502media_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_502media_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function theme_502media_scripts() {

	wp_enqueue_style( 'theme_502media-style', get_stylesheet_uri() );

	wp_enqueue_style('theme_502media-google-fonts-questrial', 'https://fonts.googleapis.com/css?family=Questrial');

	wp_enqueue_style('theme_502media-google-fonts-raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,600,100');

	wp_enqueue_style('theme_502media-google-fonts-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');

	wp_enqueue_script( 'theme_502media-classList-js', 'https://cdnjs.cloudflare.com/ajax/libs/classlist/2014.01.31/classList.min.js', array('jquery'), '');

	wp_enqueue_script( 'theme_502media-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'theme_502media-material-menu-js', get_template_directory_uri() . '/js/materialMenu.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'theme_502media-owl-carousel-js', get_template_directory_uri() . '/js/owl-carousel.min.js', array('jquery'), '', true );

	//wp_enqueue_script( 'theme_502media-bPopup-js', get_template_directory_uri() . '/js/jquery.bpopup.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'theme_502media-perfect-scrollbar-js', get_template_directory_uri() . '/js/perfect-scrollbar.jquery.js', array('jquery'), '', true );

	wp_enqueue_script( 'theme_502media-match-height-js', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), '', true );

	wp_enqueue_script( 'theme_502media-imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'theme_502media-isotope-js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '', true );

	//wp_enqueue_script( 'theme_502media-gsap-tweenmax-js', get_template_directory_uri() . '/js/TweenMax.min.js', array('jquery'), '', true );

	//wp_enqueue_script( 'theme_502media-nobounce-js', get_template_directory_uri() . '/js/noBounce.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'theme_502media-googlemap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCMElTEPn8T2BLcyPBwToPrbK7CIcOrvdg', array(), ' ', true );

	wp_enqueue_script( 'theme_502media-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );

   	wp_enqueue_script( 'theme_502media-settings-js', get_template_directory_uri() . '/js/theme-settings.js', array('jquery'), '20160220', true );

	// WordPress path url in js script file
    $template_url = array( 'templateUrl' => get_stylesheet_directory_uri() );
    wp_localize_script( 'theme_502media-settings-js', 'siteURL', $template_url );

	wp_enqueue_script( 'theme_502media-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_502media_scripts' );





/**
 * Add Script to the admin
 */

// function add_admin_scripts( $hook ) {

//     global $post;

//     if ( $hook == 'post-new.php' || $hook == 'post.php' ) {  

// 		wp_enqueue_script( 'theme_502media-settings-js', get_template_directory_uri() . '/js/theme_502media-settings.js', array('jquery'), '20160220', true );
//     }
// }
// add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );





/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Custom Include files
 */

// ACF
include_once( get_stylesheet_directory() . '/includes/acf/acf.php' );

// ACF Settings
include_once( get_stylesheet_directory() . '/includes/acf-settings.php' );

// Typeahead Settings
//include_once( get_stylesheet_directory() . '/includes/wp-typeahead.php');

// Widgets
include_once( get_stylesheet_directory() . '/includes/widgets.php' );

// Menus
include_once( get_stylesheet_directory() . '/includes/menus.php' );

// Theme Settings
include_once( get_stylesheet_directory() . '/includes/theme-settings.php' );

// Shortcodes
include_once( get_stylesheet_directory() . '/includes/shortcodes.php' );
