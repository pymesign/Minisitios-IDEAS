<?php

/*
	
@package ideas
	
	========================
		ADMIN ENQUEUE FUNCTIONS
	========================
*/

function ideas_load_admin_scripts($hook)
{

    if ('toplevel_page_customize_ideas' != $hook) {
        return;
    }

    wp_register_style('ideas_admin', get_template_directory_uri() . '/assets/css/ideas.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('ideas_admin');

    wp_enqueue_media();

    wp_register_script('ideas-admin-script', get_template_directory_uri() . '/assets/js/ideas.admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ideas-admin-script');
}
add_action('admin_enqueue_scripts', 'ideas_load_admin_scripts');
