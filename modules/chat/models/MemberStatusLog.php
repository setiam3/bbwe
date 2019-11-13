<?php

namespace app\modules\chat\models;

use Yii;

/**
 * This is the model class for table "member_status_log".
 *
 * @property int $id
 * @property int $member_id
 * @property int $status 0 = Offline; 1 = Online; 2 = Don't Disturb!
 * @property int $created_time
 */
class MemberStatusLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_status_log';
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
            [['member_id', 'status', 'created_time'], 'required'],
            [['member_id', 'status', 'created_time'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'status' => 'Status',
            'created_time' => 'Created Time',
        ];
    }
}
