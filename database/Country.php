<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $country_code
 * @property string $country_name
 * @property string|null $flag
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code'], 'string', 'max' => 2],
            [['country_name', 'flag'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'flag' => 'Flag',
        ];
    }
}
