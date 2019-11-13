<?php

namespace denar90\waveSurferAudio;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use Codeception\Exception\ElementNotFound;

/**
 * WaveSurfer widget.
 *
 * @property array $settings waveSurferAudio settings
 * @author Artem Denysov <denysov.artem@gmail.com>
 *
 * @link https://github.com/denar90/yii2-wavesurfer-audio-widget
 * @link https://github.com/katspaugh/wavesurfer.js
 */
class WaveSurferAudioWidget extends Widget
{
    /**
     * @var array Widget settings
     */
    public $settings = [];

    /**
     * @var array Settings for js widget
     */
    private $widgetSettings = [];

    /**
     * Initialize the widget
     */
    public function init()
    {
        $this->setSettingsForJs();
        parent::init();
    }

    /**
     * Run the widget
     */
    public function run()
    {
        //widget container starts
        echo Html::beginTag('div', ['class' => 'audio-widget-container']);
        //set container id
        if (ArrayHelper::keyExists('init', $this->settings, false)) {
            $containerId = ArrayHelper::keyExists('container', $this->settings['init'], false) ? $this->settings['init']['container'] : $this->getId();
        } else {
            $containerId = $this->getId();
        }
        //set show audio container
        echo Html::tag('div', '', ['id' => $containerId]);
        //show controls if they are present
        if (ArrayHelper::keyExists('controls', $this->settings, false) && !empty($this->settings['controls'])) {
            $this->showControls();
        }
        //widget container ends
        echo Html::endTag('div');
        $this->registerWidgetScripts();
    }

    /**
     * Show widget controls
     */
    private function showControls()
    {
        //set controll btn class name
        $jsClassName = 'js-audio-widget-action';
        foreach($this->settings['controls'] as $key => $value) {
            if ($value) {
                $cssClassName = 'audio-widget-' . $key;
                $options['class'] = $cssClassName . ' ' . $jsClassName;
                $options['data-action'] = $key;
                //show controll btn
                echo Html::button($key, $options);
            }
        }
        $this->widgetSettings['controls'] = [
            'btnClass' => '.' . $jsClassName
        ];
    }

    /**
     * Set settings for js widget
     * @throws ElementNotFound fileUrl was not set
     */
    private function setSettingsForJs() {
        //check if audio url was set
        if (ArrayHelper::keyExists('fileUrl', $this->settings, false) && !empty($this->settings['fileUrl'])) {
            $this->widgetSettings['fileUrl'] = $this->settings['fileUrl'];
        } else {
            throw new ElementNotFound('fileUrl was not set');
        }
        if (ArrayHelper::keyExists('callbacks', $this->settings, false) && !empty($this->settings['callbacks'])) {
            $this->widgetSettings['callbacks'] = $this->settings['callbacks'];
        }
        $this->widgetSettings['initSettings'] = ArrayHelper::keyExists('init', $this->settings, false) ?  $this->settings['init'] : [];
        $containerName = ArrayHelper::keyExists('container', $this->widgetSettings['initSettings'], false) ? $this->widgetSettings['initSettings']['container'] : $this->getId();
        $this->widgetSettings['initSettings']['container'] = '#' . $containerName;

    }

    /**
     * Register widget asset
     */
    private function registerWidgetScripts()
    {
        $view = $this->getView();
        $asset = Yii::$container->get(Asset::className());
        $asset::register($view);
        $this->widgetSettings = Json::encode($this->widgetSettings);
        $view->registerJs("var audioWidget = new AudioWidget(" . $this->widgetSettings . "); audioWidget.init();", $view::POS_READY);
    }
}
