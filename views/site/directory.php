<?php 
use yii\helpers\Html;
use yii\web\View;
use yii\base\Widget;
use app\widgets\Flags;
use app\widgets\Wheel;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-6 decorate" >
      <div class="container">
      <div class="page-title">DIRECTORY</div>
      <img src="<?=$this->theme->baseUrl?>/images/map.png" class="img-fluid pic-models">
      <div class="left">
      <?=Wheel::widget(['style'=>'right:50%;']);?>
      </div>
      </div>

    </div>
    <div class="col-md-6 row detaile pic-models mt-1 mb-1" >
      <?php 
        foreach ($model as $value):
          ?>
    <div class="col-lg-6">
        <div class="card text-center border">
            <div class="card-img">
              <div class="flagcon">
                <?=Flags::widget(['code'=>$value->flags->flag]);?>
              </div>
              <img class="profile-pic img-fluid" src="<?=(isset($value->photo))?Url::home(true).$value->photo:$this->theme->baseUrl.'/images/icon-profile.svg'?>" alt="Card image cap">
            </div>
          <div class="card-body">
          <h6 class="card-title">
            Name : <?=$value->name?> <br>
            Profession : <?=$value->profession?>
          </h6>
          <div class="">
            <ul class="list-inline">
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-tech-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-contact-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-hire-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-blog-icon.png"></a></li>
            </ul>
            
          </div>
          </div>
        </div>
      </div>
     <?php  endforeach;?>

      </div>
    </div>
<div class="clearfix mb-5"></div>