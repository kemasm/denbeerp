<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cuti */

$this->title = 'View Cuti '.$model->id_cuti;
$this->params['breadcrumbs'][] = ['label' => 'Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['item'] = 'cuti';
?>
<div class="cuti-view">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id_cuti',
                //'nik',
                [
                'attribute' => 'karyawan',
                'value' => $model->karyawan->nama
                ],
                'tanggal_awal',
                'tanggal_akhir',
                'nik_penyetuju',
                'nik_admin',
                'keterangan',
                'state',
                'penolak',
            ],
            'options' => [
                'class' => 'table detail-view'
            ]
        ]) ?>
    </div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cuti], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cuti], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php
        if(Yii::$app->user->identity->jabatan == 'admin'||Yii::$app->user->identity->jabatan == 'manager'){
            echo Html::a('Approve', ['approve', 'id' => $model->id_cuti],['class' => 'btn btn-info']);    
        }
        ?>

        <?php
        if(Yii::$app->user->identity->jabatan == 'admin'||Yii::$app->user->identity->jabatan == 'manager'){
            echo Html::a('Disapprove', ['disapprove', 'id' => $model->id_cuti],['class' => 'btn btn-info']);
        }
        ?>
    </p>
</div>
