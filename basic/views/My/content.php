<?php use yii\helpers\Html;

?>

<body>
<ul class="nav nav-pills">
    <li role="presentation" class="active"><?= Html::a("Главная", ['my/content']) ?></li>
    <li role="presentation" class="action"><?= Html::a("Оплата", ["my/pay"]) ?></li>
    <li role="presentation" class="active"> <?= Html::a("История", ['test/index']) ?> </li>
</ul>

<?php

if ($_COOKIE['bool']) :
    echo "<h1>Этот ресурс создан для создания квитанций по исходным данным </h1> <br>
<h2>Как это работает??</h2>
<b>Вы выбираете услугу (вода, свет, газ) и вводите данные с счетчика/водомера и нажимаете на кнопку созадть квитанцию<br>
Все данные осатьлные данные мы заполним сами.</b> <br>

Мы поддерживаем международный стандарт, по этому заплняем квитанции на английском языке <br>
это не предоставит неудобств так как всеровно ваши квитанции примит любой банк <font size='0.1'>(возможно)</font> 
"; ?>
    <br>

<div class="container" align="right">
    <div class="row p-3">
        <div class="col-12">
            <div class="toast shadow-lg" id='toast1' data-autohide="false">
                <div class="toast-header bg-secondary p-2">
                    <strong class="mr-auto text-light">пора заплатить</strong>
                    <button type="button" class="mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body p-2">
                   Как на счет заплатить
                </div>
            </div>
        </div>
    </div>
    <div class="row p-3 row2">
        <div class="col-12">
            <div class="toast shadow-lg mb-2" id='toast2'>
                <div class="toast-header bg-primary p-2">
                    <strong class="mr-auto text-light">Оплата в ожидании</strong>
                    <button type="button" class="mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body p-2">
                   пришло время оплаты
                </div>
            </div>
            <div class="toast shadow-lg mb-2" id='toast3'  data-autohide="false">
                <div class="toast-header bg-primary p-2">
                    <strong class="mr-auto text-light">го платить))</strong>
                    <button type="button" class="mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body p-2">
                   вы не лптили уже месяц
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(!($_COOKIE['paid'])):?>
<script>

        $('#toast2').toast({
            animation: true,
            autohide: true,
            delay: 5000
        })
        $('.toast').toast('show');

</script>
<?php endif; ?>
<?php else :
    $o=<<<HTML
<div onclick="location.href='http://plati/basic/web/'">перейти к авторизации</div>
HTML;

    echo 'Вы не зарегестрированы.<br>'; // todo изменить надпись
echo $o;

endif;
?>
