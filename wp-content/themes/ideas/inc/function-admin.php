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
    register_setting('ideas-settings-group', 'twitter_handler' . 'ideas_sanitize_twitter_handler');
    register_setting('ideas-settings-group', 'profile_picture');
    register_setting('ideas-settings-group', 'sidebar_position');

    add_settings_section('ideas-sidebar-options', 'Sidebar Options', 'ideas_sidebar_options', 'customize_ideas');

    add_settings_field('sidebar-name', 'First name', 'ideas_sidebar_name', 'customize_ideas', 'ideas-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitther handler', 'ideas_sidebar_twitter', 'customize_ideas', 'ideas-sidebar-options');
    add_settings_field('sidebar-profile-picture', 'Profile picture', 'ideas_sidebar_profile', 'customize_ideas', 'ideas-sidebar-options');
    add_settings_field('sidebar-position', 'Sidebar position', 'ideas_sidebar_position', 'customize_ideas', 'ideas-sidebar-options');
}
function ideas_sidebar_options()
{
    echo 'Customize your sidebar information';
}
function ideas_sidebar_name()
{
    $projectName = esc_attr(get_option('project_name'));
    $projectDescription = esc_attr(get_option('project_description'));
    echo '<input type="text" name="project_name" value="' . $projectName . '" placeholder="Project Name" />
    <input type="text" name="project_description" value="' . $projectDescription . '" placeholder="Project Description" />';
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
    $output .= '<p><label for="sidebar_position_1"><input type="radio" name="sidebar_position" id="sidebar_position_1" value="left" ' . $checkedLeft . ' /> Left </label></p>';
    $output .= '<p><label for="sidebar_position_0"><input type="radio" name="sidebar_position" id="sidebar_position_0" value="right" ' . $checkedRight . ' /> Right </label></p>';
    echo $output;
}

function ideas_sidebar_twitter()
{
    $twitter = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter handler" /><p class="description">Ingrese su cuenta de Twitter sin el caracter @</p>';
}
function ideas_sanitize_twitter_handler($input)
{
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
}
function ideas_theme_create_page()
{
    //generation of our admin page
    require_once(get_template_directory() . '/inc/templates/ideas-admin.php');
}
