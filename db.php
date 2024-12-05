<?php
// Database configuration
$host = 'localhost';
$dbname = 'SENDY'; // Your database name
$username = 'root'; // Database username
$password = ''; // Database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to fetch FAQs from the database
function getFaqs($pdo) {
    try {
        $query = "SELECT * FROM faqs";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching FAQs: " . $e->getMessage());
        return [];
    }
}

// Function to save contact form messages to the database
function saveContactMessage($pdo, $name, $email, $subject, $message) {
    try {
        $query = "INSERT INTO messages (name, email, subject, message, created_at) 
                  VALUES (:name, :email, :subject, :message, NOW())";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error saving contact message: " . $e->getMessage());
        return false;
    }
}



// Function to fetch all messages from the database (admin view)
function getAllMessages($pdo) {
    try {
        $query = "SELECT * FROM messages ORDER BY created_at DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching messages: " . $e->getMessage());
        return [];
    }
}

// Function to fetch shipping & returns information (Optional - can be extended if required)
function getShippingReturns($pdo) {
    try {
        $query = "SELECT * FROM shipping_returns"; // Add your table for shipping and returns information
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching shipping and returns: " . $e->getMessage());
        return [];
    }
}

// Function to fetch product categories from the database (Optional - can be extended if required)
function getCategories($pdo) {
    try {
        $query = "SELECT * FROM categories";  // Ensure 'categories' is your actual table name
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching categories: " . $e->getMessage());
        return [];
    }
}

// Function to fetch products from the database (Optional - can be extended if required)
function getProducts($pdo) {
    try {
        $query = "SELECT * FROM products";  // Ensure 'products' is your actual table name
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching products: " . $e->getMessage());
        return [];
    }
}
?>
