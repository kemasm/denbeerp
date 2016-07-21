<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hutang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hutang-form">

    <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => [],
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

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager_nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penolak_nik')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
