<?php
namespace app\modules\chat\widgets;

class MainMenu extends \yii\bootstrap\Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('main_menu');
    }
}
?>