<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluasi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="evaluasi-form">

	<?= ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'itemView' => 'allticket',
    ]) ?>

</div>
