<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $label
 * @property string $url
 * @property string $icons
 * @property int $show_label
 * @property int $show_icons
 * @property int $status
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['label', 'url', 'icons'], 'required'],
            [['show_label', 'show_icons', 'status'], 'integer'],
            [['label', 'url', 'icons'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'url' => 'Url',
            'icons' => 'Icons',
            'show_label' => 'Show Label',
            'show_icons' => 'Show Icons',
            'status' => 'Status',
        ];
    }
}
