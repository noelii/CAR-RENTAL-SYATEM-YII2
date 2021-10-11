<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model1 common\models\Rent */
/* @var $model common\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rent-form">

    <?php if (Yii::$app->user->isGuest) { ?>
        <?php $form = ActiveForm::begin(); ?>

        <div style="display: none">


        <?= $form->field($model1, 'car_id')->textInput(['maxlength' => true, 'value'=>\Yii::$app->request->getQueryParam('id')]) ?>

        </div>
        <?= $form->field($model1, 'name')->textInput(['maxlength' => true,]) ?>

        <?= $form->field($model1, 'email')->textInput(['maxlength' => true,]) ?>

    <div style="display: none">

        <?= $form->field($model1, 'order_at')->textInput(['value'=>time()]) ?>

    </div>

        <?=  $form->field($model1, 'from_date')->widget(DatePicker::className(), [
            // if you are using bootstrap, the following line will set the correct style of the input field
            'options' => ['class' => 'form-control'],
            // ... you can configure more DatePicker properties here
        ]) ; ?>

        <?=  $form->field($model1, 'to_date')->widget(DatePicker::className(), [
            // if you are using bootstrap, the following line will set the correct style of the input field
            'options' => ['class' => 'form-control'],
            // ... you can configure more DatePicker properties here
        ]) ; ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Rent'), ['class' => 'btn btn-block', 'style' => 'background-color: #991506; color: white']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    <?php } else { ?>
    <?php $form = ActiveForm::begin(); ?>
        <div style="display: none">

    <?= $form->field($model1, 'user_id')->textInput(['value'=>\Yii::$app->user->id]) ?>

    <?= $form->field($model1, 'car_id')->textInput(['maxlength' => true,'value'=>\Yii::$app->request->getQueryParam('id')]) ?>

    <?= $form->field($model1, 'name')->textInput(['maxlength' => true, 'value'=>\Yii::$app->user->identity->username]) ?>

    <?= $form->field($model1, 'email')->textInput(['maxlength' => true, 'value'=>\Yii::$app->user->identity->email]) ?>

    <?= $form->field($model1, 'order_at')->textInput(['value'=>time()]) ?>

        </div>

        <?=  $form->field($model1, 'from_date')->widget(DatePicker::className(), [
            // if you are using bootstrap, the following line will set the correct style of the input field
            'options' => ['class' => 'form-control'],
            // ... you can configure more DatePicker properties here
        ]) ; ?>

        <?=  $form->field($model1, 'to_date')->widget(DatePicker::className(), [
            // if you are using bootstrap, the following line will set the correct style of the input field
            'options' => ['class' => 'form-control'],
            // ... you can configure more DatePicker properties here
        ]) ; ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Rent'), ['class' => 'btn btn-block', 'style' => 'background-color: #991506; color: white']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php } ?>



</div>
