<?php
// use yii\web\View;
 use yii\helpers\Url;
// use yii\helpers\Html;
// $this->title = 'Simple Chat';
 $absoluteHomeUrl = Url::home(true);
// $script=<<< JS
// var dbRef = new Firebase("https://bbwe-2736d.firebaseio.com/");
// const messageRef = dbRef.child('message');
// const userRef = dbRef.child('user');
// JS;
// $this->registerJs($script,View::POS_END,'config');
// $this->registerJsFile('https://cdn.firebase.com/js/client/2.2.3/firebase.js',['position'=>View::POS_END]);
//$this->registerJsFile(Yii::$app->homeUrl.'js/chat_realtime.js',['position'=>View::POS_END]);
$this->registerJsFile($this->theme->baseUrl.'/js/wavesurfer.min.js',['position' => $this::POS_END]);
$this->registerJsFile($this->theme->baseUrl.'/js/podcast.js',['position' => $this::POS_END]);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Chat Realtime</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet">
		<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="//onesignal.github.io/emoji-picker/lib/css/emoji.css" rel="stylesheet">
		<link href="<?=Yii::$app->homeUrl?>css/chat.css" rel="stylesheet">
		 
	</head>
	<body>
		<div class="container" id="chat-realtime">
			<div class="row app-one">
					<div class="col-sm-4 side">
						<div class="side-one">
							<div class="row heading">
								<div class="col-sm-2 col-xs-2 heading-avatar">
									<div class="heading-avatar-icon">
										<img class="me" src="<?=Yii::$app->homeUrl?>images/icon-profile.svg">
									</div>
								</div>
								<div class="col-sm-2 col-xs-2  heading-logout  pull-right">
									<i class="fa fa-sign-out fa-2x  pull-right" aria-hidden="true"></i>
								</div>
								<div class="col-sm-2 col-xs-2 heading-compose  pull-right">
									<i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
								</div>
								<div class="col-sm-2 col-xs-2 heading-home  pull-right" data-tipe="rooms" data-avatar="<?=Yii::$app->homeUrl?>images/public.jpg" id="Public">
									<span class="inbox-status">0</span>
									<i class="fa fa-home fa-2x  pull-right" aria-hidden="true"></i>
								</div>
							</div>
							
							<div class="row searchBox">
								<div class="col-sm-12 searchBox-inner">
									<div class="form-group has-feedback">
										<input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
									</div>
								</div>
							</div>
							<div class="row sideBar">
								<!-- side1 -->
							</div>
						</div>
						<div class="side-two">
							<div class="row newMessage-heading">
								<div class="row newMessage-main">
									<div class="col-sm-2 col-xs-2 newMessage-back">
										<i class="fa fa-arrow-left" aria-hidden="true"></i>
									</div>
									<div class="col-sm-10 col-xs-10 newMessage-title">
										New Chat
									</div>
								</div>
							</div>
							<div class="row composeBox">
								<div class="col-sm-12 composeBox-inner">
									<div class="form-group has-feedback">
										<input id="composeText" type="text" class="form-control" name="searchText" placeholder="Search People">
									</div>
								</div>
							</div>
							<div class="row compose-sideBar">
								<!-- side2 -->
							</div>
						</div>
					</div>
					<div class="col-sm-8 conversation">
						<div class="row heading">
							<div class="col-sm-1 col-xs-1 user-back">
								<i class="fa fa-arrow-left" aria-hidden="true"></i>
							</div>
							<div class="col-sm-1 col-md-1 col-xs-3 heading-avatar">
								<div class="heading-avatar-icon">
									<img class="you" src="<?=Yii::$app->homeUrl?>images/public.jpg">
								</div>
							</div>
							<div class="col-sm-6 col-xs-4 heading-name">
								<p id="heading-name-meta">John Doe</p>
								<span id="heading-online">Online</span>
							</div>
							<div class="col-sm-1 col-xs-2 user-fork pull-right">
								<!-- <a href="https://github.com/bachors/Chat-Realtime" title="Fork me on github" target="_BLANK"><i class="fa fa-code-fork fa-2x" aria-hidden="true"></i></a> -->
							</div>
						</div>
						<div class="row message" id="conversation">
							<p class="messages">
								<!-- message -->
							</p>
							<div class="row message-previous">
								<div class="col-sm-12 previous">
									<a>
									Show Previous Message!
									</a>
								</div>
							</div>
							<div class="message-scroll">
								<div id="scroll">
									<a>
									<i class="fa fa-chevron-down"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="row imagetmp">
								<div id="reviewImg"></div>
						</div>
						<div class="row reply">
							<div class="col-sm-1 col-xs-1 reply-recording" align="center">
								<label class="btn btn-default fileinput">
								<i class="fa fa-camera fa-2x" aria-hidden="true"></i> <input type="file" id="fileinput" multiple style="display: none;">
								</label>	
							</div>
							<div class="col-sm-10 col-xs-8 reply-main">
								<textarea class="form-control" data-emojiable="true" rows="1" id="comment"></textarea>
							</div>

  <!-- <div id="waveform" style="display: none;margin-bottom: 1rem;"></div>
  <div id="controls" class="m-4">
     <button type="button" id="recordButton" class="btn gradation-bg"><i class="fas fa-microphone-alt"></i></button>
     <button type="button" id="pauseButton" class="btn gradation-bg" disabled><i class="fas fa-pause-circle"></i></button>
     <button type="button" id="stopButton" class="btn gradation-bg" disabled><i class="fas fa-stop-circle"></i></button>
    </div> -->
							<div class="col-sm-1 col-xs-1 reply-send" id="send">
								<i class="fa fa-send fa-2x pull-right" aria-hidden="true"></i>
							</div>
						</div>
					</div>
			</div>
		</div>

		<!-- <script src="//code.jquery.com/jquery-2.1.3.min.js"></script> -->
		<script type="text/javascript" src="<?=Yii::$app->homeUrl?>js/jquery-latest.min.js"></script>
		<!-- Include Firebase Library -->
		<!-- <script src="https://cdn.firebase.com/js/client/2.2.3/firebase.js"></script> -->
     
		<!-- Firebase -->
		<script src="//www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
		<script src="//www.gstatic.com/firebasejs/3.9.0/firebase-app.js"></script>
		<script src="//www.gstatic.com/firebasejs/3.9.0/firebase-database.js"></script>
		<!-- jQuery -->
		<!-- <script src="js/jquery.min.js"></script> -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
		<!-- emoji-picker -->
		<script type="text/javascript" src="//onesignal.github.io/emoji-picker/lib/js/config.js"></script>
		<script type="text/javascript" src="//onesignal.github.io/emoji-picker/lib/js/util.js"></script>
		<script type="text/javascript" src="//onesignal.github.io/emoji-picker/lib/js/jquery.emojiarea.js"></script>
		<script type="text/javascript" src="//onesignal.github.io/emoji-picker/lib/js/emoji-picker.js"></script>
		<!-- chat_realtime -->
		<script type="text/javascript">
			const domain = "<?=$absoluteHomeUrl?>";
			// MySQL API
			const apis = "<?=$absoluteHomeUrl.'chat/index'?>";
			// set image directori
			const imageDir = '<?="assets"?>';
			// Replace with: your firebase account
const config = {
   apiKey: "AIzaSyAGJiidg04bkf9DYtLp6oWXMsjme_r_bM4",
  // authDomain: "bbwe-2736d.firebaseapp.com",
  databaseURL: "https://bbwe-2736d.firebaseio.com",
  // projectId: "bbwe-2736d",
  // storageBucket: "",
  // messagingSenderId: "703571193362",
  // appId: "1:703571193362:web:3d27d8005442741b"
};
firebase.initializeApp(config);

// create firebase child
//var dbRef = new Firebase("https://bbwe-2736d.firebaseio.com/");
			const dbRef = firebase.database().ref();
			//const dbRef = new Firebase("https://bbwe-2736d.firebaseio.com/");
			const messageRef = dbRef.child('message');
			const userRef = dbRef.child('user');
		</script>
		<script type="text/javascript" src="<?=Yii::$app->homeUrl?>js/chat_realtime.js"></script>
		<!-- <script type="text/javascript" src="<?=Yii::$app->homeUrl?>js/wavesurfer.min.js"></script>
		<script type="text/javascript" src="<?=Yii::$app->homeUrl?>js/podcast.js"></script> -->
	</body>
</html>