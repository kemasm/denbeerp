<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HutangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hutang';
$this->params['breadcrumbs'][] = $this->title;
$this->params['item'] = 'hutang';
?>
<div class="hutang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'no_penyetujuan',
            'id',
            'nik',
            'jumlah',
            'tanggal_pengajuan',
            //'jaminan',
            //'periode',
            // 'file_surat_perjanjian',
            'status',
            [
            'attribute' => 'manager',
            'value' => 'managerNik.nama'
            ],
            [
            'attribute' => 'admin',
            'value' => 'adminNik.nama'
            ],
            [
            'attribute' => 'penolak',
            'value' => 'penolakNik.nama'
            ],
            // 'manager_nik',
            // 'admin_nik',
            //'penolak_nik',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update}'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Create Hutang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
