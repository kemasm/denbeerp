<?php
use yii\helpers\Url; 
/* @var $this yii\web\View */
?>
<h1>karyawan/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<div class="container menu">
    <div class="row">
        <div class="col-xs-12 menubox">Example</div>
    </div>
    <div class="row">
        <div class="col-xs-3 menubox">
        <a href="<?=Url::to(['site/contact'])?>"><span class="mega-octicon octicon-book"></span></a>
        <p>Contact</p>
        </div>
        <div class="col-xs-3 menubox">b</div>
        <div class="col-xs-3 menubox">c</div>
        <div class="col-xs-3 menubox">d</div>
    </div>
    <div class="row">
        <div class="col-xs-3 menubox">a</div>
        <div class="col-xs-3 menubox">b</div>
        <div class="col-xs-3 menubox">c</div>
        <div class="col-xs-3 menubox">d</div>        
    </div>
</div>