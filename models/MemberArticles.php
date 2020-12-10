<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

class MemberArticles extends \app\database\MemberArticles
{

    const PERMISSIONS_PRIVATE = 10;
    const PERMISSIONS_PUBLIC = 20;

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'article_title',
                'slugAttribute' => 'slug',
            ],
        ];
    }
}
