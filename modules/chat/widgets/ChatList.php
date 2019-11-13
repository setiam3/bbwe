<?php
namespace app\modules\chat\widgets;

use app\modules\chat\models\Chat;

class ChatList extends \yii\bootstrap\Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = Chat::getActiveChatList();

        return $this->render('chat_list', ['list' => $model]);
    }
}
?>