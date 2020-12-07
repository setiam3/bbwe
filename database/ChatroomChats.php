<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "chatroom_chats".
 *
 * @property int $id
 * @property int $group_id
 * @property int $created_by
 * @property string|null $created_at
 * @property string|null $message
 * @property int|null $is_attach
 * @property string|null $attach_type
 * @property int|null $to
 * @property string|null $updated_at
 * @property string|null $attachment
 *
 * @property Member $createdBy
 * @property ChatroomGroup $group
 */
class ChatroomChats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chatroom_chats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'created_by'], 'required'],
            [['group_id', 'created_by', 'is_attach', 'to'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['message'], 'string', 'max' => 500],
            [['attach_type'], 'string', 'max' => 45],
            [['attachment'], 'string', 'max' => 1000],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChatroomGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'message' => 'Message',
            'is_attach' => 'Is Attach',
            'attach_type' => 'Attach Type',
            'to' => 'To',
            'updated_at' => 'Updated At',
            'attachment' => 'Attachment',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Member::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(ChatroomGroup::className(), ['id' => 'group_id']);
    }
}
