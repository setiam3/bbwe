<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\file\FileInput;
$script=<<<JS
$('#btnback').click(function(){
  window.history.back();
});
JS;
$this->registerJs($script);
echo Html::tag('div',Html::img(Yii::$app->homeUrl.'images/logo-white.png',['class'=>'img-fluid logos','width'=>'50%']),['class'=>'text-center']);
?>
<div class="mb-5"></div>
<h3 class="text-center">Voice Adv</h3>
<br>
<br>
<div class="container">
<div class="row justify-content-center">
 <div class="rounded border p-4 col-6">
 <div class="rounded p-3" style="background-image:linear-gradient(270deg,#49b2ba,#cc0379)">

 <?=app\widgets\Recordertimer::widget();?>

 </div>
 </div>
 </div>
<div class="d-flex justify-content-between bd-highlight mb-3 pt-3">
    <button class="rounded-circle btn-primary" id="btnback"><i class="fas fa-arrow-left"></i></button>
    <button class="btn-primary"><i class="fas fa-circle"></i></button>
    <button class="rounded btn-primary" id="btnpreview">Preview</button>
  </div>
</div>

<div class="mb-10"></div>