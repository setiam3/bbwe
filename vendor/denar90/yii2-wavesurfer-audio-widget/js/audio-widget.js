/**
 * Audio widget class
 *
 * @param {Object} config
 * @constructor
 * @author Artem Denysov <denysov.artem@gmail.com>
 * @link https://github.com/denar90
 */
var AudioWidget = function (config) {
	/**
	 * @const
	 * @type {Object}
	 */
	var defaults = {
		waveColor: 'violet',
		progressColor: 'purple'
	};

	/**
	 * @const
	 * @type {Object}
	 */
	var defaultCallbacks = {
		error: Function.prototype,
		finish: Function.prototype,
		loading: Function.prototype,
		mouseup: Function.prototype,
		pause: Function.prototype,
		play: Function.prototype,
		ready: Function.prototype,
		scroll: Function.prototype,
		seek: Function.prototype
	};

	var settings = $.extend(true, {}, config);

	/**
	 * Init
	 * @public
	 * @throws Error File url was not set in settings
	 */
	function init() {
		if (!settings.fileUrl) {
			throw new Error('File url was not set in settings');
		}
		initWaveSurfer();
	}

	/**
	 * Init wave surfer
	 * @private
	 */
	function initWaveSurfer() {
		var wavesurfer = Object.create(WaveSurfer);
		settings.initSettings = settings.initSettings || {};
		var waveSurferData = {
			settings: settings.initSettings,
			fileUrl: settings.fileUrl,
			callbacks: settings.callbacks
		};
		var waveSurferSettings = $.extend(true, {}, defaults, waveSurferData.settings);
		wavesurfer.init(waveSurferSettings);
		wavesurfer.load(waveSurferData.fileUrl);
		initCallbacks(wavesurfer, waveSurferData.callbacks);
		initControlsEvents(wavesurfer);
	}

	/**
	 * Init callbacks
	 * @private
	 * @param {Object} wavesurfer Initialized wavesurfer object
	 * @param {Object} config Callbacks which was set in widget settings
	 */
	function initCallbacks(wavesurfer, callbacks) {
		callbacks = $.extend(true, {}, defaultCallbacks, settings.callbacks);
		wavesurfer.on('ready', function () {
			callbacks.ready.apply(wavesurfer, []);
		});
		wavesurfer.on('error', function () {
			callbacks.error.apply(wavesurfer, []);
		});
		wavesurfer.on('finish', function () {
			callbacks.finish.apply(wavesurfer, []);
		});
		wavesurfer.on('loading', function () {
			callbacks.loading.apply(wavesurfer, []);
		});
		wavesurfer.on('mouseup', function () {
			callbacks.mouseup.apply(wavesurfer, []);
		});
		wavesurfer.on('pause', function () {
			callbacks.pause.apply(wavesurfer, []);
		});
		wavesurfer.on('play', function () {
			callbacks.play.apply(wavesurfer, []);
		});
		wavesurfer.on('scroll', function () {
			callbacks.scroll.apply(wavesurfer, []);
		});
		wavesurfer.on('seek', function () {
			callbacks.seek.apply(wavesurfer, []);
		});
	}

	/**
	 * Init controls events for wavesurfer
	 * @private
	 * @param {Object} wavesurfer
	 */
	function initControlsEvents(wavesurfer) {
		$('body').on('click', settings.controls.btnClass, function() {
			switch($(this).data().action) {
				case 'playPause':
					wavesurfer.playPause();
					break;
				case 'play':
					wavesurfer.play();
					break;
				case 'pause':
					wavesurfer.pause();
					break;
				case 'back':
					wavesurfer.skipBackward();
					break;
				case 'forth':
					wavesurfer.skipForward();
					break;
				case 'toggleMute':
					wavesurfer.toggleMute();
					break;
				case 'toggleInteraction':
					wavesurfer.toggleInteraction();
					break;
				case 'toggleScroll':
					wavesurfer.toggleScroll();
					break;
				default:
					throw new Error ($(this).data().action + ' type is not supported');
			}
		});
	}

	/**
	 * @lends AudioWidget.prototype
	 */
	return {
		init: init
	};
};