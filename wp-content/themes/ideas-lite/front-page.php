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

	<div class="container-fluid p-t-2">
		<div class="col-12">
			<?php if (get_option('activate_carousel') == '1') { ?>

				<?php get_template_part('template-parts/content', 'carousel'); ?>

			<?php } else { ?>
				<section class="container-campania custom jumbotron" style="background-image:url(<?php echo get_header_image(); ?>)">
					<div class="jumbotron_body jumbotron_body-lg">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-4 box-camp-principal"> <a href="pagina-etapa2.html" class="panel panel-default panel-border-escarapela etapa2 panel-camp-principal">
										<div class="panel-body">
											<h2 class="h3"><?php echo esc_attr(get_option('project_name')); ?></h2>
											<div class="etapa2 text-muted">
												<p><?php echo esc_attr(get_option('project_description')); ?></p>
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="overlay" style="border-radius: 10px;"></div>
				</section>
			<?php } ?>
			<section>
				<article class="container-fluid">
					<div class="row">
						<div class="col-md-8 col-12">
							<?php if (get_option('project_name')) : ?>
								<h2><?php echo esc_attr(get_option('project_name')); ?></h2>
							<?php endif; ?>
							<?php if (get_option('project_description')) : ?>
								<p><?php echo esc_attr(get_option('project_description')); ?></p>
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
						<div class="row col-md-4 col-12">
							<?php get_template_part('template-parts/content', 'cards'); ?>
						</div>
					</div>
				</article>
			</section>
		</div>
	</div>
</main>

</div> <!-- cierra el div principal col-md-9 -->
</div> <!-- cierra el div row -->
<?php

get_footer();
