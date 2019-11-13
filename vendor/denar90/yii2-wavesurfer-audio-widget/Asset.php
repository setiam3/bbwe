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

class Asset extends AssetBundle
{
	/**
	 * @inheritdoc
	 */
	public $sourcePath = '@denar90/waveSurferAudio/js';

	public $publishOptions = [
		'forceCopy' => true
	];

	/**
	 * @inheritdoc
	 */
	public $js = [
		'audio-widget.js'
	];

	/**
	 * @inheritdoc
	 */
	public $depends = [
		'yii\web\JqueryAsset',
		'denar90\waveSurferAudio\WaveSurferAsset'
	];
}
