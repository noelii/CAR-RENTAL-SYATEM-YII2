<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Car Rental System';
?>
<div class="site-login update-profile jumbotron">
    <div class="mt-2 offset-lg-2 col-lg-8">
        <h1><?= Html::encode("Update Profile") ?></h1>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'currentPassword')->passwordInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'newPassword')->passwordInput() ?>

        <?= $form->field($model, 'repeatPassword')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Change Password', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
