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

if ( ! function_exists( 'erik_register_block_patterns' ) ) :

	/**
	 * Registers block patterns and categories.
	 * 
	 * @since Erik 1.0
	 *
	 * @return void
	 */
	function erik_register_block_patterns() {

		remove_theme_support('core-block-patterns');

		$block_pattern_categories = array(
			'erik' => array( 'label' => __( 'Erik', 'erik' ) ),
		);

		/**
		 * Filters the theme block pattern categories.
		 *
		 * @param array[] $block_pattern_categories {
		 *     An associative array of block pattern categories, keyed by category name.
		 *
		 *     @type array[] $properties {
		 *         An array of block category properties.
		 *
		 *         @type string $label A human-readable label for the pattern category.
		 *     }
		 * }
		 */
		$block_pattern_categories = apply_filters( 'erik_block_pattern_categories', $block_pattern_categories );

		// foreach ( $block_pattern_categories as $name => $properties ) {
		// 	if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
		// 		register_block_pattern_category( $name, $properties );
		// 	}
		// }
	}

endif;

add_action( 'init', 'erik_register_block_patterns', 9 );


if ( ! function_exists( 'erik_add_custom_css_to_admin_menu' ) ) :

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

endif;

// Register Custom CSS for admin menu
add_action( 'admin_menu', 'erik_add_custom_css_to_admin_menu', 11 );

