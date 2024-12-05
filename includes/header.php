<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="catalog.php">Shop</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<style>
    /* Basic styling for the navigation bar */
    header {
        background-color: #333;
        padding: 10px 20px;
    }
    nav ul {
        list-style: none;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin: 0;
        padding: 0;
    }
    nav ul li {
        margin-right: 20px;
    }
    nav ul li a {
        color: #ffffff;
        text-decoration: none;
        font-weight: bold;
    }
    nav ul li a:hover {
        color: #28a745;
    }
</style>
