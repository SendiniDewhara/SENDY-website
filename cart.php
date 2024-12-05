<?php
// Start session
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to add item to cart
if (isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_quantity = $_POST['quantity'];

    // Check if item already exists in cart
    if (isset($_SESSION['cart'][$item_id])) {
        // Update quantity if already in cart
        $_SESSION['cart'][$item_id]['quantity'] += $item_quantity;
    } else {
        // Add new item to cart
        $_SESSION['cart'][$item_id] = array(
            'name' => $item_name,
            'price' => $item_price,
            'quantity' => $item_quantity
        );
    }
}

// Function to remove item from cart
if (isset($_GET['remove_item'])) {
    $item_id = $_GET['remove_item'];
    unset($_SESSION['cart'][$item_id]);
}

// Function to update item quantity
if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $item_id => $quantity) {
        if ($quantity == 0) {
            unset($_SESSION['cart'][$item_id]);
        } else {
            $_SESSION['cart'][$item_id]['quantity'] = $quantity;
        }
    }
}

// Calculate total price
$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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

        /* Cart section */
        #cart {
            margin: 20px;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 8px;
        }

        #cart h2 {
            color: #fff;
            font-size: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #e0e0e0;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #444;
        }

        table th {
            background-color: #333;
        }

        table td {
            background-color: #222;
        }

        table input[type="number"] {
            width: 50px;
            padding: 5px;
            background-color: #444;
            color: #fff;
            border: 1px solid #555;
            border-radius: 4px;
        }

        button {
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e05a4e;
        }

        /* Remove button styling */
        a {
            color: #ff6f61;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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
                <li><a href="cart.php">Cart (<?php echo count($_SESSION['cart']); ?>)</a></li>
            </ul>
        </nav>
    </header>

    <section id="cart">
        <h2>Your Shopping Cart</h2>
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <form action="cart.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $item_id => $item): ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo '$' . number_format($item['price'], 2); ?></td>
                                <td>
                                    <input type="number" name="quantity[<?php echo $item_id; ?>]" value="<?php echo $item['quantity']; ?>" min="1" />
                                </td>
                                <td><?php echo '$' . number_format($item['price'] * $item['quantity'], 2); ?></td>
                                <td><a href="cart.php?remove_item=<?php echo $item_id; ?>">Remove</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" name="update_cart">Update Cart</button>
            </form>
            <div>
                <h3>Total Price: $<?php echo number_format($total_price, 2); ?></h3>
                <a href="checkout.php" class="button">Proceed to Checkout</a>
            </div>
        <?php endif; ?>
    </section>

    <footer>
        <p>&copy; 2024 SENDY. All rights reserved.</p>
    </footer>
</body>
</html>
