<?php 
$this->title='information may we collect';
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
<div class="invitation container bg-ornamen center mt-3 p-1" style="max-width: 70%">
	
		<div style="background: white" class="p-2">
  <h3 class="font-commando pink">Information We May Collect From You </h3>
  <br>
  <span style="color:darkturquoise">We may collect and process the following data from you
and use it in the following ways:
</span><br>
<div class="container itemcollect">
  <div class="row mt-4">
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourname.png" class="img-fluid"><br>Your Name</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-youremail.png" class="img-fluid"><br>Your Email</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourusername.png" class="img-fluid"><br>Your Username</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourpassword.png" class="img-fluid"><br>Your Encrypted Password</a>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourvoicemessage.png" class="img-fluid"><br>Your Voice Message</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourlocation.png" class="img-fluid"><br>Your Location</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourjob.png" class="img-fluid"><br>Your Job Profession</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourdata.png" class="img-fluid"><br>Profile Data</a>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yournavigation.png" class="img-fluid"><br>Your Navigation Across Our Website Sites (www. Blackbritishwomenexist .com)</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourdirectmessage.png" class="img-fluid"><br>How You Use the Direct Messaging Services on Our Website </a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourblog.png" class="img-fluid"><br>Your Blog and Podcast Content on Our Website </a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourlive.png" class="img-fluid"><br>Any Advertisement that You Upload on Our Website </a>
    </div>
  </div>
  </div>
  
</div>

</div>
<div class="mb-10"></div>
  <div class="mb-10"></div>
  <div class="mb-10"></div>