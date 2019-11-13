<?php
namespace app\widgets;

class Breadcrumbs extends \yii\bootstrap\Widget
{
    public $links = [];

    public function init()
    {
        parent::init();
    }
    
    public function run()
    {
        $total = count($this->links);
        return $this->render('breadcrumbs', [
            'links' => $this->links,
            'total' => $total
        ]);
    }
}
?>