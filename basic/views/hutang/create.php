<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hutang */

$this->title = 'Create Hutang';
$this->params['breadcrumbs'][] = ['label' => 'Hutangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hutang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
