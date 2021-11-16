<?php

/**
 * Template part for displaying a carousel
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ideas
 */

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
					<img class="carousel-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner1.jpg" alt="First slide">
					<!-- Static Header -->
					<div class="header-text hidden-xs">
						<div class="col-md-12 text-center">
							<h2>Carousel fullwidth con breadcrumb</h2>
							<p>Una breve descripción o introducción al proyecto</p>
						</div>
					</div><!-- /header-text -->
				</div>
				<div class="item">
					<img class="carousel-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner1.jpg" alt="Second slide">
					<!-- Static Header -->
					<div class="header-text hidden-xs">
						<div class="col-md-12 text-center">
							<h2>Carousel fullwidth con breadcrumb</h2>
							<p>Una breve descripción o introducción al proyecto</p>
						</div>
					</div><!-- /header-text -->
				</div>
				<div class="item">
					<img class="carousel-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner1.jpg" alt="Third slide">
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