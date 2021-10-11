<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Car Rental System');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-index">

    <h1><?= Html::encode("Manage Orders") ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=> 'id',
                'content'=> function($model){
                    return $this->render('_images', ['model'=>$model]);
                },
            ],
            'user_id',
            'car_id',
            'name',
            'email:email',
            'order_at:datetime',
            [
                'attribute'=> 'Time',
                'content'=> function($model){
                    return $this->render('_time', ['model'=>$model]);
                },
            ],
            'from_date:datetime',
            'to_date:datetime',

//            [
//                'class' => 'yii\grid\ActionColumn',
//                'header'=>'View Order',
//                'visibleButtons' => [
//                    'update' => Yii::$app->user->can('update'),
//                ],
//            ],
            [
                'attribute'=> 'Confirm/Cancel Order',
                'content'=> function($model){
                    return $this->render('confirm', ['model'=>$model]);
                },
            ],
        ],
    ]); ?>

</div>

