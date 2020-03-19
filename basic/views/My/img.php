<?php // наше изображение
$img = ImageCreateFromJPEG("https://i.pinimg.com/originals/1e/51/db/1e51dbd045573cc242b5258aef8bfa34.jpg");

// определяем цвет, в RGB
$color = imagecolorallocate($img, 255, 0, 0);

// указываем путь к шрифту
$font = 'arial.ttf';

$text = urldecode($_GET['name']);
imagettftext($img, 24, 0, 365, 159, $color, $font, $text);
// 24 - размер шрифта
// 0 - угол поворота
// 365 - смещение по горизонтали
// 159 - смещение по вертикали

header('Content-type: image/jpeg');
imagejpeg($img, 'ss', 100);