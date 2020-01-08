<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\web\View;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\widgets\Gradation;
AppAsset::register($this);
$js=<<<js
  if($('main').find('img').hasClass('logos')){
    $('.navbar-brand').addClass('d-none');
  }
  $(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");
  setTimeout(function(){ $('.alert').remove(); }, 3000);
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
<?php include('header.php');?>
<main role="main">
<div class="container">
  <?php echo $content;?>
</div>
</main>
<footer id="footer" class="pic-models">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <span class="copyright">© Copyright 2020 Soldiers Of The Arts. All Rights Reserved.</span>
        <img src="<?php echo $this->theme->baseUrl; ?>/images/logo-soldierofheart.png">
      </div>
    </div>
  </div>
</footer>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>