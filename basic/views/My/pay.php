
<?php use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>
    <ul class="nav nav-pills">
        <li role="presentation" class="action"><?= Html::a("Главная", ['my/content']) ?></li>
        <li role="presentation" class="active"><?= Html::a("Оплата", ["my/pay"]) ?></li>
        <li role="presentation" class="action"> <?= Html::a("История", ['test/index']) ?> </li>
    </ul>
    <br>
<?php


if ($_COOKIE['bool']):
    $form = ActiveForm::begin(['options' => ['class' => 'form-inline']]) ?>
    <?= $form->field($model, 'category')->dropDownList(['вода', 'газ', 'свет']) ?>
    <?= $form->field($model, 'num') ?>
    <?= Html::submitButton('отправить', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end() ?>
<?php else:
    $o=<<<HTML
<div onclick="location.href='http://plati/basic/web/'">перейти к авторизации</div>
HTML;

    echo 'Вы не зарегестрированы.<br>'; // todo изменить надпись
    echo $o;

endif;

