<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_podcast".
 *
 * @property int $id
 * @property string $podcast
 * @property string $title
 * @property string $tag
 * @property string $datetime
 * @property int $idmember
 */
class MemberPodcast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_podcast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['podcast', 'title', 'tag'], 'required'],
            [['tag'], 'string'],
            [['datetime'], 'safe'],
            [['idmember'], 'integer'],
            [['podcast', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'podcast' => 'Podcast',
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
                
           } 
           return true; 
       } 
       return false; 
   } 
}
