<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_video".
 *
 * @property int $id
 * @property string $video
 * @property string $title
 * @property string $tag
 * @property string|null $datetime
 * @property int|null $idmember
 */
class MemberVideo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video', 'title', 'tag'], 'required'],
            [['tag'], 'string'],
            [['datetime'], 'safe'],
            [['idmember'], 'integer'],
            [['video', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video' => 'Video',
            'title' => 'Title',
            'tag' => 'Tag',
            'datetime' => 'Datetime',
            'idmember' => 'Idmember',
        ];
    }
}
