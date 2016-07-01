<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cuti */

$this->title = 'Create Cuti';
$this->params['breadcrumbs'][] = ['label' => 'Cuti', 'url' => ['index']];
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
<div class="cuti-create">
    <div class="box">
        <h1 class="header-text"><?= Html::encode($this->title) ?></h1>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>