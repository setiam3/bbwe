<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_job_packet".
 *
 * @property int $id
 * @property int $member_id
 * @property string $packet_name
 * @property float $packet_price
 * @property string $packet_description
 * @property float|null $annual_salary
 */
class MemberJobPacket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_job_packet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'packet_name', 'packet_price', 'packet_description'], 'required'],
            [['member_id'], 'integer'],
            [['packet_price', 'annual_salary'], 'number'],
            [['packet_description'], 'string'],
            [['packet_name'], 'string', 'max' => 255],
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
            'packet_name' => 'Packet Name',
            'packet_price' => 'Packet Price',
            'packet_description' => 'Packet Description',
            'annual_salary' => 'Annual Salary',
        ];
    }
}
