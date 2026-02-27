<?php
/**
 * SIMPLE Meta Box - Just Hero Title
 */

// Security
if (!defined('ABSPATH')) {
    exit;
}

// ============================================
// STEP 1: Register Meta Box
// ============================================

function simple_add_meta_box() {
    add_meta_box(
        'simple_hero',              // ID
        'Hero Title',               // Box title
        'simple_hero_html',         // Callback function
        'page',                     // Show on pages
        'normal',                   // Position
        'high'                      // Priority
    );
}
add_action('add_meta_boxes', 'simple_add_meta_box');

// ============================================
// STEP 2: Display the Field
// ============================================

function simple_hero_html($post) {
    
    // Security nonce
    wp_nonce_field('simple_save', 'simple_nonce');
    
    // Get saved value
    $hero_title = get_post_meta($post->ID, 'hero_title', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="hero_title">Hero Title</label></th>
            <td>
                <input type="text" 
                       id="hero_title" 
                       name="hero_title" 
                       value="<?php echo esc_attr($hero_title); ?>" 
                       class="regular-text"
                       placeholder="e.g., Welcome to About Page">
                <p class="description">This will display as the main heading</p>
            </td>
        </tr>
    </table>
    <?php
}

// ============================================
// STEP 3: Save the Field
// ============================================

function simple_save_meta($post_id) {
    
    // Security checks
    if (!isset($_POST['simple_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['simple_nonce'], 'simple_save')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save the field
    if (isset($_POST['hero_title'])) {
        update_post_meta($post_id, 'hero_title', sanitize_text_field($_POST['hero_title']));
    }
}
add_action('save_post', 'simple_save_meta');