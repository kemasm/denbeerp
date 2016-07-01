<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HutangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hutang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feature-menu">
    <div class="list-group">
        <?= Html::a('Hutang', ['hutang/index'], ['class' => 'list-group-item active']) ?>
        <?= Html::a('Cuti', ['cuti/index'], ['class' => 'list-group-item']) ?>
        <a href="#" class="list-group-item">Jadwal Libur</a>
        <a href="#" class="list-group-item">Slip Gaji</a>
    </div>
</div>

<div class="hutang-index">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn'],

                'no_penyetujuan',
                'nik',
                'jumlah',
                'tanggal_pengajuan',
                'jaminan',
                // 'periode',
                // 'file_surat_perjanjian',
                // 'sisa_pokok',
                // 'sisa_bunga',

                ['class' => 'yii\grid\ActionColumn'],
            ],
            'tableOptions' => [
                'class' => 'table'
            ]
        ]); ?>
    </div>
    <p>
        <?= Html::a('Create Hutang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
