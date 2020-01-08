<?php 
namespace app\widgets;
use Yii;
use yii\web\View;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\WheelMenu;
use yii\db\Expression;
use yii\helpers\Url;

class Wheel extends Widget{
    public $items;
    public $style;

    public function init(){
        parent::init();
        $this->getView()->registerCSSFile(Yii::$app->homeUrl."css/wheel.css",['position' => \yii\web\View::POS_HEAD]);
        $this->getView()->registerJsFile(Yii::$app->homeUrl."js/wheel.js",['position' => \yii\web\View::POS_END]);
        if($this->style===''){
            $this->style='';
        }else{
            $this->style=$this->style;
        }
        $this->getView()->registerJsVar('baseUrl',Url::home(true));
    }
    public function items(){
        $items=WheelMenu::find()->where(['status'=>1])->orderBy(new Expression('rand()'))->limit(5)->all();
        $output='';
        foreach ($items as $value) {
            $links='<a href="'.Yii::$app->homeUrl.$value->url.'"><img class="items-icon" src="'.Yii::$app->homeUrl.$value->icons.'"><div style="font-family:exo-regular;font-size:0.7rem;">'.$value->label.'</div></a>';
            $separator='<a><img src="'.Yii::$app->homeUrl.'images/separator.png" style="transform: rotateZ(87deg);padding: 58px;"></a>';
            $output.='<li>'.$links.'</li>'.'<li>'.$separator.'</li>';
        }
        return ($output);
    }
    public function run(){
        return '
            <nav class="radialnav" style="'.$this->style.'">
                <span class="ellipsis"><img src="'.Url::home(true).'/images/directory-show-menu.png" class="img-fluid"></span>
                <a href="#" class="ellipsis2"></a>
                <a href="#" class="ellipsis3"></a>
                <a href="#" class="ellipsis4"></a>
                <div class="button left"></div>
                <div class="maskwheel" style="'.$this->style.'"></div>
                <ul class="menu" style="position: absolute;display:none;">
                    '.$this->items().'
                </ul>
                <div class="button right"></div>
            </nav>';
    }
}
?>