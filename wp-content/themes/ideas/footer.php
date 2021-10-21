<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ideas
 */

?>

<footer id="colophon" class="site-footer">
	<div style="display:flex; justify-content:space-around;">
		<div>
			<?php
			switch_to_blog('1');
			// Do something
			echo do_shortcode('[content_block id=46]');
			restore_current_blog();
			?>
		</div>
		<div>
			<?php if (is_active_sidebar('footer')) { ?>
				<ul id="sidebar">
					<?php dynamic_sidebar('footer'); ?>
				</ul>
			<?php } ?>
		</div>
	</div>
	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'ideas')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', 'ideas'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', 'ideas'), 'ideas', '<a href="http://www.pymesign.com">Diego Moreno</a>');
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>