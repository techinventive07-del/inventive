<?php
/* Template Name: About Page */
get_header();
?>

<div class="about-section">

    <?php
    $heading = rwmb_meta('about_heading');
    $description = rwmb_meta('about_description');
    $image = rwmb_meta('about_image');
    $button_text = rwmb_meta('about_button_text');
    $button_link = rwmb_meta('about_button_link');
    ?>

    <h1><?php echo esc_html($heading); ?></h1>

    <p><?php echo esc_html($description); ?></p>

    <?php if ($image) : ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="">
    <?php endif; ?>

    <?php if ($button_text && $button_link) : ?>
        <a href="<?php echo esc_url($button_link); ?>">
            <?php echo esc_html($button_text); ?>
        </a>
    <?php endif; ?>

</div>

<?php get_footer(); ?>