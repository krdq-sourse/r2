<?php
$input_text = 'paied  by ' . $_COOKIE['fname'] . ' ' . $_COOKIE['sname'] . ' ' . $_COOKIE['adr'] . ' ' . $num;

$width = (strlen($input_text) * 9) + 600;
$height = 600;

$textImage = imagecreatetruecolor($width, $height);
$color = imagecolorallocate($textImage, 0, 0, 0);
imagecolortransparent($textImage, $color);
imagestring($textImage, 5, 10, 5, $input_text, 0x6495ED);


// create background image layer
$background = imagecreatefromjpeg('http://localhost/print.jpg');

// Merge background image and text image layers
imagecopymerge($background, $textImage, 15, 15, 0, 0, $width, $height, 50);


$output = imagecreatetruecolor($width, $height);
imagecopy($output, $background, 0, 0, 20, 13, $width, $height);


ob_start();
imagepng($output);
printf('<img id="output" src="data:image/png;base64,%s" />', base64_encode(ob_get_clean()));
$o = <<<HTML
<div onclick="location.href='http://plati/basic/web/index.php?r=my%2Fpay'">назад</div>
HTML;


echo $o;