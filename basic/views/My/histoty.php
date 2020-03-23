<?php use yii\helpers\Html;
?>
    <ul class="nav nav-pills">
        <li role="presentation" class="action"><?= Html::a("Главная", ['my/content']) ?></li>
        <li role="presentation" class="active"><?= Html::a("Оплата", ["my/pay"]) ?></li>
        <li role="presentation" class="action"><?= Html::a("История", "") ?></li>
    </ul>
    <br>
<?php


if ($_COOKIE['bool']):?>



<?php else:
    $o=<<<HTML
<div onclick="location.href='http://plati/basic/web/'">перейти к авторизации</div>
HTML;

    echo 'Вы не зарегестрированы.<br>'; // todo изменить надпись
    echo $o;

endif;

