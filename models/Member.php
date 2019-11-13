<?php
namespace app\models;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\base\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property string $datetime
 * @property string $country
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $profession
 * @property int $deactivated_account
 * @property string $username
 * @property string $referral
 * @property string $latest_login
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $photo
 */
class Member extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime', 'latest_login'], 'safe'],
            [['country', 'name', 'email', 'password', 'profession', 'username'], 'required'],
            [['deactivated_account'], 'integer'],
            [['auth_key','skill'], 'string'],
            ['email', 'email'],
            [['country', 'name', 'email', 'password', 'profession', 'username', 'referral', 'password_reset_token', 'photo'], 'string', 'max' => 255],
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
            'country' => 'Country',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'profession' => 'Profession',
            'deactivated_account' => 'Deactivated Account',
            'username' => 'Username',
            'referral' => 'Referral',
            'latest_login' => 'Latest Login',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'photo' => 'Photo',
            'skill' => 'Skill',
        ];
    }

        public static function findIdentity($id)
       {
           return static::findOne($id);
       }
       public static function findIdentityByAccessToken($token, $type = null)
       {
             return static::findOne(['password_reset_token' => $token]);
       }
       public static function findByUsername($username)
       {
           return static::findOne(['username' => $username]);
       }
       public static function findByPasswordResetToken($token)//belum tes
       {
           $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
           $parts = explode('_', $token);
           $timestamp = (int) end($parts);
           if ($timestamp + $expire < time()) {
               return null;
           }
           return static::findOne([
               'password_reset_token' => $token
           ]);
       }
       public static function getDb(){
        return Yii::$app->get('db');
        }

       public function getId()
       {
           return $this->getPrimaryKey();
       }
       public function getAuthKey()
       {
           return $this->auth_key;
       }
       public function validateAuthKey($authKey)
       {
           return $this->getAuthKey() === $authKey;
       }
       public function validatePassword($password)
       {
           return Yii::$app->security->validatePassword($password, $this->password);
       }
       public function setPassword($password)
       {
           $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
       }
       public function generateAuthKey()
       {
           $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
       }
       public function generatePasswordResetToken()
       {
           $this->password_reset_token = Yii::$app->getSecurity()->generateRandomKey() . '_' . time();
       }
       public function removePasswordResetToken()
       {
           $this->password_reset_token = null;
       }
       public function beforeSave($insert)
       {
           if (parent::beforeSave($insert)) {
               if ($this->isNewRecord) { //new
                   $this->generateAuthKey();
                   $this->datetime=date('Y-m-d H:i:s');
                   $this->setPassword($this->password);
               }else{ //update
                   //$this->setPassword($this->password);
               }
               return true;
           }
           return false;
       }
       public function getMemberActivities() 
       { 
           return $this->hasMany(MemberActivity::className(), ['idmember' => 'id']); 
       } 
       public function getMemberPodcastBlogs() 
       { 
           return $this->hasMany(MemberPodcastBlog::className(), ['idmember' => 'id']); 
       } 
       public function getMemberBlogs() 
       { 
           return $this->hasMany(MemberPost::className(), ['idmember' => 'id']); 
       } 
       public function getFlags() 
       { 
           return $this->hasOne(Country::className(), ['country_code' => 'country']); 
       }

}
