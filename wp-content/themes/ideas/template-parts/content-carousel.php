<?php

/**
 * Template part for displaying a carousel
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ideas
 */

$imagen_uno = esc_attr(get_option('carousel_image_1'));
$imagen_dos = esc_attr(get_option('carousel_image_2'));
$imagen_tres = esc_attr(get_option('carousel_image_3'));

?>

<!-- Carousel Fullwidth-->
<div class="container-fluid m-b-2">
	<div class="row">
		<div id="carousel-fullwidth" class="carousel slide" data-ride="carousel">
			<div class="container breadcrumb-container m-t-0">
				<div class="row">
					<div class="col-md-12">
						<?php ideas_breadcrumb(); ?>
					</div>
				</div>
			</div>
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-fullwidth" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-fullwidth" data-slide-to="1"></li>
				<li data-target="#carousel-fullwidth" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img class="carousel-img" src="<?php echo $imagen_uno; ?>" alt="First slide">
					<!-- Static Header -->
					<div class="header-text hidden-xs">
						<div class="col-md-12 text-center">
							<h2>Carousel fullwidth con breadcrumb</h2>
							<p>Una breve descripción o introducción al proyecto</p>
						</div>
					</div><!-- /header-text -->
				</div>
				<div class="item">
					<img class="carousel-img" src="<?php echo $imagen_dos; ?>" alt="Second slide">
					<!-- Static Header -->
					<div class="header-text hidden-xs">
						<div class="col-md-12 text-center">
							<h2>Carousel fullwidth con breadcrumb</h2>
							<p>Una breve descripción o introducción al proyecto</p>
						</div>
					</div><!-- /header-text -->
				</div>
				<div class="item">
					<img class="carousel-img" src="<?php echo $imagen_tres; ?>" alt="Third slide">
					<!-- Static Header -->
					<div class="header-text hidden-xs">
						<div class="col-md-12 text-center">
							<h2>Carousel fullwidth con breadcrumb</h2>
							<p>Una breve descripción o introducción al proyecto</p>
						</div>
					</div><!-- /header-text -->
				</div>
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-fullwidth" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-fullwidth" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div><!-- /carousel -->
	</div>
</div>