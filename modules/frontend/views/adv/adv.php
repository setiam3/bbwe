<?php 
use yii\helpers\Html;
use yii\helpers\Url;
$script=<<<JS
$('main>div').removeClass('container');
$('main>div').addClass('row bg-adv mr-0 ml-0');
$('.card-title').attr('style','font-size:1.2rem');
JS;
$this->registerJs($script);
?>
<div class="container">
    <div class="row justify-content-md-center">
    <h1 class="text-center p-3">Black Women Exist is a Online Space for Black Women</h1>
    <p class="text-center p-2">To access our services you will need to signup as a temporary guest </p>
  </div>
  <div class="row">
  <div class="col-md-4">
    <div class="card text-center rounded gradation-bg">
          <div class="card-body">
            <h5 class="card-title rounded-top">Free Access</h5>
            <div class="card-text pt-5 m-4">It is free to access our homepage blog. You will be able to see members’ blogs, and podcasts on the homepage blog</div>
            <?=Html::a('Register',Url::to('adv/registeradv'),['class'=>'btn btn-primary rounded-lg'])?>
          </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-center rounded gradation-bg">
          <div class="card-body">
            <h5 class="card-title rounded-top">To Advertise On Website</h5>
            <div class="card-text pt-5 m-4">There will be a fee to advertise products, businesses and events on this website. Contact us for more details</div>
            <a href="#" class="btn btn-primary rounded-lg">Register</a>
          </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-center rounded gradation-bg">
          <div class="card-body">
            <h5 class="card-title rounded-top">To Hire</h5>
            <div class="card-text pt-5 m-4">There will be a fee. To gain access to our Members Directory. Unlimited access to members’ directory worldwide. To hire and see members CVs and contacts them directly</div>
            <a href="#" class="btn btn-primary rounded-lg">Register</a>
          </div>
        </div>
  </div>
  </div>
</div>