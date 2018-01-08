<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Userss */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userss-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Buat User' : 'Ganti Password', ['class' => $model->isNewRecord ? 'btn btn-danger' : 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
