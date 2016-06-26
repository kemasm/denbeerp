<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cuti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container form-container">
    <div class="cuti-form">

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

        <?= $form->field($model, 'tanggal_awal')->input('date', ['class' => "form-control date-field"]) ?>

        <?= $form->field($model, 'tanggal_akhir')->input('date', ['class' => "form-control date-field"]) ?>

        <?= $form->field($model, 'keterangan')->textArea(['placeholder' => 'Keterangan', 'maxlength' => true, 'rows' => 3]) ?>

        <div class="form-group col-xs-offset-3 col-xs-9">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
