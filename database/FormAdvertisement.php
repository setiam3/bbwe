<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "form_advertisement".
 *
 * @property int $id
 * @property int $idmember
 * @property string $title
 * @property string|null $website
 * @property string|null $description
 * @property string|null $logo
 * @property string|null $video
 * @property int|null $idservice
 * @property int|null $status
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
