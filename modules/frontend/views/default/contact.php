<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile($this->theme->baseUrl.'/js/wavesurfer.min.js',['position' => $this::POS_END]);
$this->registerJsFile($this->theme->baseUrl.'/js/podcast.js',['position' => $this::POS_END]);
?>
<div class="row">
<div class="col-sm-6 decorate" >
 <div class="page-title">Contact</div>
  <div class="clear-fix"></div>
  <div class="contact-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link mr-4" id="nav-text-tab" data-toggle="tab" href="#nav-text" role="tab" aria-controls="nav-text" aria-selected="true"><img class="icon-mail" src="<?=$this->theme->baseUrl;?>/images/icon-mail2.png">
       Email</a>
    <a class="nav-item nav-link" id="nav-voice-tab" data-toggle="tab" href="#nav-voice" role="tab" aria-controls="nav-voice" aria-selected="false"><img src="<?=$this->theme->baseUrl;?>/images/voicemail.png"> Voicemail</a>
  </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show" id="nav-text" role="tabpanel" aria-labelledby="nav-text-tab">
      <?= $form->field($model, 'text_message')->textarea(['rows' => 6,'placeholder'=>'Dear Mr Admin','class'=>'form-control borderbg'])->label('Add Text Here') ?>
    </div>
    <div class="tab-pane fade" id="nav-voice" role="tabpanel" aria-labelledby="nav-voice-tab">
      <label class="control-label" for="contact-voice_message">Voice Message</label>
      <input type="hidden" name="audio64" id="audio64" accept="audio/*;capture=microphone">

      <div id="controls" class="m-4">
     <button type="button" id="recordButton" class="btn gradation-bg"><i class="fas fa-microphone-alt"></i></button>
     <button type="button" id="pauseButton" class="btn gradation-bg" disabled><i class="fas fa-pause-circle"></i></button>
     <button type="button" id="stopButton" class="btn gradation-bg" disabled><i class="fas fa-stop-circle"></i></button>
    </div>
  <div id="waveform" style="display: none;margin-bottom: 1rem;"></div>
  <div id="formats" style="display: none;">Format: start recording to see sample rate</div>
  <div class="controls mb-3" style="display: none;">
      <button type="button" class="btn gradation-bg" data-action="back"><i class="fa fa-backward"></i></button>
      <button type="button" class="btn gradation-bg" data-action="play"><i class="fa fa-play-circle"></i></button>
      <button type="button" class="btn gradation-bg" data-action="forward"><i class="fa fa-forward"></i></button>
      <button type="button" class="btn gradation-bg" data-action="mute"><i class="fa fa-volume-up"></i></button>
      <button type="reset" class="btn gradation-bg" data-action="reset"><i class="fa fa-times"></i></button>
    </div>
  <!-- <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script> -->
  <script src="<?=$this->theme->baseUrl.'/js/recorder.js'?>"></script>

    </div>
  </div>
    <div class="form-group mt-4">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-radius btn-primary pink btn-lg font-weight-medium auth-form-btn']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

</div>

<div class="col-sm-6">
  <img src="<?=$this->theme->baseUrl;?>/images/uk-map.png" class="img-fluid">
</div>
</div>
<div class="clearfix mb-5"></div>