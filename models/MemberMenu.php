<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_menu".
 *
 * @property int $id
 * @property string $url
 * @property string $icons
 * @property string $label
 * @property int $status
 */
class MemberMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['url', 'icons', 'label'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'icons' => 'Icons',
            'label' => 'Label',
            'status' => 'Status',
        ];
    }
}
