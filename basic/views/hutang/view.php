<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hutang */

$this->title = $model->no_penyetujuan;
$this->params['breadcrumbs'][] = ['label' => 'Hutangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hutang-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
    ]) ?>

</div>
