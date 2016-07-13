<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lokasi;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */
/* @var $form yii\widgets\ActiveForm */

$lokasis = Lokasi::find()->all();
$listLokasi = ArrayHelper::map($lokasis, 'no_lokasi', 'nama_lokasi');

?>

<div class="karyawan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'tanggal_lahir')->input('date', ['placeholder' => '01-01-2016', 'class' => "form-control date-field"]) ?> 

    <?= $form->field($model, 'no_identitas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['l' => 'laki-laki', 'p' => 'perempuan']) ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'status_pernikahan')->dropDownList(['k' => 'kawin', 'bk' => 'belum kawin']) ?> 

    <?= $form->field($model, 'tanggal_masuk')->input('date', ['placeholder' => '01-01-2016', 'class' => "form-control date-field"]) ?>

    <?= $form->field($model, 'ktp')->fileInput() ?>

    <?= $form->field($model, 'file_npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_bpjs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_cv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_ijazah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_transkrip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_karyawan')->dropDownList(['aktif' => 'aktif', 'cuti' => 'cuti', 'keluar' => 'keluar']) ?>

    <?= $form->field($model, 'sisa_cuti')->textInput() ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gaji')->textInput() ?>

    <?= $form->field($model, 'no_lokasi')->dropDownList($listLokasi) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
