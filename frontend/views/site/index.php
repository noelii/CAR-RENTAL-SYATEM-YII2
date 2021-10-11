<?php

/* @var $this yii\web\View */
/* @var $model */

use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = 'Car Rental System';
?>
<div class="site-index bg-danger">
    <div class="body-content jumbotron">

        <div class="row">
            <?php foreach ($model as $model):?>
            <div class="col-lg-4 mb-2">
                <div class="card" style="height: 26rem;">

                <?php
                $login = \yii\helpers\Url::to('/site/login');
                $signup = \yii\helpers\Url::to('/site/signup');
                $rent = \yii\helpers\Url::toRoute('/site/rent');

                    echo '
                    <a href="'.Url::to('/rent/create/'.$model->id).'">
                    <img src="'.Yii::getAlias('@web/images/car'.$model->id.'.JPG').'" alt="" class="img-fluid card-img-top">
                    </a>
                    ';

                ?>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'car_name',
                            'car_price',
                        ],
                    ]) ?>
                </div>
                    <div class="card-footer">
                        <a href="<?=Url::to('/rent/create/'.$model->id) ?>" class="btn btn-block" style="background-color: #991506; color: white">RENT</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>

    </div>

</div>
