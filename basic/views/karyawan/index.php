<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Karyawan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nik',
            'nama',
            'password',
            'tanggal_lahir',
            'tempat_lahir',
            // 'no_identitas',
            // 'jenis_kelamin',
            // 'email:email',
            // 'status_pernikahan',
            // 'tanggal_masuk',
            // 'file_ktp',
            // 'file_npwp',
            // 'file_bpjs',
            // 'file_cv',
            // 'file_ijazah',
            // 'file_transkrip',
            // 'status_karyawan',
            // 'sisa_cuti',
            // 'jabatan',
            // 'gaji',
            // 'no_lokasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
