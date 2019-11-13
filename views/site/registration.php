<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\ArrayHelper;
use app\models\Country; 
if($this->context->action->id=='register'){
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
}

?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row">
    <div class="col-md-6 decorate">
      <div class="page-title">
        <?=$this->title='REGISTER';?>
        <h5> Already have an account ? <a href="login"><span class="text-primary">SIGN IN HERE</span></a></h5>
      </div>
      <div class="clear-fix"></div>
      <?=app\widgets\Alert::widget();?>
      
    <?php 
    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profession')->textInput(['maxlength' => true]) ?>

    <?php $listData=ArrayHelper::map(Country::find()->all(),'country_code','country_name');
        echo $form->field($model, 'country')->dropDownList($listData, ['prompt'=>'Choose...']);
    ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $this->context->action->id=='register'?$form->field($model, 'password')->passwordInput(['maxlength' => true]):''; ?>
<?php if($this->context->action->id=='register'){?>
    <div class="form-group">
          <label for="retypepassword">Retype Password</label>
          <input type="password" class="form-control" id="retypepassword" placeholder="Retype Password">
    </div>
  <?php }?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-radius btn-primary pink btn-lg font-weight-medium auth-form-btn']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    </div>

    <div class="col-md-6 text-center">
      <div class="col-md-11"><img src="<?=empty($model->photo)?$this->theme->baseUrl.'/images/girls.jpg':$model->photo?>" class="box-shadow img-fluid rounded"></div>
      <div class="row"><br></div>
      <div class="col-md-12">
        <a href="#"> 
          <i class="material-icons md-48 md-dark img-circle">camera_alt</i></a> Upload your photo
      
      <p><span class="text-primary">OR</span></p>
      <a href="#"><i class="material-icons md-dark img-circle">videocam</i></a> Upload your video
      </div>
    </div>

  </div>
<div class="clearfix mt-4"></div>
<style type="text/css">
  #footer{
    position: inherit !important;
  }
</style>