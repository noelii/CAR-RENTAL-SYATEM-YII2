<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Car */

$this->title = Yii::t('app', 'Car Rental System');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->car_name;
\yii\web\YiiAsset::register($this);
?>
<div class="car-view">

    <h1><?= Html::encode($model->car_name) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-lg-6">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'car_model',
            'car_name',
            'car_type',
            'car_price',
            'car_status',
//            'from_date:datetime',
//            'to_date:datetime',
        ],
    ]) ?>
        </div>
        <div class="col-lg-6">
                <img src="<?php echo $model->getCarLink()?>" class="img-fluid">
        </div>

        </div>
</div>
