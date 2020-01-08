<?php 
use  yii\web\View;
use app\widgets\Flags;
use yii\helpers\Html;
use yii\helpers\Url;
$js=<<<js
  $('main').addClass('long-decorate');
  $('.toast').toast('show');
  
  $('.btnmore').html('show more');
  $('.collapse').on('shown.bs.collapse', function (e) {
    var idnya='#'+$(e.target).attr('id');
    $('a[href="'+idnya+'"]').html('show less');
  });
  $('.collapse').on('hidden.bs.collapse', function (e) {
    var idnya='#'+$(e.target).attr('id');
    $('a[href="'+idnya+'"]').html('show more');
  });
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
          <div class=" row">
            <?php foreach ($membermenu as $key => $value) {
              $link=Html::a(Html::img(Url::home(true).$value->icons,['class'=>'img-fluid']),Yii::$app->homeUrl.$value->url,['class'=>'nav-link center']);
              echo Html::tag('div',$link,['class'=>'col']);
            }
            ?>
          </div>
        </div>
      </fieldset>
      <fieldset class="profile center">
        <legend class="profile-name">Advertisement</legend>
          <a href='#' class="">
            <?php echo Html::img(Url::home(true).'images/adv.png',['class'=>'img-fluid']);?>
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
      <a href="profile"><i class="fa fa-arrow-left"></i> Profile</a>
      <div class="detaile">
        <!-- <div class="page-title">
            <h1 class="display-5 text-gradation">Create some content by clicking  buttons above</h1>
          </div> -->

        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="max-width: 100%;background: white;color: black;">
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <i class="fa fa-times-circle" style="color: red;"></i>
            </button>
          <div class="toast-body">
            <div class="row">
              <div class="col">
                <?php echo Html::img(Url::home(true).'images/avatars.jpg',['class'=>'img-fluid'])?>
              </div>
              <div class="col-sm-9">
                <div class="head"><strong>Owner</strong></div>
                <div class="head"><strong>Category</strong></div>
                <div class="head">type job</div>
                <div class="head">lokasi</div>
                <div class="head">date posted</div>
              </div>
            </div>

            <div class="row">
              <div class="collapse" id="collapseApply" style="width: 100%;">
                <div class="container">Number of Appliance</div>
                <div class="container">
                  <div class="row users_apply">
                    <div class="col-2 mb-1">
                  <?=Html::img(Url::home().'images/icon-profile.svg',['class'=>'profile-pic img-fluid border'])?>
                    </div>
                    <div class="col mb-1">
                      <div class="customer_appliance"><strong>Members Apply</strong></div>
                      <div class="">lasi aos doas dsdiw aiwiejiawoiawe awujeoaweij</div>
                    </div>
                  </div>

                  <div class="row users_apply">
                    <div class="col-2 mb-1">
                      <?=Html::img(Url::home().'images/icon-profile.svg',['class'=>'profile-pic img-fluid border'])?>
                    </div>
                    <div class="col mb-1">
                      <div class="customer_appliance"><strong>Members Apply</strong></div>
                      <div class="">lasi aos doas dsdiw aiwiejiawoiawe awujeoaweij</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <a class="center btnmore" data-toggle="collapse" href="#collapseApply" role="button" aria-expanded="false" aria-controls="collapseApply" style="color: #3e3d3d;"></a>
            </div>
          </div>
          
      </div>
      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="max-width: 100%;background: white;color: black;">
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <i class="fa fa-times-circle" style="color: red;"></i>
            </button>
          <div class="toast-body">
            <div class="row">
              <div class="col">
                <?php echo Html::img(Url::home(true).'images/avatars.jpg',['class'=>'img-fluid'])?>
              </div>
              <div class="col-sm-9">
                <div class="head"><strong>Owner</strong></div>
                <div class="head"><strong>Category</strong></div>
                <div class="head">type job</div>
                <div class="head">lokasi</div>
                <div class="head">date posted</div>
              </div>
            </div>

            <div class="row">
              <div class="collapse" id="collapseApply1" style="width: 100%;">
                <div class="container">Number of Appliance</div>
                <div class="container">
                  <div class="row users_apply">
                    <div class="col-2 mb-1">
                  <?=Html::img(Url::home().'images/icon-profile.svg',['class'=>'profile-pic img-fluid border'])?>
                    </div>
                    <div class="col mb-1">
                      <div class="customer_appliance"><strong>Members Apply</strong></div>
                      <div class="">lasi aos doas dsdiw aiwiejiawoiawe awujeoaweij</div>
                    </div>
                  </div>

                  <div class="row users_apply">
                    <div class="col-2 mb-1">
                      <?=Html::img(Url::home().'images/icon-profile.svg',['class'=>'profile-pic img-fluid border'])?>
                    </div>
                    <div class="col mb-1">
                      <div class="customer_appliance"><strong>Members Apply</strong></div>
                      <div class="">lasi aos doas dsdiw aiwiejiawoiawe awujeoaweij</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <a class="center btnmore" data-toggle="collapse" href="#collapseApply1" role="button" aria-expanded="false" aria-controls="collapseApply1" style="color: #3e3d3d;"></a>
            </div>
          </div>
          
      </div>
    </div>
  </div>
<div class="clearfix mb-4"></div>