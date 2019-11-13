<?php 
use yii\web\View;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->registerJs(
    "
    $('nav').remove();
    $('main>div').removeClass('container');
    ",
    View::POS_READY,
    'removenav'
);
$this->registerCss("main{padding-top:0;}");
?>
<?=app\widgets\Alert::widget();?>
<div class="invitation container bg-ornamen">
  <div class="center">
  <br>
      <div class="center"><img src="<?=Yii::$app->homeUrl?>images/icon-invite.png" class="img-fluid" style="width: 100px;"></div>
      <br>
      <h4 class="pink">
        <?=$this->title='Invite your freinds';?>
      </h4>
      <br>
      <?php $form = ActiveForm::begin(['id' => 'invite-form']); ?>
        <?= $form->field($model, 'email1')->label(false)->textInput(['class'=>'rounded col-sm-6','placeholder'=>'Email Address 1']); ?>
        <?= $form->field($model, 'email2')->label(false)->textInput(['class'=>'rounded col-sm-6','placeholder'=>'Email Address 2']); ?>
        <?= $form->field($model, 'email3')->label(false)->textInput(['class'=>'rounded col-sm-6','placeholder'=>'Email Address 3']); ?>
        <div class="container col-sm-6">
            <?= Html::submitButton('Send Invitation', ['class' => 'btn btn-primary pink btn-block font-weight-medium auth-form-btn']) ?>
        </div>
    <?php ActiveForm::end(); ?>

    </div>
  </div>
  