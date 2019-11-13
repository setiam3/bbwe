<?php 
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$imglink=$this->theme->baseUrl.'/images/icon-blogupload.png';
$pop='<img src="'.$imglink.'" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." style="position:absolute;top:0;padding-left:7em;">';

$this->registerJsFile($this->theme->baseUrl.'/js/tagsinput.js',['position' => $this::POS_END]);
$this->registerCssFile($this->theme->baseUrl.'/css/tagsinput.css',['position' => $this::POS_HEAD]);
$this->registerJS(
"
$('.navbar div:first').append('".$pop."');

var myfile=document.getElementById('video');
myfile.onchange=function(event){
   if (isVideo($(this).val())){
        $('.video-preview').attr('src', URL.createObjectURL(this.files[0]));
        $('.video-prev').show();
      }else{
        
        $('.upload-video-file').val('');
        $('.video-prev').hide();
        alert('please input video format');
        $('form')[0].reset.click();
      }
}
function isVideo(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'm4v':
    case 'avi':
    case 'mpg':
    case 'mp4':
    case 'mov':
    case 'mpg':
    case 'mpeg':
        return true;
    }
    return false;
}

function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}
$('.bootstrap-tagsinput').children().addClass('col-11');
$('.bootstrap-tagsinput').addClass('col-8 rounded-pill');

",View::POS_READY,
    'addopa'
);
?>
<div class="row pt-5">
	<div class="member-video-form col-11 center">
		<h3 class="text-gradation">Upload the Video</h3>
    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model,'video')->fileInput(['maxlength' => true,'id'=>'video','accept'=>'video/*','class'=>'rounded-pill p-1 col-8 custom-file-input'])->label(false) ?>
    <div class="btn gradation-bg rounded-pill" onclick="document.getElementById('video').click()" style="position: absolute;top: 0;margin:3rem;right: 0;">Browse</div>
    <div style="display: none;" class='video-prev' class="pull-right">
       <video style="width: 80%;" class="video-preview" controls="controls"/>
 </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true,'class'=>'rounded-pill col-8'])->label('Title',['class'=>'col-3 text-gradation']) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true,'id'=>'tags','data-role'=>"tagsinput",'class'=>'rounded-pill p-1'])->label('Tag',['class'=>'col-3 text-gradation']) ?>

    <div class="form-group">
        <?= Html::submitButton('Post', ['class' => 'btn gradation-bg rounded-pill']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
<div class="clearfix mb-5"></div>