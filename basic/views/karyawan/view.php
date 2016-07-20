<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */

$this->title = 'View Karyawan '.$model->nik;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['item']='karyawan';
?>
<div class="karyawan-view">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nik',
                'nama',
                'password',
                'tanggal_lahir',
                'tempat_lahir',
                'no_identitas',
                'jenis_kelamin',
                'email:email',  
                'status_pernikahan',
                'tanggal_masuk',
                'file_ktp',
                'file_npwp',
                'file_bpjs',
                'file_cv',
                'file_ijazah',
                'file_transkrip',
                'status_karyawan',
                'sisa_cuti',
                'jabatan',
                'gaji',
                'no_lokasi',
            ],
            'options' => [
                'class' => 'table detail-view'
            ]
        ]) ?>
    </div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nik], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nik], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
