<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\web\View;
use app\assets\AppAsset;
AppAsset::register($this);
$js=<<<js
  //$("[data-toggle='popover']").popover();
  if($('main').find('img').hasClass('logos')){
    $('.navbar-brand').addClass('d-none');
  }
  //$(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");

  CKEDITOR.config.protectedSource.push(/<\?[\s\S]*?\?>/g);
  CKEDITOR.config.allowedContent=true;
js;
$this->registerJS($js,View::POS_END,'adddecorate');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <link rel="icon" href="<?=$this->theme->baseUrl?>/images/favicon.ico" type="image/x-icon"/>
  <?php $this->head() ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" rel="stylesheet">
<script src="<?php echo $this->theme->baseUrl; ?>/js/jquery-latest.min.js"></script>
</head>
<body>
<?php $this->beginBody(); ?>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="col-sm-3">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" style="display: block;">
          <img src="<?php echo $this->theme->baseUrl; ?>/images/icon-burger.png" style="width:;">
        <!-- <span class="navbar-toggler-icon"></span> -->
        </button>
      </div>
      <div class="col-sm-3">
        <a class="navbar-brand " href="<?=Yii::$app->getHomeUrl()?>site"><img src="<?=$this->theme->baseUrl?>/images/logo.png" class="img-fluid logo" style="width:55vw;"></a>
      </div>
      <div class="col-sm-6">
      <div class="navbar-collapse collapse" id="navbarCollapse" style="">
        
      <ul class="list-inline navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?=Yii::$app->getHomeUrl()?>site"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-home.png" style="width: ;"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-info.png" style="width: ;"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-message.png" style="width: ;"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-browser.png" style="width: ;"></a>
            </li>
            <?php if(Yii::$app->user->isGuest){?>
            <li class="nav-item">
              <a class="nav-link" href="<?=Yii::$app->getHomeUrl().'site/login'?>"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-signin.png" style="width: 50px;"></a>
            </li>
            <?php }else{ ?>
            <form id="logout" action="<?=Yii::$app->homeUrl?>site/logout" method="post">
              <?=yii\helpers\Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken)?>
            <li class="nav-item">
              <button type="submit" class="nav-link"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-signin.png" style="width: 100%;"></button>
            </li>
          </form>
            <?php } ?>
          </ul>
      </div>
    </div>
    
  </nav>
</header>
<main role="main">
<div class="container">
  <?php echo $content;?>
</div>
</main>
<footer id="footer" class="pic-models">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <span class="copyright">© Copyright 2019 Soldiers Of The Arts. All Rights Reserved.</span>
        <img src="<?php echo $this->theme->baseUrl; ?>/images/logo-soldierofheart.png">
      </div>
    </div>
  </div>
</footer>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>