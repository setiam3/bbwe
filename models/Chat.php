<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property int $id
 * @property string $name Idmember sender
 * @property string $ke idmember receiver 
 * @property string $message
 * @property string $file
 * @property string $date
 * @property string $avatar
 * @property string $type Public => rooms Privat => users 
 * @property int $nameidmember
 * @property int $keidmember
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'ke', 'message'], 'required'],
            [['message'], 'string'],
            [['date'], 'safe'],
            [['name', 'ke', 'file', 'avatar','nameidmember','keidmember'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'ke' => 'Ke',
            'message' => 'Message',
            'file' => 'File',
            'date' => 'Date',
            'avatar' => 'Avatar',
            'type' => 'Type',
            'nameidmember' => 'Nameidmember',
            'keidmember' => 'Keidmember',
        ];
    }
}
