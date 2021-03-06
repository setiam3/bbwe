<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_advertisement".
 *
 * @property int $id
 * @property string $datetime
 * @property int $idmember
 * @property string $form
 * @property string $request
 * @property string $message
 * @property double $cost
 */
class MemberAdvertisement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_advertisement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime', 'idmember'], 'required'],
            [['datetime'], 'safe'],
            [['idmember'], 'integer'],
            [['form', 'request', 'message'], 'string'],
            [['cost'], 'number'],
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
            'form' => 'Form',
            'request' => 'Request',
            'message' => 'Message',
            'cost' => 'Cost',
        ];
    }
}
