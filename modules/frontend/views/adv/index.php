<?php
use yii\web\View;
use yii\helpers\Html;
use kartik\editable\Editable;
use yii\helpers\Url;
use kartik\file\FileInput;
use app\widgets\Gradation;
$script=<<<JS
$('#btnback').click(function(){
	window.history.back();
});
$('#text-cont').addClass('center');
jQuery('#btnsubmit').click(function(e){
	e.preventDefault();
	try{
		var request = new XMLHttpRequest();
	var formData = new FormData();
	var video=document.getElementsByClassName('file-footer-caption')[0].getAttribute('title');
	formData.append("title", jQuery('#title-cont .kv-editable-value').html());
	formData.append("text", jQuery('#text-cont .kv-editable-value').html());
	formData.append("video",video);
	request.open("POST", document.getElementsByClassName('kv-editable-form')[0].getAttribute('action'));
	request.send(formData);
	}catch(err){
		if(typeof video==='undefined'){
			alert('files is empty..');
		}
		
	}
	
	});
JS;
$this->registerJs($script);
$template_title=Editable::widget(['id'=>'title','name'=>'title', 'asPopover' => false,'value' => '<h3>Title</h3>','format' => Editable::FORMAT_BUTTON,'header' => 'Name','size'=>'md','options' => ['class'=>'form-control', 'placeholder'=>'Enter Title...']
]);
$template_text=Editable::widget([
			    'id'=>'text', 
			    'name'=>'text', 
			    'asPopover' => false,
			    'value' => '<h3>Text Here..</h3>',
			    'format' => Editable::FORMAT_BUTTON,
			    'size'=>'md',
			    'options' => ['class'=>'form-control', 'placeholder'=>'Enter Text...']
			]);
$template_file=FileInput::widget([
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
	    'options' => ['accept' => $model['accept_file_type'],'multiple'=>false]
	]);
$gradation=Gradation::widget(['direction'=>270]);
$this->title='Artboard';
echo Html::tag('div',Html::img(Yii::$app->homeUrl.'images/logo-white.png',['class'=>'img-fluid logos','width'=>'40%']),['class'=>'text-center']);
?>
<div class="mb-5"></div>
<h3 class="text-center mb-5"><?=$model['title'];?></h3>
<ol class="list-inline">
<li class="p-3"><?=$model['style'];?></li>
<div style="width: 100%">
<?php
	echo eval('?>' . utf8_encode($model['content']) . '<?php ');
?>
</div>
</ol>
<div class="pull-left pt-3"><button class="rounded-circle btn-primary" id="btnback"><i class="fas fa-arrow-left"></i></button></div>
<div class="pull-right pt-3">
	<button class="btn btn-primary" id="btnsubmit">Submit</button>
	<button class="btn btn-primary" id="btnpreview">Preview</button>
</div>
</div>
<p></p>
<div class="mb-10"></div>