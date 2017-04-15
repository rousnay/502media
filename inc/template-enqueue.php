<?php 

/**
 * Enqueue scripts and styles
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