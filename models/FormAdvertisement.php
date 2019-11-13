<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "form_advertisement".
 *
 * @property int $id
 * @property int $idmember
 * @property string $title
 * @property string $website
 * @property string $description
 * @property string $logo
 * @property string $video
 * @property int $idservice
 * @property int $status
 */
class FormAdvertisement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'form_advertisement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmember', 'title'], 'required'],
            [['idmember', 'idservice', 'status'], 'integer'],
            [['description'], 'string'],
            [['title', 'website', 'logo', 'video'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'website' => 'Website',
            'description' => 'Description',
            'logo' => 'Logo',
            'video' => 'Video',
            'idservice' => 'Idservice',
            'status' => 'Status',
        ];
    }
}
