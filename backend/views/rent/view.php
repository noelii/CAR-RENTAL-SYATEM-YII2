<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Rent */

$this->title = Yii::t('app', 'Car Rental System');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="rent-view">

    <h1><?= Html::encode("Order Details") ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'car_id',
            'name',
            'email:email',
            'order_at',
            'from_date',
            'to_date',
        ],
    ]) ?>

</div>
