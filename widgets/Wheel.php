<?php

namespace app\widgets;

use Yii;
use yii\web\View;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\WheelMenu;
use yii\db\Expression;
use yii\helpers\Url;

class Wheel extends Widget {
    public $items;
    public $style;

    public function init() {
        parent::init();
        $this->getView()->registerCSSFile(Yii::$app->homeUrl . "css/radial-nav.css", ['position' => \yii\web\View::POS_HEAD]);
        $this->getView()->registerJsFile(Yii::$app->homeUrl . "js/radial-nav.min.js", ['position' => \yii\web\View::POS_END]);
//        if ($this->style === '') {
//            $this->style = '';
//        } else {
//            $this->style = $this->style;
//        }
        $this->getView()->registerJsVar('baseUrl', Url::home(true));
    }

    public function items() {
        $items = WheelMenu::find()->where(['status' => 1])->orderBy(new Expression('rand()'))->all();
        $item_length = sizeof($items);

        if ($item_length > 0) {
            // it does not work for navigations with number of items less than or equal 5
            while ($item_length <= 5) {
                $items = array_merge($items, $items);
                $item_length *= 2;
            }
        }

        $output = '';
        $item_index = -1;
        foreach ($items as $value) {
            $item_index++;
//            $links = '<a href="' . Yii::$app->homeUrl . $value->url . '"><img class="items-icon" src="' . Yii::$app->homeUrl . $value->icons . '"><div style="font-family:exo-regular;font-size:0.7rem;">' . $value->label . '</div></a>';
//            $separator = '<a><img src="' . Yii::$app->homeUrl . 'images/separator.png" style="transform: rotateZ(87deg);padding: 58px;"></a>';
//            $output .= '<li>' . $links . '</li>' . '<li>' . $separator . '</li>';

            // nav item classes
            $item_class = 'radial-nav-item';
            if ($item_index == 0) {
                $item_class .= ' radial-nav-item-active';
            } else if ($item_index == 1) {
                $item_class .= ' radial-nav-item-next-1';
            } else if ($item_index == 2) {
                $item_class .= ' radial-nav-item-next-2';
            } else if ($item_index == $item_length - 2) {
                $item_class .= ' radial-nav-item-prev-2';
            } else if ($item_index == $item_length - 1) {
                $item_class .= ' radial-nav-item-prev-1';
            }

            // output
            $output .= sprintf('<li class="%1$s"><a href="%2$s"><span><img class="items-icon" src="%3$s"></span><span class="radial-nav-item-text">%4$s</span></a></li>',
                $item_class,
                Yii::$app->homeUrl . $value->url,
                Yii::$app->homeUrl . $value->icons,
                $value->label
            );
        }
        return ($output);
    }

//    public function run() {
//        return '
//            <nav class="radialnav" style="' . $this->style . '">
//                <span class="ellipsis"><img src="' . Url::home(true) . '/images/directory-show-menu.png" class="img-fluid"></span>
//                <a href="#" class="ellipsis2"></a>
//                <a href="#" class="ellipsis3"></a>
//                <a href="#" class="ellipsis4"></a>
//                <div class="button left"></div>
//                <div class="maskwheel" style="' . $this->style . '"></div>
//                <ul class="menu" style="position: absolute;display:none;">
//                    ' . $this->items() . '
//                </ul>
//                <div class="button right"></div>
//            </nav>';
//    }

    public function run() {
        ob_start();
        ?>
        <nav class="radial-nav">
            <div class="radial-nav-ellipsis">
                <img src="<?php echo Url::home(true); ?>/images/directory-show-menu.png" class="img-fluid">
            </div>
            <div class="radial-nav-navigation-holder">
                <div type="button" class="radial-nav-btn-prev"></div>
                <div type="button" class="radial-nav-btn-next"></div>
                <a href="#" class="radial-nav-ellipsis3"></a>
                <a href="#" class="radial-nav-ellipsis4"></a>
                <a href="#" class="radial-nav-ellipsis2"></a>
                <a href="#" class="radial-nav-ellipsis5"><span>&times;</span></a>
                <ul>
                    <?php echo $this->items(); ?>
                </ul>
            </div>
        </nav>
        <?php return ob_get_clean();
    }
}
