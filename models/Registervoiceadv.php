<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Registervoiceadv extends Model
{
    public $firstname;
    public $lastname;
    public $companyname;
    public $logo;
    public $website;
    public $address;
    public $phonenumber;
    public $email;
    public $password;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['firstname', 'email', 'lastname', 'password','password_repeat','companyname','address','phonenumber'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ]
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'companyname' => 'Company Name',
            'logo' => 'Upload Logo',
            'website' => 'Website',
            'address' => 'Address',
            'phonenumber' => 'Phone Number',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Retype Password',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    
}
