<?php

/* @var $this yii\web\View */
/** @var $model \common\models\Rent*/

use yii\helpers\Url;
use common\models\Rent;

$this->title = 'Car Rental System';
?>



    <div class="body-content">
        <h2>RENTING HISTORY</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Order At</th>
                    <th scope="col">From Date</th>
                    <th scope="col">To Date</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($model as $car):?>
                <tr>
                    <td><a href="<?=Url::to('/rent/view/'.$car->id)?>"><?php echo \Yii::$app->formatter->asRelativeTime($car->order_at)?></a></td>
                    <td><a href="<?=Url::to('/rent/view/'.$car->id)?>"><?php echo \Yii::$app->formatter->asDate($car->from_date)?></a></td>
                    <td><a href="<?=Url::to('/rent/view/'.$car->id)?>"><?php echo \Yii::$app->formatter->asDate($car->to_date)?></a></td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
    </div>


