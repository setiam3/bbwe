<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\chatroom\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css',
        'css/chatroom/main.css',
    ];

    public $js = [
        'https://code.iconify.design/1/1.0.7/iconify.min.js',
        'js/chatroom/chatroom.js'
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
        // 'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
