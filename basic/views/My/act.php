<?php
$input_text = 'hui '.$_COOKIE['fname'].' '.$_COOKIE['sname'].' '.$_COOKIE['adr'].' '.$num;

$width = (strlen($input_text) * 9) + 20;
$height = 300;

$textImage = imagecreatetruecolor($width, $height);
$color = imagecolorallocate($textImage, 0, 0, 0);
imagecolortransparent($textImage, $color);
imagestring($textImage, 5, 10, 5, $input_text, 0xFFFFFF);


// create background image layer
$background = imagecreatefromjpeg('https://i.pinimg.com/originals/43/22/5a/43225aba74ba46ba733f83ec5084e73d.jpg');

// Merge background image and text image layers
imagecopymerge($background, $textImage, 15, 15, 0, 0, $width, $height, 100);


$output = imagecreatetruecolor($width, $height);
imagecopy($output, $background, 0, 0, 20, 13, $width, $height);


ob_start();
imagepng($output);
printf('<img id="output" src="data:image/png;base64,%s" />', base64_encode(ob_get_clean()));
echo '<div>назад</div>';