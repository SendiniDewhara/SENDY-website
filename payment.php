<?php
// Assuming the cart data is stored in session or database
session_start();

// Example cart data (in practice, this would be retrieved from the session or database)
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalAmount = 0;
foreach ($cart as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            font-size: 2rem;
        }

        .container {
            width: 70%;
            margin: 0 auto;
            padding: 20px;
        }

        .order-summary {
            margin-bottom: 20px;
        }

        .order-summary h2 {
            font-size: 1.5rem;
        }

        .order-summary ul {
            list-style: none;
            padding: 0;
        }

        .order-summary ul li {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }

        .payment-methods {
            margin-top: 30px;
        }

        .payment-methods h2 {
            font-size: 1.5rem;
        }

        .payment-methods label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .payment-methods select, .payment-methods input {
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .payment-methods button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .payment-methods button:hover {
            background-color: #555;
        }

        .no-items {
            font-size: 1.2rem;
            color: #999;
            text-align: center;
        }
    </style>
</head>
<body>

    <header>
        <h1>Checkout - Payment</h1>
    </header>

    <div class="container">
        <?php if (count($cart) > 0): ?>
            <!-- Order Summary -->
            <div class="order-summary">
                <h2>Order Summary</h2>
                <ul>
                    <?php foreach ($cart as $item): ?>
                        <li>
                            <strong><?= htmlspecialchars($item['product_name']) ?> (<?= $item['quantity'] ?>)</strong><br>
                            Price: $<?= number_format($item['price'], 2) ?><br>
                            Subtotal: $<?= number_format($item['price'] * $item['quantity'], 2) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <hr>
                <p><strong>Total Amount: $<?= number_format($totalAmount, 2) ?></strong></p>
            </div>

            <!-- Payment Methods -->
            <div class="payment-methods">
                <h2>Select Payment Method</h2>
                <form action="process_payment.php" method="POST">
                    <label for="payment-method">Payment Method</label>
                    <select id="payment-method" name="payment_method" required>
                        <option value="credit_card">Credit/Debit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>

                    <label for="card-details">Card Details</label>
                    <input type="text" id="card-details" name="card_details" placeholder="Enter your card number" required>

                    <label for="expiry-date">Expiry Date</label>
                    <input type="month" id="expiry-date" name="expiry_date" required>

                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required>

                    <button type="submit" name="submit_payment">Proceed to Pay</button>
                </form>
            </div>
        <?php else: ?>
            <p class="no-items">Your cart is empty. Please add items to your cart before proceeding to payment.</p>
        <?php endif; ?>
    </div>

</body>
</html>
