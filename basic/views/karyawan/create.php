<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */

$this->title = 'Create Karyawan';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feature-menu">
    <div class="list-group">
        <?= Html::a('Karyawan', ['karyawan/index'], ['class' => 'list-group-item active']) ?>
        <a href="#" class="list-group-item">a</a>
        <a href="#" class="list-group-item">b</a>
        <a href="#" class="list-group-item">c</a>
    </div>
</div>
<div class="karyawan-create">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
