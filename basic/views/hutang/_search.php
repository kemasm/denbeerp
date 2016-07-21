<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HutangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hutang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'no_penyetujuan') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'tanggal_pengajuan') ?>

    <?= $form->field($model, 'jaminan') ?>

    <?php // echo $form->field($model, 'periode') ?>

    <?php // echo $form->field($model, 'file_surat_perjanjian') ?>

    <?php // echo $form->field($model, 'id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'manager_nik') ?>

    <?php // echo $form->field($model, 'admin_nik') ?>

    <?php // echo $form->field($model, 'penolak_nik') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
