<?php
namespace app\assets;

use app\assets\LimitlessLoginAsset;

/**
 * Main page asset bundle for Limitless theme based on Bootstrap 3
 */
class LimitlessMainAsset extends LimitlessLoginAsset
{
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
