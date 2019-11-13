<?php

namespace denar90\waveSurferAudio;

use yii\web\AssetBundle;

/**
 * Widget asset bundle
 *
 * @author Artem Denysov <denysov.artem@gmail.com>
 *
 * @link https://github.com/denar90
 */

class WaveSurferAsset extends AssetBundle
{
	/**
	 * @inheritdoc
	 */
	public $sourcePath = '@npm/wavesurfer.js/src';

	/**
	 * @inheritdoc
	 */
	public $js = [
		'wavesurfer.js',
		'util.js',
		'webaudio.js',
		'mediaelement.js',
		'drawer.js',
		'drawer.canvas.js',
	];
}
