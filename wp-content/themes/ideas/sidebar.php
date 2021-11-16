<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ideas
 */

/*if (!is_active_sidebar('sidebar-1')) {
	return;
}*/
?>

<aside id="secondary" class="widget-area">
	<div class="row">
		<div class="col-12 banner-container">
			<?php
			switch_to_blog('1');
			// Llamado a content block
			echo do_shortcode('[content_block id=49]');
			dynamic_sidebar('sidebar-1');
			restore_current_blog();
			?>
			<?php //dynamic_sidebar('sidebar-1');
			?>
		</div>
	</div>
</aside><!-- #secondary -->