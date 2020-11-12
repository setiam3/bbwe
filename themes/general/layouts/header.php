<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Gradation;
?>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-pink">
      <div class="col-md-4">
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation" style="display: block;">
          <img src="<?=$this->theme->baseUrl?>/images/icon-burger.png" style="width:;">
        </button> -->
        <?php 
        $name=''; //print_r(Yii::$app->user->identity);die;
        $photo=Url::home(true).'images/avatars.jpg';
        if(!empty(Yii::$app->user->identity->name))
          $name=Yii::$app->user->identity->name;
          $email=Yii::$app->user->identity->email??'';
        if(!empty(Yii::$app->user->identity->photo)){
          $photo=Url::home(true).Yii::$app->user->identity->photo;
        }
        $beforeLogin='
         <div class="dropdown">
          <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
          Html::img($this->theme->baseUrl.'/images/icon-burger.png',['class'=>'img-fluid'])
          .'</button>
            <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton" '.Gradation::widget(['direction'=>310]).' style="width:100%">
            <a class="dropdown-item" style="font-size: small;border-bottom: 1px solid #eee;color: white;" href="'.Url::to(['login']).'">Sign In <i class="fa fa-sign-in pull-right"></i></a>
            <a class="dropdown-item" style="font-size: small;border-bottom: 1px solid #eee;color: white;" href="'.Url::to(['register']).'">Register <i class="fa fa-edit pull-right"></i></a>
          </div></div>';
         $afterLogin='<div class="dropdown">
          <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.Html::img($this->theme->baseUrl.'/images/icon-burger.png',['class'=>'img-fluid']).'</button>
            <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton" '.Gradation::widget(['direction'=>310]).' style="width:100%">
              <div class="center" style="color: white;">
                <a href="'.Url::to(['profile']).'">
                  <img src="'.$photo.'" class="profile-pic img-fluid" style="max-width:100px;">
                <div class="memberName">'.$name.'</div>
                <div class="memberName" style="border-bottom: 1px solid #eee;">'.$email.'</div>
              </a>
              </div>
            <a class="dropdown-item pull-left" style="font-size: small;color: white;" href="'.Url::to(['updateprofile']).'">Edit Info <i class="fa fa-edit pull-right"></i></a>
            <a class="dropdown-item pull-left" style="font-size: small;color: white;" href="'.Url::to(['logout']).'" data-method="post">Sign Out <i class="fa fa-sign-out pull-right"></i></a>
          </div></div>';
          echo (empty(Yii::$app->user->id))?$beforeLogin:$afterLogin;
          ?>
      </div>
      </div>
      <div class="col-md-4 d-flex justify-content-center align-items-center">
        <a class="navbar-brand" href="<?=Url::to(['/'])?>"><img src="<?=$this->theme->baseUrl?>/images/logo.png" class="img-fluid"></a>
      </div>
      <div class="col-md-4">
      <div class="navbar-collapse collapse" id="navbarCollapse" style="">
        <ul class="list-inline navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=Url::to(['/'])?>"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-home.png"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=Url::to(['info'])?>"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-info.png"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=Url::to(['contact'])?>"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-message.png"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=Url::to(['world'])?>"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-browser.png"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>