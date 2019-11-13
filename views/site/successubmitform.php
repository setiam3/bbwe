<?php 
$this->title='successubmitform';
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
  <img src="<?=$this->theme->baseUrl?>/images/logo-bbw.png" class="img-fluid" style="width: 100px;">
</div>
<div class="invitation container bg-ornamen center mt-3 p-1">
	<div class="p-1" style="background-image:linear-gradient(transparent, transparent), radial-gradient(circle at top left, #dd4182,#3db9bd);background-clip:content-box, border-box;">
		<div style="background: white" class="p-2">
  <div class="container">
      <img src="<?=$this->theme->baseUrl?>/images/logo-bbw-name.png" class="img-fluid">
  </div>
  <br>
  <span style="color:darkturquoise">Welcome to Black Women Exist website!</span><br>
  <p style="text-align: left;">Hi</p>
  <p style="text-align: left;">We received a request that you setup an account with Black Women Exist website. If this is correct, please confirm by clicking the button bellow.</p>
  <div class="container col-sm-8 mt-3">
    <a href="#confirm" class="btn btn-primary pink btn-block">Confirm Email</a>
  </div>
  <br>
  <p style="text-align: left">If you did not create Black Women Exist account using this email  address, please contact us at Support@Blackwomenexist.com</p>
</div>
</div>
</div>