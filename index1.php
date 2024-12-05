<?php
// Connect to the database
include('db_connect.php');

// Fetch categories
$sql = "SELECT * FROM categories ORDER BY category_type, category_name";
$result = mysqli_query($conn, $sql);

// Initialize arrays to hold different category types
$main_categories = [];
$occasion_categories = [];
$collection_categories = [];
$feature_categories = [];

// Group categories by type
while ($row = mysqli_fetch_assoc($result)) {
    switch ($row['category_type']) {
        case 'main':
            $main_categories[] = $row;
            break;
        case 'occasion':
            $occasion_categories[] = $row;
            break;
        case 'collection':
            $collection_categories[] = $row;
            break;
        case 'feature':
            $feature_categories[] = $row;
            break;
    }
}

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

    <!-- Main Categories Section -->
    <section id="main-categories">
        <h2>Shop by Category</h2>
        <ul>
            <?php foreach ($main_categories as $category): ?>
                <li><a href="shop.php?category=<?= $category['category_id'] ?>"><?= $category['category_name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- Occasion Categories Section -->
    <section id="occasion-categories">
        <h2>Shop by Occasion</h2>
        <ul>
            <?php foreach ($occasion_categories as $category): ?>
                <li><a href="shop.php?category=<?= $category['category_id'] ?>"><?= $category['category_name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- Collection Categories Section -->
    <section id="collection-categories">
        <h2>Shop by Collection</h2>
        <ul>
            <?php foreach ($collection_categories as $category): ?>
                <li><a href="shop.php?category=<?= $category['category_id'] ?>"><?= $category['category_name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- Feature Categories Section -->
    <section id="feature-categories">
        <h2>Shop by Features</h2>
        <ul>
            <?php foreach ($feature_categories as $category): ?>
                <li><a href="shop.php?category=<?= $category['category_id'] ?>"><?= $category['category_name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </section>

</body>
</html>
