<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ideas
 */

get_header();
?>

<main id="primary" class="site-main">

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

	<article class="container-fluid">
		<div class="row">
			<div class="col-md-9 col-12">
				<?php if (have_posts()) : ?>

					<header class="page-header">
						<?php
						the_archive_title('<h1 class="page-title">', '</h1>');
						the_archive_description('<div class="archive-description">', '</div>');
						?>
					</header><!-- .page-header -->

				<?php
					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
						get_template_part('template-parts/content', get_post_type());

					endwhile;

					the_posts_navigation();

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>
			</div>
			<div class="col-md-3 col-12 banner-main-container">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</article>

</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
