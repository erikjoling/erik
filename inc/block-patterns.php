<?php
/**
 * Rjview: Block Patterns
 *
 * @since Erik 1.0
 */

/**
 * Renders a pattern from a file
 * 
 * @since Erik 1.0
 * 
 * @param string $name The name of the pattern
 * 
 * @return string
 */
function erik_render_pattern( $name ) {
	$pattern_file = get_theme_file_path( '/inc/patterns/' . $name . '.php' );

	ob_start();

	require $pattern_file;

	return ob_get_clean();
}

/**
 * Registers block patterns and categories.
 * 
 * @since Erik 1.0
 *
 * @return void
 */
function erik_register_block_patterns() {
	$block_pattern_categories = array(
		'erik' => array( 'label' => __( 'Rjview', 'erik' ) ),
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

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'page-banner' => array(
			'title'      => __( 'Banner for the page', 'erik' ),
			'categories' => array( 'erik' ),
		),
		'call-to-action' => array(
			'title'      => __( 'Call to Action', 'erik' ),
			'categories' => array( 'erik' ),
		),
		'featured-content' => array(
			'title'      => __( 'Featured Content', 'erik' ),
			'categories' => array( 'erik' ),
		),
		'team-member' => array(
			'title'      => __( 'Team Member', 'erik' ),
			'categories' => array( 'erik' ),
		),
		'two-columns-with-background' => array(
			'title'      => __( 'Two Columns with background', 'erik' ),
			'categories' => array( 'erik' ),
		),
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @param array[] $block_patterns {
	 *     An associative array of block patterns, keyed by pattern name.
	 *
	 *     @type array[] $properties {
	 *         An array of block pattern properties.
	 *
	 *         @type string $title A human-readable title for the pattern.
	 *         @type array[] $categories An array of pattern categories.
	 *     }
	 * }
	 */
	$block_patterns = apply_filters( 'erik_block_patterns', $block_patterns );

	foreach ( $block_patterns as $name => $properties ) {
		
		// Get the content from the file
		$properties['content'] = erik_render_pattern( $name );

		register_block_pattern(
			'erik/' . $name,
			$properties
		);
	}
}
add_action( 'init', 'erik_register_block_patterns', 9 );
