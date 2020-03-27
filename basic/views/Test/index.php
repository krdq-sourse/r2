<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PublicOplataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'История оплат';
$this->params['breadcrumbs'][] = $this->title;
?>
<ul class="nav nav-pills">
    <li role="presentation" class="action"> <?= Html::a("Главная", ['my/content'])?> </li>
    <li role="presentation" class="action"> <?= Html::a("Оплата", ["my/pay"]) ?> </li>
    <li role="presentation" class="active"> <?= Html::a("История", ['test/index']) ?> </li>
</ul>
<br>
<div class="public-oplata-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-xs-4">
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

        </div>
    <div class="col-xs-8">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'email:ntext',
                'category:ntext',
                'sum',
                'time',

//
            ],
        ]); ?>
    </div>
</div>




    <?php Pjax::end(); ?>

</div>
