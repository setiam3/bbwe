<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MemberPodcastBlog */

$this->title = 'Update Member Podcast Blog: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Member Podcast Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-podcast-blog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
