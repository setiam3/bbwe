<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Gradation;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Country; 
$script=<<<JS
$('#btnback').click(function(){
	window.history.back();
});
JS;
$this->registerJs($script);
$this->title='Register Adv';
echo Html::tag('div',Html::img(Yii::$app->homeUrl.'images/logo-white.png',['class'=>'img-fluid logos','width'=>'40%']),['class'=>'text-center']);
?>
<div class="mb-5"></div>
<h3 class="text-center mb-5" <?=Gradation::widget(['direction'=>317,'type'=>'text'])?>><?=$this->title;?></h3>
<div class="row">
<?php $form = ActiveForm::begin(['options'=>['class'=>'row']]); ?>
<div class="col-md-6"><h4 class="center" <?=Gradation::widget(['direction'=>317,'type'=>'text','size'=>75])?>>Personal Information</h4>
<?php 
$typebusiness=array('Start Up','Advertisement','Educations');
$listData=ArrayHelper::map(Country::find()->all(),'country_code','country_name');
	echo $form->field($model,'fullname')->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'username')->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'email')->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'password')->passwordInput(['class'=>'form-control rounded borderbg']);
?>
<div class="form-group">
          <label for="retypepassword">Retype Password</label>
          <input type="password" name="Registeradv[retypepassword]" class="form-control rounded borderbg" id="registeradv-retypepassword" placeholder="Retype Password">
    </div>
<?php
	echo $form->field($model,'nationality')->dropDownList($listData, ['prompt'=>'Choose...','class'=>'borderbg  form-control']);
?>

</div>
<div class="col-md-6"><h4 class="center" <?=Gradation::widget(['direction'=>317,'type'=>'text','size'=>75])?>>Business Information</h4>
<?php echo $form->field($model,'businessname')->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'businesscountry')->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'businesstype')->dropDownList($typebusiness,['class'=>'form-control borderbg']);
	echo $form->field($model,'directcontact')->textInput(['class'=>'form-control rounded borderbg']);
	echo $form->field($model,'businessaddress')->textArea(['class'=>'form-control rounded borderbg']);
?>
</div>
<span class="container center">
	<?=Html::submitButton('Submit', ['class' => 'btn btn-radius btn-primary pink btn-lg font-weight-medium auth-form-btn'])?>
</span>
<span class="center">Please contact us if you have trouble registering in
CSupport@soldiersofthearts.com</span>
<?php ActiveForm::end(); ?>
</div>
<div class="mb-10"></div>