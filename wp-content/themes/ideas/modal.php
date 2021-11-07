<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ideas
 */

if (!is_active_sidebar('modal')) {
	return;
}
?>

<aside id="modal" class="widget-area">
	<div class="row">
		<div class="col-12 banner-container">

			<?php
			switch_to_blog('1');
			dynamic_sidebar('modal');
			restore_current_blog();
			?>

		</div>
	</div>
</aside><!-- #secondary -->