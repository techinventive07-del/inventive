<?php

// LOAD GLOBAL CSS & JS
function inventive_enqueue_assets() {

    // 1. style.css (required)
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri()
    );

    // 2. main CSS
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
}

// Hook correctly
add_action('wp_enqueue_scripts', 'inventive_enqueue_assets');



// LOAD ABOUT PAGE CSS
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

// Hook correctly
add_action('wp_enqueue_scripts', 'inventive_about_assets');