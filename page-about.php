<?php
/*
Template Name: About Page
*/
get_header();
?>

<main>

    <!-- HERO SECTION -->
    <section class="about-hero">
        <div class="container">
            <h1>About Us</h1>
            <p>We help businesses grow with smart digital solutions.</p>
            <a href="#" class="btn-primary">Book a Call</a>
        </div>
    </section>


    <!-- ABOUT CONTENT -->
    <section class="about-content">
        <div class="container">

            <div class="about-grid">

                <div class="about-text">
                    <h2>Who We Are</h2>
                    <p>
                        We are a creative agency focused on delivering high-quality
                        websites and digital experiences that drive real results.
                        Our team combines design, development, and strategy.
                    </p>
                </div>

                <div class="about-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.jpg" alt="About us">
                </div>

            </div>

        </div>
    </section>


    <!-- CTA SECTION -->
    <section class="about-cta">
        <div class="container">
            <h2>Ready to work with us?</h2>
            <a href="#" class="btn-primary">Get Started</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>