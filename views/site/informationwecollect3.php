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
  <h3 class="font-commando pink">Your Data</h3>
  <br>
  <span style="color:darkturquoise">We may collect and process the following data from you
and use it in the following ways:
</span><br>
<div class="container itemcollect">
  <div class="row mt-4 head-1">
    <div class="col">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/yourdata1-profile.png" class="img-fluid"><br>Your name, profession, profile, and blog content page will be accessible to other users on the website. Once you have registered to use the website, your information above will be automatically put in the directory database. </a>
    </div>
    <div class="col">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/yourdata2-database.png" class="img-fluid"><br>Any data that we obtain from your profile will be used for internal business development and to improve how you use the website.</a>
    </div>
    <div class="w-100"></div>
    <div class="col">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/yourdata3-info.png" class="img-fluid"><br>We will use your data to contact you to inform you of any change to our website.</a>
    </div>
    <div class="col">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/yourdata4-security.png" class="img-fluid"><br>You can securely access your account on Black British Women Exist website at any time.</a>
    </div>
  </div>
  
  </div>
  
</div>

</div>
<div class="mb-10"></div>
  <div class="mb-10"></div>
  <div class="mb-10"></div>