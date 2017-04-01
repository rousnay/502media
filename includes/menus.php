<?php 

/*
 * Register All Menus
 *
 */
function theme_502media_menus() {
    register_nav_menus(
        array(
            // wp_nav_menu()
            //'primary' => esc_html__( 'Primary', 'theme_502media' ),

            // theme_502media_header_menu()
            'header-menu' => __( 'Header menu' , 'nav menu location', 'theme_502media')
            )
        );
}

add_action( 'init', 'theme_502media_menus' );

/*
 * Menus Settings
 *
 */

//Header menu
function theme_502media_header_menu() {
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