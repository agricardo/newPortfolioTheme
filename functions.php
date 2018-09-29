<?php

if ( ! isset( $content_width ) ) {
	$content_width = 640; 
}

if ( ! function_exists( 'artist_setup' ) ) :
function artist_setup() {

	load_theme_textdomain( 'artist', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );


	add_theme_support( 'title-tag' );
	

	add_theme_support( 'jetpack-portfolio' );


	add_theme_support( 'post-thumbnails' );
	add_image_size( 'portfolio-full', 1472, 9999 );
	add_image_size( 'portfolio-thumb', 491, 491, true );


	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'artist' ),
	) );


	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );


	add_theme_support( 'custom-background', apply_filters( 'artist_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; 
add_action( 'after_setup_theme', 'artist_setup' );

function artist_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'artist' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'artist_widgets_init' );
