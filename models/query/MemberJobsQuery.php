<?php

namespace app\models\query;

use Yii;

/**
 * This is the ActiveQuery class for [[\app\database\MemberJobs]].
 *
 * @see \app\database\MemberJobs
 */
class MemberJobsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\database\MemberJobs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\database\MemberJobs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function auth()
    {
        $user = Yii::$app->user->identity;
        return $this->where(['created_by' => $user->id]);
    }
}
