<?php
// Connect to the database
include('db_connect.php');

// Get the category ID from the URL (if set)
$category_id = isset($_GET['category']) ? $_GET['category'] : null;

// Fetch products based on category
if ($category_id) {
    $sql = "SELECT * FROM products WHERE category_id = $category_id";
} else {
    $sql = "SELECT * FROM products"; // No filter if no category selected
}

$result = mysqli_query($conn, $sql);

// Display products
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENDY - Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Shop</h1>
    </header>

    <section id="products">
        <h2>Products</h2>
        <div class="products-container">
            <?php while ($product = mysqli_fetch_assoc($result)): ?>
                <div class="product">
                    <img src="images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    <h3><?= $product['name'] ?></h3>
                    <p><?= $product['description'] ?></p>
                    <p><strong>Price:</strong> $<?= number_format($product['price'], 2) ?></p>
                    <a href="product_detail.php?id=<?= $product['product_id'] ?>">View Details</a>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

</body>
</html>
