<?php

namespace app\database;

use Yii;

/**
 * This is the model class for table "template_adv".
 *
 * @property int $id
 * @property int $style
 * @property string $title
 * @property string $content
 * @property int $layout
 * @property string $accept_file_type
 * @property string|null $design
 * @property int $status
 */
class TemplateAdv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template_adv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['style', 'title', 'content', 'layout', 'accept_file_type'], 'required'],
            [['style', 'layout', 'status'], 'integer'],
            [['content', 'design'], 'string'],
            [['title', 'accept_file_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'style' => 'Style',
            'title' => 'Title',
            'content' => 'Content',
            'layout' => 'Layout',
            'accept_file_type' => 'Accept File Type',
            'design' => 'Design',
            'status' => 'Status',
        ];
    }
}
