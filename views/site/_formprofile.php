<?php //_formprofile
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\ArrayHelper;
use app\models\Country;

$this->registerJS(
"$('form').submit(function(){
     if($('#member-password').val()!=$('#retypepassword').val())
     {
         alert('password should be same');
         $('#member-password .help-block').html('password should be same');
         return false;
     }
});
",View::POS_READY,'confirmpass');
$this->registerJS(
"
var myfile=document.getElementById('photo');
myfile.onchange=function(event){
   if (isVideo($(this).val())){
        $('.video-preview').attr('src', URL.createObjectURL(this.files[0]));
        $('.video-prev').show();
        $('#photo').attr('placeholder',this.files[0].name);
      }
      else
      {
        $('.upload-video-file').val('');
        $('.video-prev').hide();
        alert('please input picture format');
      }
}
function isVideo(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'jpg':
    case 'bmp':
    case 'png':
    case 'gif':
        return true;
    }
    return false;
}
function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}
",View::POS_READY,
    'addopa'
);
?>
<div class="member-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'profession')->textInput(['maxlength' => true]) ?>
    <?php $listData=ArrayHelper::map(Country::find()->all(),'country_code','country_name');
        echo $form->field($model, 'country')->dropDownList($listData, ['prompt'=>'Choose...']);
    ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <div class="form-group">
          <label for="retypepassword">Retype Password</label>
          <input type="password" class="form-control" id="retypepassword" placeholder="Retype Password">
    </div>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <div class="row">
    <?=$form->field($model,'photo')->fileInput(['maxlength' => true,'id'=>'photo','style'=>'z-index:-1;','class'=>'rounded-pill p-1 col-8 custom-file-input'])->label('Cover Picture',['class'=>'text-gradation']) ?>
    <div class="btn gradation-bg rounded-pill" onclick="document.getElementById('photo').click()" style="position: absolute;right: 0;">Browse</div>
    </div>
    <div style="display: none; margin-bottom: 2rem;" class='video-prev center' class="pull-right">
       <img style="width: 50%;" class="video-preview" />
 	</div>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-radius btn-primary pink btn-lg font-weight-medium auth-form-btn']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>