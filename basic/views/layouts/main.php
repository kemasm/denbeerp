<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use kartik\sidenav\SideNav;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/uploads/denbe/logo-white.png', ['height' => 30]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            // ['label' => 'Home', 'url' => ['/site/index']],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    '<span class="fa fa-user"></span> Logout (' . Yii::$app->user->identity->nama . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
    <div class="sidebar">
        <?=SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'iconPrefix' => 'fa ',
                'items' => [
                    [
                        'label' => 'General',
                        'icon' => 'fa-tasks',
                        'items' => [
                            ['label' => 'Hutang', 'icon'=>'fa-info','url'=>Url::to(['hutang/index']),'active'=>($this->params['item'] == 'hutang')],
                            ['label' => 'Cuti', 'icon'=>'fa-phone','url'=>Url::to(['cuti/index']),'active'=>($this->params['item'] == 'cuti')],
                        ],
                    ],
                    [
                        'label' => 'HR',
                        'icon' => 'fa-user',
                        'items' => [
                            ['label' => 'Karyawan', 'icon'=>'fa-info','url'=>Url::to(['karyawan/index']),'active'=>($this->params['item'] == 'karyawan')],
                            ['label' => 'About', 'icon'=>'fa-info', 'url'=>'#'],
                            ['label' => 'Contact', 'icon'=>'fa-phone', 'url'=>'#'],
                        ],
                    ],
                    [
                        'label' => 'Procurement',
                        'icon' => 'fa-credit-card-alt',
                        'items' => [
                            ['label' => 'About', 'icon'=>'fa-info', 'url'=>'#'],
                            ['label' => 'Contact', 'icon'=>'fa-phone', 'url'=>'#'],
                        ],
                    ],
                    [
                        'label' => 'Marketing',
                        'icon' => 'fa-line-chart',
                        'items' => [
                            ['label' => 'About', 'icon'=>'fa-info', 'url'=>'#'],
                            ['label' => 'Contact', 'icon'=>'fa-phone', 'url'=>'#'],
                        ],
                    ],
                    [
                        'label' => 'Fixed Asset',
                        'icon' => 'fa-archive',
                        'items' => [
                            ['label' => 'About', 'icon'=>'fa-info', 'url'=>'#'],
                            ['label' => 'Contact', 'icon'=>'fa-phone', 'url'=>'#'],
                        ],
                    ],
                    [
                        'label' => 'GL',
                        'icon' => 'fa-book',
                        'items' => [
                            ['label' => 'About', 'icon'=>'fa-info', 'url'=>'#'],
                            ['label' => 'Contact', 'icon'=>'fa-phone', 'items' =>
                                [
                            ['label' => 'About', 'icon'=>'fa-info', 'url'=>'#'],
                                ]
                            ],
                        ],
                    ],
                ],
            ]);
         ?>    
    </div>
    <div class="content-wrapper">
        <div class="container">
            <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>
</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
 -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
