<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
            'static/css/bootstrap.min.css?v=3.4.0',
            'static/font-awesome/css/font-awesome.css',
            'static/css/plugins/morris/morris-0.4.3.min.css',
            'static/js/plugins/gritter/jquery.gritter.css',
            'static/css/animate.css',
            'static/css/style.css?v=2.2.0',
            'css/login.css',

    
    ];
    public $js = [
//            "static/js/jquery-2.1.1.min.js", 加载jQuery  会报错  影响表单验证
            "static/js/bootstrap.min.js?v=3.4.0",
            "static/js/plugins/metisMenu/jquery.metisMenu.js",
            "static/js/plugins/slimscroll/jquery.slimscroll.min.js",
            "static/js/hplus.js?v=2.2.0",
            "static/js/plugins/pace/pace.min.js",

        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}



