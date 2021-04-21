<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package  uwd_wp_theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function uwd_wp_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'uwd_wp_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function uwd_wp_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'uwd_wp_theme_pingback_header' );


add_action( 'wp_enqueue_scripts', 'uwd_enqueue_spa_scripts' );
function uwd_enqueue_spa_scripts() {
	if ( is_page_template( 'page-templates/customer_portal.php' ) ) {

		// register the Vue build script.
		wp_register_script( // the app build script generated by Webpack.
			'customer_portal',
			'http://localhost:8080/dist/build.js',
			array(),
			false,
			true
		);

    		// enqueue the Vue app script with localized data.
		wp_enqueue_script( 'customer_portal' );
	}
}