<?php

/* @var $this yii\web\View */
use yii\web\View;

$this->title = 'denbeerp';
?>

<div id="wrapper">
<!-- Sidebars -->
<!-- General -->
    <div class="sidebar" id="sidebar-general">
        <ul class="list-group">
            <li class="list-group-item">GENERAL</li>
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
    <!-- HR -->
    <div class="sidebar" id="sidebar-hr">
        <ul class="list-group">
            <li class="list-group-item">HR</li>
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
    <!-- Procurement -->
    <div class="sidebar" id="sidebar-procurement">
        <ul class="list-group">
            <li class="list-group-item">PROCUREMENT</li>
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
    <!-- Marketing -->
    <div class="sidebar" id="sidebar-marketing">
        <ul class="list-group">
            <li class="list-group-item">MARKETING</li>
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
    <!-- Fixed Asset -->
    <div class="sidebar" id="sidebar-fixedasset">
        <ul class="list-group">
            <li class="list-group-item">FIXEDASSET</li>
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
    <!-- GL -->
    <div class="sidebar" id="sidebar-gl">
        <ul class="list-group">
            <li class="list-group-item">GL</li>
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="site-index">
            <div class="col-xs-2">
                <a id="general-toggle" href="#">
                    <div class="module">
                            <div class="module-icon"><span class="fa fa-tasks fa-3x"></span></div>
                            <div class="module-text">General</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-2">
                <a id="hr-toggle" href="#">
                    <div class="module">
                        <div class="module-icon"><span class="fa fa-user fa-3x"></span></div>
                        <div class="module-text">HR</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-2"> 
                <a id="procurement-toggle" href="#">
                    <div class="module">
                        <div class="module-icon"><span class="fa fa-credit-card-alt fa-3x"></span></div>
                        <div class="module-text">Procurement</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-2">
                <a id="marketing-toggle" href="#">
                    <div class="module">
                        <div class="module-icon"><span class="fa fa-line-chart fa-3x"></span></div>
                        <div class="module-text">Marketing</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-2">
                <a id="fixed-asset-toggle" href="#">
                    <div class="module">
                        <div class="module-icon"><span class="fa fa-archive fa-3x"></span></div>
                        <div class="module-text">Fixed Asset</div>
                    </div>
                </a>
            </div>
            <div class="col-xs-2">
                <a id="gl-toggle" href="#">
                    <div class="module">
                        <div class="module-icon"><span class="fa fa-book fa-3x"></span></div>
                        <div class="module-text">GL</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
    $("#general-toggle").click(function(e){
        e.preventDefault();
        $("#wrapper").toggleClass("displayed-sidebar");
    });
</script>