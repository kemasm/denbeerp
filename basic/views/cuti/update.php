<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cuti */

$this->title = 'Update Cuti ' . $model->id_cuti;
$this->params['breadcrumbs'][] = ['label' => 'Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View Cuti '.$model->id_cuti, 'url' => ['view', 'id' => $model->id_cuti]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feature-menu">
    <div class="list-group">
        <?= Html::a('Hutang', ['hutang/index'], ['class' => 'list-group-item']) ?>
        <?= Html::a('Cuti', ['cuti/index'], ['class' => 'list-group-item active']) ?>
        <a href="#" class="list-group-item">Jadwal Libur</a>
        <a href="#" class="list-group-item">Slip Gaji</a>
    </div>
</div>
<div class="cuti-update">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
