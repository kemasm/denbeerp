<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HutangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hutang';
$this->params['breadcrumbs'][] = $this->title;
$this->params['item'] = 'hutang';
?>
<!-- Sidebar -->        
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
