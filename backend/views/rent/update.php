<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Rent */

$this->title = Yii::t('app', 'Car Rental System', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rent-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
