<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ideas
 */

?>

<section id="cards">
	<div class="<?php echo is_front_page() ? 'container' : 'container-fluid' ?>">
		<div class="panel-pane pane-titulo">
			<div class="pane-content">
				<h2 class="activities-sidbar">Accesos</h2>
			</div>
		</div>
		<div class="panel-separator"></div>
		<div class="panel-pane pane-atajos">
			<div class="pane-content">
				<div class="row panels-row m-t-2 ">
					<div class="col-xs-12 col-sm-6 col-md-4">
						<?php if (is_active_sidebar('card-1')) { ?>
							<?php dynamic_sidebar('card-1'); ?>
						<?php } ?>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-4">
						<?php if (is_active_sidebar('card-2')) { ?>
							<?php dynamic_sidebar('card-2'); ?>
						<?php } ?>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-4">
						<?php if (is_active_sidebar('card-3')) { ?>
							<?php dynamic_sidebar('card-3'); ?>
						<?php } ?>
					</div>

				</div>
			</div>
		</div>

	</div>
</section>