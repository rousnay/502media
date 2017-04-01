<?php 

	/*
	*  register_post_types
	*
	*  This function will register post types and statuses
	*
	*/

// Our Works
function our_works_init() {
    $args = array(
      'label' => 'Our Works',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'our-works'),
        'query_var' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array(
            'title',
            'editor',
            'revisions',
            'thumbnail',
            'page-attributes',)
        );
    register_post_type( 'our-works', $args );
}
add_action( 'init', 'our_works_init' );
