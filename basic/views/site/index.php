<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Controller;

$this->title = 'denbeerp';
?>

<div id="wrapper">
<!-- Sidebar -->
    <div class="sidebar">
        <div class="list-group">
            <div data-toggle="collapse" class="list-group-item" href="#general">GENERAL</div>
            <div id="general" class="list-group collapse sidebar-items">
                <?= Html::a('Hutang', ['hutang/index'],['class' => 'list-group-item']) ?>
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

    <!-- Content -->
    <div class="container">
        <div class="site-index">
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>