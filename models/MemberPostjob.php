<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_postjob".
 *
 * @property int $id
 * @property string $job_title Fulltime,Part Time, Freelancer
 * @property string $availability
 * @property string $location
 * @property string $job_description
 * @property double $expected_salary
 * @property string $experience
 * @property int $active
 */
class MemberPostjob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_postjob';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_title', 'availability', 'location', 'job_description', 'expected_salary', 'experience', 'active'], 'required'],
            [['job_description'], 'string'],
            [['expected_salary'], 'number'],
            [['active'], 'integer'],
            [['job_title', 'availability', 'location', 'experience'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_title' => 'Job Title',
            'availability' => 'Availability',
            'location' => 'Location',
            'job_description' => 'Job Description',
            'expected_salary' => 'Expected Salary',
            'experience' => 'Experience',
            'active' => 'Active',
        ];
    }
}
