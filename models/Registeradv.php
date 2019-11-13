<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Registeradv extends Model
{
    public $fullname;
    public $username;
    public $email;
    public $password;
    public $nationality;
    public $businessname;
    public $businesscountry;
    public $businesstype;
    public $directcontact;
    public $businessaddress;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['fullname', 'email', 'username', 'password','nationality','businesscountry','directcontact','businessaddress'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            //['password', 'password'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'fullname' => 'Full Name',
            'username' => 'User Name',
            'email' => 'Email Address',
            'password' => 'Password',
            'nationality' => 'Nationality',
            'businessname' => 'Type Name of your business',
            'businesscountry' => 'Country where business is based',
            'businesstype' => 'Type of business',
            'directcontact' => 'Direct Contact no',
            'businessaddress' => 'Business Address',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    
}
