<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-container h1 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input[type="text"],
        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group img {
            margin: 10px 0;
            display: block;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Captcha Form</h1>
        <form action="process.php" method="post">
            <div class="form-group">
                <label for="captcha-input">Enter the captcha:</label>
                <img src="generate_captcha.php" alt="Captcha">
                <input type="text" name="captcha" id="captcha-input" required>
            </div>
            <input type="submit" value="Submit">
        </form>
        <?php if (isset($_GET['error'])): ?>
            <p class="error">Captcha mismatch. Please try again.</p>
        <?php endif; ?>
    </div>
</body>
</html>
