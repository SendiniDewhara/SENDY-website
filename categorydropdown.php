<?php
function displayCategories($parent_id = 0, $level = 0) {
    global $conn;
    $query = "SELECT * FROM categories WHERE parent_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $parent_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($category = $result->fetch_assoc()) {
        echo str_repeat('--', $level) . $category['category_name'] . "<br>";
        displayCategories($category['category_id'], $level + 1);
    }
}
displayCategories();
?>
