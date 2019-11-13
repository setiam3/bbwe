<?php
namespace app\widgets;

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