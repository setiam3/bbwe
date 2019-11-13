<?php

namespace app\modules\chat\models;

use Yii;

/**
 * This is the model class for table "chat_room".
 *
 * @property int $id
 * @property string $room_name
 * @property string $room_logo
 * @property int $status 0 = Deleted; 1 = Active; 2 = Archived;
 * @property int $created_by
 * @property int $created_time
 * @property int $updated_by
 * @property int $updated_time
 */
class ChatRoom extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_ARCHIVED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_room';
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
            [['room_name', 'room_logo', 'created_by', 'created_time'], 'required'],
            [['status', 'created_by', 'created_time', 'updated_by', 'updated_time'], 'integer'],
            [['room_name'], 'string', 'max' => 48],
            [['room_logo'], 'string', 'max' => 96],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_name' => 'Room Name',
            'room_logo' => 'Room Logo',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_time' => 'Created Time',
            'updated_by' => 'Updated By',
            'updated_time' => 'Updated Time',
        ];
    }
}
