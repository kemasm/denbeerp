<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'tanggal_lahir') ?>

    <?= $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'no_identitas') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status_pernikahan') ?>

    <?php // echo $form->field($model, 'tanggal_masuk') ?>

    <?php // echo $form->field($model, 'file_ktp') ?>

    <?php // echo $form->field($model, 'file_npwp') ?>

    <?php // echo $form->field($model, 'file_bpjs') ?>

    <?php // echo $form->field($model, 'file_cv') ?>

    <?php // echo $form->field($model, 'file_ijazah') ?>

    <?php // echo $form->field($model, 'file_transkrip') ?>

    <?php // echo $form->field($model, 'status_karyawan') ?>

    <?php // echo $form->field($model, 'sisa_cuti') ?>

    <?php // echo $form->field($model, 'jabatan') ?>

    <?php // echo $form->field($model, 'gaji') ?>

    <?php // echo $form->field($model, 'no_lokasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
