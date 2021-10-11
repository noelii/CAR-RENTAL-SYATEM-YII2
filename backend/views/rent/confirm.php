<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Rent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="">

    <div class="form-group">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Confirm
        </button>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <a href="<?= Url::toRoute('/car/update/'.$model->car_id)?>" class="form-group">
        <button type="button" class="btn btn-secondary">
            Cancel
        </button>
    </a>

    <?php ActiveForm::end(); ?>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are You Sure You Want To Confirm Order?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
            </div>
        </div>
    </div>
</div>

