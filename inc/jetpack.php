<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package V2starry-nights
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function v2starry_nights_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'v2starry_nights_jetpack_setup' );
