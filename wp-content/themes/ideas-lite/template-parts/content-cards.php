<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ideas
 */

?>

<div class="col-12">
	<?php if (is_active_sidebar('card-1')) { ?>
		<?php dynamic_sidebar('card-1'); ?>
	<?php } ?>
</div>

<div class="col-12">
	<?php if (is_active_sidebar('card-2')) { ?>
		<?php dynamic_sidebar('card-2'); ?>
	<?php } ?>
</div>

<div class="col-12">
	<?php if (is_active_sidebar('card-3')) { ?>
		<?php dynamic_sidebar('card-3'); ?>
	<?php } ?>
</div>