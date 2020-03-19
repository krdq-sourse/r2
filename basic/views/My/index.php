<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
echo "<br><br>";
$form = ActiveForm::begin(['options'=>['class'=>'form-inline']]) ?>
<?= $form->field($model,'email')->input('email') ?>
    <br>
<?= $form->field($model,'pass')->label("Пароль")->passwordInput() ?>
<?//= $form->field($model,'text')->label("Ваше сообщение")->textarea(['rows'=>'7']) ?>
    <br>
<?= Html::submitButton('отправить',['class' => 'btn btn-primary'])?>
    <br>

    <br>
<?= Html::button('Регистрация',['class'=>'btn btn-primary','onclick'=>'location.href="http://plati/basic/web/?r=my/reg"'])?>
<?php ActiveForm::end() ?>