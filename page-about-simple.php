<?php
/**
 * Template Name: About Simple
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?> - <?php bloginfo('name'); ?></title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
        }
        
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 20px;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .info {
            background: #f0f0f0;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Info Badge -->
<div class="info">
    📄 Template: page-about-simple.php | Using Simple Meta Box
</div>

<?php while (have_posts()) : the_post(); ?>

    <?php
    // Get meta box value
    $hero_title = get_post_meta(get_the_ID(), 'hero_title', true);
    ?>

    <!-- Hero Section -->
    <section class="hero">
        <?php if ($hero_title): ?>
            <h1><?php echo esc_html($hero_title); ?></h1>
        <?php else: ?>
            <h1><?php the_title(); ?></h1>
            <p>👆 No meta box value yet! Edit page and add Hero Title.</p>
        <?php endif; ?>
    </section>

<?php endwhile; ?>

<?php wp_footer(); ?>
</body>
</html>