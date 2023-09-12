<?php

$width = 80;
$height = 25;

$image = imagecreatetruecolor($width, $height);

$bgColor = imagecolorallocate($image, 0, 0, 0);
$textColor = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image, 0, 0, $width - 1, $height - 1, $bgColor);

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$captchaLength = 5;
$captchaString = '';
for ($i = 0; $i < $captchaLength; $i++) {
    $captchaString .= $characters[rand(0, strlen($characters) - 1)];
}

$numLines = 10;
for ($i = 0; $i < $numLines; $i++) {
    $color = rand(50,200);
    $lineColor = imagecolorallocate($image,$color,$color,$color);
    imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $lineColor);
}
$font = 5;
$x = 20;  
$y = 5;

imagestring($image, $font, $x, $y, $captchaString, $textColor);
$image = imagerotate($image,rand(-10,10),0);

header('Content-type: image/png');
imagepng($image);

imagedestroy($image);
?>
