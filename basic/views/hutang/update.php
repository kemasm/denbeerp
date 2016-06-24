<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hutang */

$this->title = 'Update Hutang: ' . $model->no_penyetujuan;
$this->params['breadcrumbs'][] = ['label' => 'Hutangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_penyetujuan, 'url' => ['view', 'id' => $model->no_penyetujuan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hutang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
