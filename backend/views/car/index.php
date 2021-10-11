<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Car Rental System');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <h1><?= Html::encode('Vehicles List') ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            [
                'attribute'=> 'Image',
                'content'=> function($model){
                    return $this->render('_images', ['model'=>$model]);
                },
            ],
            'id',
            'car_model',
            'car_name',
            'car_type',
            'car_price',
            'car_status',
//            'from_date:datetime',
//            'to_date:datetime',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Actions'],
        ],
    ]); ?>


</div>
