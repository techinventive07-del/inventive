<?php
/* Template Name: About Page */
get_header();
?>

<section class="about-hero">
    <div class="container">
        <h1>About Us</h1>
        <p>We build powerful digital solutions</p>
        <button id="ctaBtn">Book a Call</button>
    </div>
</section>

<section class="about-content">
    <div class="container about-grid">

        <div class="about-text">
            <h2>Who We Are</h2>
            <p>
                We are a creative digital agency focused on building fast,
                modern, and scalable websites for businesses.
            </p>
        </div>

        <div class="about-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.jpg" alt="About Image">
        </div>

    </div>
</section>

<section class="about-cta">
    <h2>Ready to grow your business?</h2>
    <button id="ctaBtn2">Get Started</button>
</section>

<?php get_footer(); ?>