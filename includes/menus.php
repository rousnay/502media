<?php 

/*
 * Register All Menus
 *
 */
function cw_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header menu' , 'nav menu location', 'cw')
            )
        );
}

add_action( 'init', 'cw_menus' );

/*
 * Menus Settings
 *
 */

//Header menu
function cw_header_menu() {
    if ( has_nav_menu( 'header-menu' ) ) {
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_id'    => 'header-menu-con-id',
            'container_class' => 'header-menu-con-cl',
            'menu_id'         => 'header-menu-id',
            'menu_class'      => 'header-menu-cl',
            'echo'            => true,
            'fallback_cb'     => '',
            'before'          => '',
            'after'           => '',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
    }
}