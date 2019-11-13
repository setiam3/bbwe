<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_pricing".
 *
 * @property int $id
 * @property int $idmember
 * @property string $variations
 * @property string $price
 * @property string $message
 * @property string $annualy_salary
 */
class MemberPricing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_pricing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmember', 'variations', 'price', 'message'], 'required'],
            [['idmember'], 'integer'],
            [['message'], 'string'],
            [['variations', 'price', 'annualy_salary'], 'string', 'max' => 255],
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
            'variations' => 'Variations',
            'price' => 'Price',
            'message' => 'Message',
            'annualy_salary' => 'Annualy Salary',
        ];
    }
}
