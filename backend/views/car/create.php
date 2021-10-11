<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\back */

$this->title = Yii::t('app', 'Car Rental System');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jumbotron create-car text-center">

    <h1 cl><?= Html::encode('Upload New Vehicle') ?></h1>
    <i class="fas fa-upload fa-5x mb-3"'></i>
    <?php $form = \yii\bootstrap4\ActiveForm::begin(
        [
            'options' => ['enctype' => 'multipart/form-data']
        ]
    )?>

    <?php echo $form->errorSummary($model)?>

    <button class="btn btn-primary btn-file">Upload Cars
        <input type="file" id="carFile" name="car" >
    </button>
    <?php \yii\bootstrap4\ActiveForm::end()?>
</div>
