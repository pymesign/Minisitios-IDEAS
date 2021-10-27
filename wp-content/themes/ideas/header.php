<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ideas
 */

$ideas_description = get_bloginfo('description', 'display');

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="https://argob.github.io/poncho/plantillas/headers-y-footers/img/favicon.ico">

	<?php wp_head(); ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-F42QN68HD6"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-F42QN68HD6');
	</script>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'ideas'); ?></a>

		<header id="masthead">
			<nav class="navbar navbar-top navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Argentina.gob.ar Ministerio de Educación">
							<div class="tu-logo"><?php the_custom_logo();
													bloginfo('name'); ?></div>
							<div class="tu-slogan"><?php echo $ideas_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
													?></div>
						</a>
					</div>

					<div id="navbar" class="collapse navbar-collapse">
						<!--<ul class="nav navbar-nav navbar-right">
							<li class="active"><a class="mainNav" href="#">Inicio</a></li>
							<li><a class="mainNav" href="#">Blog</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle mainNav" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Proyecto</span> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Linea de Tiempo</a></li>
									<li><a href="#">Fuentes</a></li>
									<li><a href="#">Mentoria</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle mainNav" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Institucional</span> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Acerca de...</a></li>
									<li><a href="#">Los Equipos</a></li>
									<li><a href="#">Licencia Creativa</a></li>
								</ul>
							</li>
							<li><a class="mainNav" href="#">Contacto</a></li>
						</ul>-->
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class'           => 'nav navbar-nav navbar-right',
							)
						);
						?>
					</div>

				</div>
			</nav><!-- #site-navigation -->


		</header><!-- #masthead -->