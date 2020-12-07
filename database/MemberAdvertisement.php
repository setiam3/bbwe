<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_advertisement".
 *
 * @property int $id
 * @property string $datetime
 * @property int $idmember
 * @property string|null $form
 * @property string|null $request
 * @property string|null $message
 * @property float|null $cost
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
