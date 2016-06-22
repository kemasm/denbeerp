<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

$this->title = 'Login';
?>
<div class="container">
    <!-- <div class="site-login">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal login-form'],
            'fieldConfig' => [
                'template' => "<div class=\"col-xs-10 col-xs-offset-1\">{input}</div>\n<div class=\"col-xs-1\"></div>\n<div class=\"col-xs-11 col-xs-offset-1\">{error}</div>",
                'labelOptions' => ['class' => 'col-xs-1 control-label'],
            ],
        ]); ?>
            
            <?= $form->field($model, 'nik')->textInput(['autofocus' => true, 'placeholder'=>'NIK']) ?>
            
            <?= $form->field($model, 'nama')->textInput(['placeholder'=>'Nama']) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password']) ?>

            <div class="form-group">
                <div class="col-xs-1"></div>
                <div class="col-xs-11">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
            
        <?php ActiveForm::end(); ?>

    </div> -->
    <div class="card"></div>
    <div class="card">
        <div class="titlehead">
            <h1 class="title"><?= Html::img('uploads/denbe/logo.png', ['width'=>'150px']);?></h1>
        </div>
        <div class="divider"></div>
        <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => [],
                'fieldConfig' => [
                    'template' => "      <div class=\"input-container no-border\">
            {input}\n
            <div class=\"bar\"></div>\n
            {error}
          </div>
    ",
                    'labelOptions' => ['class' => 'col-xs-1 control-label'],
                ],
            ]); ?>
            <?= $form->field($model, 'nik')->textInput(['autofocus' => true,'placeholder'=>'NIK']) ?>
            <?= $form->field($model, 'nama')->textInput(['placeholder'=>'Nama']) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password']) ?>
            <div class="button-container">
                <button><span>LOGIN</span></button>
            </div>
        <?php ActiveForm::end(); ?>
  </div>
</div>
<?php
$this->registerJsFile('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js');
$this->registerJsFile('@web/js/index.js');
?>