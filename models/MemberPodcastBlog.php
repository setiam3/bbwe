<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_podcast_blog".
 *
 * @property int $id
 * @property string $datetime
 * @property int $idmember
 * @property int $blog
 * @property int $podcast
 * @property int $uploaded_times
 * @property int $daily
 * @property int $weekly
 * @property int $monthly
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
            [['idmember'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['idmember' => 'id']],
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
    public function getMember() 
   { 
       return $this->hasOne(Member::className(), ['id' => 'idmember']); 
   } 
}
