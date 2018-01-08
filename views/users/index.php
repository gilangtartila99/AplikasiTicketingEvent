<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="userss-index">

    <h1>Data User</h1>

    <p>
        <?= Html::a('Buat User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'id',
            'username',
            'nama',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div>
