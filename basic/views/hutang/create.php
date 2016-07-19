<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hutang */

$this->title = 'Create Hutang';
$this->params['breadcrumbs'][] = ['label' => 'Hutang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['item'] = 'hutang';
?>
<div class="hutang-create">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
