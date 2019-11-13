<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advertisement".
 *
 * @property int $id
 * @property string $datetime
 * @property string $idmember
 * @property string $form
 * @property string $request
 * @property string $message
 * @property double $cost
 */
class Advertisement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertisement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime', 'idmember'], 'required'],
            [['datetime'], 'safe'],
            [['cost'], 'number'],
            [['idmember'], 'string', 'max' => 100],
            [['form', 'request', 'message'], 'string', 'max' => 200],
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
