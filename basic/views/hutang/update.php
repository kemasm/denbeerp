<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hutang */

$this->title = 'Update Hutang: ' . $model->no_penyetujuan;
$this->params['breadcrumbs'][] = ['label' => 'Hutang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View Hutang '.$model->no_penyetujuan, 'url' => ['view', 'id' => $model->no_penyetujuan]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['item'] = 'hutang';
?>
<div class="hutang-update">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
