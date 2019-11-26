<?php
namespace app\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
class Advertisement extends Widget{
	public $type;//random

	public function init(){
		parent::init();
        
	}
	public function run(){
        return 'run';
	}
}
?>