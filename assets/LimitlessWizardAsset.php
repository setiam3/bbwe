<?php
namespace app\assets;

use yii\web\AssetBundle;
//use app\assets\LimitlessLoginAsset;

/**
 * Login page asset bundle for Limitless theme based on Bootstrap 3
 */
class LimitlessWizardAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/limitless/assets';

    public $js = [
        'js/steps.min.js',
        'js/select2.min.js',
        'js/uniform.min.js',
        'js/jasny_bootstrap.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'app\assets\LimitlessLoginAsset'
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
