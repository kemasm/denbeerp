<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feature-menu">
    <div class="list-group">
        <?= Html::a('Karyawan', ['karyawan/index'], ['class' => 'list-group-item active']) ?>
        <a href="#" class="list-group-item">a</a>
        <a href="#" class="list-group-item">b</a>
        <a href="#" class="list-group-item">c</a>
    </div>
</div>
<div class="karyawan-index">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn'],

                // 'nik',
                'nama',
                //'password',
                // 'tanggal_lahir',
                //'tempat_lahir',
                // 'no_identitas',
                'jenis_kelamin',
                'email:email',
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
                'jabatan',
                // 'gaji',
                'no_lokasi',

                ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}']
            ],
                'tableOptions' => [
                    'class' => 'table'
            ]
        ]); ?>        
    </div>
    <p>
        <?= Html::a('Create Karyawan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
