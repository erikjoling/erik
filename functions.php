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

// add_action( 'init', 'erik_register_block_patterns', 9 );


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

if ( ! function_exists( 'erik_add_styles_and_scripts_to_editor' ) ) :

/**
 * Add scripts and styles (editor)
 */
function erik_add_styles_and_scripts_to_editor() {

	// Register theme script.
	$theme_version = wp_get_theme()->get( 'Version' );

	$version_string = is_string( $theme_version ) ? $theme_version : false;
	wp_register_script(
		'erik-block-editor-script',
		get_template_directory_uri() . '/assets/js/block-editor.js',
		[ 
			'wp-blocks', 
			'wp-i18n', 
			'wp-data', 
			'wp-dom-ready', 
			'wp-edit-post', 
			'wp-hooks'
		],
		$version_string,
		true
	);

	// Enqueue the script.
	wp_enqueue_script( 'erik-block-editor-script' );
}

endif;

// Enqueue scripts and styles to the editor
add_action( 'enqueue_block_editor_assets', 'erik_add_styles_and_scripts_to_editor' );

/**
 * Hack query loop to show posts and fotogalerij in some cases
 * 
 * Note: works when 'offset' is set to '9' in the query block
 */
if ( ! function_exists( 'erik_add_post_types_to_query_block' ) ) :
	
	function erik_add_post_types_to_query_block( $query ) {

		if ( ! is_admin() ) {

			if ( isset($query->query['offset']) && $query->query['offset'] == '9' ) {

				// setup post_types
		        $post_types = ['post'];

		        if ( post_type_exists( 'fotogalerij' ) ) {
		        	$post_types[] = 'fotogalerij';
		        }

				$query->set( 'post_type', $post_types );
				$query->set( 'offset', 0 );
			}
		}
	}

endif;

// add_action( 'pre_get_posts', 'erik_add_post_types_to_query_block' );

// /**
//  * Create the markup for HTML Splide carousel
//  */
// function erik_change_query_updates( $pre_render, $parsed_block, $parent_block ) {

// 	if ( 
// 		// Only gallery blocks
// 		$parsed_block['blockName'] == 'core/query' 

// 		// Only products style
// 		&& isset($parsed_block['attrs']['className']) && strpos($parsed_block['attrs']['className'], 'query-updates') !== false
// 	) {

		
// 	}

// 	return $output;
// }

// // Create the markup for HTML Splide carousel
// add_filter( 'pre_render_block', 'erik_change_query_updates', 10, 3 );


/**
 * Filter query vars before it is rendered on frontend
 */
function erik_query_vars_for_update_list( $query, $block, $page ) {

	// setup post_types
    $post_types = ['post'];

    if ( post_type_exists( 'fotogalerij' ) ) {
    	$post_types[] = 'fotogalerij';
    }

	$query['post_type'] = $post_types;
	$query['offset'] = 0;

	return $query;
}

/**
 * 
 */
function erik_pre_render_update_list( $pre_render, $parsed_block, $parent_block ) {

	if ( 
		// Only query blocks
		$parsed_block['blockName'] == 'core/query' 

		// Only query-update-list
		&& isset($parsed_block['attrs']['className']) && strpos($parsed_block['attrs']['className'], 'query-update-list') !== false
	) {

		add_filter( 'query_loop_block_query_vars', 'erik_query_vars_for_update_list', 10, 3 );

		add_filter( 'render_block_core/post-date', 'erik_render_post_type_after_post_date', 10, 2 );
		
	}

	return $pre_render;
}

add_filter( 'pre_render_block', 'erik_pre_render_update_list', 10, 3 );



/*
 * Remove filter
 */
add_filter( "render_block_core/query", function($block_content, $parsed_block) {

	if ( 
		// Only query blocks
		$parsed_block['blockName'] == 'core/query' 

		// Only query-update-list
		&& isset($parsed_block['attrs']['className']) && strpos($parsed_block['attrs']['className'], 'query-update-list') !== false
	) {

		remove_filter( 'query_loop_block_query_vars', 'erik_query_vars_for_update_list' );

		
	}

	return $block_content;

}, 10, 2 );



add_filter( 'render_block_data', function( $parsed_block, $source_block, $parent_block ) {

	if ( 
		// Only query blocks
		$parsed_block['blockName'] == 'core/query' 

		// Only query-update-list
		&& isset($parsed_block['attrs']['className']) && strpos($parsed_block['attrs']['className'], 'query-update-list') !== false
	) {

		// error_log($block_content);
		// error_log(print_r($parsed_block, true));
	}

	return $parsed_block;

}, 10, 3 );


function erik_render_post_type_after_post_date($block_content, $parsed_block) {

	$post_type = get_post_type();
	$post_type_object = get_post_type_object($post_type);

	// error_log(print_r($post_type_object, true));
	// error_log( ucfirst($post_type_object->labels->singular_name));

	$post_type_block = sprintf(
		'<div class="wp-block-post-type %s">%s</div>',
		"wp-block-post-type--$post_type",
		strtolower($post_type_object->labels->singular_name)
	);

	$block_content = $post_type_block . $block_content;


	return $block_content;

}

