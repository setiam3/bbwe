<?php 
use  yii\web\View;
use app\widgets\Flags;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$js=<<<js
  $('main').addClass('long-decorate');
js;
$this->registerJS($js,View::POS_READY,'adddecorate');
?>
<div class="row">
  <div class="col">
    <fieldset class="profile">
        <legend class="profile-name"><?=Yii::$app->user->identity->name?></legend>
        <div class="profile-skill container center">
        <?//=(!empty($model->skill))?$model->skill:'';?>
          <div class=" row">
            <?php /*foreach ($membermenu as $key => $value) {
              $link=Html::a(Html::img(Url::home(true).$value->icons,['class'=>'img-fluid']),Yii::$app->homeUrl.$value->url,['class'=>'nav-link center']);
              echo Html::tag('div',$link,['class'=>'col']);
            }*/
            ?>
          </div>
        </div>
      </fieldset>
  </div>
  <div class="col-sm-8">
    <a href="profile"><i class="fa fa-arrow-left"></i> Profile</a>
    <div class="menu-profile">
        <ul class="list-group list-group-horizontal-sm">
          <li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/post-0.png" class="img-fluid"></a>
          </li>
          <li class="list-group-item black">
            <a href="postjob" class="active"><img src="<?=$this->theme->baseUrl;?>/images/post-1.png" class="img-fluid"></a>
          </li>
          <li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/post-2.png" class="img-fluid"></a>
          </li>
          <li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/post-3.png" class="img-fluid"></a>
          </li>
          <li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/post-4.png" class="img-fluid"></a>
          </li><li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/post-5.png" class="img-fluid"></a>
          </li>
          </li><li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/post-6.png" class="img-fluid"></a>
          </li>
          </li><li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/post-7.png" class="img-fluid"></a>
          </li>
        </ul>
    </div>
    <fieldset class="profile">
      <legend class="profile-name">Draft</legend>
    
    <?php $form = ActiveForm::begin(); ?>
    <?=$form->field($model,'job_title')->textInput();?>
    <?=$form->field($model,'availability')->textInput();?>
    <?=$form->field($model,'location')->textInput();?>
    <?=$form->field($model,'job_description')->textInput();?>
    <?=$form->field($model,'expected_salary')->textInput();?>
    <?=$form->field($model,'experience')->textInput();?>
    <?=$form->field($model,'active')->checkbox();?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end();?>
    </fieldset>
  </div>
</div>      
<div class="clearfix mb-4"></div>