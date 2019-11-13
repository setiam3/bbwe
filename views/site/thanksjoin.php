<?php 
use yii\web\View;
$js=<<<js
  $("header").remove();
  $("main>div").removeClass('container');
  $("main").css('padding',0);
  $("body").addClass('thanks-join');
js;
$this->registerJS($js,View::POS_READY,'adddecorate');
?>
<div class="container center">
  <img src="<?=$this->theme->baseUrl?>/images/icon-bbwe.png" class="img-fluid" style="width: 90px;">
</div>
<div class="invitation container bg-ornamen center">
  <div class="container">
    <div class="logo">
      <img src="<?=$this->theme->baseUrl?>/images/logo.png" class="img-fluid">
    </div>
  </div>
  <br>
  <div class="container col-sm-8">Thank you for joining the Black British Women Exist website!</div>
  <br>
  <div class="container col-sm-8">
    <a href="login" class="btn btn-primary pink btn-block">Click here to sign in</a>
  </div>
  <br>
  <a href="#" class="text-gradation">Contact Us</a>   |   <a href="#" class="text-gradation">Terms and Conditions</a>
</div>