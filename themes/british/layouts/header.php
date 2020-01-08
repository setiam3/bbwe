<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Gradation;
?>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="col-sm-3">
        <?php 
        $name='';
        if(!empty(Yii::$app->user->identity->name))
          $name=Yii::$app->user->identity->name;
        $beforeLogin='
         <div class="dropdown">
          <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
          Html::img($this->theme->baseUrl.'/images/icon-burger.png',['class'=>'img-fluid'])
          .'</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" '.Gradation::widget(['direction'=>180]).'>
            <a class="dropdown-item" style="font-size: small;border-bottom: 1px solid #eee;color: white;" href="'.Url::to(['login']).'">Sign In <i class="fas fa-sign-in-alt pull-right"></i></a>
            <a class="dropdown-item" style="font-size: small;border-bottom: 1px solid #eee;color: white;" href="'.Url::to(['register']).'">Register <i class="far fa-edit pull-right"></i></a>
          </div></div>';
         $afterLogin='<div class="dropdown">
          <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.Html::img($this->theme->baseUrl.'/images/icon-burger.png',['class'=>'img-fluid']).'</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" '.Gradation::widget(['direction'=>180]).' >
              <div class="center" style="color: white;">
                <h2>Hello,</h2>
                <a href="'.Url::to(['profile']).'">
                  <img src="'.Url::home(true).'images/avatars.jpg" class="profile-pic img-fluid" style="max-width:60%">
                <div class="memberName">'.$name.
                '</div>
              </a>
              </div>
            <a class="dropdown-item" style="font-size: small;border-bottom: 1px solid #eee;color: white;" href="'.Url::to(['updateprofile']).'">Edit Info <i class="far fa-edit pull-right"></i></a>
            <a class="dropdown-item" style="font-size: small;border-bottom: 1px solid #eee;color: white;" href="'.Url::to(['logout']).'" data-method="post">Sign Out <i class="fas fa-sign-out-alt pull-right"></i></a>
          </div></div>';
          echo (empty(Yii::$app->user->id))?$beforeLogin:$afterLogin;
          ?>
      </div>
      </div>
      <div class="col-sm-3">
        <a class="navbar-brand" href="<?=Url::to(['index'])?>"><img src="<?=$this->theme->baseUrl?>/images/logo-white.png" class="img-fluid"></a>
      </div>
      <div class="col-md-6">
      <div class="navbar-collapse collapse" id="navbarCollapse" style="">
        <ul class="list-inline navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=Url::to(['index'])?>"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-home.png"></a>
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