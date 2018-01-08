<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
.lebar {
    margin-left: 25%;
    margin-right: 25%;
    width: 50%;
    color: #FFFFFF;
    background-color: #343333;
    border-style: solid;
    border-width: 7px;
    border-color: #AF1111;
    opacity: 0.9;
}
.form {
    width: 80%;
}
@media(max-width:767px) {
    .lebar {
        margin-left: 1%;
        margin-right: 1%;
        width: 100%;
    }
}
</style>
<div class="site-login lebar img-thumbnail" align="center">
<center>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>
    <div class="form">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </div>
        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-danger', 'name' => 'login-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</center>
</div>
