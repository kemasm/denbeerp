<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cuti */

$this->title = 'Update Cuti ' . $model->id_cuti;
$this->params['breadcrumbs'][] = ['label' => 'Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View Cuti '.$model->id_cuti, 'url' => ['view', 'id' => $model->id_cuti]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['item'] = 'cuti';
?>
<div class="cuti-update">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
