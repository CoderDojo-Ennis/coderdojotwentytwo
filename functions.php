<?php
/**
 * CoderDojo Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CoderDojo
 * @subpackage CoderDojo_Twenty_Two
 * @since CoderDojo Twenty-Two 1.0
 */


if ( ! function_exists( 'coderdojotwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since CoderDojo Twenty-Two 1.0
	 *
	 * @return void
	 */
	function coderdojotwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'coderdojotwentytwo_support' );

if ( ! function_exists( 'coderdojotwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since CoderDojo Twenty-Two 1.0
	 *
	 * @return void
	 */
	function coderdojotwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'coderdojotwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'coderdojotwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'coderdojotwentytwo_styles' );

