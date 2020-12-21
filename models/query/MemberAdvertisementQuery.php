<?php

namespace app\models\query;

use Yii;

/**
 * This is the ActiveQuery class for [[\app\database\MemberAdvertisement]].
 *
 * @see \app\database\MemberAdvertisement
 */
class MemberAdvertisementQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\database\MemberAdvertisement[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\database\MemberAdvertisement|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * with auth
     *
     * @return void
     */
    public function auth()
    {
        $user = Yii::$app->user->identity;
        return $this->where(['created_by' => $user->id]);
    }

    /**
     * scope by id
     *
     * @param [type] $id
     * @return void
     */
    public function id($id)
    {
        return $this->where(['id' => $id]);
    }

    /**
     * Is active
     *
     * @return void
     */
    public function active()
    {
        return $this->where(['ads_is_active' => 1]);
    }
}
