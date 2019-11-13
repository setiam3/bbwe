yii2-wavesurfer-audio-widget
========================
Audio widget for yii2 based on [wavesurfer.js](https://github.com/katspaugh/wavesurfer.js)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

* Either run

```
php composer.phar require --prefer-dist "denar90/yii2-wavesurfer-audio-widget": "dev-master"
```
or add

```json
"denar90/yii2-wavesurfer-audio-widget": "dev-master"
```

to the require section of your application's `composer.json` file.

Usage
-----

In your view add 

```php
use denar90\waveSurferAudio\WaveSurferAudioWidget;
```

In place where you need widget to be shown add

```php
echo WaveSurferAudioWidget::widget([
	'settings' => [
		'fileUrl' => url_to_your_mp3_file,
		'init' => [
			'container' => 'selector_name' //it has to be id not class
		],
		'callbacks' => [
			'ready' => new \yii\web\JsExpression("function(event) {
				this.play();
			}")
		],
		'controls' => [
			'play' => true,
			'pause' => true
		]
	]
]);
```

Options
-------
Init options sets in `init` array.
[List of options](https://github.com/katspaugh/wavesurfer.js#wavesurfer-options)

Supported javascript callbacks sets in `callbacks` array

* `error` – Occurs on error. Callback will receive (string) error message.
* `finish` – When it finishes playing.
* `loading` – Fires continuously when loading via XHR or drag'n'drop.
* `mouseup` - When a mouse button goes up.
* `pause` – When audio is paused.
* `play` – When play starts.
* `ready` – When audio is loaded, decoded and the waveform drawn.
* `scroll` - When the scrollbar is moved.
* `seek` – On seeking.

Supported controls sets in `controls` array

* `playPause` - Plays if paused, pauses if playing.
* `play` - Starts playback from the current position. Optional start and end measured in seconds can be used to set the range of audio to play.
* `pause` - Stops playback.
* `back` - Rewind skipLength seconds.
* `forth` - Skip ahead skipLength seconds. 
* `toggleMute` -  Toggles the volume on and off.
* `toggleInteraction` - Toggle mouse interaction.
* `toggleScroll` - Toggles scrollParent.
