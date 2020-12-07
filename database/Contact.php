<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $datetime
 * @property string $name
 * @property string $email
 * @property string|null $country
 * @property string|null $text_message
 * @property string|null $voice_message
 * @property int|null $idmember
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime', 'name', 'email'], 'required'],
            [['datetime'], 'safe'],
            [['text_message', 'voice_message'], 'string'],
            [['idmember'], 'integer'],
            [['name', 'email', 'country'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
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
