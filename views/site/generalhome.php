<?php 
use yii\helpers\Html;
use yii\web\View;
use yii\base\Widget;
?>
<div class="row">
    <div class="col-md-6" >
      <img src="<?=$this->theme->baseUrl;?>/images/logo.png" class="img-fluid mt-5 pic-models logos">

<?=app\widgets\Wheel::widget(['style'=>'right:50%']);?>
    </div>

    <div class="col-md-6" style="position: inherit;z-index: -1">
      <div class="pic-models">
      <img src="<?=$this->theme->baseUrl;?>/images/bg1.png" class="img-fluid">
    </div>
    </div>
  </div>