<?php
require_once 'db.php';

// Fetch all messages from the database
$messages = getAllMessages($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Messages</title>
</head>
<body>
    <h2>Contact Messages</h2>
    <table boder="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        <?php foreach ($messages as $message): ?>
        <tr>
            <td><?php echo htmlspecialchars($message['name']); ?></td>
            <td><?php echo htmlspecialchars($message['email']); ?></td>
            <td><?php echo htmlspecialchars($message['subject']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($message['message'])); ?></td>
            <td><?php echo $message['created_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
