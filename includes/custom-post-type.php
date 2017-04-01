<?php 

	/************************
	*  register_post_types
	*  This function will register post types and statuses
	*
	************************/

// Our Work
function our_work_init() {
    $args = array(
      'label' => 'Our Work',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'our-work'),
        'query_var' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array(
            'title',
            'editor',
            'revisions',
            'thumbnail',
            'page-attributes',)
        );
    register_post_type( 'our-work', $args );
}
add_action( 'init', 'our_work_init' );


// Our Team
function our_team_init() {
    $args = array(
      'label' => 'Our Team',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'our-team'),
        'query_var' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array(
            'title',
            'editor',
            'revisions',
            'thumbnail',
            'page-attributes',)
        );
    register_post_type( 'our-team', $args );
}
add_action( 'init', 'our_team_init' );
