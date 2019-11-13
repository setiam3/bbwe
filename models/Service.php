<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string $type
 * @property string $price
 * @property string $datetime
 * @property int $status
 * @property string $description
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'price'], 'required'],
            [['datetime'], 'safe'],
            [['status'], 'integer'],
            [['type', 'description'], 'string', 'max' => 255],
            [['price'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'price' => 'Price',
            'datetime' => 'Datetime',
            'status' => 'Status',
            'description' => 'Description',
        ];
    }
}
