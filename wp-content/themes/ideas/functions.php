<?php

/**
 * ideas functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ideas
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('ideas_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ideas_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ideas, use a find and replace
		 * to change 'ideas' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('ideas', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('primary', 'ideas'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ideas_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'ideas_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ideas_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ideas_content_width', 640);
}
add_action('after_setup_theme', 'ideas_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ideas_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'ideas'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'ideas'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'ideas_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ideas_scripts()
{
	wp_enqueue_style('ideas-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('ideas-style', 'rtl', 'replace');

	wp_enqueue_script('ideas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ideas_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

//OCDI options custom #MODIF#
/*function ocdi_import_files()
{
	return [
		[
			'import_file_name'           => 'Demo Import 1',
			'categories'                 => ['Category 1', 'Category 2'],
			'import_file_url'            => 'http://localhost/wpmultisite/ocdi/demomultisitio.WordPress.2021-10-11.xml',
		],
	];
}
add_filter('ocdi/import_files', 'ocdi_import_files');*/
function ocdi_import_files()
{
	return [
		[
			'import_file_name'           => 'Demo Import 1',
			'categories'                 => ['Category 1', 'Category 2'],
			'import_file_url'            => 'http://localhost/wpmultisite/ocdi/demomultisitio.WordPress.2021-10-13.xml',
			'import_widget_file_url'     => 'http://localhost/wpmultisite/ocdi/localhost-wpmultisite-widgets.wie',
			'import_customizer_file_url' => 'http://localhost/wpmultisite/ocdi/ideas-export.dat',
			/*'import_redux'               => [
				[
					'file_url'    => 'http://localhost/wpmultisite/ocdi/redux_options_',
					'option_name' => 'redux_option_name',
				],
			],*/
			'import_preview_image_url'   => 'http://localhost/wpmultisite/ocdi/preview_import_image1.png',
			'preview_url'                => 'http://localhost/wpmultisite',
		],
		[
			'import_file_name'           => 'Demo Import 2 TECH',
			'categories'                 => ['New category', 'Old category'],
			'import_file_url'            => 'http://localhost/wpmultisite/ocdi/demomultisitiotech.WordPress.2021-10-12.xml',
			//'import_widget_file_url'     => 'http://www.your_domain.com/ocdi/widgets2.json',
			'import_customizer_file_url' => 'http://localhost/wpmultisite/ocdi/ideas-tech-export.dat',
			/*'import_redux'               => [
				[
					'file_url'    => 'http://www.your_domain.com/ocdi/redux.json',
					'option_name' => 'redux_option_name',
				],
				[
					'file_url'    => 'http://www.your_domain.com/ocdi/redux2.json',
					'option_name' => 'redux_option_name_2',
				],
			],*/
			'import_preview_image_url'   => 'http://localhost/wpmultisite/ocdi/preview_import_image1.png',
			'preview_url'                => 'http://localhost/wpmultisite',
		],
	];
}
add_filter('ocdi/import_files', 'ocdi_import_files');

//esta funcion deberia asignar el menu principal

function ocdi_after_import_setup()
{
	// Assign menus to their locations.
	$main_menu = get_term_by('name', 'primary', 'nav_menu');

	set_theme_mod(
		'nav_menu_locations',
		array(
			'menu-1' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
		)
	);

	/*$locations = get_theme_mod('nav_menu_locations');
	$locations['menu-1'] = '4';
	set_theme_mod('nav_menu_locations', $locations);*/

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title('Inicio');
	$blog_page_id  = get_page_by_title('Blog');

	update_option('show_on_front', 'page');
	update_option('page_on_front', $front_page_id->ID);
	update_option('page_for_posts', $blog_page_id->ID);
}
add_action('ocdi/after_import', 'ocdi_after_import_setup');
