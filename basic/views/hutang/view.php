<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hutang */

$this->title = 'View Hutang '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hutangs', 'url' => ['index']];
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
                'id',
                'status',
                'manager_nik',
                'admin_nik',
                'penolak_nik',
            ],
        ]) ?>
    </div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <?php
        if(Yii::$app->user->identity->jabatan == 'admin'||Yii::$app->user->identity->jabatan == 'manager' ||Yii::$app->user->identity->jabatan == 'hrd'){
            echo Html::a('Approve', ['approve', 'id' => $model->id],['class' => 'btn btn-info']);    
        }
        ?>

        <?php
        if(Yii::$app->user->identity->jabatan == 'admin'||Yii::$app->user->identity->jabatan == 'manager' ||Yii::$app->user->identity->jabatan == 'hrd'){
            echo Html::a('Disapprove', ['disapprove', 'id' => $model->id],['class' => 'btn btn-info']);
        }
        ?>
    </p>

</div>
