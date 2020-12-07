<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_post".
 *
 * @property int $id
 * @property string $title
 * @property string $tag
 * @property string $cover_picture
 * @property string $description
 * @property int|null $idmember
 * @property string|null $datetime
 */
class MemberPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'tag', 'cover_picture', 'description'], 'required'],
            [['description'], 'string'],
            [['idmember'], 'integer'],
            [['datetime'], 'safe'],
            [['title', 'tag', 'cover_picture'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'tag' => 'Tag',
            'cover_picture' => 'Cover Picture',
            'description' => 'Description',
            'idmember' => 'Idmember',
            'datetime' => 'Datetime',
        ];
    }
}
