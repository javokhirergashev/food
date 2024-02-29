<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/backend-files';
    public $css = [
        "img/favicon.png",
        "https://fonts.googleapis.com/icon?family=Material+Icons",
        "css/bootstrap.min.css",
        "plugins/fontawesome/css/fontawesome.min.css",
        "plugins/fontawesome/css/all.min.css",
        "css/select2.min.css",
        "css/bootstrap-datetimepicker.min.css",
        "plugins/feather/feather.css",
        "css/style.css",
        "css/error.css",

    ];
    public $js = [
        "js/bootstrap.bundle.min.js",
        "cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js",
        "js/feather.min.js",
        "js/jquery.slimscroll.js",
//        "js/select2.min.js",
        "plugins/moment/moment.min.js",
        "js/bootstrap-datetimepicker.min.js",
        "js/app.js",
        "js/modal.js",
//        "js/main.js",
//        "js/socket.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
