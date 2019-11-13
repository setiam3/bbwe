<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_video".
 *
 * @property int $id
 * @property string $video
 * @property string $title
 * @property string $tag
 * @property string $datetime
 * @property int $idmember
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
    public function getMember() 
   { 
       return $this->hasOne(Member::className(), ['id' => 'idmember']); 
   } 
   public function beforeSave($insert) 
   { 
       if (parent::beforeSave($insert)) { 
           if ($this->isNewRecord) { //new  
               $this->datetime=date('Y-m-d H:i:s'); 
               //$this->idmember=1; 
           }else{ //update 
               //$this->setPassword($this->password); 
           } 
           return true; 
       } 
       return false; 
   } 
}
