<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_identitas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_pernikahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_masuk')->textInput() ?>

    <?= $form->field($model, 'file_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_bpjs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_cv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_ijazah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_transkrip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_karyawan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sisa_cuti')->textInput() ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_lokasi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
