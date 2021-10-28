<?php

/**
 * The template for frontpage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ideas
 */

get_header();
?>
<main id="primary" class="site-main" role="main">
	<div class="container-fluid p-x-0">
		<div class="panel-pane pane-imagen-destacada">
			<div class="pane-content">

				<section class="jumbotron lg p-x-0" style="background-image: url(<?php echo get_header_image(); ?>);">
					<div class="jumbotron_bar">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<?php ideas_breadcrumb(); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="jumbotron_body lg">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
									<?php if (get_field('titulo', '10')) : ?>
										<h2><?php the_field('titulo', '10'); ?></h2>
									<?php endif; ?>
									<?php if (get_field('descripcion', '10')) : ?>
										<p><?php the_field('descripcion', '10'); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="overlay"></div>
				</section>
			</div>
		</div>
	</div>

	<section>
		<article class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if (get_field('titulo', '10')) : ?>
						<h2><?php the_field('titulo', '10'); ?></h2>
					<?php endif; ?>
					<?php if (get_field('problematica_atendida', '10')) : ?>
						<p><?php the_field('problematica_atendida', '10'); ?></p>
					<?php endif; ?>

					<blockquote>
						<p>Alguna cita del mentor o del equipo haciendo referencia al proyecto o de alguna persona que los inspiro</p>
						<small>Nombre y Apellido</small>
					</blockquote>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<?php
					while (have_posts()) :
						the_post();

						get_template_part('template-parts/content', 'page');

						// If comments are open or we have at least one comment, load up the comment template.
						if (comments_open() || get_comments_number()) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</div>
			</div>
		</article>
	</section>

	<?php get_template_part('template-parts/content', 'cards'); ?>

</main>

<?php
//get_sidebar();
get_footer();
