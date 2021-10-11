<?php
 /** @var $model \common\models\Car*/

use common\models\Car;

?>
<div class="car">
    <img src="<?php echo $model->getCarLink()?>" class="img-fluid">
</div>
