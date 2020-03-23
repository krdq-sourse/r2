<?php use yii\helpers\Html;

?>
<ul class="nav nav-pills">
    <li role="presentation" class="active"><?= Html::a("Главная", ['my/content']) ?></li>
    <li role="presentation" class="action"><?= Html::a("Оплата", ["my/pay"]) ?></li>
    <li role="presentation" class="action"><?= Html::a("История", "") ?></li>
</ul>
<?php

if ($_COOKIE['bool']) {
    echo "<h1>Этот ресурс создан для создания квитанций по исходным данным </h1> <br>
<h2>Как это работает??</h2>
<b>Вы выбираете услугу (вода, свет, газ) и вводите данные с счетчика/водомера и нажимаете на кнопку созадть квитанцию<br>
Все данные осатьлные данные мы заполним сами.</b> <br>
Мы поддерживаем международный стандарт, по этому заплняем квитанции на английском языке <br>
это не предоставит неудобств так как всеровно ваши квитанции примит любой банк <font size='0.1'>(возможно)</font> 
";

} else {
    $o=<<<HTML
<div onclick="location.href='http://plati/basic/web/'">перейти к авторизации</div>
HTML;

    echo 'Вы не зарегестрированы.<br>'; // todo изменить надпись
echo $o;
}
?>
