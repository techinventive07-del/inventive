<?php
/**
 * Inventive Tech Solution Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}


function its_enqueue_styles() {
    wp_enqueue_style(
        'its-style', // handle name
        get_stylesheet_uri(), // loads style.css
        array(),
        '1.0'
    );
}

add_action('wp_enqueue_scripts', 'its_enqueue_styles');