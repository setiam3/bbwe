<?php

namespace app\modules\chat\models;

use app\models\Member;
use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property string $id
 * @property int $room_id
 * @property string $message
 * @property int $status 0 = Deleted; 1 = Exist; 2 = Reported;
 * @property int $has_media 0 = No; 1 = Yes;
 * @property int $sent_by
 * @property int $sent_time
 * @property int $updated_by
 * @property int $updated_time
 */
class Chat extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_EXIST = 1;
    const STATUS_REPORTED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
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
            [['room_id', 'message', 'sent_by', 'sent_time'], 'required'],
            [['room_id', 'status', 'has_media', 'sent_by', 'sent_time', 'updated_by', 'updated_time'], 'integer'],
            [['message'], 'string'],
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
            'message' => 'Message',
            'status' => 'Status',
            'has_media' => 'Has Media',
            'sent_by' => 'Sent By',
            'sent_time' => 'Sent Time',
            'updated_by' => 'Updated By',
            'updated_time' => 'Updated Time',
        ];
    }
    
    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getSender() 
    { 
        return $this->hasOne(Member::className(), ['id' => 'sent_by']); 
    }
    
    public static function getActiveChatList()
    {
        $sql = 'SELECT * FROM (
                SELECT m.name, c.message, FROM_UNIXTIME(c.sent_time) as `sent_time`
                FROM bbwe_chat.chat c
                JOIN selina.member m ON (c.sent_by = m.id)
                WHERE c.room_id = 2 AND c.status = 1
                ORDER BY c.sent_time DESC LIMIT 15
            ) AS `sub`
            ORDER BY sent_time ASC';
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}
