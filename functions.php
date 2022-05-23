<?php
/**
 * Erik functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Rjview
 * @since Erik 1.0
 */


if ( ! function_exists( 'erik_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Erik 1.0
	 *
	 * @return void
	 */
	function erik_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'erik_support' );

if ( ! function_exists( 'erik_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Erik 1.0
	 *
	 * @return void
	 */
	function erik_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'erik-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'erik-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'erik_styles' );

if ( ! function_exists( 'erik_scripts' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Erik 1.0
	 *
	 * @return void
	 */
	function erik_scripts() {
		// Register theme script.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_script(
			'erik-script',
			get_template_directory_uri() . '/assets/js/theme.js',
			array(),
			$version_string,
			true
		);

		// Enqueue theme script.
		wp_enqueue_script( 'erik-script' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'erik_scripts' );


/**
 * Add Custom CSS to Admin Menu
 */
function erik_add_custom_css_to_admin_menu() {

    $link = 'customize.php?autofocus[section]=custom_css';    

    /**
     * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
     */
    add_submenu_page( 
        'themes.php',
        'Custom CSS',
        'Custom CSS',
        'manage_options',
        $link,
        '', 
        null 
    );
}

// Register Custom CSS for admin menu
add_action( 'admin_menu', 'erik_add_custom_css_to_admin_menu', 11 );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
