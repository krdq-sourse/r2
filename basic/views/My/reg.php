
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
echo "<br><br>";?>
<?php if(Yii::$app->session->hasFlash('already')): ?>
    <div class="alert alert-danger" role="alert">
        <!--        --><?php echo Yii::$app->session->getFlash('already'); ?><!-- -->
    </div>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('nice')): ?>
    <div class="alert alert-success" role="alert">
        <!--        --><?php echo Yii::$app->session->getFlash('nice'); ?><!-- -->
    </div>
<?php endif; ?>


<?php
$form = ActiveForm::begin(['options'=>['class'=>'form-inline','name'=>'FormName']]) ?>

<?= $form->field($model,'firstname') ?>
&nbsp;&nbsp;&nbsp;
<?= $form->field($model,'secondname') ?>

<br>
<?= $form->field($model,'address') ?>
<br>
<?= $form->field($model,'email')->input('email') ?>
    <br>
<?= $form->field($model,'pass')->label("Пароль")->passwordInput() ?>
<?//= $form->field($model,'text')->label("Ваше сообщение")->textarea(['rows'=>'7']) ?>
<br>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div class="g-recaptcha" data-sitekey="6LffxOEUAAAAAL5c3uYnIFyJ2gkPhyXNKkbS3FU-"></div>
    <br/>


<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>
<?= Html::submitButton('отправить',['class' => 'btn btn-primary'])?>
    <br>
<br>
<?= Html::button('К авторизации',['class'=>'btn btn-primary','onclick'=>'location.href="http://plati/basic/web/?r=my/"'])?>

<?php ActiveForm::end() ?>