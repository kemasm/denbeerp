<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hutang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hutang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_penyetujuan')->textInput() ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'tanggal_pengajuan')->textInput() ?>

    <?= $form->field($model, 'jaminan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periode')->textInput() ?>

    <?= $form->field($model, 'file_surat_perjanjian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sisa_pokok')->textInput() ?>

    <?= $form->field($model, 'sisa_bunga')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
