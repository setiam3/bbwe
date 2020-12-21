<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_advertisement".
 *
 * @property int $id
 * @property int $created_by
 * @property string|null $ads_name
 * @property string|null $ads_description
 * @property string|null $ads_image
 * @property int|null $ads_is_active
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Member $createdBy
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
            [['created_by'], 'required'],
            [['created_by', 'ads_is_active'], 'integer'],
            [['ads_image'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['ads_name'], 'string', 'max' => 200],
            [['ads_description'], 'string', 'max' => 500],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_by' => 'Created By',
            'ads_name' => 'Ads Name',
            'ads_description' => 'Ads Description',
            'ads_image' => 'Ads Image',
            'ads_is_active' => 'Ads Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\MemberQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Member::className(), ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\MemberAdvertisementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\MemberAdvertisementQuery(get_called_class());
    }
}
