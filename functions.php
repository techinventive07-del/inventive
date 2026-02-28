<?php
/**
 * Inventive Tech Solution Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

  // 1. style.css (required)
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri()
    );

    // 2. main global CSS
    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array('theme-style'),
        '1.0'
    );

    // 3. main JS
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0',
        true
    );


add_action('wp_enqueue_scripts', 'its_enqueue_styles');

function inventive_about_assets() {

    if (is_page('about')) {

        wp_enqueue_style(
            'about-style',
            get_template_directory_uri() . '/assets/css/about.css',
            array('main-style'),
            '1.0'
        );

        wp_enqueue_script(
            'about-js',
            get_template_directory_uri() . '/assets/js/about.js',
            array(),
            '1.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'inventive_about_assets');