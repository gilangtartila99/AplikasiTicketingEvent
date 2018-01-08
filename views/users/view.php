<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userss */

?>
<div class="userss-view">

    <h1>Data <?= $model->nama ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            //'authKey',
            //'accessToken',
            'nama',
        ],
    ]) ?>

</div>
