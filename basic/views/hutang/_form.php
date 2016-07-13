<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hutang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hutang-form">

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

    <?= $form->field($model, 'no_penyetujuan')->textInput() ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'tanggal_pengajuan')->textInput() ?>

    <?= $form->field($model, 'jaminan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periode')->textInput() ?>

    <?= $form->field($model, 'file_surat_perjanjian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sisa_pokok')->textInput() ?>

    <?= $form->field($model, 'sisa_bunga')->textInput() ?>

    <div class="form-group col-xs-offset-3 btn-create">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
