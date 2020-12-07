<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_invited".
 *
 * @property int $id
 * @property string $datetime
 * @property int $idmember
 * @property string $email
 * @property string|null $referral
 * @property int|null $sent_email
 * @property int|null $status “ 0 is not join, 1 was join ”
 */
class MemberInvited extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_invited';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime', 'idmember', 'email'], 'required'],
            [['datetime'], 'safe'],
            [['idmember', 'sent_email', 'status'], 'integer'],
            [['email', 'referral'], 'string', 'max' => 255],
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
            'idmember' => 'Idmember',
            'email' => 'Email',
            'referral' => 'Referral',
            'sent_email' => 'Sent Email',
            'status' => 'Status',
        ];
    }
}
