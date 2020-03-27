<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PublicOplata */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Public Oplatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="public-oplata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'email:ntext',
            'category:ntext',
            'sum',
            'time',
        ],
    ]) ?>

</div>
