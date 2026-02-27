<?php
/**
 * Template Name: About Page
 * 
 * Displays About page with custom meta box fields
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
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        /* Info Badge */
        .info-badge {
            background: #dbeafe;
            border: 2px solid #3b82f6;
            padding: 15px;
            text-align: center;
            color: #1e40af;
            font-weight: bold;
            font-size: 14px;
        }
        
        /* Hero Section */
        .hero {
            position: relative;
            min-height: 500px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 60px 20px;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
        }
        
        .hero h1 {
            font-size: 56px;
            margin-bottom: 20px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero p {
            font-size: 24px;
            line-height: 1.5;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }
        
        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Story Section */
        .story {
            padding: 80px 20px;
            background: #f9fafb;
        }
        
        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }
        
        .story-content h2 {
            font-size: 42px;
            margin-bottom: 24px;
            color: #1f2937;
            font-weight: 700;
        }
        
        .story-content p {
            font-size: 18px;
            color: #6b7280;
            line-height: 1.8;
            white-space: pre-line;
        }
        
        .story-image img {
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        
        /* Stats Section */
        .stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 20px;
            color: white;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            text-align: center;
        }
        
        .stat-item {
            padding: 30px 20px;
        }
        
        .stat-number {
            display: block;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1;
        }
        
        .stat-label {
            font-size: 18px;
            opacity: 0.95;
            font-weight: 500;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 36px;
            }
            
            .hero p {
                font-size: 18px;
            }
            
            .story-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .story-content h2 {
                font-size: 32px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }
            
            .stat-number {
                font-size: 36px;
            }
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #9ca3af;
        }
        
        .empty-state h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
    </style>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Info Badge (Remove in production) -->
<div class="info-badge">
    🎯 Template: PAGE-ABOUT.PHP | Data from Custom Meta Boxes
</div>

<?php while (have_posts()) : the_post(); ?>

    <?php
    // Get meta box data
    $hero_title = get_post_meta(get_the_ID(), 'hero_title', true);
    $hero_subtitle = get_post_meta(get_the_ID(), 'hero_subtitle', true);
    $hero_bg = get_post_meta(get_the_ID(), 'hero_background_image', true);
    
    $story_title = get_post_meta(get_the_ID(), 'story_title', true);
    $story_content = get_post_meta(get_the_ID(), 'story_content', true);
    $story_image = get_post_meta(get_the_ID(), 'story_image', true);
    ?>

    <!-- Hero Section -->
    <section class="hero" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
        <div class="hero-content">
            <?php if ($hero_title): ?>
                <h1><?php echo esc_html($hero_title); ?></h1>
            <?php else: ?>
                <h1><?php the_title(); ?></h1>
            <?php endif; ?>
            
            <?php if ($hero_subtitle): ?>
                <p><?php echo esc_html($hero_subtitle); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Story Section -->
    <?php if ($story_title || $story_content): ?>
        <section class="story">
            <div class="container">
                <div class="story-grid">
                    <div class="story-content">
                        <?php if ($story_title): ?>
                            <h2><?php echo esc_html($story_title); ?></h2>
                        <?php endif; ?>
                        
                        <?php if ($story_content): ?>
                            <p><?php echo esc_html($story_content); ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($story_image): ?>
                        <div class="story-image">
                            <img src="<?php echo esc_url($story_image); ?>" alt="<?php echo esc_attr($story_title); ?>">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Stats Section -->
    <?php
    // Check if any stat has data
    $has_stats = false;
    for ($i = 1; $i <= 4; $i++) {
        $stat_number = get_post_meta(get_the_ID(), "stat_{$i}_number", true);
        $stat_label = get_post_meta(get_the_ID(), "stat_{$i}_label", true);
        if ($stat_number || $stat_label) {
            $has_stats = true;
            break;
        }
    }
    ?>
    
    <?php if ($has_stats): ?>
        <section class="stats">
            <div class="container">
                <div class="stats-grid">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <?php
                        $stat_number = get_post_meta(get_the_ID(), "stat_{$i}_number", true);
                        $stat_label = get_post_meta(get_the_ID(), "stat_{$i}_label", true);
                        ?>
                        
                        <?php if ($stat_number || $stat_label): ?>
                            <div class="stat-item">
                                <?php if ($stat_number): ?>
                                    <span class="stat-number"><?php echo esc_html($stat_number); ?></span>
                                <?php endif; ?>
                                
                                <?php if ($stat_label): ?>
                                    <span class="stat-label"><?php echo esc_html($stat_label); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    
    <!-- If no data filled in meta boxes -->
    <?php if (!$hero_title && !$story_title && !$has_stats): ?>
        <div class="empty-state">
            <h3>⚠️ No content yet!</h3>
            <p>Please fill in the meta box fields when editing this page in WordPress admin.</p>
        </div>
    <?php endif; ?>

<?php endwhile; ?>

<?php wp_footer(); ?>
</body>
</html>