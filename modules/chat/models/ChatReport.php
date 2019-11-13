<?php

namespace app\modules\chat\models;

use Yii;

/**
 * This is the model class for table "chat_report".
 *
 * @property int $id
 * @property string $chat_id
 * @property string $reason
 * @property int $created_by
 * @property int $created_time
 * @property int $updated_by
 * @property int $updated_time
 */
class ChatReport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_report';
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
            [['chat_id', 'reason', 'created_by', 'created_time', 'updated_by', 'updated_time'], 'required'],
            [['chat_id', 'created_by', 'created_time', 'updated_by', 'updated_time'], 'integer'],
            [['reason'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chat_id' => 'Chat ID',
            'reason' => 'Reason',
            'created_by' => 'Created By',
            'created_time' => 'Created Time',
            'updated_by' => 'Updated By',
            'updated_time' => 'Updated Time',
        ];
    }
}
