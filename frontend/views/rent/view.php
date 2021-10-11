<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Rent */

\yii\web\YiiAsset::register($this);
?>
<div class="rent-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'user_id',
            'car_id',
            'name',
            'email:email',
            'order_at:datetime',
            'from_date:datetime',
            'to_date:datetime',
        ],
    ]) ?>

</div>
