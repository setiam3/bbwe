<?php 
$this->title='confirm emai';
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
  <img src="<?=$this->theme->baseUrl?>/images/logo-brithis-new.png" class="img-fluid" style="width: 100px;">
</div>
<div class="invitation container bg-ornamen center mt-3 p-1">
	<div class="p-1" style="background-image:linear-gradient(transparent, transparent), radial-gradient(circle at top left, #dd4182,#3db9bd);background-clip:content-box, border-box;">
		<div style="background: white" class="p-2">
  <div class="container">
      <img src="<?=$this->theme->baseUrl?>/images/logo-british-name.png" class="img-fluid">
  </div>
  <br>
  <span style="color:darkturquoise">Welcome to <br>Black British Women Exist Website!</span><br>
  <p style="color: magenta">You have successfully submitted your form. Before you can log into your account, please verify your email address. We have sent a confirmation email to you.</p>
</div>
</div>
</div>