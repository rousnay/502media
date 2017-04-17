<?php
/**
 * 502MEDIA functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 502MEDIA
 */

/**
 * Sets up theme defaults and registers support for various WordPress features
 * and enable support for Post Thumbnails on posts and pages.
 */
require get_stylesheet_directory() . '/inc/template-setup.php';

// Enqueue scripts and styles.
require get_stylesheet_directory() . '/inc/template-enqueue.php';

// Implement the Custom Header feature.
require get_template_directory() . '/inc/template-custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/inc/template-customizer.php';

// Theme Settings
include_once( get_stylesheet_directory() . '/inc/template-settings.php' );

// Widgets
include_once( get_stylesheet_directory() . '/inc/template-widgets.php' );

// Menus
include_once( get_stylesheet_directory() . '/inc/template-menus.php' );

// Custom Post Type
include_once( get_stylesheet_directory() . '/inc/template-post-type.php' );

// Shortcodes
include_once( get_stylesheet_directory() . '/inc/template-shortcodes.php' );

// Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';

// ACF Settings
include_once( get_stylesheet_directory() . '/inc/acf-settings.php' );

// Typeahead Settings
// include_once( get_stylesheet_directory() . '/inc/wp-typeahead.php');



