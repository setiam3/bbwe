<?php 
use yii\helpers\Html;
//use app\modules\chatroom\assets\AppAsset;
use yii\bootstrap\Modal;

    app\modules\backend\assets\AppAsset::register($this);
    dmstr\web\AdminLteAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition sidebar-mini <?php echo \dmstr\helpers\AdminLteHelper::skinClass();?>">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>
        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>
        <?= $this->render(
            'content.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
