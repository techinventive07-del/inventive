<?php
/**
 * Inventive Tech Solution Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// ========================================
// TEST: Show we're loading
// ========================================

add_action('admin_notices', function() {
    echo '<div class="notice notice-success" style="padding: 15px; background: #d4edda; border: 3px solid green;">
        <h2 style="margin: 0; color: green;">✅ FUNCTIONS.PHP IS LOADING!</h2>
    </div>';
});

// ========================================
// Include Simple Meta Boxes
// ========================================

$meta_boxes_file = get_template_directory() . '/inc/meta-boxes-simple.php';

if (file_exists($meta_boxes_file)) {
    
    require_once $meta_boxes_file;
    
    add_action('admin_notices', function() {
        echo '<div class="notice notice-info" style="padding: 15px; background: #d1ecf1; border: 3px solid blue;">
            <h2 style="margin: 0; color: blue;">✅ META BOXES FILE LOADED!</h2>
        </div>';
    });
    
} else {
    
    add_action('admin_notices', function() use ($meta_boxes_file) {
        echo '<div class="notice notice-error" style="padding: 15px; background: #f8d7da; border: 3px solid red;">
            <h2 style="margin: 0; color: red;">❌ FILE NOT FOUND!</h2>
            <p>Looking for: ' . $meta_boxes_file . '</p>
        </div>';
    });
    
}

require get_template_directory() . '/inc/meta-boxes-dummy.php';