<?php 
use  yii\web\View;
use app\widgets\Flags;
use yii\helpers\Html;
use yii\helpers\Url;
$js=<<<js
  $('main').addClass('long-decorate');
js;
$this->registerJS($js,View::POS_READY,'adddecorate');
?>
<div class="row">
    <div class="page-title">
      <img class="profile-pic img-fluid" src="<?=(isset($model->photo))?Url::home().$model->photo:Url::home().'/images/icon-profile.svg'?>" style="width:22vmax;height: 22vmax;background:#000;padding: 1vmax;" alt="Card image cap">
   </div>
  </div>
  <div class="row">
    <div class="col-sm-5" >
      <fieldset class="profile">
        <legend class="profile-name"><?=$model->name?></legend>
        <div class="profile-skill container center">
        <?=(!empty($model->skill))?$model->skill:'';?>
          <div class="list-inline">
            <a href="#" class="nav-link center"><img src="<?=$this->theme->baseUrl;?>/images/icon-breifcase.png" style="width:3rem"></a>
            <a href="#" class="nav-link center"><img src="<?=$this->theme->baseUrl;?>/images/icon-mailbox.png" style="width:3rem"></a>
            <a href="#" class="nav-link center"><img src="<?=$this->theme->baseUrl;?>/images/icon-world.png" style="width:3rem"></a>
            <a href="#" class="nav-link center"><img src="<?=$this->theme->baseUrl;?>/images/icon-megaphone.png" style="width:3rem"></a>
            <a href="#" class="nav-link center"><img src="<?=$this->theme->baseUrl;?>/images/icon-chats.png" style="width:3rem"></a>
          </div>
        </div>
      </fieldset>
      <fieldset class="profile center">
        <legend class="profile-name">Advertisement</legend>
          <a href='#'>
            <?php echo Html::img(Url::home().'images/adv.png',['class'=>'center']);?>
          </a>
          <H5>Arround New York</H5>
          <p>Kristina Josh</p>
      </fieldset>
      <h5 class="center">You may also want to see</h5><br>
      <div class="col-lg-9 center">
        <?php foreach($member as $row){?>
        <div class="card border">
              <div class="card-img">
                <div class="flagcon">
                  <?=Flags::widget(['code'=>$row->flags->flag]);?>
                </div>
                <a href="<?=Url::home().'frontend/default/profile?id='.$row->id?>">
                <img class="profile-pic img-fluid border" src="<?=(isset($row->photo))?Url::home().$row->photo:Url::home().'/images/icon-profile.svg'?>" style="width:20vmax;height: 20vmax;background:#000;padding: 1vmax;" alt="Card image cap"></a>
              </div>
            <div class="card-body">
            <h6 class="card-title">
              Name : <?=$row->name?> <br>
              Profession : <?=$row->profession?>
            </h6>
            <div class="">
              <ul class="list-inline">
                <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl;?>/images/directory-tech-icon.png"></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl;?>/images/directory-contact-icon.png"></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl;?>/images/directory-hire-icon.png"></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl;?>/images/directory-blog-icon.png"></a></li>
                
              </ul>
              
            </div>
            </div>
          </div>
        <?php }?>
        </div>
    </div>

    <div class="col-sm-7">
      <div class="menu-profile">
        <ul class="list-group list-group-horizontal-sm">
          <li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/profile-new.png" class="img-fluid"></a>
          </li>
          <li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/profile-message.png" class="img-fluid"></a>
          </li>
          <li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/profile-camera.png" class="img-fluid"></a>
          </li>
          <li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/profile-video.png" class="img-fluid"></a>
          </li>
          <li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/profile-useradd.png" class="img-fluid"></a>
          </li><li class="list-group-item black">
            <a href="#"><img src="<?=$this->theme->baseUrl;?>/images/profile-post.png" class="img-fluid"></a>
          </li>
          
        </ul>
      </div>
      <div class="detaile">
        <div class="page-title">
          Job listing here
        </div>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Holy guacamole!</strong> You should check in on some of those fields below.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?php Yii::$app->session->setFlash('success', 'This is the message');?>
      </div>
      
    </div>
  </div>
<div class="clearfix mb-4"></div>