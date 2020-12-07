<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property string $id
 * @property int|null $expire
 * @property resource|null $data
 * @property int|null $idmember
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['expire', 'idmember'], 'integer'],
            [['data'], 'string'],
            [['id'], 'string', 'max' => 40],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'expire' => 'Expire',
            'data' => 'Data',
            'idmember' => 'Idmember',
        ];
    }
}
