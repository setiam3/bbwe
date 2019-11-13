<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Login page asset bundle for Limitless theme based on Bootstrap 3
 */
class LimitlessLoginAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/limitless/assets';

    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
        'css/icomoon-styles.css',
        'css/bootstrap.css',
        'css/colors.min.css',
        'css/core.css',
        'css/components.css',
        'font-awesome/css/font-awesome.min.css',
        'css/chat.css'
    ];

    public $js = [
        'js/pace.min.js',
        'js/bootstrap.min.js',
        'js/blockui.min.js',
        'js/app.js'
    ];
}
