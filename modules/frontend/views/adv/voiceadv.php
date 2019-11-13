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
 <div class="rounded p-5" style="background-image:linear-gradient(270deg,#49b2ba,#cc0379)">
 <div class="center p-3">
  <div class=" p-4">
  <i class="fas fa-microphone-alt" style="font-size: 100px;border: 1px solid;border-radius: 50%;padding: 25px 40px 25px 40px;"></i>
</div>
 <?/*=FileInput::widget([
      'name' => 'video',
      'pluginOptions' => [
          'showCaption' => false,
          'showRemove' => false,
          'showUpload' => false,
          'browseClass' => 'btn btn-primary btn-block',
          'browseIcon' => '<i class="fa fa-upload" aria-hidden="true"></i>',
          'browseLabel' =>  '',
          'previewFileType' => 'any', 
          'initialPreviewConfig'=>['width'=>'100%'],
          'uploadUrl' => Url::to(['/frontend/adv/upload']),
      ],
      'options' => ['accept' => 'audio/*','multiple'=>false]
  ]);*/?>
 </div>
 </div>
 </div>
 </div>
 <div class="row justify-content-center p-3">
 <button class="rounded btn-primary" style="margin: 5px">
  <i class="fas fa-play"></i>
 </button>
 <button class="rounded btn-primary" style="margin: 5px">
<i class="fas fa-pause"></i>
 </button>
 <button class="rounded btn-primary" style="margin: 5px">
  <i class="fas fa-stop"></i>
 </button>
 </div>
 <div class="pull-left pt-3"><button class="rounded-circle btn-primary" id="btnback"><i class="fas fa-arrow-left"></i></button></div>
</div>

<div class="mb-10"></div>