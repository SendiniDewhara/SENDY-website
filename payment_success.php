<?php
session_start();

// Assuming the order information and payment status are stored in session or database
$orderID = $_SESSION['order_id'] ?? 'N/A';  // Example order ID (it should be fetched from the database)
$paymentStatus = "Successful";  // Assuming payment was successful
$deliveryStatus = "Processing";  // Set according to the current status of delivery
$deliveryAddress = $_SESSION['delivery_address'] ?? 'Not provided';
$expectedDeliveryDate = "2024-12-10";  // Example delivery date
$trackingLink = "https://example.com/track_order/" . $orderID;  // Link for tracking order
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
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

        .order-details, .delivery-info {
            margin-bottom: 20px;
        }

        .order-details h2, .delivery-info h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .order-details p, .delivery-info p {
            font-size: 1.1rem;
        }

        .order-details .order-status, .delivery-info .delivery-status {
            font-weight: bold;
        }

        .tracking-link {
            margin-top: 15px;
            font-size: 1.1rem;
            color: #333;
        }

        .tracking-link a {
            color: #0066cc;
            text-decoration: none;
        }

        .tracking-link a:hover {
            text-decoration: underline;
        }

        /* Animation Styles */
        .thank-you-message {
            text-align: center;
            font-size: 1.8rem;
            color: #ff6347;
            font-weight: bold;
            margin-top: 40px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 2s forwards;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .cute-heart {
            color: #ff6347;
            font-size: 2rem;
            margin-top: 15px;
            animation: heartBeat 1.5s infinite;
        }

        @keyframes heartBeat {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .fashion-message {
            font-size: 1.5rem;
            color: #f39c12;
            font-weight: bold;
            margin-top: 30px;
            animation: slideUp 2s ease-in-out forwards;
        }

        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fashion-heart {
            font-size: 2.5rem;
            color: #f39c12;
            animation: bounce 1.5s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Feedback Form Styles */
        .feedback-section {
            margin-top: 30px;
            text-align: center;
        }

        .feedback-section h2 {
            font-size: 1.6rem;
            margin-bottom: 10px;
        }

        .feedback-section label {
            font-size: 1.1rem;
        }

        .feedback-section textarea {
            width: 80%;
            padding: 10px;
            font-size: 1.1rem;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: vertical;
            min-height: 100px;
        }

        .feedback-section .rating {
            margin-top: 10px;
        }

        .feedback-section .rating input {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Payment Successful!</h1>
    </header>

    <div class="container">
        <p>Your payment has been processed successfully. Thank you for your purchase!</p>

        <!-- Order Summary -->
        <div class="order-details">
            <h2>Order Summary</h2>
            <p><strong>Order ID:</strong> <?= htmlspecialchars($orderID) ?></p>
            <p><strong>Payment Status:</strong> <?= htmlspecialchars($paymentStatus) ?></p>
            <p><strong>Order Status:</strong> <span class="order-status"><?= htmlspecialchars($deliveryStatus) ?></span></p>
        </div>

        <!-- Delivery Information -->
        <div class="delivery-info">
            <h2>Delivery Information</h2>
            <p><strong>Delivery Address:</strong> <?= htmlspecialchars($deliveryAddress) ?></p>
            <p><strong>Expected Delivery Date:</strong> <?= htmlspecialchars($expectedDeliveryDate) ?></p>
            <p><strong>Delivery Status:</strong> <span class="delivery-status"><?= htmlspecialchars($deliveryStatus) ?></span></p>
        </div>

        <!-- Order Tracking -->
        <div class="tracking-link">
            <p><strong>Track Your Order:</strong></p>
            <a href="<?= htmlspecialchars($trackingLink) ?>" target="_blank">Click here to track your order</a>
        </div>

        <!-- Customer Feedback Section -->
        <div class="feedback-section">
            <h2>Your Feedback</h2>
            <form action="submit_feedback.php" method="post">
                <label for="rating">Rate Your Experience:</label><br>
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5"><label for="star5">⭐</label>
                    <input type="radio" id="star4" name="rating" value="4"><label for="star4">⭐</label>
                    <input type="radio" id="star3" name="rating" value="3"><label for="star3">⭐</label>
                    <input type="radio" id="star2" name="rating" value="2"><label for="star2">⭐</label>
                    <input type="radio" id="star1" name="rating" value="1"><label for="star1">⭐</label>
                </div>
                <br>
                <label for="feedback">Leave Your Comments:</label><br>
                <textarea id="feedback" name="feedback" placeholder="We'd love to hear your thoughts!" required></textarea><br><br>
                <input type="submit" value="Submit Feedback">
            </form>
        </div>

        <!-- Cute Thank You Message -->
        <div class="thank-you-message">
            <p>Thank you for ordering and shopping with us!</p>
            <div class="cute-heart">❤️</div>
        </div>

        <!-- Trendy Fashion Greeting -->
        <div class="fashion-message">
            <p>Stay with us for more trendy fashions that you’ll adore! 👗</p>
            <div class="fashion-heart">💖</div>
        </div>

    </div>

</body>
</html>
