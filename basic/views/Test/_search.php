<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\date\DatePickerAsset;




/* @var $this yii\web\View */
/* @var $model app\models\PublicOplataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="public-oplata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<!--      //  --><?//= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

<!--    --><?//= $form->field($model, 'email') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'min_sum') ?>
    <?= $form->field($model, 'max_sum') ?>

    <?php echo $this->render('_picker');?>


<!--    --><?//= $form->field($model, 'time') ?>
    <?= $form->field($model, 'first_date') ?>
    <?= $form->field($model, 'second_date') ?>



    <?php ActiveForm::end(); ?>

</div>
