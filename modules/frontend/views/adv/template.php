<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\editable\Editable;
use kartik\file\FileInput;
use app\models\TemplateAdv;
$script=<<<JS
$('.profile .form >div').removeClass('border');
$('.profile .form >div').removeClass('p-3');
$('.profile .form >div>div>div').removeClass('p-3');
$('.profile .form >div>div>div.container>div.title').empty();
$('.profile .form >div>div>div.container>div.title').addClass('p-2');
$('#btnback').click(function(){
	window.history.back();
});
JS;
$this->registerJs($script);
$this->title='Artboard';
echo Html::tag('div',Html::img(Yii::$app->homeUrl.'images/logo-white.png',['class'=>'img-fluid logos','width'=>'50%']),['class'=>'text-center']);
?>
<div class="mb-5"></div>
<h3 class="text-center" <?=app\widgets\Gradation::widget(['direction'=>270,'type'=>'text'])?>>Pick Your Layout</h3>
<br>
<br>
<div class="row">
<?php 
	foreach ($model as $key => $value):
		$style=TemplateAdv::find()->select('design')->where(['layout'=>$value->layout])->limit(1)->one();
?>
<div class="col-lg-<?=12/count($model)?>">
	<a href="pickstyle?id=<?=$value->layout?>">
	<fieldset class="profile">
        <legend class="profile-name" style="font-size: 1.2rem;"><?=$value->title?></legend>
        <div class="container p-2 text-center">
        <?php echo eval('?>' . utf8_encode($style['design']) . '<?php ');?>
		</div>
	</fieldset>
</a>
</div>
<?php endforeach;?>
</div>
<div class="pull-right pt-3">
	<a class="btn btn-primary" href="<?=Yii::$app->urlManager->createUrl('frontend/adv');?>">Back</a>
</div>
<div class="mb-10"></div>