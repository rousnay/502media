<?php
/*
Plugin Name: WP Typeahead
Description: Add autocomplete search functionality to default WordPress search form
Author: c.bavota, Michal Bluma
Version: 1.0.0
Author URI: http://www.bavotasan.com/
*/
class Bavotasan_WP_Typeahead {
	public $plugin_url;

	public function __construct() {
		$this->plugin_url = get_template_directory_uri() . '/includes/wp-typeahead/';

		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );

		add_action( 'wp_ajax_nopriv_ajax_search', array( $this, 'ajax_search' ) );
		add_action( 'wp_ajax_ajax_search', array( $this, 'ajax_search' ) );
	}

	/**
	 * Enqueue Typeahead.js and the stylesheet
	 *
	 * @since 1.0.0
	 */
	public function wp_enqueue_scripts() {
		wp_enqueue_script( 'wp_typeahead_js', $this->plugin_url . 'js/typeahead.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'wp_hogan_js' , $this->plugin_url . 'js/hogan.min.js', array( 'wp_typeahead_js' ), '', true );
		wp_enqueue_script( 'typeahead_wp_plugin' , $this->plugin_url . 'js/wp-typeahead.js', array( 'wp_typeahead_js', 'wp_hogan_js' ), '', true );

		$wp_typeahead_vars = array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) );
		wp_localize_script( 'typeahead_wp_plugin', 'wp_typeahead', $wp_typeahead_vars );

		wp_enqueue_style( 'wp_typeahead_css', $this->plugin_url . 'css/typeahead.css' );
	}

	/**
	 * Ajax query for the search
	 *
	 * @since 1.0.0
	 */
	public function ajax_search() {
		if ( isset( $_REQUEST['fn'] ) && 'get_ajax_search' == $_REQUEST['fn'] ) {
			$search_query = new WP_Query( array(
				's' => $_REQUEST['terms'],
				'posts_per_page' => 10,
				'no_found_rows' => true,
			) );

			$results = array( );
			if ( $search_query->get_posts() ) {
				foreach ( $search_query->get_posts() as $the_post ) {
					$title = html_entity_decode( get_the_title($the_post->ID), ENT_QUOTES, 'UTF-8' );
					$content = get_post_field('post_content', $the_post->ID);
					$post_content = wp_trim_words( $content , '38', '...' );
					$image_url = wp_get_attachment_url( get_post_thumbnail_id($the_post->ID) );

					$results[] = array(
						'value' => $title,
						'postContent' => $post_content,
						'img_url' => $image_url,
						'url' => get_permalink( $the_post->ID ),
						'tokens' => explode( ' ', $title ),
					);
				}
			} else {
				$results[] = __( 'Sorry. No results match your search.', 'wp-typeahead' );
			}

			wp_reset_postdata();
			echo json_encode( $results );
		}
		die();
	}
}
$bavotasan_wp_typeahead = new Bavotasan_WP_Typeahead;
