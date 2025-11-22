<?php
/**
 * Dynamic CSS Enqueue for WordPress
 * Automatically enqueues all CSS files in the /css/ folder of your theme.
 * Includes cache busting via file modification time.
 */

function dynamic_theme_enqueue_styles() {
    // Enqueue main stylesheet
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));

    // Directory containing additional CSS files
    $css_directory = get_template_directory() . '/css/';
    
    // Get all .css files in the folder
    $css_files = glob($css_directory . '*.css');

    foreach ($css_files as $css_file) {
        $file_name = basename($css_file); // e.g., "homepage.css"
        $file_uri = get_template_directory_uri() . '/css/' . $file_name;

        // Enqueue each CSS file with unique handle and cache-busting version
        wp_enqueue_style('theme-' . $file_name, $file_uri, array(), filemtime($css_file));
    }
}

add_action('wp_enqueue_scripts', 'dynamic_theme_enqueue_styles');
