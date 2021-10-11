<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Car */


\yii\web\YiiAsset::register($this);
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
//                        'from_date',
//                        'to_date',
                    ],
                ]) ?>
            </div>

    </div>
    </div>
            <div class="col-lg-6">
                <?php if (Yii::$app->user->isGuest) { ?>

                 <?php  $form = ActiveForm::begin(['method' =>'post']); ?>

                    <?= $form->field($model1, 'name')->textInput(['maxlength' => true]); ?>

                   <?=  $form->field($model1, 'email')->textInput(['maxlength' => true]); ?>

                    <?=       $form->field($model1, 'from_date')->widget(DatePicker::className(), [
                        // if you are using bootstrap, the following line will set the correct style of the input field
                        'options' => ['class' => 'form-control'],
                        // ... you can configure more DatePicker properties here
                    ]) ; ?>

                    <?= $form->field($model1, 'to_date')->widget(DatePicker::className(), [
                        // if you are using bootstrap, the following line will set the correct style of the input field
                        'options' => ['class' => 'form-control'],
                        // ... you can configure more DatePicker properties here
                    ]) ; ?>

                    <div class="form-group">
                   <?=  Html::submitButton(Yii::t('app', 'SUBMIT'), ['class' => 'btn btn-block btn-success']); ?></div>

                   <?php  ActiveForm::end(); ?>

              <?php  } else { ?>
                <?php $form = ActiveForm::begin(['method' =>'post']); ?>

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
                    <?= Html::submitButton(Yii::t('app', 'SUBMIT'), ['class' => 'btn btn-block btn-success']); ?>
                    </div>

                  <?php   ActiveForm::end(); ?>
               <?php } ?>
            </div>

</div>

