<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "chatroom_group".
 *
 * @property int $id
 * @property string|null $group_name
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $created_by
 *
 * @property ChatroomChats[] $chatroomChats
 * @property Member $createdBy
 * @property ChatroomGroupHasMember[] $chatroomGroupHasMembers
 */
class ChatroomGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chatroom_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'required'],
            [['created_by'], 'integer'],
            [['group_name'], 'string', 'max' => 200],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_name' => 'Group Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[ChatroomChats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatroomChats()
    {
        return $this->hasMany(ChatroomChats::className(), ['group_id' => 'id']);
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
     * Gets query for [[ChatroomGroupHasMembers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatroomGroupHasMembers()
    {
        return $this->hasMany(ChatroomGroupHasMember::className(), ['group_id' => 'id']);
    }
}
