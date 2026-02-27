<?php
$hero_title = get_post_meta(get_the_ID(), '_hero_title', true);
$subtitle = get_post_meta(get_the_ID(), '_subtitle', true);
?>

<h1><?php echo esc_html($hero_title); ?></h1>
<p><?php echo esc_html($subtitle); ?></p>