<?php
namespace app\models;
use Yii;
use yii\base\Model;

class InviteForm extends Model
{
    public $email1;
    public $email2;
    public $email3;
    
    public function rules()
    {
        return [
            [['email1',], 'required'],
            ['email1', 'email'],
            ['email2', 'email'],
            ['email3', 'email'],
        ];
    }

}
