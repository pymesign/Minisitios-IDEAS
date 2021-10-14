<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ideas
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<!-- en principio los campos específicos del proyecto salen en el sidebar -->
	<?php if (get_field('titulo', '10')) : ?>
		<h2><?php the_field('titulo', '10'); ?></h2>
	<?php endif; ?>
	<?php if (get_field('descripcion', '10')) : ?>
		<h3><?php the_field('descripcion', '10'); ?></h3>
	<?php endif; ?>
	<?php if (get_field('problematica_atendida', '10')) : ?>
		<p><?php the_field('problematica_atendida', '10'); ?></p>
	<?php endif; ?>
	<?php if (get_field('solucion_tecnologica_aportada', '10')) : ?>
		<p><?php the_field('solucion_tecnologica_aportada', '10'); ?></p>
	<?php endif; ?>
	<?php if (get_field('impacto', '10')) : ?>
		<p><?php the_field('impacto', '10'); ?></p>
	<?php endif; ?>
	<?php if (get_field('imagen_representativa', '10')) : ?>
		<p><img src="<?php the_field('imagen_representativa', '10'); ?>" alt="Imagen representativa" /></p>
	<?php endif; ?>

	<?php dynamic_sidebar('sidebar-1'); ?>
</aside><!-- #secondary -->