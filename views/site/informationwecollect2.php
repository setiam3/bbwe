<?php 
$this->title='information may we collect data';
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
  <br>
  <span style="color:darkturquoise">Collecting all of this information allows you to securely access your account on the Black British Women Exist website:
</span><br>
<div class="container itemcollect">
  <div class="row head m-2">
    <div class="col">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-clock.png" class="img-fluid"><br>Any Time</a>
    </div>
    <div class="col"><a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-location.png" class="img-fluid"><br>Any Where</a></div>
    <div class="col"><a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-device.png" class="img-fluid"><br>Any Device</a></div>
  </div>

    <span style="color:darkturquoise">Collecting all of this information allows you to use our site to:</span>

  <div class="row mt-4">
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourdata.png" class="img-fluid"><br>Create a portofolio</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-worldwide.png" class="img-fluid"><br>Gain access to our worldwide directory</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-yourvoicemessage.png" class="img-fluid"><br>Create opportunities by advertising your business, products, and services</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-messaging.png" class="img-fluid"><br>Participate on the site LIVE Chatroom services</a>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-people.png" class="img-fluid"><br>Connect with other users on the site</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-message.png" class="img-fluid"><br>Send and receive direct messages</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-recordvoice.png" class="img-fluid"><br>Record Voice Messages</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-upload.png" class="img-fluid"><br>Upload Content</a>
    </div>
  </div>
  <div class="row mt-4 justify-content-center ">
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-findjob.png" class="img-fluid"><br>Post and apply for jobs</a>
    </div>
    <div class="col-3">
      <a style="color:black" href="" ><img src="<?=$this->theme->baseUrl?>/images/icon-target.png" class="img-fluid"><br>Increase your online visibility</a>
    </div>
    
  </div>
  </div>
  
</div>

</div>
<div class="mb-10"></div>
  <div class="mb-10"></div>
  <div class="mb-10"></div>