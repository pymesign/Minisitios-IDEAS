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

<footer id="colophon" class="main-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="region region-footer1">
					<section id="block-menu-menu-footer-1" class="block block-menu clearfix">
						<h2 class="block-title h3 section-title h3 section-title">INET</h2>
						<p>Todos los derechos reservados<br>Saavedra 789 - C1129ACE<br>Ciudad de Buenos Aires<br>Argentina</p>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-ideas.svg" width="150px">
					</section>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="region region-footer2">
					<section id="block-menu-menu-footer-2" class="block block-menu clearfix">
						<h2 class="block-title h3 section-title h3 section-title">Mapa de sitio</h2>
						<div class="row">
							<div class="col-md-6 col-12">
								<!--<ul class="menu nav">
									<li class="first leaf"><a href="#">Blog</a></li>
									<li class="leaf"><a href="#">Linea de Tiempo</a></li>
									<li class="last leaf"><a href="#">Fuentes</a></li>
									<li class="last leaf"><a href="#">Mentoria</a></li>
								</ul>-->
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer-1',
										'menu_id'        => 'secondary-1'
									)
								);
								?>
							</div>
							<div class="col-md-6 col-12">
								<!--<ul class="menu nav">
									<li class="first leaf"><a href="#">Acerca de...</a></li>
									<li class="leaf"><a href="#">Los Equipos</a></li>
									<li class="last leaf"><a href="#">Licencia Creativa</a></li>
									<li class="last leaf"><a href="#">Contact</a></li>
								</ul>-->
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer-2',
										'menu_id'        => 'secondary-2'
									)
								);
								?>
							</div>

						</div>

					</section>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="region region-footer3">
					<section id="block-menu-menu-footer-3" class="block block-menu clearfix">
						<!--<h2 class="block-title h3 section-title h3 section-title">Nombre de Escuela</h2>
						<p>Datos de contacto<br>Telefono: 54-11 4444-4444<br>MaiL: <a href="#">info@escuela.com.ar</a><br>Dirección de la escuela</p>-->
						<?php echo do_shortcode('[content_block slug=datos-de-escuela]'); ?>
					</section>

					<!-- espacio para un widget custom -->
					<?php if (is_active_sidebar('footer')) { ?>
						<?php dynamic_sidebar('footer'); ?>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row sub-footer">
			<div class="container">
				<div class="col-sm-4 m-y-1 p-x-0">
					<?php
					switch_to_blog('1');
					// Do something
					echo do_shortcode('[content_block slug=footer-general]');
					restore_current_blog();
					?>
				</div>
				<div class="col-sm-4 m-y-0 p-x-0 text-center">
					<img class="image-responsive" width="288" height="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_mined.svg" alt="Argentina Unida">
				</div>
				<div class="col-sm-4 m-y-1 p-x-0 text-right">
					<img class="image-responsive" width="288" height="40" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_argentina_unida-blanco.svg" alt="Argentina Unida">
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>