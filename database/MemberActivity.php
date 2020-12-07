<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_activity".
 *
 * @property int $id
 * @property int $idmember
 * @property int|null $activity
 * @property int|null $inactivity
 * @property int|null $reported_abuse
 * @property int|null $daily
 * @property int|null $weekly
 * @property int|null $monthly
 * @property int|null $increase
 * @property int|null $decrease
 * @property string|null $date_activity
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
}
