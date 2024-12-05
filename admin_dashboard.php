<?php
session_start();
include 'db.php';

// Check admin login
if ($_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Fetch Orders
$query = "SELECT * FROM orders";
$result = $conn->query($query);

echo "<h1>Manage Orders</h1>";
while ($order = $result->fetch_assoc()) {
    echo "<div>Order ID: {$order['order_id']}, Status: {$order['status']}</div>";
    echo "<a href='update_order.php?order_id={$order['order_id']}'>Update Status</a>";
}
?>
