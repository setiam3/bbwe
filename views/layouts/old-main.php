<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>
<?php print_r($this->theme->basePath);?>
<?php print_r($this->theme->baseUrl);?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',

        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => '', 'url' => ['/site/index'],
                'linkOptions'=>[
                'style'=>'background-image:url('.Yii::$app->homeUrl.'images/icon-home.png);background-size:100%;background-repeat:no-repeat;width:71px;height:71px;',
                ]
            ],
            ['label' => '', 'url' => ['/site/about'],
                'linkOptions'=>[
                'style'=>'background-image:url('.Yii::$app->homeUrl.'images/icon-info.png);background-size:100%;background-repeat:no-repeat;width:71px;height:71px;',
                ]
            ],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <!-- <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?> -->
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <span class="copyright">© Copyright 2019 Soldiers Of The Arts. All Rights Reserved.</span>
        <img src="images/logo-soldierofheart.png">
      </div>
    </div>
  </div>
</footer><!--/#footer-->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
