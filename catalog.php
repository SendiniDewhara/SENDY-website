<?php
include 'db.php';

// Fetch products and categories
$categories = getCategories($pdo);
$products = getProducts($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
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

        .categories {
            margin: 20px auto;
            text-align: center;
        }

        .categories h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .categories ul {
            list-style: none;
            padding: 0;
            display: inline-block;
        }

        .categories ul li {
            display: inline-block;
            margin: 0 15px;
            padding: 8px 20px;
            border-radius: 25px;
            background-color: #ffebd6;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .categories ul li:hover {
            background-color: #ffcc99;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s;
        }

        .product:hover {
            transform: translateY(-10px);
        }

        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #f0f0f0;
        }

        .product h3 {
            font-size: 1.2rem;
            margin: 10px 0;
            color: #333;
        }

        .product .price {
            font-size: 1rem;
            font-weight: bold;
            color: #ff6f61;
            margin-bottom: 10px;
        }

        .product .description {
            font-size: 0.9rem;
            color: #555;
            margin: 10px 0;
        }

        .product form {
            margin-top: 15px;
        }

        .product form input[type="number"] {
            width: 60px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
            text-align: center;
        }

        .product form button {
            padding: 8px 20px;
            background-color: #333;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product form button:hover {
            background-color: #555;
        }

        .no-products {
            font-size: 1.2rem;
            text-align: center;
            color: #999;
        }
    </style>
</head>
<body>
    <header>
        <h1>Product Catalog</h1>
    </header>

    <!-- Display Categories -->
    <div class="categories">
        <h2>Categories</h2>
        <ul>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <li><?= htmlspecialchars($category['category_name']) ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No categories available</li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Display Products -->
    <div class="product-grid">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>">
                    <h3><?= htmlspecialchars($product['product_name']) ?></h3>
                    <p class="price">$<?= number_format($product['price'], 2) ?></p>
                    <p class="description"><?= htmlspecialchars($product['description']) ?></p>
                    <!-- Add to Cart Form -->
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="item_id" value="<?= htmlspecialchars($product['product_id']) ?>">
                        <input type="hidden" name="item_name" value="<?= htmlspecialchars($product['product_name']) ?>">
                        <input type="hidden" name="item_price" value="<?= htmlspecialchars($product['price']) ?>">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" min="1" value="1">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-products">No products available at the moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>
