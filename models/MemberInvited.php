<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_invited".
 *
 * @property int $id
 * @property string $datetime
 * @property int $idmember
 * @property string $email
 * @property string $referral
 * @property int $sent_email
 * @property int $status “ 0 is not join, 1 was join ”
 */
class MemberInvited extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_invited';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime'], 'safe'],
            [['idmember', 'email'], 'required'],
            [['idmember', 'sent_email', 'status'], 'integer'],
            [['email', 'referral'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'referral' => 'Referral',
            'sent_email' => 'Sent Email',
            'status' => 'Status',
        ];
    }
    public function beforeSave($insert)
   {
       if (parent::beforeSave($insert)) {
           if ($this->isNewRecord) { //new
               //$this->datetime=date('Y-m-d H:i:s');
               
           }else{ //update
               
           }
           return true;
       }
       return false;
   }
}
