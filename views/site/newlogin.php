<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
$this->title = 'Login';
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
$this->registerJs(
    "
    $('header').remove();
    $('body').addClass('login');",
    View::POS_READY,
    'removenav'
);
$this->registerCss("footer{bottom: 0;} #linksworld{position:inherit;bottom:50px;}");
?>
  <div class="row">
    <div class="col-lg-7">
      <div class="center col-sm-10 mt-5 mb-5">
        <img src="<?php echo $this->theme->baseUrl;?>/images/logo.png" class="img-fluid">
      </div>
    </div>
    <div class="col-lg-5">
      <div class="col-auto">
        <div class="center">
          <h3>MEMBERS LOGIN</h3>
          <div class="mb-3 mt-4">You will need be Invited to use this website</div>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput([
                'class'=>'rounded-pill p-1 col-sm-12',
                'placeholder' => $model->getAttributeLabel('username')]) ?>
        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput([
                'class'=>'rounded-pill p-1 col-sm-12',
                'placeholder' => $model->getAttributeLabel('password')]) ?>
        <div class="text-right"><a href="#">Forgot Password?</a></div>
        <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn pink rounded-pill', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>

<div class="container" id="linksworld">
    <div class="row">
      <div class="col-sm-2 offset-sm-9">
        <ul class="list-inline text-right">
          <li class="list-item" style="position: absolute;right: 0; bottom: 0em;padding-right: 4rem;">
            <a href="register"><img src="<?php echo $this->theme->baseUrl;?>/images/icon-small-globe.png" class="img-fluid"></a>
          </li>
          <li class="list-item" style="position: absolute;right: 0; bottom: 0em;padding-right: 1rem;">
            <a href="#"><img src="<?php echo $this->theme->baseUrl;?>/images/icon-speaker.png" class="img-fluid"></a>
          </li>
        </ul>
      </div>
    </div>
  </div>