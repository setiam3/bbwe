<?php

namespace app\modules\chat\models;

use Yii;

/**
 * This is the model class for table "chat_room_member".
 *
 * @property int $id
 * @property int $room_id
 * @property int $member_id
 * @property int $type 0 = Member; 1 = Admin;
 * @property int $status 0 = Blocked; 1 = Exist; 2 = Left;
 * @property int $invited_by
 * @property int $join_time
 * @property int $updated_by
 * @property int $updated_time
 */
class ChatRoomMember extends \yii\db\ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_EXIST = 1;
    const STATUS_LEFT = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_room_member';
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
            [['room_id', 'member_id', 'invited_by', 'join_time'], 'required'],
            [['room_id', 'member_id', 'type', 'status', 'invited_by', 'join_time', 'updated_by', 'updated_time'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Room ID',
            'member_id' => 'Member ID',
            'type' => 'Type',
            'status' => 'Status',
            'invited_by' => 'Invited By',
            'join_time' => 'Join Time',
            'updated_by' => 'Updated By',
            'updated_time' => 'Updated Time',
        ];
    }

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getChatRoom() 
    { 
        return $this->hasOne(ChatRoom::className(), ['id' => 'room_id']); 
    }

    public static function getActiveRoomList()
    {
        $model = self::findAll(['member_id' => 5, 'status' => self::STATUS_EXIST]);

        return $model;
    }
}
