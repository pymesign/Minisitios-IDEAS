<?php
/**
 * The Styleguide class
 *
 * @package styleguide
 */

/**
 * The Styleguide class
 *
 * Does all the heavy lifting
 */
class StyleGuide {

	/**
	 * Store the generated colors
	 *
	 * @var array Stores colors
	 */
	private $colors = array();

	/**
	 * Store the processed fonts
	 *
	 * @var array List of fonts
	 */
	private $fonts = array();

	/**
	 * The current version for the theme.
	 *
	 * @var float the curren file version number.
	 */
	private $version = '1.4';


	/**
	 * Initialize everything
	 */
	public function __construct() {

		// Prevent duplication.
		global $styleguide;

		if ( isset( $styleguide ) ) {
			return $styleguide;
		}

		load_plugin_textdomain( 'styleguide', false, basename( dirname( __FILE__ ) ) . '/languages/' );

		add_action( 'after_setup_theme', array( &$this, 'check_compat' ), 99 );
		add_action( 'wp_head', array( &$this, 'process_styles' ), 99 );
		add_action( 'customize_register', array( &$this, 'setup_customizer' ) );
		add_action( 'customize_register', array( &$this, 'customize_register' ), 99 );
		add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_fonts' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'dequeue_fonts' ), 99 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_enqueue_scripts' ) );
		add_action( 'admin_init', array( &$this, 'register_settings' ) );

		add_filter( 'styleguide_get_fonts', array( &$this, 'filter_font_character_sets' ) );

	}


	/**
	 * Include theme compatability file if it exists
	 */
	public function check_compat() {

		$current_theme = wp_get_theme();

		$theme_name = $current_theme->get( 'Name' );
		$theme_name = strtolower( $theme_name );
		$theme_name = str_replace( ' ', '-', $theme_name );

		$file = plugin_dir_path( __FILE__ ) . '../theme-styles/' . $theme_name . '.php';

		// If there's no template file for the current theme then load the default.
		if ( ! file_exists( $file ) ) {
			$file = plugin_dir_path( __FILE__ ) . '../theme-styles/_default.php';
		}

		include $file;

	}


	/**
	 * Enqueue the Google fonts
	 *
	 * @return type
	 */
	public function enqueue_fonts() {

		$settings = $this->get_settings();

		// Make sure there's fonts to change.
		if ( empty( $settings['fonts'] ) ) {
			return;
		}

		if ( $settings['fonts'] ) {

			$fonts = $this->process_fonts();

			// Enqueue the fonts.
			if ( $fonts ) {
				$query_args = array(
					'family' => implode( '|', $fonts ),
					'subset' => $this->character_set(),
				);

				$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

				wp_enqueue_style(
					'styleguide-fonts',
					$fonts_url,
					array(),
					'0.0.1'
				);
			}
		}
	}


	/**
	 * If theres any preloaded fonts to dequeue then lets get rid of them
	 */
	public function dequeue_fonts() {

		$settings = $this->get_settings( 'dequeue' );

		if ( $settings ) {
			foreach ( $settings as $style ) {
				wp_dequeue_style( $style );
			}
		}

	}


	/**
	 * Output the css styles for the current theme
	 */
	public function process_styles() {

		$settings = $this->get_settings();

		if ( ! empty( $settings['colors'] ) ) {

			include_once 'class.csscolor.php';

			// If a background color is set.
			if ( current_theme_supports( 'custom-background' ) ) {
				$this->process_colors( 'theme-background', get_background_color() );
			}

			// Other custom colors.
			foreach ( $settings['colors'] as $color_key => $color ) {
				$this->process_colors( $color_key, get_theme_mod( 'styleguide_color_' . $color_key, $color['default'] ) );
			}

			// If there's any color combos then do them too.
			if ( ! empty( $settings['color-combos'] ) ) {
				foreach ( $settings['color-combos'] as $combo_key => $combo ) {
					$this->process_colors( $combo_key, $this->colors[ $combo['background'] . '-bg-0' ], $this->colors[ $combo['foreground'] . '-bg-0' ] );
				}
			}
		}

		if ( ! empty( $settings['css'] ) ) {
			$this->output_css( $settings['css'] );
		}

	}


	/**
	 * Change transport type for default customizer types
	 * means users can make use of colors for more things
	 *
	 * @param object $wp_customize WP_Customize object.
	 */
	public function customize_register( $wp_customize ) {

		// Change section title.
		$wp_customize->get_section( 'colors' )->title = __( 'Colors & Fonts', 'styleguide' );

		$settings = $this->get_settings( 'colors' );

		// Make sure there's colors to change.
		if ( empty( $settings ) ) {
			return;
		}

		// Make custom background refresh the page rather than refresh with javascript.
		if ( '_custom_background_cb' === get_theme_support( 'custom-background', 'wp-head-callback' ) ) {
			$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
		}

		// Make custom header refresh the page rather than refresh with javascript.
		if ( '_custom_background_cb' === get_theme_support( 'custom-header', 'wp-head-callback' ) ) {
			// $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
		}

	}


	/**
	 * Print css to the head
	 *
	 * @param string $css CSS to output.
	 */
	public function output_css( $css ) {

		$css = trim( $css );
		$start_css = $css;

		$css = $this->replace_colors( $css );
		$css = $this->replace_fonts( $css );

		// If the css has changed then output css.
		if ( $start_css !== $css ) {
			echo '<!-- Styleguide styles -->' . "\r\n";
			echo '<style>' . stripslashes( $css ) . '</style>';
		}

	}


	/**
	 * Insert colors into css
	 *
	 * @param string $css CSS template to do color insertion in.
	 * @return string
	 */
	public function replace_colors( $css ) {

		foreach ( $this->colors as $key => $color ) {
			$css = str_replace( '{{color-' . $key . '}}', styleguide_sanitize_hex_color( $color ), $css );
		}

		return $css;

	}


	/**
	 * Insert fonts into css
	 *
	 * @param string $css CSS to insert the fonts into.
	 * @return string
	 */
	public function replace_fonts( $css ) {

		foreach ( $this->fonts as $key => $font ) {

			if ( empty( $font['weight'] ) || 'default' === $font['weight'] ) {
				$font['weight'] = 'inherit';
			}

			$css = str_replace( '{{font-' . $key . '}}', $font['family'], $css );
			$css = str_replace( '{{font-' . $key . '-weight}}', $font['weight'], $css );

		}

		return $css;

	}


	/**
	 * Process the colors and save them for later use
	 *
	 * @param string $styleguide Style id.
	 * @param color  $color1 Main color to contrast with.
	 * @param color  $color2 Optional background color to do the comparison with.
	 */
	public function process_colors( $styleguide, $color1, $color2 = null ) {

		if ( null !== $color2 ) {
			$colors = new CSS_Color( styleguide_sanitize_hex_color( $color1 ), styleguide_sanitize_hex_color( $color2 ) );
		} else {
			$colors = new CSS_Color( styleguide_sanitize_hex_color( $color1 ) );
		}

		$this->add_colors( $styleguide . '-fg', $colors->fg );
		$this->add_colors( $styleguide . '-bg', $colors->bg );

	}


	/**
	 * Work out which fonts to use
	 *
	 * @return string
	 */
	public function process_fonts() {

		$fonts = array();
		$available_fonts = styleguide_fonts();
		$settings = $this->get_settings();

		if ( empty( $settings['fonts'] ) ) {
			return $fonts;
		}

		// Load chosen fonts.
		foreach ( $settings['fonts'] as $font_key => $font ) {

			// Make sure it's a google font and not a system font
			// by default all fonts are google fonts.
			if ( ! isset( $font['google'] ) || true === $font['google'] ) {

				$key = 'styleguide_font_' . $font_key;
				$_font = get_theme_mod( $key, $font['default'] );
				$_font_weight = get_theme_mod( $key . '_weight', 'default' );

				// Store font for use later.
				if ( isset( $available_fonts[ $font['default'] ] ) ) {
					$this->fonts[ $font_key ]['family'] = $available_fonts[ $font['default'] ]['family'];
				}

				if ( ! empty( $available_fonts[ $_font ] ) ) {

					// Add weights if required.
					$weight = ':400,700';
					if ( isset( $available_fonts[ $_font ]['weight'] ) ) {
						$weight = ':' . $available_fonts[ $_font ]['weight'];
						// Ensure weights aren't loaded if they don't exist.
						if ( ':' === $weight ) {
							$weight = '';
						}
					}

					// Add fallback fonts in case Google Fonts don't load.
					$available_fonts[ $_font ]['family'] = str_replace( ', serif', ', Georgia, serif', $available_fonts[ $_font ]['family'] );
					$available_fonts[ $_font ]['family'] = str_replace( ', san-serif', ', Arial, sans-serif', $available_fonts[ $_font ]['family'] );

					// Add weight to font.
					$fonts[ $_font ] = $_font . $weight;

					// Set CSS output.
					$this->fonts[ $font_key ]['family'] = $available_fonts[ $_font ]['family'];
					$this->fonts[ $font_key ]['weight'] = $_font_weight;
				}
			}
		}

		return $fonts;

	}


	/**
	 * Add colors to the global array so that they can be easily accessed
	 *
	 * @param string $color_key The color key to process.
	 * @param array  $colors The colours for the specified color key.
	 */
	public function add_colors( $color_key, $colors ) {

		foreach ( $colors as $key => $color ) {

			if ( '0' == $key ) {
				$key = '-0';
			}

			$this->colors[ ( $color_key . $key ) ] = '#' . $color;

		}

	}


	/**
	 * Setup the customizer control panel
	 *
	 * @param object $wp_customize The $wp_customize object.
	 */
	public function setup_customizer( $wp_customize ) {

		$settings = $this->get_settings();

		if ( $settings ) {

			// Include custom controls.
			include_once 'class.custom-controls.php';

			$priority = 0;

			// Add font controls.
			if ( ! empty( $settings['fonts'] ) ) {

				// Loop through fonts and output settings and controls.
				foreach ( $settings['fonts'] as $font_key => $font ) {

					$key = 'styleguide_font_' . $font_key;

					// Font face.
					$wp_customize->add_setting(
						$key,
						array(
							'default' => $font['default'],
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'styleguide_sanitize_fonts',
						)
					);

					$wp_customize->add_control(
						new Styleguide_Dropdown_Fonts(
							$wp_customize,
							$key,
							array(
								'label' => $font['label'],
								'section' => 'colors',
								'settings' => $key,
								'choices' => $this->get_fonts(),
								'priority' => $priority,
							)
						)
					);

					// Font weight.
					$key = 'styleguide_font_' . $font_key . '_weight';

					$wp_customize->add_setting(
						$key,
						array(
							'default' => '',
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'styleguide_sanitize_select',
						)
					);

					$wp_customize->add_control(
						new Styleguide_Dropdown(
							$wp_customize,
							$key,
							array(
								'label' => $font['label'],
								'section' => 'colors',
								'settings' => $key,
								'choices' => array(
									'default' => __( 'default font weight', 'styleguide' ),
									'normal' => __( 'normal font weight', 'styleguide' ),
									'bold' => __( 'bold font weight', 'styleguide' ),
								),
								'priority' => $priority,
							)
						)
					);

					$priority ++;

				}
			}

			// Add color controls.
			if ( ! empty( $settings['colors'] ) ) {

				// Does the color control already exist (through background and header color customization?
				// if not then create the control - else reuse the existing one.
				// Loop through colors and output controls.
				foreach ( $settings['colors'] as $color_key => $color ) {

					$key = 'styleguide_color_' . $color_key;

					$wp_customize->add_setting(
						$key,
						array(
							'default' => $color['default'],
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'styleguide_sanitize_hex_color',
						)
					);

					$wp_customize->add_control(
						new WP_Customize_Color_Control(
							$wp_customize,
							$key,
							array(
								'label' => $color['label'],
								'section' => 'colors',
								'settings' => $key,
								'priority' => $priority,
							)
						)
					);

					$priority ++;

				}
			}
		}
	}


	/**
	 * Return the available fonts
	 *
	 * @return type
	 */
	public function get_fonts() {

		$_fonts = styleguide_fonts();

		$fonts = array(
			'' => array(
				'name' => __( 'Default', 'styleguide' ),
				'family' => '',
			),
		);

		foreach ( $_fonts as $key => $font ) {
			$fonts[ $key ] = $font;
		}

		return $fonts;

	}


	/**
	 * Get the settings for the theme with optional key
	 *
	 * @param string $key Settings key to return.
	 */
	public function get_settings( $key = null ) {

		$settings = get_theme_support( 'styleguide' );

		if ( isset( $settings[0] ) ) {
			$settings = $settings[0];
		}

		// Check request for key.
		if ( null !== $key ) {
			if ( isset( $settings[ $key ] ) ) {
				return $settings[ $key ];
			} else {
				return false;
			}
		}

		return $settings;

	}


	/**
	 * Enqueue default scripts and styles required for the customizer
	 * Other styles may be included in controls as and when needed
	 */
	public function customize_controls_enqueue_scripts() {

		wp_enqueue_style(
			'styleguide-customizer-styles',
			plugins_url( '../styles/customizer.css', __FILE__ ),
			array(),
			'0.0.1'
		);
		wp_enqueue_script( 'styleguide-font-preview', plugins_url( '../js/customizer.js', __FILE__ ), array( 'jquery' ), $this->version, true );

	}


	/**
	 * Register Styleguide settings
	 */
	public function register_settings() {

		add_settings_section(
			'styleguide_settings_section',
			esc_html__( 'Styleguide Options', 'styleguide' ),
			'__return_false',
			'general'
		);

		add_settings_field(
			'styleguide_character_set',
			esc_html__( 'Character Set', 'styleguide' ),
			array( &$this, 'character_set_dropdown' ),
			'general',
			'styleguide_settings_section',
			array(
				'styleguide_character_set',
			)
		);

		register_setting(
			'general',
			'styleguide_character_set',
			'styleguide_sanitize_character_set'
		);

	}


	/**
	 * Dropdown control for selecting character sets in the WP admin.
	 *
	 * @return void
	 */
	public function character_set_dropdown() {

		$sets = styleguide_get_character_sets();
?>
	<select id="styleguide_character_set" name="styleguide_character_set">
<?php
		foreach ( $sets as $k => $set ) {
?>
		<option
			value="<?php echo esc_attr( $k ); ?>"
			<?php selected( $k, get_option( 'styleguide_character_set' ) ); ?>
		><?php echo esc_html( $set['name'] ); ?></option>
<?php
		}
?>
	</select>
<?php

	}


	/**
	 * Get the character set for the current website
	 * Defaults to latin,latin-ext
	 *
	 * @return type
	 */
	public function character_set() {

		$set = 'latin';
		$sets = styleguide_get_character_sets();
		$saved_set = styleguide_sanitize_character_set( get_option( 'styleguide_character_set', '' ) );

		if ( ! empty( $saved_set ) ) {
			$set = $saved_set;
		}

		return $sets[ $set ]['sets'];

	}


	/**
	 * List of fonts to process.
	 *
	 * @param array $fonts List of fonts.
	 * @return array
	 */
	public function filter_font_character_sets( $fonts ) {

		$processed = array();

		$set = 'latin';
		$saved_set = styleguide_sanitize_character_set( get_option( 'styleguide_character_set', '' ) );

		if ( ! empty( $saved_set ) ) {
			$set = $saved_set;
		}

		foreach ( $fonts as $k => $font ) {
			if ( is_array( $font['sets'] ) && in_array( $set, $font['sets'], true ) ) {
				$processed[ $k ] = $font;
			}
		}

		return $processed;

	}


	/**
	 * Reset all the properties
	 * Mostly used for testing things
	 */
	public function reset() {

		delete_option( 'styleguide_character_set' );

	}
}

$styleguide = new StyleGuide();
