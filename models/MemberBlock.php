<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_block".
 *
 * @property int $id
 * @property string $email1
 * @property string $email2
 * @property string $datetime
 * @property int $status
 */
class MemberBlock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_block';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email1', 'email2', 'datetime', 'status'], 'required'],
            [['datetime'], 'safe'],
            [['status'], 'integer'],
            [['email1', 'email2'], 'string', 'max' => 255],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email1' => 'Email1',
            'email2' => 'Email2',
            'datetime' => 'Datetime',
            'status' => 'Status',
        ];
    }
}
