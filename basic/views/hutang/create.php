<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hutang */

$this->title = 'Create Hutang';
$this->params['breadcrumbs'][] = ['label' => 'Hutang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
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

<div class="hutang-create">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
