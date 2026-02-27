<?php
/**
 * Custom Meta Boxes for About Page
 * Creates custom fields in WordPress admin
 */

// Security: Prevent direct file access
if (!defined('ABSPATH')) {
    exit;
}


// ============================================================================
// REGISTER META BOXES
// ============================================================================

function inventive_add_about_meta_boxes() {
    
    // Hero Section Meta Box
    add_meta_box(
        'inventive_hero_section',
        'Hero Section',
        'inventive_hero_section_html',
        'page',
        'normal',
        'high'
    );
    
    // Story Section Meta Box
    add_meta_box(
        'inventive_story_section',
        'Company Story Section',
        'inventive_story_section_html',
        'page',
        'normal',
        'high'
    );
    
    // Stats Section Meta Box
    add_meta_box(
        'inventive_stats_section',
        'Stats Section',
        'inventive_stats_section_html',
        'page',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'inventive_add_about_meta_boxes');


// ============================================================================
// DISPLAY HERO SECTION FIELDS
// ============================================================================

function inventive_hero_section_html($post) {
    
    // Security nonce
    wp_nonce_field('inventive_save_meta_box', 'inventive_meta_box_nonce');
    
    // Get existing values
    $hero_title = get_post_meta($post->ID, 'hero_title', true);
    $hero_subtitle = get_post_meta($post->ID, 'hero_subtitle', true);
    $hero_bg = get_post_meta($post->ID, 'hero_background_image', true);
    
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
                       placeholder="e.g., About Inventive">
                <p class="description">Main heading displayed on hero section</p>
            </td>
        </tr>
        
        <tr>
            <th><label for="hero_subtitle">Hero Subtitle</label></th>
            <td>
                <textarea id="hero_subtitle" 
                          name="hero_subtitle" 
                          rows="3" 
                          class="large-text"
                          placeholder="e.g., We create amazing solutions"><?php echo esc_textarea($hero_subtitle); ?></textarea>
                <p class="description">Subtitle text below heading</p>
            </td>
        </tr>
        
        <tr>
            <th><label for="hero_background_image">Background Image</label></th>
            <td>
                <input type="text" 
                       id="hero_background_image" 
                       name="hero_background_image" 
                       value="<?php echo esc_url($hero_bg); ?>" 
                       class="regular-text">
                <button type="button" class="button upload_image_button">Upload Image</button>
                <p class="description">Hero background image URL</p>
                
                <?php if ($hero_bg): ?>
                    <p>
                        <img src="<?php echo esc_url($hero_bg); ?>" 
                             style="max-width: 300px; height: auto; display: block; margin-top: 10px;">
                    </p>
                <?php endif; ?>
            </td>
        </tr>
    </table>
    
    <?php
}


// ============================================================================
// DISPLAY STORY SECTION FIELDS
// ============================================================================

function inventive_story_section_html($post) {
    
    $story_title = get_post_meta($post->ID, 'story_title', true);
    $story_content = get_post_meta($post->ID, 'story_content', true);
    $story_image = get_post_meta($post->ID, 'story_image', true);
    
    ?>
    
    <table class="form-table">
        <tr>
            <th><label for="story_title">Story Title</label></th>
            <td>
                <input type="text" 
                       id="story_title" 
                       name="story_title" 
                       value="<?php echo esc_attr($story_title); ?>" 
                       class="regular-text"
                       placeholder="e.g., Our Story">
            </td>
        </tr>
        
        <tr>
            <th><label for="story_content">Story Content</label></th>
            <td>
                <textarea id="story_content" 
                          name="story_content" 
                          rows="6" 
                          class="large-text"><?php echo esc_textarea($story_content); ?></textarea>
            </td>
        </tr>
        
        <tr>
            <th><label for="story_image">Story Image</label></th>
            <td>
                <input type="text" 
                       id="story_image" 
                       name="story_image" 
                       value="<?php echo esc_url($story_image); ?>" 
                       class="regular-text">
                <button type="button" class="button upload_image_button">Upload Image</button>
                
                <?php if ($story_image): ?>
                    <p>
                        <img src="<?php echo esc_url($story_image); ?>" 
                             style="max-width: 300px; height: auto; display: block; margin-top: 10px;">
                    </p>
                <?php endif; ?>
            </td>
        </tr>
    </table>
    
    <?php
}


// ============================================================================
// DISPLAY STATS SECTION FIELDS
// ============================================================================

function inventive_stats_section_html($post) {
    ?>
    
    <table class="form-table">
        <?php for ($i = 1; $i <= 4; $i++): ?>
            <?php
            $stat_number = get_post_meta($post->ID, "stat_{$i}_number", true);
            $stat_label = get_post_meta($post->ID, "stat_{$i}_label", true);
            ?>
            
            <tr>
                <th colspan="2"><strong>Stat <?php echo $i; ?></strong></th>
            </tr>
            
            <tr>
                <th><label for="stat_<?php echo $i; ?>_number">Number</label></th>
                <td>
                    <input type="text" 
                           id="stat_<?php echo $i; ?>_number" 
                           name="stat_<?php echo $i; ?>_number" 
                           value="<?php echo esc_attr($stat_number); ?>" 
                           class="regular-text"
                           placeholder="e.g., 500+">
                </td>
            </tr>
            
            <tr>
                <th><label for="stat_<?php echo $i; ?>_label">Label</label></th>
                <td>
                    <input type="text" 
                           id="stat_<?php echo $i; ?>_label" 
                           name="stat_<?php echo $i; ?>_label" 
                           value="<?php echo esc_attr($stat_label); ?>" 
                           class="regular-text"
                           placeholder="e.g., Projects">
                </td>
            </tr>
            
            <?php if ($i < 4): ?>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            <?php endif; ?>
            
        <?php endfor; ?>
    </table>
    
    <?php
}


// ============================================================================
// SAVE META BOX DATA
// ============================================================================

function inventive_save_about_meta_boxes($post_id) {
    
    // Security checks
    if (!isset($_POST['inventive_meta_box_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['inventive_meta_box_nonce'], 'inventive_save_meta_box')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Fields to save
    $fields = array(
        'hero_title',
        'hero_subtitle',
        'hero_background_image',
        'story_title',
        'story_content',
        'story_image',
    );
    
    // Add stat fields
    for ($i = 1; $i <= 4; $i++) {
        $fields[] = "stat_{$i}_number";
        $fields[] = "stat_{$i}_label";
    }
    
    // Save each field
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}

add_action('save_post', 'inventive_save_about_meta_boxes');


// ============================================================================
// LOAD SCRIPTS
// ============================================================================

function inventive_meta_box_scripts() {
    global $post_type;
    
    if ('page' === $post_type) {
        wp_enqueue_media();
        wp_enqueue_script(
            'inventive-meta-box',
            get_template_directory_uri() . '/assets/js/meta-box.js',
            array('jquery'),
            '1.0.0',
            true
        );
    }
}

add_action('admin_enqueue_scripts', 'inventive_meta_box_scripts');