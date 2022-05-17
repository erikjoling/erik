<?php /* Pattern: Full Background with Content */ ?>

<!-- wp:cover {"url":"<?= esc_url( get_template_directory_uri() ) ?>/assets/images/placeholder.png","dimRatio":50,"overlayColor":"secondary","isDark":false,"align":"full"} -->
<div class="wp-block-cover alignfull is-light">
	
	<span aria-hidden="true" class="has-secondary-background-color wp-block-cover__gradient-background has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?= esc_url( get_template_directory_uri() ) ?>/assets/images/placeholder.png" data-object-fit="cover"/>
	
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"layout":{"inherit":true}} -->
		<div class="wp-block-group">

			<?= erik_render_pattern( 'background-content' ) ?>

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
