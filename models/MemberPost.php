<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_post".
 *
 * @property int $id
 * @property string $title
 * @property string $tag
 * @property string $cover_picture
 * @property string $description
 * @property int $idmember
 * @property string $datetime
 */
class MemberPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'tag', 'cover_picture', 'description'], 'required'],
            [['description'], 'string'],
            [['idmember'], 'integer'],
            [['datetime'], 'safe'],
            [['title', 'tag', 'cover_picture'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'tag' => 'Tag',
            'cover_picture' => 'Cover Picture',
            'description' => 'Description',
            'idmember' => 'Idmember',
            'datetime' => 'Datetime',
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
   public function getAgoTime($created_at) {
   $created_at = time() - strtotime($created_at); // to get the time since that moment
       $created_at = ($created_at < 1) ? 1 : $created_at;
       $tokens = array(
           31536000 => Yii::t('app', 'year'),
           2592000 => Yii::t('app', 'month'),
           604800 => Yii::t('app', 'week'),
           86400 => Yii::t('app', 'day'),
           3600 => Yii::t('app', 'hour'),
           60 => Yii::t('app', 'minute'),
           1 => Yii::t('app', 'second')
       );
       foreach ($tokens as $unit => $text) {
           if ($created_at < $unit)
               continue;
           $numberOfUnits = floor($created_at / $unit);
           return $numberOfUnits . ' ' . $text . ' ' . Yii::t('app', 'ago');
       }
   }
}
