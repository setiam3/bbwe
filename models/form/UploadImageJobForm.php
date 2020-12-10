<?php
namespace app\models\form;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadImageJobForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $imgUrl;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }
    
    public function upload($path_file)
    {
        if ($this->validate()) {
            $this->imgUrl=$path_file . $this->imageFile->baseName. '_'.md5(time()) . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($this->imgUrl);
            return true;
        } else {
            return false;
        }
    }
}