<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\database\MemberArticles]].
 *
 * @see \app\database\MemberArticles
 */
class MemberArticlesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\database\MemberArticles[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\database\MemberArticles|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function auth()
    {
        $user = \Yii::$app->user->identity;
        return $this->where(['created_by' => $user->id]);
    }

    public function id($id)
    {
        return $this->where(['id' => $id]);
    }
}
