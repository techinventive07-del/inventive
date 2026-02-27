<?php

// 1. ADD META BOX
function its_add_about_meta_box() {
    // Add meta box to all pages
    add_meta_box(
        'its_about_meta_box',
        'About Section',
        'its_about_meta_box_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'its_add_about_meta_box');

// 2. DISPLAY FIELDS
function its_about_meta_box_callback($post) {
    // Check template
    $template = get_page_template_slug($post->ID);

    if ($template !== 'page-about.php') {
        echo '<p>This meta box only works with the About Page template. Please select the template from Page Attributes.</p>';
        return;
    }
    // Security nonce
    wp_nonce_field('its_save_about_meta_box', 'its_about_meta_box_nonce');

    // Get existing values
    $heading = get_post_meta($post->ID, '_about_heading', true);
    $description = get_post_meta($post->ID, '_about_description', true);
    $button_text = get_post_meta($post->ID, '_about_button_text', true);
    $button_link = get_post_meta($post->ID, '_about_button_link', true);

    ?>

    <p>
        <label><strong>Heading</strong></label><br>
        <input type="text" name="about_heading" value="<?php echo esc_attr($heading); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Description</strong></label><br>
        <textarea name="about_description" rows="5" style="width:100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>

    <p>
        <label><strong>Button Text</strong></label><br>
        <input type="text" name="about_button_text" value="<?php echo esc_attr($button_text); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Button Link</strong></label><br>
        <input type="url" name="about_button_link" value="<?php echo esc_attr($button_link); ?>" style="width:100%;">
    </p>

    <?php
}


// 3. SAVE DATA (SECURE)
function its_save_about_meta_box($post_id) {

    // Check nonce
    if (!isset($_POST['its_about_meta_box_nonce']) || 
        !wp_verify_nonce($_POST['its_about_meta_box_nonce'], 'its_save_about_meta_box')) {
        return;
    }

    // Prevent autosave overwrite
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permission
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save fields
    if (isset($_POST['about_heading'])) {
        update_post_meta($post_id, '_about_heading', sanitize_text_field($_POST['about_heading']));
    }

    if (isset($_POST['about_description'])) {
        update_post_meta($post_id, '_about_description', sanitize_textarea_field($_POST['about_description']));
    }

    if (isset($_POST['about_button_text'])) {
        update_post_meta($post_id, '_about_button_text', sanitize_text_field($_POST['about_button_text']));
    }

    if (isset($_POST['about_button_link'])) {
        update_post_meta($post_id, '_about_button_link', esc_url_raw($_POST['about_button_link']));
    }
}
add_action('save_post', 'its_save_about_meta_box');