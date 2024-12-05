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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo {
            display: flex;
            align-items: center;
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        header .logo img {
            height: 40px;
            margin-right: 10px;
        }

        nav {
            flex: 1;
            display: flex;
            justify-content: center;
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

        .search-bar-container {
            display: flex;
            justify-content: center;
            padding: 1rem 0;
            background-color: #f9f9f9;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            border-radius: 20px;
            padding: 0.25rem 0.75rem;
            width: 300px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
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

        /* Animated SENDY text */
        .animated-logo {
            font-size: 2rem;
            font-weight: bold;
            color: #ff6f61;
            animation: swipe 2s infinite alternate;
            margin-top: 10px;
        }

        @keyframes swipe {
            from {
                text-shadow: 2px 2px 10px #ff6f61, -2px -2px 10px #ff6f61;
            }
            to {
                text-shadow: 2px 2px 20px #ff6f61, -2px -2px 20px #ff6f61;
            }
        }

        @media (max-width: 768px) {
            header {
                flex-wrap: wrap;
            }

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
        }
    </style>
</head>
<body>
    <header>
        <a href="#home" class="logo">
            <img src="images/logo.png" alt="SENDY Logo">
            <span class="animated-logo">SENDY</span>
        </a>
        <nav>
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

    <!-- Search Bar Section -->
    <div class="search-bar-container">
        <div class="search-bar">
            <input type="text" placeholder="Search for products...">
            <button><i class="fas fa-search"></i></button>
        </div>
    </div>

    <!-- Rest of the content -->
    <section id="home">
        <h1>Welcome to SENDY</h1>
        <p>Your destination for timeless and trendy fashion.</p>
        <a href="catalog.php">Shop Now</a>
    </section>
    <!-- Remaining sections stay the same -->
</body>
</html>
