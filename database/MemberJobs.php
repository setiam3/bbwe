<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "member_jobs".
 *
 * @property int $id
 * @property int $created_by
 * @property string $job_name
 * @property string $job_description
 * @property string $thumbnail
 * @property string|null $job_requirement
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Member $createdBy
 */
class MemberJobs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_jobs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'job_name', 'job_description', 'thumbnail'], 'required'],
            [['created_by'], 'integer'],
            [['job_description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['job_name', 'thumbnail', 'job_requirement'], 'string', 'max' => 200],
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
            'job_name' => 'Job Name',
            'job_description' => 'Job Description',
            'thumbnail' => 'Thumbnail',
            'job_requirement' => 'Job Requirement',
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
     * @return \app\models\query\MemberJobsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\MemberJobsQuery(get_called_class());
    }
}
