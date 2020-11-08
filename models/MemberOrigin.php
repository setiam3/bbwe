<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property string|null $datetime
 * @property string $country
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $profession
 * @property int|null $deactivated_account
 * @property string $username
 * @property string|null $referral
 * @property string|null $latest_login
 * @property string|null $auth_key
 * @property string|null $password_reset_token
 * @property string|null $photo
 * @property string|null $status Online or offline
 * @property string|null $skill
 * @property string|null $about
 * @property string|null $cv
 *
 * @property ChatroomChats[] $chatroomChats
 * @property ChatroomGroup[] $chatroomGroups
 * @property ChatroomGroupHasMember[] $chatroomGroupHasMembers
 */
class MemberOrigin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime', 'latest_login'], 'safe'],
            [['country', 'name', 'email', 'password', 'profession', 'username'], 'required'],
            [['deactivated_account'], 'integer'],
            [['auth_key', 'skill', 'about'], 'string'],
            [['country', 'name', 'email', 'password', 'profession', 'username', 'referral', 'password_reset_token', 'photo', 'cv'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 45],
            [['email'], 'unique'],
            [['username'], 'unique'],
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
            'country' => 'Country',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'profession' => 'Profession',
            'deactivated_account' => 'Deactivated Account',
            'username' => 'Username',
            'referral' => 'Referral',
            'latest_login' => 'Latest Login',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'photo' => 'Photo',
            'status' => 'Status',
            'skill' => 'Skill',
            'about' => 'About',
            'cv' => 'Cv',
        ];
    }

    /**
     * Gets query for [[ChatroomChats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatroomChats()
    {
        return $this->hasMany(ChatroomChats::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[ChatroomGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatroomGroups()
    {
        return $this->hasMany(ChatroomGroup::className(), ['created_by' => 'id']);
    }

    /**
     * Gets query for [[ChatroomGroupHasMembers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatroomGroupHasMembers()
    {
        return $this->hasMany(ChatroomGroupHasMember::className(), ['member_id' => 'id']);
    }
}
