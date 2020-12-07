<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_podcast_blog".
 *
 * @property int $id
 * @property string|null $datetime
 * @property int|null $idmember
 * @property int|null $blog
 * @property int|null $podcast
 * @property int|null $uploaded_times
 * @property int|null $daily
 * @property int|null $weekly
 * @property int|null $monthly
 */
class MemberPodcastBlog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_podcast_blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime'], 'safe'],
            [['idmember', 'blog', 'podcast', 'uploaded_times', 'daily', 'weekly', 'monthly'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'datetime' => 'Datetime',
            'idmember' => 'Idmember',
            'blog' => 'Blog',
            'podcast' => 'Podcast',
            'uploaded_times' => 'Uploaded Times',
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
        ];
    }
}
