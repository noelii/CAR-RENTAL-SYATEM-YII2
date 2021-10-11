<?php
/** @var $model \common\models\Rent*/

use common\models\Rent;

?>
<div class="car">
    <?php echo Yii::$app->formatter->asRelativeTime($model->order_at)?>
</div>
