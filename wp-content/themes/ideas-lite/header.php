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

	<?php
	//chequeamos si el sidebar va a izquierda o derecha
	$position = esc_attr(get_option('sidebar_position'));

	?>
	<div id="page" class="row">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'ideas'); ?></a>

		<div class="col-md-3 col-12 banner-main-container fullwidth <?php echo $position; ?>">
			<div class="row m-x-0">
				<?php get_sidebar(); ?>
			</div>
		</div>

		<div class="col-md-9 p-r-xs-0">
			<header>
				<nav class="navbar navbar-top navbar-default navbar-fixed-top bg-celeste-argentina" role="navigation">
					<div class="container w-auto">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Argentina.gob.ar Ministerio de Educación">
								<div class="tu-logo white"><?php the_custom_logo();
															bloginfo('name'); ?></div>
								<div class="tu-slogan white"><?php echo $ideas_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																?></div>
							</a>
						</div>

						<div id="navbar" class="collapse navbar-collapse">

							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class'           => 'nav navbar-nav navbar-right',
									'walker' => new WPDocs_Walker_Nav_Menu()
								)
							);
							/**
							 * Custom walker class.
							 */
							class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu
							{

								/**
								 * Starts the list before the elements are added.
								 *
								 * Adds classes to the unordered list sub-menus.
								 *
								 * @param string $output Passed by reference. Used to append additional content.
								 * @param int    $depth  Depth of menu item. Used for padding.
								 * @param array  $args   An array of arguments. @see wp_nav_menu()
								 */
								function start_lvl(&$output, $depth = 0, $args = array())
								{
									// Depth-dependent classes.
									$indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
									$display_depth = ($depth + 1); // because it counts the first submenu as 0
									$classes = array(
										'dropdown-menu',
										($display_depth % 2  ? 'menu-odd' : 'menu-even'),
										($display_depth >= 2 ? 'sub-sub-menu' : ''),
										'menu-depth-' . $display_depth
									);
									$class_names = implode(' ', $classes);

									// Build HTML for output.
									$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
								}

								/**
								 * Start the element output.
								 *
								 * Adds main/sub-classes to the list items and links.
								 *
								 * @param string $output Passed by reference. Used to append additional content.
								 * @param object $item   Menu item data object.
								 * @param int    $depth  Depth of menu item. Used for padding.
								 * @param array  $args   An array of arguments. @see wp_nav_menu()
								 * @param int    $id     Current item ID.
								 */
								function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
								{
									global $wp_query;
									$indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent

									// Depth-dependent classes.
									$depth_classes = array(
										($depth == 0 ? 'main-menu-item' : 'sub-menu-item'),
										($depth >= 2 ? 'sub-sub-menu-item' : ''),
										($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
										'menu-item-depth-' . $depth
									);
									$depth_class_names = esc_attr(implode(' ', $depth_classes));

									// Passed classes.
									$classes = empty($item->classes) ? array() : (array) $item->classes;
									$class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

									// Build HTML.
									$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

									// Link attributes.
									$attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
									$attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
									$attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
									$attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
									if (in_array('menu-item-has-children', $item->classes)) {
										$attributes .= ' class="dropdown-toggle mainNav ' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link white') . '"';
									} else {
										$attributes .= ' class="' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link white') . '"';
									};
									//$attributes .= ' data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"';

									// Build HTML output and pass through the proper filter.

									if (in_array('menu-item-has-children', $item->classes)) {
										$item_output = sprintf(
											'%1$s<a%2$s><span class="nav-label">%3$s%4$s%5$s</span> <span class="caret"></span></a>%6$s',
											$args->before,
											$attributes,
											$args->link_before,
											apply_filters('the_title', $item->title, $item->ID),
											$args->link_after,
											$args->after
										);
									} else {
										$item_output = sprintf(
											'%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
											$args->before,
											$attributes,
											$args->link_before,
											apply_filters('the_title', $item->title, $item->ID),
											$args->link_after,
											$args->after
										);
									}


									$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
								}
							}
							?>
						</div>

					</div>
				</nav><!-- #site-navigation -->


			</header><!-- #masthead -->