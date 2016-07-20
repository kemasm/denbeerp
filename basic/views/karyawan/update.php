<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */

$this->title = 'Update Karyawan: ' . $model->nik;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View Karyawan '.$model->nik, 'url' => ['view', 'id' => $model->nik]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['item']='karyawan';
?>
<div class="karyawan-update">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>    
    </div>

</div>
