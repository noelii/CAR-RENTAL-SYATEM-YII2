<?php

/* @var $this yii\web\View */

$this->title = 'Car Rental System';
?>

<div class="row jumbotron">

    <div class="col-lg-4">
        <div class="card mb-3" style="width: 18rem;">
        <i class="fas fa-user fa-5x card-img-top text-center mt-2 text-primary"></i>
        <div class="card-body">
        <p class="text-center">Users</p>
            <p class="text-center"><?= $model1?></p>
        </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-3" style="width: 18rem;">
            <i class="fas fa-car fa-5x card-img-top text-center mt-2 text-warning"></i>
            <div class="card-body">
                <p class="text-center">Total Cars</p>
                <p class="text-center"><?= $model?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-3" style="width: 18rem;">
            <i class="fas fa-car fa-5x card-img-top text-center mt-2 text-success"></i>
            <div class="card-body">
                <p class="text-center">Available Cars</p>
                <p class="text-center"><?= $model2?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-3" style="width: 18rem;">
            <i class="fas fa-car fa-5x card-img-top text-center mt-2 text-danger"></i>
            <div class="card-body">
                <p class="text-center">Rented Cars</p>
                <p class="text-center"><?= $model3?></p>
            </div>
        </div>
    </div>
</div>


