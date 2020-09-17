<?php

use app\modules\chatroom\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang=en>

<head>
    <title>Chatroom</title>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width,initial-scale=1">
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <?= $content ?>

    <script>
        window.user={
            name:"<?= Yii::$app->user->identity->name ?>",
            photo:"<?= Yii::$app->user->identity->photo ?>",
            email:"<?= Yii::$app->user->identity->email ?>",
            user_id:"<?= Yii::$app->user->identity->id ?>",
            auth_token: "<?= Yii::$app->session->get('auth_token') ?>"
        };
    </script>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>