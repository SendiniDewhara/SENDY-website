<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

// Check if product_id is set
if(isset($_GET['product_id']) && is_numeric($_GET['product_id'])){
    $product_id = (int) $_GET['product_id'];
    $user_id = $_SESSION['user_id'];
    $quantity = 1; // Default quantity, you can modify to accept user input

    include 'db.php';

    try {
        // Check if the product is already in the cart
        $sql = "SELECT cart_id, quantity FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            // Update the quantity
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $new_quantity = $row['quantity'] + $quantity;

            $update_sql = "UPDATE cart SET quantity = :quantity WHERE cart_id = :cart_id";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->bindParam(':quantity', $new_quantity, PDO::PARAM_INT);
            $update_stmt->bindParam(':cart_id', $row['cart_id'], PDO::PARAM_INT);
            $update_stmt->execute();
        } else {
            // Insert new cart item
            $insert_sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
            $insert_stmt = $pdo->prepare($insert_sql);
            $insert_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $insert_stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $insert_stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $insert_stmt->execute();
        }

        // Redirect to cart page with success message
        header("Location: cart.php?message=Product added to cart successfully!");
        exit;

    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
    }

} else {
    // Invalid product_id
    header("Location: catalog.php?error=Invalid product selection.");
    exit;
}
?>
