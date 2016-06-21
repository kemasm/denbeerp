<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/loginstyle.css',
    ];
    public $js = [
        'js/index.js',
        'http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js',
    ];
    public $depends = [
    ];
}
