<?php 
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\base\Widget;
use app\widgets\Wheel;
$arr=Json::decode(Yii::$app->request->cookies['_identity']);

if(is_array($arr) && $arr){
  echo 'id='.$arr[0]."\n";
  echo 'hash='.$arr[1]."\n";
  echo 'exp='.$arr[2]."\n";
}
$this->registerJS(
"
function getSelectedCountries() {
  var selected = [];
  for(var i = 0; i < map.dataProvider.areas.length; i++) {
    if(map.dataProvider.areas[i].showAsSelected)
      selected.push(map.dataProvider.areas[i].id);
  }
  return selected;
}
",View::POS_READY,
    'addopa'
);?>
<div class="mapholder pic-models ">
  <!-- <div class="masking" style="background: red;width: 100%;height: 100px;">a</div> -->
<?php
$chartConfiguration = [
  'dataProvider' => [
    'map'=>'worldHigh','getAreasFromMap'=>true,
  ],
  'areasSettings'=>[
    "autoZoom"=> false,
    "selectedColor"=> "#CC0000",
    "selectable"=> true,
    'color'=>'#ffffff',
    'alpha'=>0.5
  ],
  'imagesSettings'=>[
    'alpha'=>0.5
  ],
  'zoomControl'=>['zoomControlEnabled'=>false,'panControlEnabled'=>false],
    'type' => 'map','theme'=>'dark',//'backgroundAlpha'=>0.4
    
];
echo mitrm\amcharts\amMap::widget([
    'chartConfiguration' => $chartConfiguration, 
    'options' => ['id' => 'map'],
    'width' => '100%','height'=>'500px',
    'language' => 'en',
]);
?>
</div>

<div class="row">
<style type="text/css">
.mapholder{
  z-index:0;position: absolute;left: 0;right: 0;
}
.amcharts-chart-div > a {
    display: none !important;
}

</style>
<div id="info"></div>
<?=Wheel::widget();?>
<?php 
$this->registerJS(
'if(navigator.cookieEnabled){
$("#cookieaggreement").modal({backdrop: "static", keyboard: false});
}else{
  $("#cookieaggreement").modal({backdrop: "static", keyboard: false});
}
map.addListener("clickMapObject", function(event) {
  document.getElementById("info").innerHTML = "Clicked ID: "+ event.mapObject.id + "(" + event.mapObject.title + ")";
  if(event.mapObject.id==="GB"){
    location.href="'.Yii::$app->homeUrl.'frontend/default/"+event.mapObject.id.toLowerCase();
  }else{
    location.href="'.Yii::$app->homeUrl.'site/home";
  }
  
});',View::POS_READY
);
?>
  </div>
<div class="modal" id="cookieaggreement" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: black;color: white;">
      <div class="modal-body m-1" style="background-image:linear-gradient(black, black), radial-gradient(circle at top left, #dd4182,#3db9bd);background-clip:content-box, border-box;padding:4px;<?//=app\widgets\Gradation::widget(['type'=>'border']);?>">
        <img src="<?=$this->theme->baseUrl?>/images/privacypolicy.png" class="img-fluid">
  <p class="center m-3" style="color: #49b2ba;">This website uses cookies to help personalize content and improve your experiences.
By clicking on or navigating this website you are agreeing to allow us to collect 
information through cookies: Cookie policy.
At any time you can opt-out if you wish.
</p>
<div class="container center m-3">
  <button class="btn btn-primary col-3 m-2" data-dismiss="modal">ACCEPT</button>
  <button class="btn btn-primary col-3 m-2" data-dismiss="modal">REJECT</button>
</div>
</div>
</div>
</div>
</div>