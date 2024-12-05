<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $query = "UPDATE orders SET status = ? WHERE order_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $order_id);

    if ($stmt->execute()) {
        echo "Order status updated!";
    } else {
        echo "Error updating order.";
    }
}
?>
<form method="post">
    <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>">
    <select name="status">
        <option value="Pending">Pending</option>
        <option value="Dispatched">Dispatched</option>
        <option value="Delivered">Delivered</option>
    </select>
    <button type="submit">Update</button>
</form>
