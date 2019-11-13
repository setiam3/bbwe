<?php
namespace app\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
class Gradation extends Widget{
	public $direction;
	public $color1;
	public $color2;
    public $size=20;
    public $type;//text / border / background

	public function init(){
		parent::init();
        if($this->color1===null){
            $this->color1= '#49b2ba';
        }else{
            $this->color1= $this->color1;
        }
        if($this->color2===null){
            $this->color2= '#cc0379';
        }else{
            $this->color2= $this->color1;
        }
        if($this->type===null){
            $this->type='background';
        }else{
            $this->type=$this->type;
            $this->size=$this->size;
        }
        //linear-gradient(black,black), radial-gradient(circle at center left, #dd4182,#3db9bd);
	}
	public function run(){
        if($this->type=='text'){
            return 'style="-webkit-background-clip: text;background-clip: text;-webkit-text-fill-color: transparent;background-image: linear-gradient('.$this->direction.'deg,'.$this->color1.','.$this->color2.');background-size:'.$this->size.'%;"';
        }elseif($this->type=='border'){
            return '
  border-top: 1px solid '.$this->color1.' !important; 
  border-left: none !important;border-right: none !important;
  border-bottom: 1px solid '.$this->color2.' !important; 
  background-image: linear-gradient('.$this->color1.','.$this->color2.'), linear-gradient('.$this->color1.','.$this->color2.'); 
  -moz-background-size: 1px 100%; 
  background-size: 1px 100%; 
  background-position: 0 0, 100% 0; 
  background-repeat: no-repeat;';
        }else{
            return 'style="background-image:linear-gradient('.$this->direction.'deg,'.$this->color1.','.$this->color2.')"';
        }
        
		
	}
}
?>