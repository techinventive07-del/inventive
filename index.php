// index.php (trying to handle EVERYTHING)

<!DOCTYPE html>
<html>
<head><title>My Site</title></head>
<body>

<?php
if (is_front_page()) {
    // Homepage code
    echo '<h1>Welcome Home</h1>';
    echo '<div>Services grid</div>';
    
} elseif (is_page('about')) {
    // About page code
    echo '<h1>About Us</h1>';
    echo '<div>About content</div>';
    
} elseif (is_singular('service')) {
    // Service code
    echo '<h1>Service Details</h1>';
    
} else {
    // Everything else
    echo '<h1>Generic Page</h1>';
}
?>

</body>
</html>