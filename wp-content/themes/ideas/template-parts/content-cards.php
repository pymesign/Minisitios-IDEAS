<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ideas
 */

?>

<section id="cards">
	<div class="<?php echo is_front_page() ? 'container' : 'container-fluid' ?>">
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
							<div style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/acceso1.jpg);" class="panel-heading"></div>
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
							<div style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/acceso2.jpg);" class="panel-heading"></div>
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
							<div style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/acceso3.jpg);" class="panel-heading"></div>
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