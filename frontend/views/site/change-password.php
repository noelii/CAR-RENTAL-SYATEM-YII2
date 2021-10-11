<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Car Rental System';
?>
<div class="site-login jumbotron">
    <div class="offset-lg-3 col-lg-6 text-center">
        <h1><?= Html::encode("Change Password") ?></h1>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'currentPassword')->passwordInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'newPassword')->passwordInput() ?>

        <?= $form->field($model, 'repeatPassword')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Change Password', ['class' => 'btn btn-block', 'name' => 'login-button', 'style' => 'background-color: #991506; color: white']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

