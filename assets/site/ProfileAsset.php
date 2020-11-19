<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets\site;

use yii\web\AssetBundle;
use Yii;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ProfileAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site/profile.css'
    ];

    public $js = [
        'https://code.iconify.design/1/1.0.7/iconify.min.js',
        'js/app/profile/profile.js'
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
