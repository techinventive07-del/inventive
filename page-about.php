
<?php
/*
Template Name: About Page
*/
?>
<?php

$heading = get_post_meta(get_the_ID(), '_about_heading', true);
$description = get_post_meta(get_the_ID(), '_about_description', true);
$button_text = get_post_meta(get_the_ID(), '_about_button_text', true);
$button_link = get_post_meta(get_the_ID(), '_about_button_link', true);

?>

<section class="about-section">

    <?php if ($heading): ?>
        <h2><?php echo esc_html($heading); ?></h2>
    <?php endif; ?>

    <?php if ($description): ?>
        <p><?php echo esc_html($description); ?></p>
    <?php endif; ?>

    <?php if ($button_text && $button_link): ?>
        <a href="<?php echo esc_url($button_link); ?>">
            <?php echo esc_html($button_text); ?>
        </a>
    <?php endif; ?>

</section>