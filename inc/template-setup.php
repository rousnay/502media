<?php 

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

	add_image_size( 'theme_502media_feature_img', 1024, 345, array( 'center', 'center' ) );

	add_image_size( 'theme_502media_team_member', 280, 345, array( 'center', 'center' ) );

	add_image_size( 'theme_502media_work_big', 694, 474, array( 'center', 'center' ) );

	add_image_size( 'theme_502media_work_mid', 516, 228, array( 'center', 'center' ) );

	add_image_size( 'theme_502media_work_sm', 338, 228, array( 'center', 'center' ) );


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
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function theme_502media_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'theme_502media_body_classes' );