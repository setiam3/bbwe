<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Form asset bundle for Limitless theme based on Bootstrap 3
 */
class LimitlessFormAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/limitless/assets';

    public $js = [
        'js/select2.min.js',
        'js/uniform.min.js',
    ];
}
