<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_activity".
 *
 * @property int $id
 * @property int $idmember
 * @property int $activity
 * @property int $inactivity
 * @property int $reported_abuse
 * @property int $daily
 * @property int $weekly
 * @property int $monthly
 * @property int $increase
 * @property int $decrease
 * @property string $date_activity
 *
 * @property Member $member
 */
class MemberActivity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmember'], 'required'],
            [['idmember', 'activity', 'inactivity', 'reported_abuse', 'daily', 'weekly', 'monthly', 'increase', 'decrease'], 'integer'],
            [['date_activity'], 'safe'],
            [['idmember'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['idmember' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idmember' => 'Idmember',
            'activity' => 'Activity',
            'inactivity' => 'Inactivity',
            'reported_abuse' => 'Reported Abuse',
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
            'increase' => 'Increase',
            'decrease' => 'Decrease',
            'date_activity' => 'Date Activity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'idmember']);
    }
}
