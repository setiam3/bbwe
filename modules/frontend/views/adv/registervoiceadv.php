<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Gradation;
use yii\widgets\ActiveForm;
$script=<<<JS
$('#btnback').click(function(){
	window.history.back();
});
JS;
$this->registerJs($script);
$this->title='Voice Adv Form';
echo Html::tag('div',Html::img(Yii::$app->homeUrl.'images/logo-white.png',['class'=>'img-fluid logos','width'=>'40%']),['class'=>'text-center']);
?>
<div class="mb-5"></div>
<h3 class="text-center mb-5" <?=Gradation::widget(['direction'=>317,'type'=>'text'])?>><?=$this->title;?></h3>
<div class="container">
<?php $form = ActiveForm::begin(['options'=>['class'=>'row']]); ?>
<div class="container">
<?php 
$array=['template'=>"{label}\n<div class='col-md-9'>{input}</div>\n{hint}\n{error}",
		'labelOptions'=>['class'=>'col-sm-3 col-form-label'],'options'=>['class'=>'form-group row']];
	echo $form->field($model,'firstname',$array)->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'lastname',$array)->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'companyname',$array)->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'logo',$array)->fileInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'website',$array)->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'address',$array)->textarea(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'phonenumber',$array)->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'email',$array)->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'password',$array)->passwordInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'password_repeat',$array)->passwordInput(['class'=>'form-control rounded borderbg']);
?>
<div class="form-group row">
          <label for="retypepassword" class="col-sm-3 col-form-label">Retype Password</label>
          <div class="col-md-9">
          <input type="password" name="Registervoiceadv[retypepassword]" class="form-control rounded borderbg" id="registervoiceadv-retypepassword" placeholder="Retype Password">
      </div>
    </div>

</div>
<span class="container center">
	<?=Html::submitButton('Submit', ['class' => 'btn btn-radius btn-primary pink btn-lg font-weight-medium auth-form-btn'])?>
</span>
<?php ActiveForm::end(); ?>
</div>
<div class="mb-10"></div>