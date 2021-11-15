<?php

/**
 * admin page

@package ideas

 **/

function ideas_add_admin_page()
{
    add_menu_page('Ideas theme options', 'Ideas', 'manage_options', 'customize_ideas', 'ideas_theme_create_page', get_template_directory_uri() . '/assets/img/logo-ideas.png', 110);

    //Activate custom settings
    add_action('admin_init', 'ideas_custom_settings');
}

add_action('admin_menu', 'ideas_add_admin_page');

function ideas_custom_settings()
{
    register_setting('ideas-settings-group', 'project_name');
    register_setting('ideas-settings-group', 'project_description');
    register_setting('ideas-settings-group', 'project_problematica');
    register_setting('ideas-settings-group', 'project_solucion');
    register_setting('ideas-settings-group', 'project_impacto');
    register_setting('ideas-settings-group', 'twitter_handler' . 'ideas_sanitize_twitter_handler');
    register_setting('ideas-settings-group', 'profile_picture');
    register_setting('ideas-settings-group', 'sidebar_position');
    register_setting('ideas-settings-group', 'paleta_colores');

    add_settings_section('ideas-sidebar-options', 'Project Details', 'ideas_sidebar_options', 'customize_ideas');
    add_settings_section('ideas-sidebar-options-template', 'Layout Options', 'ideas_sidebar_options_template', 'customize_ideas');

    add_settings_field('project-name', 'Project name', 'ideas_project_name', 'customize_ideas', 'ideas-sidebar-options');
    add_settings_field('project-problematica', 'Problemática atendida', 'ideas_project_problematica', 'customize_ideas', 'ideas-sidebar-options');
    add_settings_field('project-solucion', 'Solución tecnológica aportada', 'ideas_project_solucion', 'customize_ideas', 'ideas-sidebar-options');
    add_settings_field('project-impacto', 'Impacto', 'ideas_project_impacto', 'customize_ideas', 'ideas-sidebar-options');
    //add_settings_field('sidebar-twitter', 'Twitther handler', 'ideas_sidebar_twitter', 'customize_ideas', 'ideas-sidebar-options');
    add_settings_field('sidebar-profile-picture', 'Imagen representativa', 'ideas_sidebar_profile', 'customize_ideas', 'ideas-sidebar-options');
    add_settings_field('sidebar-position', 'Sidebar position', 'ideas_sidebar_position', 'customize_ideas', 'ideas-sidebar-options-template');
    add_settings_field('paleta-colores', 'Paleta de colores', 'ideas_paleta_colores', 'customize_ideas', 'ideas-sidebar-options-template');
}
function ideas_sidebar_options()
{
    echo 'Ingresa la información de tu Proyecto';
}
function ideas_project_name()
{
    $projectName = esc_attr(get_option('project_name'));
    $projectDescription = esc_attr(get_option('project_description'));
    echo '<p><input type="text" name="project_name" value="' . $projectName . '" placeholder="Project Name" /></p>
    <p><label>Breve descripción:</label></p><p><textarea name="project_description" rows="3" cols="50" placeholder="Project Description" />' . $projectDescription . '</textarea></p>';
}
function ideas_project_problematica()
{
    $projectProblematica = esc_attr(get_option('project_problematica'));
    echo '<p><textarea name="project_problematica" rows="3" cols="50" placeholder="Problemática atendida" />' . $projectProblematica . '</textarea></p>';
}
function ideas_project_solucion()
{
    $projectSolucion = esc_attr(get_option('project_solucion'));
    echo '<p><textarea name="project_solucion" rows="3" cols="50" placeholder="Solución tecnológica aportada" />' . $projectSolucion . '</textarea></p>';
}
function ideas_project_impacto()
{
    $projectImpacto = esc_attr(get_option('project_impacto'));
    echo '<p><textarea name="project_impacto" rows="3" cols="50" placeholder="Impacto" />' . $projectImpacto . '</textarea></p>';
}
function ideas_sidebar_profile()
{
    $picture = esc_attr(get_option('profile_picture'));
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button">
    <input type="hidden" id="profile-picture" name="profile_picture" value="' . $picture . '" />';
}
function ideas_sidebar_position()
{
    $options = get_option('sidebar_position');
    $checkedLeft = ($options == 'left' ? 'checked' : '');
    $checkedRight = ($options == 'right' ? 'checked' : '');
    $output = '';
    //set default
    if (!$options) :
        $checkedLeft = 'checked';
    endif;
    $output .= '<p><label for="sidebar_position_1"><input type="radio" name="sidebar_position" id="sidebar_position_1" value="left" ' . $checkedLeft . ' /> Left </label></p>';
    $output .= '<p><label for="sidebar_position_0"><input type="radio" name="sidebar_position" id="sidebar_position_0" value="right" ' . $checkedRight . ' /> Right </label></p>';
    echo $output;
}

function ideas_paleta_colores()
{
    $options = get_option('paleta_colores');
    $checkedUno = ($options == 'uno' ? 'checked' : '');
    $checkedDos = ($options == 'dos' ? 'checked' : '');
    $checkedTres = ($options == 'tres' ? 'checked' : '');
    $checkedCuatro = ($options == 'cuatro' ? 'checked' : '');
    //set default
    if (!$options) :
        $checkedUno = 'checked';
    endif;
    $output = '';
    $output .= '<p><label for="paleta_colores_1"><input type="radio" name="paleta_colores" id="paleta_colores_1" value="uno" ' . $checkedUno . ' /> Paleta 1 </label></p>';
    $output .= '<p><label for="paleta_colores_2"><input type="radio" name="paleta_colores" id="paleta_colores_2" value="dos" ' . $checkedDos . ' /> Paleta 2 </label></p>';
    $output .= '<p><label for="paleta_colores_3"><input type="radio" name="paleta_colores" id="paleta_colores_3" value="tres" ' . $checkedTres . ' /> Paleta 3 </label></p>';
    $output .= '<p><label for="paleta_colores_4"><input type="radio" name="paleta_colores" id="paleta_colores_4" value="cuatro" ' . $checkedCuatro . ' /> Paleta 4 </label></p>';
    echo $output;
}

/*function ideas_sidebar_twitter()
{
    $twitter = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter handler" /><p class="description">Ingrese su cuenta de Twitter sin el caracter @</p>';
}
function ideas_sanitize_twitter_handler($input)
{
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
}*/
function ideas_theme_create_page()
{
    //generation of our admin page
    require_once(get_template_directory() . '/inc/templates/ideas-admin.php');
}
