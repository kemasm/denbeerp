<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HutangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hutangs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hutang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hutang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
    ]); ?>
</div>
