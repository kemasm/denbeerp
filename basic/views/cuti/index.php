<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Controller;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CutiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cutis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feature-menu">
    <div class="list-group">
        <?= Html::a('Hutang', ['hutang/index'], ['class' => 'list-group-item']) ?>
        <?= Html::a('Cuti', ['cuti/index'], ['class' => 'list-group-item active']) ?>
        <a href="#" class="list-group-item">Jadwal Libur</a>
        <a href="#" class="list-group-item">Slip Gaji</a>
    </div>
</div>
<div class="cuti-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cuti',
            'nik',
            'tanggal_awal',
            'tanggal_akhir',
            'nik_penyetuju',
            // 'keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        
    ]); ?>
    <p>
        <?= Html::a('Create Cuti', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
