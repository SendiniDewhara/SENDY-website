<?php
// Include the database connection file
include 'db.php';

// Initialize variables
$messageStatus = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Save the message to the database
    if (saveContactMessage($pdo, $name, $email, $subject, $message)) {
        $messageStatus = "<p>Thank you for contacting us! Your message has been sent.</p>";
    } else {
        $messageStatus = "<p>There was an error sending your message. Please try again later.</p>";
    }
}

// Fetch FAQs from the database
$faqs = getFaqs($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>

<!-- Contact Form Section -->
<h2>Contact Us</h2>
<?php echo $messageStatus; ?>
<form action="contact_form.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>
    
    <label for="subject">Subject:</label>
    <input type="text" name="subject" required><br><br>
    
    <label for="message">Message:</label><br>
    <textarea name="message" rows="4" cols="50" required></textarea><br><br>
    
    <input type="submit" value="Send Message">
</form>

<!-- WhatsApp Contact Section -->
<h3>Contact Us via WhatsApp</h3>
<p>Click the link below to chat with us on WhatsApp:</p>
<a href="https://wa.me/1234567890" target="_blank">Chat with us on WhatsApp</a> <!-- Replace with your WhatsApp number -->

<!-- FAQs Section -->
<h3>Frequently Asked Questions</h3>
<?php
if (!empty($faqs)) {
    foreach ($faqs as $faq) {
        echo "<div>";
        echo "<h4>" . htmlspecialchars($faq['question']) . "</h4>";
        echo "<p>" . nl2br(htmlspecialchars($faq['answer'])) . "</p>";
        echo "</div><hr>";
    }
} else {
    echo "<p>No FAQs available at the moment.</p>";
}
?>

</body>
</html>
