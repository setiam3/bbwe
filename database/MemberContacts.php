<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_contacts".
 *
 * @property int $id
 * @property int $created_by
 * @property int $member_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Member $member
 * @property Member $createdBy
 */
class MemberContacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'member_id'], 'required'],
            [['created_by', 'member_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
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
            'created_by' => 'Created By',
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
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Member::className(), ['id' => 'created_by']);
    }
}
