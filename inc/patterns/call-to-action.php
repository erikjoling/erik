<?php

/**
 * Call to action
 * 
 * A heading and a button in columns in a cover block
 */

?>

<!-- wp:cover {"url":"<?= esc_url( get_template_directory_uri() ) ?>/assets/images/writing-calculator-paperwork.jpg","dimRatio":90,"overlayColor":"secondary","minHeight":100,"minHeightUnit":"px","contentPosition":"center center","isDark":false,"align":"full","style":{"color":{"duotone":["#000000","#ffffff"]}}} -->
<div class="wp-block-cover alignfull is-light" style="min-height:100px">
	<span aria-hidden="true" class="has-secondary-background-color has-background-dim-90 wp-block-cover__gradient-background has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?= esc_url( get_template_directory_uri() ) ?>/assets/images/writing-calculator-paperwork.jpg" data-object-fit="cover"/>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"layout":{"inherit":true}} -->
		<div class="wp-block-group">

			<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
			<div class="wp-block-columns alignwide are-vertically-aligned-center">
				
				<!-- wp:column {"verticalAlignment":"center","width":"75%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:75%">
				
					<!-- wp:heading -->
					<h2>Call to action!</h2>
					<!-- /wp:heading -->

				</div>
				<!-- /wp:column -->
	
				<!-- wp:column {"verticalAlignment":"center","width":"25%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:25%">
					
					<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
					<div class="wp-block-buttons">
					
						<!-- wp:button {"className":"is-style-outline"} -->
						<div class="wp-block-button is-style-outline"><a class="wp-block-button__link">Ga verder</a></div>
						<!-- /wp:button -->

					</div>
					<!-- /wp:buttons -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->