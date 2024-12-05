<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Status</title>
    <style>
        /* Dark Theme Styles */
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #ff5722;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        .success {
            color: #4caf50;
        }

        .error {
            color: #ff5722;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Check if the form was submitted using the POST method
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve and sanitize form data
            $name = htmlspecialchars($_POST['name'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $message = htmlspecialchars($_POST['message'] ?? '');

            // Validate that all fields are filled out
            if (empty($name) || empty($email) || empty($message)) {
                echo "<h1 class='error'>Error!</h1>";
                echo "<p class='error'>All fields are required.</p>";
                exit;
            }

            // Display success message
            echo "<h1 class='success'>Message Sent Successfully!</h1>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Message:</strong> $message</p>";
        } else {
            // If the request is not POST, deny access
            echo "<h1 class='error'>Invalid Request</h1>";
            echo "<p class='error'>Please submit the form properly.</p>";
        }
        ?>
    </div>
</body>
</html>
