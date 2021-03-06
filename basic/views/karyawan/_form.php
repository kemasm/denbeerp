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

    <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => 
                    "<div class=\"row\">
                        <div class=\"col-xs-3 form-label\">{label}</div>\n
                        <div class=\"col-xs-9\">{input}</div>\n
                        {error}
                    </div>",
            ],            
        ]); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->input('date', ['placeholder' => '01-01-2016', 'class' => "form-control date-field"]) ?> 

    <?= $form->field($model, 'no_identitas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['l' => 'laki-laki', 'p' => 'perempuan']) ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'status_pernikahan')->dropDownList(['k' => 'kawin', 'bk' => 'belum kawin']) ?> 

    <?= $form->field($model, 'tanggal_masuk')->input('date', ['placeholder' => '01-01-2016', 'class' => "form-control date-field"]) ?>

    <?= $form->field($model, 'ktp')->fileInput() ?>

    <?= $form->field($model, 'npwp')->fileInput() ?>

    <?= $form->field($model, 'bpjs')->fileInput() ?>

    <?= $form->field($model, 'cv')->fileInput() ?>

    <?= $form->field($model, 'ijazah')->fileInput() ?>

    <?= $form->field($model, 'transkrip')->fileInput() ?>

    <?= $form->field($model, 'status_karyawan')->dropDownList(['aktif' => 'aktif', 'cuti' => 'cuti', 'keluar' => 'keluar']) ?>

    <?= $form->field($model, 'sisa_cuti')->textInput() ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gaji')->textInput() ?>

    <?= $form->field($model, 'no_lokasi')->dropDownList($listLokasi) ?>

    <div class="form-group col-xs-offset-3 btn-create">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
