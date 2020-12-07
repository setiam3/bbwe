<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_articles".
 *
 * @property int $id
 * @property int $created_by
 * @property string|null $article_title
 * @property string|null $content_article
 * @property string|null $thumbnail
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Member $createdBy
 */
class MemberArticles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by'], 'required'],
            [['created_by'], 'integer'],
            [['content_article'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['article_title', 'thumbnail'], 'string', 'max' => 200],
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
            'article_title' => 'Article Title',
            'content_article' => 'Content Article',
            'thumbnail' => 'Thumbnail',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Member::className(), ['id' => 'created_by']);
    }
}
