<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hutang */

$this->title = 'Create Hutang';
$this->params['breadcrumbs'][] = ['label' => 'Hutang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feature-menu">
    <div class="list-group">
        <?= Html::a('Hutang', ['hutang/index'], ['class' => 'list-group-item active']) ?>
        <?= Html::a('Cuti', ['cuti/index'], ['class' => 'list-group-item']) ?>
        <a href="#" class="list-group-item">Jadwal Libur</a>
        <a href="#" class="list-group-item">Slip Gaji</a>
    </div>
</div>

<div class="hutang-create">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
