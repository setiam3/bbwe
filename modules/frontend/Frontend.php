<?php

namespace app\modules\frontend;
use yii\web;
/**
 * frontend module definition class
 */
class Frontend extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\frontend\controllers';
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // \Yii::$app->view->theme = new \yii\base\Theme([
        //     'pathMap' => ['@app/views' => '@app/themes/british'],
        //     'baseUrl' => '@web',
        // ]);
        \Yii::$app->set('errorHandler', [
            'class' => 'yii\web\ErrorHandler',
            'errorAction' => "//".$this->id . '/default/error',
        ]);
        // custom initialization code goes here
    }
}
