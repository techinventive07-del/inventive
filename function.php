<?php
/**
 * Inventive Theme Functions
 */

// TEST: Check if file loads
add_action('admin_notices', function() {
    echo '<div class="notice notice-success"><p>✅ functions.php is loading!</p></div>';
});

// Include meta boxes
require_once get_template_directory() . '/inc/meta-boxes.php';