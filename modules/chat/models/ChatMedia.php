<?php

namespace app\modules\chat\models;

use Yii;

/**
 * This is the model class for table "chat_media".
 *
 * @property int $id
 * @property string $file_name
 * @property string $file_path
 * @property int $type 1 = Location; 2 = Image; 3 = Contact; 4 = Audio; 5 Document;
 * @property string $chat_id
 * @property int $room_id
 * @property int $status 0 = Deleted; 1 = Exist; 2 = Reported;
 * @property int $created_time
 * @property int $updated_by
 * @property int $updated_time
 */
class ChatMedia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_media';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('chat_db');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_name', 'file_path', 'type', 'chat_id', 'room_id', 'status', 'created_time', 'updated_by', 'updated_time'], 'required'],
            [['type', 'chat_id', 'room_id', 'status', 'created_time', 'updated_by', 'updated_time'], 'integer'],
            [['file_name', 'file_path'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_name' => 'File Name',
            'file_path' => 'File Path',
            'type' => 'Type',
            'chat_id' => 'Chat ID',
            'room_id' => 'Room ID',
            'status' => 'Status',
            'created_time' => 'Created Time',
            'updated_by' => 'Updated By',
            'updated_time' => 'Updated Time',
        ];
    }
}
