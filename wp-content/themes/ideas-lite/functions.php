<?php
function ideas_setup()
{
    // Editor color palette.
    $black     = '#000000';
    $celest    = '#2F2FA2';
    $celeste      = '#659DBD';
    $verde     = '#8EE4AF';
    $azul      = '#242582';
    $rojo       = '#F64C72';
    $amarillo    = '#99738E';
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
                'slug'  => 'celest_paleta2',
                'color' => $celest,
            ),
            array(
                'name'  => esc_html__('Celeste', 'ideas'),
                'slug'  => 'celeste_paleta2',
                'color' => $celeste,
            ),
            array(
                'name'  => esc_html__('Verde', 'ideas'),
                'slug'  => 'verde_paleta2',
                'color' => $verde,
            ),
            array(
                'name'  => esc_html__('Azul', 'ideas'),
                'slug'  => 'azul_paleta2',
                'color' => $azul,
            ),
            array(
                'name'  => esc_html__('Rojo', 'ideas'),
                'slug'  => 'rojo_paleta2',
                'color' => $rojo,
            ),
            array(
                'name'  => esc_html__('Amarillo', 'ideas'),
                'slug'  => 'amarillo_paleta2',
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
function ideas_lite_enqueue_styles()
{

    $parent_style = 'parent-style'; // Estos son los estilos del tema padre recogidos por el tema hijo.

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style(
        'child-colors',
        get_stylesheet_directory_uri() . '/assets/css/colores.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'ideas_lite_enqueue_styles');

function ideas_lite_body_classes($classes)
{
    // Adds a class of no-sidebar when there is no sidebar present.

    $classes[] = 'fullwidth-banner-container';

    return $classes;
}
add_filter('body_class', 'ideas_lite_body_classes');
