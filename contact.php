<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Example: Process or store the data
    $to = "your_email@example.com"; // Replace with your email
    $headers = "From: $email";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        $feedback = "Message sent successfully!";
        $feedback_class = "success";
    } else {
        $feedback = "Failed to send the message. Please try again later.";
        $feedback_class = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* General Styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Contact Form */
        .contact-container {
            width: 90%;
            max-width: 600px;
            background-color: #1e1e1e;
            border-radius: 12px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
            padding: 20px;
            animation: fadeIn 0.8s ease-in-out;
        }

        .contact-container h1 {
            text-align: center;
            color: #ff6f61;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #ff6f61;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            color: #121212;
        }

        input:focus,
        textarea:focus {
            outline: 2px solid #ff6f61;
        }

        button {
            background-color: #ff6f61;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff3e2c;
        }

        /* Feedback Message */
        .feedback {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }

        .success {
            color: #4caf50;
        }

        .error {
            color: #ff5733;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <h1>Contact Us</h1>
        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
            
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Write your message here" required></textarea>
            
            <button type="submit">Send Message</button>
        </form>

        <?php if (isset($feedback)) { ?>
            <div class="feedback <?php echo $feedback_class; ?>">
                <?php echo $feedback; ?>
            </div>
        <?php } ?>
    </div>
</body>
</html>
