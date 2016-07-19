<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hutang */

$this->title = 'View Hutang '.$model->no_penyetujuan;
$this->params['breadcrumbs'][] = ['label' => 'Hutang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['item'] = 'hutang';
?>
<div class="hutang-view">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'no_penyetujuan',
                'nik',
                'jumlah',
                'tanggal_pengajuan',
                'jaminan',
                'periode',
                'file_surat_perjanjian',
                'sisa_pokok',
                'sisa_bunga',
            ],
            'options' => [
                'class' => 'table detail-view'
            ]
        ]) ?>
    </div>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->no_penyetujuan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->no_penyetujuan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
