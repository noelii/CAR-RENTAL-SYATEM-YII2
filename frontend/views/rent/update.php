<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Rent */

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
                            'user_id',
                            'car_id',
                            'name',
                            'email:email',
                            'order_at:datetime',
                            'from_date:datetime',
                            'to_date:datetime',
                        ],
                    ]) ?>
                </div>
            </div>
    </div>

    <div class="col-lg-6">
        <h1>Upload Payslip</h1>
        <?php $form = ActiveForm::begin(
            [
                'options' => ['enctype' => 'multipart/form-data']
            ]
        ); ?>

        <div style="display: none">
            <?= $form->field($model, 'approve_order')->textInput(['maxlength' => true, 'value' => 'Confirmed']) ?>

            <?= $form->field($model, 'uploaded_payslip')->textInput(['maxlength' => true, 'value' => 'uploaded']) ?>
        </div>

        <?php echo $form->errorSummary($model)?>

        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="payslip" name="payslip">
                <label class="custom-file-label" for="payslip">Choose file</label>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Upload'), ['class' => 'btn', 'style' => 'background-color: #991506; color: white']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
