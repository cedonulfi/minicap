<?php
// Start the session
session_start();

// Generate random string
$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
$captchaText = substr(str_shuffle($characters), 0, 6);
$_SESSION['captcha'] = $captchaText;

// Create an image
$imageWidth = 150;
$imageHeight = 50;
$image = imagecreatetruecolor($imageWidth, $imageHeight);

// Set colors
$bgColor = imagecolorallocate($image, 240, 240, 240);
$textColor = imagecolorallocate($image, 50, 50, 50);

// Fill background
imagefill($image, 0, 0, $bgColor);

// Add noise
for ($i = 0; $i < 50; $i++) {
    $noiseColor = imagecolorallocate($image, rand(100, 255), rand(100, 255), rand(100, 255));
    imagesetpixel($image, rand(0, $imageWidth), rand(0, $imageHeight), $noiseColor);
}

// Add text
$font = dirname(__FILE__) . '/arial.ttf'; // Make sure this font exists or replace with another
imagettftext($image, 20, rand(-10, 10), 15, 35, $textColor, $font, $captchaText);

// Output the image
header('Content-type: image/png');
imagepng($image);

// Free memory
imagedestroy($image);
