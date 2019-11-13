<?php 
namespace app\widgets;
use Yii;
use yii\web\View;
use yii\base\Widget;
use yii\helpers\Html;

class Recordertimer extends Widget{
    public $items;
    public $style;

    public function init(){
        parent::init();
        $this->getView()->registerCSSFile(Yii::$app->homeUrl."css/recordtimer.css",['position' => \yii\web\View::POS_HEAD]);
        $this->getView()->registerJsFile(Yii::$app->homeUrl."js/recordtimer.js",['position' => \yii\web\View::POS_END]);
        if($this->style===''){
            $this->style='';
        }else{
            $this->style=$this->style;
        }

    }
    
    public function run(){
        return '
            <div class="pie degree center">
		  <span class="block"></span>
		  <span id="time">0</span>
		</div>';
    }
}
?>

