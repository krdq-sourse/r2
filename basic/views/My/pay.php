<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;?>
<ul class="nav nav-pills">
    <li role="presentation" class="action"><?= Html::a("Главная", ['my/index']) ?></li>
    <li role="presentation" class="active"><?= Html::a("Оплата", ["my/pay"]) ?></li>
    <li role="presentation" class="action"><?= Html::a("История", "") ?></li>
</ul>
<br>
<?php


if ($b):
    $form = ActiveForm::begin(['options'=>['class'=>'form-inline']]) ?>
    <?= $form->field($model,'category')->dropDownList(['вода','газ','свет'])?>
    <?= $form->field($model,'num')?>
    <?= Html::submitButton('отправить',['class' => 'btn btn-primary'])?>
    <?php ActiveForm::end() ?>
<?php else:
echo 'посшел нахуй, незареганый!'; // todo изменить надпись

endif;

