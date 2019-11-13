<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\editable\Editable;
use kartik\file\FileInput;
use app\models\TemplateAdv;
$this->title='Artboard';
$script=<<<JS
$('#btnback').click(function(){
	window.history.back();
});
JS;
$this->registerJs($script);
echo Html::tag('div',Html::img(Yii::$app->homeUrl.'images/logo-white.png',['class'=>'img-fluid logos','width'=>'50%']),['class'=>'text-center']);
?>
<div class="mb-5"></div>
<h3 class="text-center"><?php echo (array_column($model,'title'))[0];?></h3>
<br>
<br>
<div class="row">
<?php 
foreach ($model as $value):
?>
<div class="col-md-6 p-3">
	<ol class="list-inline text-center">
		<li class="p-3"><?=$value->style?></li>
		<a href="pickdesign?id=<?=$value->layout?>&style=<?=$value->style?>" style="width:100%">
		<div class=" p-3" style="width: 100%">
			<?=$value->design?>
		</div>
	</a>
	</ol>
</div>
<?php endforeach;?>
</div>
<div class="pull-right pt-3"><button class="btn btn-primary" id="btnback">Back</button></div>
<div class="mb-10"></div>