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

					<h2 class="">Qué hacemos</h2>

					<ul>
						<li>Colaboramos con toda las áreas del gobierno para que sus servicios sean cada vez mas <strong>eficientes</strong>.</li>
						<li>Aplicamos tecnología e innovamos en procesos para que <strong>vos ganes en calidad de vida</strong>.</li>
						<li>Acercamos el Estado a la gente para hacerlo <strong>más transparente</strong>, y abrimos la información para una comunicación mas directa, que tenga un <strong>ida y vuelta con la ciudadanía</strong>.</li>
						<li>Trabajamos hacia adentro con el eje puesto en el <strong>empleado público</strong>, para capacitarlo y jerarquizar su carrera, y de esta manera <strong>acompañar su vocación y ganas de crecer</strong>. </li>
					</ul>

				</div>
			</div>
		</article>
	</section>

	<section id="cards">
		<div class="container">
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

						<div class="col-xs-12 col-sm-6 col-md-4">
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

						<div class="col-xs-12 col-sm-6 col-md-4">
							<a href="#" class="panel panel-default panel-border-lavanda">
								<div style="background-image:url(assets/img/acceso3.jpg);" class="panel-heading"></div>
								<div class="panel-body">
									<h3>Institucional</h3>
									<div class="text-muted">
										<p>Los Equipos, La Escuela, Los Mentores y muchos mas...</p>
									</div>
								</div>
							</a>
						</div>

					</div>
				</div>
			</div>

		</div>
	</section>
</main>
<main id="primary" class="site-main">

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

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
