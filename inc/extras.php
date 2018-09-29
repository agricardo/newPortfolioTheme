<?php
/**
 * @package  
 */

/**
 * @param array  
 * @return array
 */
function artist_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'artist_page_menu_args' );

/**
 * @param array  
 * @return array
 */
function artist_body_classes( $classes ) {
 
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'artist_body_classes' );

/**

 * @global WP_Query 
 * @return void
 */
function artist_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'artist_setup_author' );
