<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MemberPodcastBlog */

$this->title = 'Create Member Podcast Blog';
$this->params['breadcrumbs'][] = ['label' => 'Member Podcast Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-podcast-blog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
