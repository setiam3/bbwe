<?php 
//use yii\web\View;
$this->registerJsFile($this->theme->baseUrl.'/js/wavesurfer.min.js',['position' => $this::POS_END]);
$this->registerJsFile($this->theme->baseUrl.'/js/podcast.js',['position' => $this::POS_END]);

?>
    <div id="controls" class="m-4">
     <button type="button" id="recordButton" class="btn gradation-bg"><i class="fas fa-microphone-alt"></i></button>
     <button type="button" id="pauseButton" class="btn gradation-bg" disabled><i class="fas fa-pause-circle"></i></button>
     <button type="button" id="stopButton" class="btn gradation-bg" disabled><i class="fas fa-stop-circle"></i></button>
    </div>
  <div id="waveform" style="display: none;margin-bottom: 1rem;"></div>
  <div class="controls mb-3" style="display: none;">
        <button type="button" class="btn gradation-bg" data-action="back"><i class="fa fa-backward"></i></button>
        <button type="button" class="btn gradation-bg" data-action="play"><i class="fa fa-play-circle"></i></button>
        <button type="button" class="btn gradation-bg" data-action="forward"><i class="fa fa-forward"></i></button>
        <button type="button" class="btn gradation-bg" data-action="mute"><i class="fa fa-volume-up"></i></button>
        <button type="reset" class="btn gradation-bg" data-action="reset"><i class="fa fa-times"></i></button>
      </div>
  <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>