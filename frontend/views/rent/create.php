<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Rent */

//$this->title = Yii::t('app', 'Create Rent');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rents'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">

    <div class="col-lg-6">
        <div class="card">
            <img src="<?php echo $model->getCarLink()?>" class="img-fluid card-img-top">
            <div class="card-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
//            'id',
                        'car_model',
                        'car_name',
                        'car_type',
                        'car_price',
//                        'car_status',
//                        'from_date:datetime',
//                        'to_date:datetime',
                    ],
                ]) ?>
            </div>

        </div>
    </div>

    <div class="col-lg-6">
    <h1><?= Html::encode('Enter Your Details') ?></h1>

    <?= $this->render('_form', [
        'model1' => $model1,
    ]) ?>
    </div>
</div>

