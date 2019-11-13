<?php 
namespace app\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
class FLags extends Widget{
    public $css;
    public $code;
    public $width;
    public function init(){
        parent::init();
        if($this->width===null){
            $this->width= '40px';
        }else{
            $this->width= $this->width;
        }
        $this->getView()->registerCSSFile(Yii::$app->homeUrl."css/flags.css");
    }
    
    public function run(){
        return '
    <div id="box" class="" style="width: '.$this->width.'; height:'.$this->width.';margin:6px;">
        <div class="shadowboard" style="opacity: 0;background-image: url('.Url::home().$this->code.');"></div>
        <div class="clipboard" style="-webkit-clip-path: circle(50% at 50% 50%);clip-path: circle(50% at 50% 50%);background-image: url('.Url::home().$this->code.');">
            
            <div class="circleBase layer2">
                <div class="ovale"></div>
            </div>
        </div>
    </div>';
    }
}
?>