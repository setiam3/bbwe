<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_message".
 *
 * @property string $date_join
 * @property string $from_name
 * @property string $country_from
 * @property string $email_from
 * @property int $id
 * @property string $datetime
 * @property string $name
 * @property string $email
 * @property string $country
 * @property string $text_message
 * @property string $voice_message
 * @property string $idmember
 */
class MemberMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_join', 'from_name', 'country_from', 'email_from', 'datetime', 'name', 'email', 'country', 'text_message', 'idmember'], 'required'],
            [['date_join', 'datetime'], 'safe'],
            [['id'], 'integer'],
            [['text_message', 'voice_message'], 'string'],
            [['from_name', 'country_from', 'email_from', 'idmember'], 'string', 'max' => 45],
            [['name', 'email', 'country'], 'string', 'max' => 100],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'date_join' => 'Date Join',
            'from_name' => 'From Name',
            'country_from' => 'Country From',
            'email_from' => 'Email From',
            'id' => 'ID',
            'datetime' => 'Datetime',
            'name' => 'Name',
            'email' => 'Email',
            'country' => 'Country',
            'text_message' => 'Text Message',
            'voice_message' => 'Voice Message',
            'idmember' => 'Idmember',
        ];
    }
}
