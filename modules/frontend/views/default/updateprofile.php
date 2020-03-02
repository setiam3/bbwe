<?php 
use  yii\web\View;
use app\widgets\Flags;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;
use app\widgets\Alert;
use yii\bootstrap4\Modal;
$js=<<<js
  $('main').addClass('long-decorate');
js;
$this->registerJS($js,View::POS_READY,'adddecorate');
$js2=<<<javascript
  function deleteCv(url,data){
    $.ajax({
      url:url,
      type:'POST',
      data:{id:data},
      success: function(data) {
        var obj=JSON.parse(data);
        if(obj.success==true){
          alert(obj.message);
          $('.imgcv').remove();
        }else{
          alert(obj.message);
        }
      }
      });
  }
javascript;
$this->registerJS($js2,View::POS_END,'function');
?>
<div class="container">
  <?=Alert::widget();?>
  <a href="profile"><i class="fa fa-arrow-left"></i> Profile</a>
  <div id="form-profile" class="container">
          <?php $form= ActiveForm::begin(); ?>
          <div class="row form-group">
            <div class="col-md-3">
              <img class="img-fluid" src="<?=(isset($model->photo))?Url::home().$model->photo:Url::home().'/images/icon-profile.svg'?>" style="border-radius: 50%;border: 4px solid white;">
            </div>
            <div class="col-md-6">
              <?php
              echo $form->field($model,'name')->textInput([]);
              echo $form->field($model,'skill')->textInput()->label('Occupation');
              ?>
            </div>
            <div class="col-md-9">
            <?php 
              echo $form->field($model,'about')->textarea(['rows'=>4,'cols'=>4])->label('About me');
              if(!empty($model->cv)){
                $ext=pathinfo(Yii::$app->basePath.$model->cv);
                $image=['jpg','jpeg','png'];
                //if(!in_array(strtolower($ext['extension']),$image)){
                if($ext['extension']=='pdf'){
                  $this->context->genPdfThumbnail($model->cv,$ext['basename'].'.jpeg');
                  $preview=Yii::getAlias('@urlUpload').$model->cv.'.jpeg';
                }elseif(in_array(strtolower($ext['extension']),$image)){
                  $preview=Yii::getAlias('@urlUpload').$model->cv;
                }else{
                  $preview='';
                }
                echo Html::a(Html::img($preview,['class'=>'imgcv img-fluid','style'=>'max-width:28vh;']).Html::a('<i class="fa fa-minus"></i>','#',['class'=>'imgcv','style'=>'padding: 5px 10px;border: 3px;border-radius: 50%;background: #cc0379;','onclick'=>'javascript:deleteCv("deleteprofilecv","'.$model->id.'")']),Yii::getAlias('@urlUpload').$model->cv,['target'=>'_blank']);
              }
              echo $form->field($model,'cv')->fileInput()->label('CV');
              ?>
              Job Packet 
              <div class="container">
                <div class="row" style="background: white;color: black;border-radius: 4px;">
                  <div class="col-md-12">Price for freelance jobs</div>
                  <?php 
                  $annual_salary='';
                  foreach ($model->memberJobPackets as $key => $value) {
                    echo '<div class="col-md-4 center" >'.
                        '<div style="border:solid 1px;border-radius:3px; '.app\widgets\Gradation::widget(['type'=>'border','direction'=>'45','width'=>3]).'">'.
                        '<div class="packet_head" style="border-bottom:3px solid #49b2ba;">'.$value->packet_name.'</div>'.
                        '<div class="packet_price">'.$this->context->money($value->packet_price).'</div>'.
                        '<div class="packet_description">'.$value->packet_description.'</div>'.
                        '</div>'.
                        '</div>';
                    $annual_salary=$value->annual_salary;
                  }
                  ?>
                <?php echo '<div class="col-md-12">Annual Salary <br><span style="font-size:xxx-large;">
                  '.$this->context->money($annual_salary).'</span></div>';?>
                  <div class="container"><button type="button" <?=app\widgets\Gradation::widget(['type'=>'background','direction'=>'270'])?> data-toggle="modal" data-target="#modalJobpacket" class="btn-radius btn-primary border-0 pull-right mb-4">Edit</button>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="container">
              <div class="col-auto mr-auto">
                <?=Html::submitButton('Save', ['class' => 'pull-right btn btn-radius btn-primary pink btn-lg font-weight-medium auth-form-btn'])?>
              </div>
            </div>
          </div>
          <?php ActiveForm::end(); ?>
    </div>
  </div>
<div class="clearfix mb-4"></div>
<?php Modal::begin(['size'=>'modal-xl','title'=>'edit','options'=>['id'=>'modalJobpacket']]);
echo 'test';
Modal::end();
?>
