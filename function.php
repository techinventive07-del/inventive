<?php
/**
 * Inventive Tech Solution Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// ========================================
// DEBUG: Show loading messages
// ========================================

add_action('admin_notices', function() {
    echo '<div class="notice notice-success" style="padding: 15px; border: 3px solid green; background: #d4edda;">
        <h2 style="margin: 0; color: green;">✅ FUNCTIONS.PHP IS LOADING!</h2>
    </div>';
});

// ========================================
// Check and load meta boxes
// ========================================

$theme_dir = get_template_directory();
$meta_boxes_file = $theme_dir . '/inc/meta-boxes.php';

// Show file path
add_action('admin_notices', function() use ($theme_dir, $meta_boxes_file) {
    echo '<div class="notice notice-info" style="padding: 15px; border: 3px solid blue; background: #d1ecf1;">
        <strong>📁 Theme Directory:</strong><br>' . $theme_dir . '<br><br>
        <strong>📄 Looking for meta-boxes.php at:</strong><br>' . $meta_boxes_file . '
    </div>';
});

// Check if file exists
if (file_exists($meta_boxes_file)) {
    
    // File found!
    add_action('admin_notices', function() {
        echo '<div class="notice notice-success" style="padding: 15px; border: 3px solid green; background: #d4edda;">
            <h2 style="margin: 0; color: green;">✅ META-BOXES.PHP FILE FOUND!</h2>
            <p style="margin: 5px 0 0 0;">Attempting to load...</p>
        </div>';
    });
    
    // Load the file
    require_once $meta_boxes_file;
    
    // Confirm it loaded
    add_action('admin_notices', function() {
        echo '<div class="notice notice-success" style="padding: 15px; border: 3px solid darkgreen; background: #d4edda;">
            <h2 style="margin: 0; color: darkgreen;">✅✅ META-BOXES.PHP LOADED SUCCESSFULLY!</h2>
            <p style="margin: 5px 0 0 0;">Meta boxes should appear below when editing a page.</p>
        </div>';
    });
    
} else {
    
    // File NOT found!
    add_action('admin_notices', function() use ($meta_boxes_file) {
        echo '<div class="notice notice-error" style="padding: 15px; border: 3px solid red; background: #f8d7da;">
            <h2 style="margin: 0; color: red;">❌ FILE NOT FOUND!</h2>
            <p style="margin: 5px 0 0 0;"><strong>Expected location:</strong><br>' . $meta_boxes_file . '</p>
            <p style="margin: 10px 0 0 0;"><strong>Please check if file exists on server!</strong></p>
        </div>';
    });
    
}