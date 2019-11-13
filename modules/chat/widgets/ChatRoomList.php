<?php
namespace app\modules\chat\widgets;

use app\modules\chat\models\ChatRoomMember;

class ChatRoomList extends \yii\bootstrap\Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = ChatRoomMember::getActiveRoomList();

        return $this->render('chat_room_list', ['list' => $model]);
    }
}
?>