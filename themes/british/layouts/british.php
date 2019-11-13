<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\web\View;
use app\assets\AppAsset;
AppAsset::register($this);
$js=<<<js
  if($('main').find('img').hasClass('logos')){
    $('.navbar-brand').addClass('d-none');
  }
  $(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");
  CKEDITOR.config.protectedSource.push(/<\?[\s\S]*?\?>/g);
  CKEDITOR.config.allowedContent=true;
js;
$this->registerJS($js,View::POS_READY,'rm');
// $this->registerJsFile($this->theme->baseUrl.'/js/src/popover.js', ['position' => yii\web\View::POS_END,'depends'=>['yii\web\JqueryAsset']]);
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
          <img src="<?php echo $this->theme->baseUrl; ?>/images/icon-burger.png">
        <!-- <span class="navbar-toggler-icon"></span> -->
        </button>
      </div>
      <div class="col-sm-3">
        <a class="navbar-brand" href="<?=Yii::$app->getHomeUrl()?>frontend/default"><img src="<?=$this->theme->baseUrl?>/images/logo-white.png" class="img-fluid"></a>
      </div>
      <div class="col-md-6">
      <div class="navbar-collapse collapse" id="navbarCollapse" style="">
      <ul class="list-inline navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?=Yii::$app->getHomeUrl()?>frontend/default"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-home.png"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-info.png"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-message.png"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="<?php echo $this->theme->baseUrl; ?>/images/icon-browser.png"></a>
            </li>
          </ul>
      </div>
    </div>
    
  </nav>
</header>
<main role="main">
<div class="container">
  <?php echo $content;?>
</div>
<!-- <div class="clearfix mb-10"></div> -->
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