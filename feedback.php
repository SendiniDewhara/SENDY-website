<form method="post">
    <textarea name="message" placeholder="Write your feedback here..."></textarea>
    <button type="submit">Submit</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO messages (user_id, message) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $user_id, $message);

    if ($stmt->execute()) {
        echo "Feedback submitted!";
    } else {
        echo "Error submitting feedback.";
    }
}
?>
