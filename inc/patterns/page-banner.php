<?php 

/* A banner pattern for the page */

?>

<!-- wp:cover {"url":"<?= esc_url( get_template_directory_uri() ) ?>/assets/images/writing-calculator-paperwork.jpg","dimRatio":90,"overlayColor":"secondary","contentPosition":"bottom center","isDark":false,"align":"full","style":{"color":{"duotone":["#000000","#ffffff"]}}} -->
<div class="wp-block-cover alignfull is-light has-custom-content-position is-position-bottom-center">
	<span aria-hidden="true" class="has-secondary-background-color has-background-dim-90 wp-block-cover__gradient-background has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?= esc_url( get_template_directory_uri() ) ?>/assets/images/writing-calculator-paperwork.jpg" data-object-fit="cover"/>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"layout":{"inherit":true}} -->
		<div class="wp-block-group">

			<!-- wp:post-title {"level":1} /-->

			<!-- wp:paragraph -->
			<p>Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek.</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->