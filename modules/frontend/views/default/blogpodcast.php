<?php 
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$linkupload=Yii::$app->getHomeUrl().'frontend/default/blogupload';
$imglink=$this->theme->baseUrl.'/images/icon-blogupload.png';
$this->registerJsFile($this->theme->baseUrl.'/js/tagsinput.js',['position' => $this::POS_END]);
$this->registerCssFile($this->theme->baseUrl.'/css/tagsinput.css',['position' => $this::POS_HEAD]);

$this->registerJsFile($this->theme->baseUrl.'/js/wavesurfer.min.js',['position' => $this::POS_END]);
$this->registerJS(
"
$('.navbar div:first').children().append('<a href=".$linkupload."><img src=".$imglink." style=padding-left:1rem;></a>');

var myfile=document.getElementById('podcast');
myfile.onchange=function(event){
   if (ispodcast($(this).val())){
        wavesurfer.load(URL.createObjectURL(this.files[0]));
      }else{
        alert('please input podcast format');
      }
}
function ispodcast(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'mp3':
    case 'wav':
        return true;
    }
    return false;
}
var wavesurfer = WaveSurfer.create({
             container: '#waveform',
             waveColor: 'violet',
             progressColor: 'purple',
             barWidth: 3,
             backend: 'MediaElement',
         });

wavesurfer.on('error', function (e) {
 Document.getElementById('waveform').innerHTML = e;
});
wavesurfer.on('ready', function () {
    $('#waveform').show();
    $('.controls').show();
    wavesurfer.playPause();});

function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}
$('.bootstrap-tagsinput').children().addClass('col-11');
$('.bootstrap-tagsinput').addClass('col-8 rounded-pill');
$('.controls .btn').on('click', function(){
      var action = $(this).data('action');
      console.log(action);
      switch (action) {
        case 'play':
          wavesurfer.playPause();
          if($(this).children().hasClass('fa-pause')){
            $(this).children().removeClass('fa-pause');
            $(this).children().addClass('fa-play-circle');
          }else{
            $(this).children().removeClass('fa-play-circle');
            $(this).children().addClass('fa-pause');
          }
          break;
        case 'back':
          wavesurfer.skipBackward();
          break;
        case 'forward':
          wavesurfer.skipForward();
          break;
        case 'mute':
          wavesurfer.toggleMute();

          if($(this).children().hasClass('fa-volume-off')){
            $(this).children().removeClass('fa-volume-off');
            $(this).children().addClass('fa-volume-up');
          }else{
            $(this).children().removeClass('fa-volume-up');
            $(this).children().addClass('fa-volume-off');
          }
          break;
      }
    });

",View::POS_READY,
    'addopa'
);
?>
<div class="row pt-5">
	<div class="member-podcast-form col-11 center">
		<h3 class="text-gradation">Upload the Podcast</h3>
    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model,'podcast')->fileInput(['maxlength' => true,'id'=>'podcast','accept'=>'audio/*','class'=>'rounded-pill p-1 col-8 custom-file-input'])->label(false) ?>
    <div class="btn gradation-bg rounded-pill" onclick="document.getElementById('podcast').click()" style="position: absolute;top: 0;margin:3rem;right: 0;">Browse</div>
   <div id="waveform" style="display: none;margin-bottom: 1rem;"></div>
    <div class="controls mb-3" style="display: none;">
      <button type="button" class="btn gradation-bg" data-action="back"><i class="fa fa-backward"></i></button>
      <button type="button" class="btn gradation-bg" data-action="play"><i class="fa fa-play-circle"></i></button>
      <button type="button" class="btn gradation-bg" data-action="forward"><i class="fa fa-forward"></i></button>
      <button type="button" class="btn gradation-bg" data-action="mute"><i class="fa fa-volume-up"></i></button>
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