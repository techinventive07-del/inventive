<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventive - Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: white;
            text-align: center;
            padding: 120px 20px;
        }
        
        .hero h1 {
            font-size: 56px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        
        .hero p {
            font-size: 24px;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .hero button {
            background: white;
            color: #1e3a8a;
            padding: 15px 40px;
            font-size: 18px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.3s;
        }
        
        .hero button:hover {
            transform: scale(1.05);
        }
        
        /* Services Section */
        .services {
            padding: 80px 20px;
            background: #f3f4f6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .services h2 {
            text-align: center;
            font-size: 42px;
            margin-bottom: 50px;
            color: #1f2937;
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .service-card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        
        .service-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #1e3a8a;
        }
        
        .service-card p {
            color: #6b7280;
            line-height: 1.6;
        }
        
        /* Info Badge */
        .info-badge {
            background: #fef3c7;
            border: 2px solid #f59e0b;
            padding: 15px;
            margin: 20px;
            border-radius: 8px;
            text-align: center;
            color: #92400e;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Info Badge to Show Which Template is Being Used -->
    <div class="info-badge">
        🎯 You are viewing: FRONT-PAGE.PHP (Homepage Template)
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to Inventive</h1>
        <p>We Create Amazing Digital Solutions</p>
        <button>Get Started Today</button>
    </section>

    <!-- Services Section -->
    <section class="services">
        <div class="container">
            <h2>Our Services</h2>
            
            <div class="services-grid">
                
                <!-- Service Card 1 -->
                <div class="service-card">
                    <h3>🎨 Web Design</h3>
                    <p>Beautiful, modern websites that convert visitors into customers. Custom designs tailored to your brand.</p>
                </div>
                
                <!-- Service Card 2 -->
                <div class="service-card">
                    <h3>💻 Development</h3>
                    <p>Fast, secure, and scalable web applications built with the latest technologies.</p>
                </div>
                
                <!-- Service Card 3 -->
                <div class="service-card">
                    <h3>🚀 SEO Optimization</h3>
                    <p>Get found on Google. We optimize your site for search engines and drive organic traffic.</p>
                </div>
                
                <!-- Service Card 4 -->
                <div class="service-card">
                    <h3>📱 Mobile Apps</h3>
                    <p>Native and cross-platform mobile applications for iOS and Android.</p>
                </div>
                
                <!-- Service Card 5 -->
                <div class="service-card">
                    <h3>🛒 E-Commerce</h3>
                    <p>Complete online store solutions with payment integration and inventory management.</p>
                </div>
                
                <!-- Service Card 6 -->
                <div class="service-card">
                    <h3>📊 Analytics</h3>
                    <p>Data-driven insights to help you make better business decisions.</p>
                </div>
                
            </div>
        </div>
    </section>

</body>
</html>