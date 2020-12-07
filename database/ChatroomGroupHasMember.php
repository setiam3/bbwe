<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "chatroom_group_has_member".
 *
 * @property int $id
 * @property int $group_id
 * @property int $member_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Member $member
 * @property ChatroomGroup $group
 */
class ChatroomGroupHasMember extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chatroom_group_has_member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'member_id'], 'required'],
            [['group_id', 'member_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
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
            'member_id' => 'Member ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Member]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
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
