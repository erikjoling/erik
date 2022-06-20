<?php
/**
 * Title: Person
 * Slug: erik/Person
 * Categories: featured
 */
?>
<!-- wp:columns {"align":"wide","backgroundColor":"light-grey"} -->
<div class="wp-block-columns alignwide has-light-grey-background-color has-background">

	<!-- wp:column {"width":"25%"} -->
	<div class="wp-block-column" style="flex-basis:25%">

		<!-- wp:image {"sizeSlug":"medium","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-medium is-style-rounded">
			<img src="<?= esc_url( get_template_directory_uri() ) ?>/assets/images/placeholder.png" alt="<?= esc_attr__( 'Placeholder image.', 'erik' ) ?>"/>
		</figure>
		<!-- /wp:image -->

	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"75%"} -->
	<div class="wp-block-column" style="flex-basis:75%">
	
		<!-- wp:heading {"level":3} -->
		<h3>Naam</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek.</p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:column -->

</div>
<!-- /wp:columns -->
