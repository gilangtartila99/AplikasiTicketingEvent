<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluasi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="evaluasi-form">

	<h1 align="center"><b>Data Ticket</b></h1>

    <p>
        <?= Html::a('Cetak Ticket', ['cetakticket'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'nama_acara',
            'waktu_acara',
            'tempat_acara',
            'guest_star',
            'npm',
            'nama',
            'status',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>
