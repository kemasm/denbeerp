<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal login-form'],
        'fieldConfig' => [
            'template' => "<div class=\"col-xs-3\"></div>\n<div class=\"col-xs-6\">{input}</div>\n<div class=\"col-xs-3\">{error}</div>",
            'labelOptions' => ['class' => 'col-xs-1 control-label'],
        ],
    ]); ?>
        <?= $form->field($model, 'nik')->textInput(['autofocus' => true, 'placeholder'=>'NIK']) ?>

        <?= $form->field($model, 'nama')->textInput(['placeholder'=>'Nama']) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password']) ?>

        <div class="form-group">
            <div class="col-xs-3"></div>
            <div class="col-xs-9">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
        
    <?php ActiveForm::end(); ?>
</div>
