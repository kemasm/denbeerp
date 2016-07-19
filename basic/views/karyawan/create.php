<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */

$this->title = 'Create Karyawan';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['item']='karyawan';
?>
<div class="karyawan-create">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
