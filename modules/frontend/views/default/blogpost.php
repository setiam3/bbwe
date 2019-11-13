<?php 
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
$pop='<button type="button" id="popover" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Popover on bottom</button>';
$linkupload=Yii::$app->getHomeUrl().'frontend/default/blogcontent';
$imglink=$this->theme->baseUrl.'/images/icon-blogupload.png';
$this->registerJsFile($this->theme->baseUrl.'/js/tagsinput.js',['position' => $this::POS_END]);
$this->registerCssFile($this->theme->baseUrl.'/css/tagsinput.css',['position' => $this::POS_HEAD]);
$this->registerJS(
"
$('.navbar div:first').append('".$pop." ');
$('.bootstrap-tagsinput').children().addClass('col-11');
$('.bootstrap-tagsinput').addClass('col-8 rounded-pill');

var myfile=document.getElementById('cover_picture');
myfile.onchange=function(event){
   if (isVideo($(this).val())){
        $('.video-preview').attr('src', URL.createObjectURL(this.files[0]));
        $('.video-prev').show();
      }else{
        $('.upload-video-file').val('');
        $('.video-prev').hide();
        alert('please input picture format');
      }
}
function isVideo(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'jpg':
    case 'bmp':
    case 'png':
    case 'gif':
        return true;
    }
    return false;
}

function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}
",View::POS_READY,
    'addopa'
);
?>
<div class="row pt-5">
	<div class="member-video-form col-11 ">
		<h3 class="text-gradation center mb-3">Upload the Post</h3>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), ['options' => ['rows' => 6],'preset' => 'full'])->label(false) ?>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true,'class'=>'rounded-pill col-8'])->label('Title',['class'=>'col-3 text-gradation']) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true,'id'=>'tags','data-role'=>"tagsinput",'class'=>'rounded-pill p-1'])->label('Tag',['class'=>'col-3 text-gradation']) ?>
    <div class="row">
    <?=$form->field($model,'cover_picture')->fileInput(['maxlength' => true,'id'=>'cover_picture','style'=>'z-index:-1;','class'=>'rounded-pill p-1 col-8 custom-file-input'])->label('Cover Picture',['class'=>'text-gradation']) ?>
    <div class="btn gradation-bg rounded-pill" onclick="document.getElementById('cover_picture').click()" style="position: absolute;right: 0;">Browse</div>
    </div>
    <div style="display: none;margin-bottom: 2rem;" class='video-prev' class="pull-right">
       <img style="width: 50%;" class="video-preview" />
 </div>

    <div class="form-group center">
        <?= Html::submitButton('Post', ['class' => 'btn gradation-bg rounded-pill']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
<div class="clearfix mb-5"></div>
