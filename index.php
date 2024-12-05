<?php
// Start session for user authentication
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENDY - Fashion Redefined</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            scroll-behavior: smooth;
            padding-top: 60px;
            background-color: white;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #1f1f1f;
            padding: 0.5rem 1rem;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            margin: 0 1rem;
        }

        nav ul li a {
            text-decoration: none;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-size: 1rem;
        }

        nav ul li a:hover {
            background-color: #333333;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            border-radius: 20px;
            padding: 0.25rem 0.75rem;
            width: 300px;
            margin: 1rem 0;
        }

        .search-bar input[type="text"] {
            border: none;
            outline: none;
            font-size: 1rem;
            width: 100%;
        }

        .search-bar button {
            border: none;
            background-color: transparent;
            cursor: pointer;
        }

        .search-bar button i {
            color: #1f1f1f;
            font-size: 1.2rem;
        }

        .brand-name {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ff6f61;
            display: inline-block;
            animation: swipe 3s ease-in-out infinite;
        }

        @keyframes swipe {
            0% { transform: translateX(0); }
            50% { transform: translateX(20px); }
            100% { transform: translateX(0); }
        }

        section {
            padding: 4rem 1.5rem;
            min-height: 100vh;
        }

        #home {
            background: url('images/home.jpg') no-repeat center center/cover;
            text-align: center;
            color: white;
        }

        #home h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        #home p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        #home a {
            text-decoration: none;
            color: #ffffff;
            background-color: #ff6f61;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-weight: bold;
        }

        #new-arrivals, #promotions, #about {
            background-color: #f9f9f9;
            padding: 2rem 0;
        }

        #about {
            background-color: #f4f4f4;
            text-align: center;
            padding: 3rem 1.5rem;
        }

        .items-container {
            display: flex;
            justify-content: space-around;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .item {
            background-color: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 30%;
            margin-bottom: 2rem;
        }

        .item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .item h3 {
            margin: 1rem 0;
        }

        #contact .contact-form {
            background-color: #1f1f1f;
            color: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        #contact .contact-form h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #ff6f61;
        }

        #contact .contact-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        #contact .contact-form input,
        #contact .contact-form textarea {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 8px;
            background-color: #333333;
            color: #ffffff;
        }

        #contact .contact-form button {
            background-color: #ff6f61;
            color: #ffffff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            display: block;
            width: 100%;
            text-align: center;
        }

        footer {
            text-align: center;
            background-color: #1f1f1f;
            color: white;
            padding: 1rem;
        }

        footer a {
            color: #ff6f61;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 0.5rem 0;
            }

            .search-bar {
                width: 100%;
                margin-top: 0.5rem;
            }

            .item {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="brand-name">SENDY</div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#new-arrivals">New Arrivals</a></li>
                <li><a href="#promotions">Promotions</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="catalog.php">Catalog</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- Search Bar below Navigation -->
    <div class="search-bar">
        <input type="text" placeholder="Search for products...">
        <button><i class="fas fa-search"></i></button>
    </div>

    <!-- Home Section -->
    <section id="home">
        <h1>Welcome to SENDY</h1>
        <p>Your destination for timeless and trendy fashion.</p>
        <a href="catalog.php">Shop Now</a>
    </section>

    <!-- New Arrivals Section -->
    <section id="new-arrivals">
        <h2>New Arrivals</h2>
        <div class="items-container">
            <div class="item">
                <img src="images/arrival1.jpg" alt="Floral Midi Dress">
                <h3>Floral Midi Dress</h3>
                <p>Perfect for summer outings. Available in sizes XS-XL.</p>
                <p><strong>Price:</strong> $49.99</p>
            </div>
        </div>
    </section>

    <!-- Promotions Section -->
    <section id="promotions">
        <h2>Seasonal Promotions</h2>
        <div class="items-container">
            <div class="item">
                <img src="images/promo1.jpg" alt="Winter Wonders">
                <h3>Winter Wonders</h3>
                <p>Up to 50% off on winter collections. Limited time only!</p>
                <a href="catalog.php">Shop Now</a>
            </div>
            <div class="item">
                <img src="images/promo2.jpg" alt="Spring Sale">
                <h3>Spring Sale</h3>
                <p>Fresh spring styles for 30% off. Don't miss out!</p>
                <a href="catalog.php">Shop Now</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <h2>About Us</h2>
        <p>At SENDY, we redefine fashion with every piece. Browse our diverse collection of stylish and high-quality clothing for every occasion.</p>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="contact-form">
            <h2>Contact Us</h2>
            <form action="contact_process.php" method="POST">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 SENDY. All rights reserved.</p>
        <p>Follow us on <a href="#">Instagram</a>, <a href="#">Facebook</a></p>
    </footer>
</body>
</html>
