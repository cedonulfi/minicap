<?php
// Start the session
session_start();

// Check if captcha matches
if (isset($_POST['captcha']) && $_POST['captcha'] === $_SESSION['captcha']) {
    echo "<h1>Success! Captcha matched.</h1>";
    echo "<a href='index.php'>Go back to form</a>";
} else {
    header('Location: index.php?error=1');
    exit();
}
?>
