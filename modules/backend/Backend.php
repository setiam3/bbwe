<?php

namespace app\modules\backend;

/**
 * backend module definition class
 */
class Backend extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\backend\controllers';
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        \Yii::$app->errorHandler->errorAction = 'backend/default/error';
        // custom initialization code goes here
    }
}
