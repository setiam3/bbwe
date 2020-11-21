<?php

use  yii\web\View;
use app\widgets\Flags;
use yii\helpers\Url;
use app\assets\site\ProfileAsset;

ProfileAsset::register($this);
$this->title = "Profile";
?>
<div id="profileApp" class="profile_page">
    <profile :user_login='<?= json_encode($user) ?>'></profile>
</div>
