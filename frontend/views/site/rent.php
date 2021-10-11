<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\RentFrom*/

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Car Rental System';
?>
<div class="site-login jumbotron">
    <div class="offset-lg-3 col-lg-6 text-center">
        <h1><?= Html::encode("Change Password") ?></h1>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email')->textInput() ?>

        <?= $form->field($model, 'from_date')->textInput() ?>

        <?= $form->field($model, 'to_date')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>


