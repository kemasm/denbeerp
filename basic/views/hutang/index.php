<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HutangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hutang';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Sidebar -->
<div class="sidebar">
    <div class="list-group">
        <div data-toggle="collapse" class="list-group-item" href="#general">GENERAL</div>
        <div id="general" class="list-group collapse in sidebar-items">
            <?= Html::a('Hutang', ['hutang/index'],['class' => 'list-group-item active']) ?>
            <?= Html::a('Cuti', ['cuti/index'], ['class' => 'list-group-item']) ?>
            <div class="list-group-item">Jadwal Libur</div>
            <div class="list-group-item">Slip Gaji</div>
        </div>
        <div data-toggle="collapse" class="list-group-item" href="#hr">HR</div>
        <div id="hr" class="list-group collapse sidebar-items">
            <?= Html::a('Karyawan', ['karyawan/index'],['class' => 'list-group-item']) ?>
            <div class="list-group-item">Dapibus ac facilisis in</div>
            <div class="list-group-item">Morbi leo risus</div>
            <div class="list-group-item">Porta ac consectetur ac</div>
            <div class="list-group-item">Vestibulum at eros</div>
        </div>
        <div data-toggle="collapse" class="list-group-item" href="#procurement">PROCUREMENT</div>
        <div id="procurement" class="list-group collapse sidebar-items">
            <div class="list-group-item">Cras justo odio</div>
            <div class="list-group-item">Dapibus ac facilisis in</div>
            <div class="list-group-item">Morbi leo risus</div>
            <div class="list-group-item">Porta ac consectetur ac</div>
            <div class="list-group-item">Vestibulum at eros</div>
        </div>
        <div data-toggle="collapse" class="list-group-item" href="#marketing">MARKETING</div>
        <div id="marketing" class="list-group collapse sidebar-items">
            <div class="list-group-item">Cras justo odio</div>
            <div class="list-group-item">Dapibus ac facilisis in</div>
            <div class="list-group-item">Morbi leo risus</div>
            <div class="list-group-item">Porta ac consectetur ac</div>
            <div class="list-group-item">Vestibulum at eros</div>
        </div>
        <div data-toggle="collapse" class="list-group-item" href="#fixed-asset">FIXED ASSET</div>
        <div id="fixed-asset" class="list-group collapse sidebar-items">
            <div class="list-group-item">Cras justo odio</div>
            <div class="list-group-item">Dapibus ac facilisis in</div>
            <div class="list-group-item">Morbi leo risus</div>
            <div class="list-group-item">Porta ac consectetur ac</div>
            <div class="list-group-item">Vestibulum at eros</div>
        </div>
        <div data-toggle="collapse" class="list-group-item" href="#gl">GL</div>
        <div id="gl" class="list-group collapse sidebar-items">
            <div class="list-group-item">Cras justo odio</div>
            <div class="list-group-item">Dapibus ac facilisis in</div>
            <div class="list-group-item">Morbi leo risus</div>
            <div class="list-group-item">Porta ac consectetur ac</div>
            <div class="list-group-item">Vestibulum at eros</div>
        </div>
    </div>
</div>
        
<div class="hutang-index">
    <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
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
