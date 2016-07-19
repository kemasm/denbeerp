
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Controller;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CutiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuti';
$this->params['breadcrumbs'][] = $this->title;
//dd(Yii::$app->user->identity->nama);
?>
<div class="feature-menu">
    <div class="list-group">
        <?= Html::a('Hutang', ['hutang/index'], ['class' => 'list-group-item']) ?>
        <?= Html::a('Cuti', ['cuti/index'], ['class' => 'list-group-item active']) ?>
        <a href="#" class="list-group-item">Jadwal Libur</a>
        <a href="#" class="list-group-item">Slip Gaji</a>
    </div>
</div>
<div class="cuti-index">
    <div class="box">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'id_cuti', 
                //'nik', 
                [
                'attribute' => 'karyawan',
                'value' => 'karyawan.nama'
                ],
                'tanggal_awal',
                'tanggal_akhir',
                //'nik_penyetuju', 
                [
                'attribute' => 'penyetuju',
                'value' => 'penyetuju.nama'
                ],
                // 'keterangan',
                [
                'attribute' => 'admin',
                'value' => 'admin.nama'
                ],
                'status',
                ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}'],
            ],
            'tableOptions' => [
                'class' => 'table'
            ]
            
        ]); ?>
    </div>
    <p>
        <?= Html::a('Create Cuti', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
    $("input[type=checkbox]:checked").each(function() {
        $(this).parents("tr").addClass('selected');
    });
    $("input[type=checkbox]").live("change", function() {
        $(this).parents("tr").toggleClass('selected');
    });
</script>