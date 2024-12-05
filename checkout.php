<?php
// Start session
session_start();

// Check if cart is empty
if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

// Calculate total price
$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'] * $item['quantity'];
}

// Handle form submission for user details, etc. (You can integrate payment API here)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        /* Base styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        header nav ul li {
            display: inline;
            margin: 0 15px;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
        }

        header nav ul li a:hover {
            text-decoration: underline;
        }

        /* Checkout section */
        #checkout {
            margin: 20px;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 8px;
        }

        #checkout h2 {
            color: #fff;
            font-size: 2rem;
        }

        .cart-summary {
            margin-top: 20px;
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
        }

        .cart-summary table {
            width: 100%;
            border-collapse: collapse;
            color: #e0e0e0;
        }

        .cart-summary th, .cart-summary td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #444;
        }

        .cart-summary th {
            background-color: #333;
        }

        .cart-summary td {
            background-color: #222;
        }

        /* Form styling */
        form {
            margin-top: 30px;
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
        }

        form label {
            display: block;
            color: #fff;
            margin-bottom: 8px;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #444;
            color: #fff;
            border: 1px solid #555;
            border-radius: 4px;
        }

        form button {
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #e05a4e;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </nav>
    </header>

    <section id="checkout">
        <h2>Checkout</h2>
        <div class="cart-summary">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $item_id => $item): ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo '$' . number_format($item['price'], 2); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo '$' . number_format($item['price'] * $item['quantity'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Total Price: $<?php echo number_format($total_price, 2); ?></h3>
        </div>

        <form action="payment.php" method="POST">
            <!-- Collect user details for shipping -->
            <label for="address">Shipping Address:</label>
            <input type="text" name="address" required>
            <label for="email">Email Address:</label>
            <input type="email" name="email" required>
            <button type="submit">Proceed to Payment</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 SENDY. All rights reserved.</p>
    </footer>
</body>
</html>
