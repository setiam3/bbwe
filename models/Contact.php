<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $datetime
 * @property string $name
 * @property string $email
 * @property string $country
 * @property string $text_message
 * @property string $voice_message
 * @property int $idmember
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime', 'name', 'email'], 'required'],
            [['datetime'], 'safe'],
            [['text_message', 'voice_message'], 'string'],
            [['idmember'], 'integer'],
            [['name', 'email', 'country'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'email' => 'Email',
            'country' => 'Country',
            'text_message' => 'Text Message',
            'voice_message' => 'Voice Message',
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
               $this->idmember=1; 
               $this->country='GB'; 
           }else{ //update 
               //$this->setPassword($this->password); 
           } 
           return true; 
       } 
       return false; 
   } 
}
