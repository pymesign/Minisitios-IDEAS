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
		register_nav_menus(
			array(
				'footer-1' => esc_html__('secondary-1', 'ideas'),
			)
		);
		register_nav_menus(
			array(
				'footer-2' => esc_html__('secondary-2', 'ideas'),
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

		/** quitamos los custom colors del editor **/
		add_theme_support('disable-custom-colors');

		// Editor color palette.
		$black     = '#000000';
		$celest    = '#37BBED';
		$celeste      = '#2897d4';
		$verde     = '#2e7d33';
		$azul      = '#0072bb';
		$rojo       = '#c62828';
		$amarillo    = '#f9a822';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__('Black', 'ideas'),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__('Celeste claro', 'ideas'),
					'slug'  => 'celest',
					'color' => $celest,
				),
				array(
					'name'  => esc_html__('Celeste', 'ideas'),
					'slug'  => 'celeste',
					'color' => $celeste,
				),
				array(
					'name'  => esc_html__('Verde', 'ideas'),
					'slug'  => 'verde',
					'color' => $verde,
				),
				array(
					'name'  => esc_html__('Azul', 'ideas'),
					'slug'  => 'azul',
					'color' => $azul,
				),
				array(
					'name'  => esc_html__('Rojo', 'ideas'),
					'slug'  => 'rojo',
					'color' => $rojo,
				),
				array(
					'name'  => esc_html__('Amarillo', 'ideas'),
					'slug'  => 'amarillo',
					'color' => $amarillo,
				),
				array(
					'name'  => esc_html__('White', 'ideas'),
					'slug'  => 'white',
					'color' => $white,
				),
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
	register_sidebar(
		array(
			'name'          => esc_html__('Footer', 'ideas'),
			'id'            => 'footer',
			'description'   => esc_html__('Add footer widgets here.', 'ideas'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer left', 'ideas'),
			'id'            => 'footer-left',
			'description'   => esc_html__('Add footer left widgets here.', 'ideas'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="block-title h3 section-title h3 section-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer right', 'ideas'),
			'id'            => 'footer-right',
			'description'   => esc_html__('Add footer right widgets here.', 'ideas'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="block-title h3 section-title h3 section-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Card 1', 'ideas'),
			'id'            => 'card-1',
			'description'   => esc_html__('Add card 1 widget here.', 'ideas'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="block-title h3 section-title h3 section-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Card 2', 'ideas'),
			'id'            => 'card-2',
			'description'   => esc_html__('Add card 2 widget here.', 'ideas'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="block-title h3 section-title h3 section-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Card 3', 'ideas'),
			'id'            => 'card-3',
			'description'   => esc_html__('Add card 3 widget here.', 'ideas'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="block-title h3 section-title h3 section-title">',
			'after_title'   => '</h3>',
		)
	);
	if (is_main_site()) :
		register_sidebar(
			array(
				'name'          => esc_html__('Modal', 'ideas'),
				'id'            => 'modal',
				'description'   => esc_html__('Add modal widget here.', 'ideas'),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	endif;
}
add_action('widgets_init', 'ideas_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ideas_scripts()
{
	wp_enqueue_style('ideas-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('ideas-style', 'rtl', 'replace');

	//Google fonts from ideas-templates
	wp_enqueue_style(
		'google-fonts',
		'https://fonts.googleapis.com/css2?family=Encode+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap',
		false
	);

	//Bootstrap 3.4.1 from ideas-templates
	wp_enqueue_style(
		'bootstrap',
		'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css',
		array(),
		'3.4.1'
	);

	//Custom css from ideas-templates
	wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.1', 'all');

	//Colores css from ideas-templates
	wp_enqueue_style('colores', get_template_directory_uri() . '/assets/css/colores.css', array(), '1.1', 'all');

	//Font-awesome from ideas-templates
	wp_enqueue_style(
		'font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
		array(),
		'4.7.0'
	);

	//Poncho css from ideas-templates
	wp_enqueue_style('poncho', get_template_directory_uri() . '/assets/css/poncho.min.css', array(), '1.1', 'all');

	//Argentina css from ideas-templates
	wp_enqueue_style('argentina', get_template_directory_uri() . '/assets/css/argentina.css', array(), '1.1', 'all');

	//Icono-arg css from ideas-templates
	wp_enqueue_style('icono-arg', get_template_directory_uri() . '/assets/css/icono-arg.css', array(), '1.1', 'all');


	//Jquery from ideas-templates
	wp_enqueue_script(
		'jquery',
		'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js',
		array(),
		'3.5.1',
		true
	);

	//Bootstrap js from ideas-templates
	wp_enqueue_script(
		'bootstrap',
		'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js',
		array(),
		'3.4.1',
		true
	);

	//Select2 css from ideas-templates
	wp_enqueue_style(
		'select2',
		'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
		array(),
		'4.1.0'
	);

	//Select2 js from ideas-templates
	wp_enqueue_script(
		'select2',
		'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
		array(),
		'4.1.0',
		true
	);

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

/**
 * #MODIF# custom admin options
 */
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';

//OCDI options custom #MODIF#
function ocdi_import_files()
{
	return [
		[
			'import_file_name'           => 'Datos de Proyecto Ejemplo',
			'import_file_url'            => 'https://minisitios-ideas.educacion.espinlabs.com.ar/ocdi/educacion-minisitioideas.WordPress.2021-10-13.xml',
			'import_widget_file_url'     => 'https://minisitios-ideas.educacion.espinlabs.com.ar/ocdi/minisitios-ideas.educacion.espinlabs.com.ar-widgets.wie',
			'import_customizer_file_url' => 'https://minisitios-ideas.educacion.espinlabs.com.ar/ocdi/ideas-export.dat',
			'import_preview_image_url'   => 'https://minisitios-ideas.educacion.espinlabs.com.ar/ocdi/preview_import_image1.png',
			'preview_url'                => 'https://minisitios-ideas.educacion.espinlabs.com.ar/',
		],
	];
}
add_filter('ocdi/import_files', 'ocdi_import_files');

//esta funcion asigna y activa el menu principal
function ocdi_after_import_setup()
{
	// Asigna el menu a su ubicación.
	$main_menu = get_term_by('name', 'primary', 'nav_menu');

	set_theme_mod(
		'nav_menu_locations',
		array(
			'menu-1' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
		)
	);

	// Asigna front page y posts page (blog page).
	$front_page_id = get_page_by_title('Inicio');
	$blog_page_id  = get_page_by_title('Blog');

	update_option('show_on_front', 'page');
	update_option('page_on_front', $front_page_id->ID);
	update_option('page_for_posts', $blog_page_id->ID);
}
add_action('ocdi/after_import', 'ocdi_after_import_setup');

//creamos el widget para cards

function cards_register_widget()
{
	register_widget('cards_widget');
}
add_action('widgets_init', 'cards_register_widget');

class cards_widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			// widget ID
			'cards_widget',
			// widget name
			__('Cards Widget', ' cards_widget_domain'),
			// widget description
			array('description' => __('Cards Widget', 'cards_widget_domain'),)
		);
	}
	public function widget($args, $instance)
	{
		$title = apply_filters('widget_title', $instance['title']);
		$text = apply_filters('widget_text', $instance['text']);
		$link = apply_filters('widget_link', $instance['link']);
		$estilo = apply_filters('widget_estilo', $instance['estilo']);
		$sombra = $instance['sombra'] ? 'shadow-lg' : '';
		//$image_uri = apply_filters('widget_image_uri', $instance['image_uri']);
		echo $args['before_widget'];

		//output
		// Display text field

		if ($text) {

			echo '<a href="' . $link . '" class="panel panel-default panel-border-' . $estilo . ' ' . $sombra . '">';

			echo '<div style="background-image:url(' . esc_url($instance['image_uri']) . ');" class="panel-heading"></div>';

			echo '<div class="panel-body">';

			//if title is present
			if (!empty($title))
				echo $args['before_title'] . $title . $args['after_title'];

			echo '<div class="text-muted"><p>' . $text . '</p></div>';

			echo '</div>';

			echo '</a>';
		}
		echo $args['after_widget'];
	}
	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('Título', 'cards_widget_domain');
		}
		if (isset($instance['text'])) {
			$text = $instance['text'];
		} else {
			$text = __('Descripción', 'cards_widget_domain');
		}
		if (isset($instance['estilo'])) {
			$estilo = $instance['estilo'];
		} else {
			$estilo = __('mandarina', 'cards_widget_domain');
		}
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php _e('Text: ', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text" value="<?php echo esc_attr($text); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
		</p>
		<p>
			<label for="<?= $this->get_field_id('image_uri'); ?>">Image</label>
			<img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block" />
			<input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name('image_uri'); ?>" value="<?= $instance['image_uri']; ?>" style="margin-top:5px;" />
			<input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
		</p>


		<p class="form-row form-row-name">
			<label for="<?php echo $this->get_field_id('estilo'); ?>"><?php _e('Estilo', 'text_domain'); ?></label>
			<select name="<?php echo $this->get_field_name('estilo'); ?>" id="<?php echo $this->get_field_id('estilo'); ?>" class="widefat">

				<?php

				// Your options array

				$options = array(

					''        => __('Estilo', 'cards_widget_domain'),

					'mandarina' => __('Option 1', 'cards_widget_domain'),

					'cereza' => __('Option 2', 'cards_widget_domain'),

					'lavanda' => __('Option 3', 'cards_widget_domain'),

				);

				// Loop through options and add each one to the select dropdown

				foreach ($options as $key => $name) {

					echo '<option value="' . esc_attr($key) . '" id="' . esc_attr($key) . '" ' . selected($estilo, $key, false) . '>' . $name . '</option>';
				} ?>

			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('sombra')); ?>"><?php _e('Sombreado ', 'text_domain'); ?></label>
			<input class="checkbox" type="checkbox" <?php checked($instance['sombra'], 'on'); ?> id="<?php echo $this->get_field_id('sombra'); ?>" name="<?php echo $this->get_field_name('sombra'); ?>" />
		</p>
<?php
	}
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['text'] = (!empty($new_instance['text'])) ? strip_tags($new_instance['text']) : '';
		$instance['link'] = (!empty($new_instance['link'])) ? strip_tags($new_instance['link']) : '';
		$instance['image_uri'] = (!empty($new_instance['image_uri'])) ? strip_tags($new_instance['image_uri']) : '';
		$instance['estilo'] = (!empty($new_instance['estilo'])) ? strip_tags($new_instance['estilo']) : '';
		$instance['sombra'] = $new_instance['sombra'];
		return $instance;
	}
}

// Enqueue additional admin scripts
add_action('admin_enqueue_scripts', 'ctup_wdscript');
function ctup_wdscript()
{
	wp_enqueue_media();
	wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/widget.js', false, '1.0.0', true);
}
