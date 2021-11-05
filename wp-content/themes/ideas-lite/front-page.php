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

<main role="main">
	<div class="container-fluid p-x-0 p-t-2">
		<section class="container-campania jumbotron" style="background-image: url(<?php echo get_header_image(); ?>);">
			<div class="jumbotron_body jumbotron_body-lg">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4 box-camp-principal"> <a href="#" class="panel panel-default panel-border-escarapela etapa2 panel-camp-principal">
								<div class="panel-body">
									<?php if (get_field('titulo', '10')) : ?>
										<h2 class="h3"><?php the_field('titulo', '10'); ?></h2>
									<?php endif; ?>
									<div class="etapa2 text-muted">
										<?php if (get_field('descripcion', '10')) : ?>
											<p><?php the_field('descripcion', '10'); ?></p>
										<?php endif; ?>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="overlay" style="border-radius: 10px;"></div>
		</section>
	</div>

	<section>
		<article class="container">
			<div class="row">
				<div class="col-md-8 col-12">
					<?php if (get_field('titulo', '10')) : ?>
						<h2><?php the_field('titulo', '10'); ?></h2>
					<?php endif; ?>
					<?php if (get_field('problematica_atendida', '10')) : ?>
						<p><?php the_field('problematica_atendida', '10'); ?></p>
					<?php endif; ?>

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
				<div class="row col-md-4 p-l-4 col-12">
					<!--<div class="col-12">
						<a href="#" class="panel panel-default panel-border-mandarina">
							<div style="background-image:url(assets/img/acceso1.jpg);" class="panel-heading"></div>
							<div class="panel-body">
								<h3>Blog</h3>
								<div class="text-muted">
									<p>Enterate de todas las novedades sobre nuestro proyecto.</p>
								</div>
							</div>
						</a>
					</div>

					<div class="col-12">
						<a href="#" class="panel panel-default panel-border-cereza">
							<div style="background-image:url(assets/img/acceso2.jpg);" class="panel-heading"></div>
							<div class="panel-body">
								<h3>Proyecto</h3>
								<div class="text-muted">
									<p>Averigua como se gesto y de que se trata.</p>
								</div>
							</div>
						</a>
					</div>

					<div class="col-12">
						<a href="#" class="panel panel-default panel-border-lavanda">
							<div style="background-image:url(assets/img/acceso3.jpg);" class="panel-heading"></div>
							<div class="panel-body">
								<h3>Institucional</h3>
								<div class="text-muted">
									<p>Los Equipos, La Escuela, Los Mentores y muchos mas...</p>
								</div>
							</div>
						</a>
					</div>-->

					<?php get_template_part('template-parts/content', 'cards'); ?>

				</div>
			</div>
		</article>
	</section>


</main>

<?php
//get_sidebar();
get_footer();
