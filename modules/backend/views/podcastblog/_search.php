<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PodcastBlogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-podcast-blog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'datetime') ?>

    <?= $form->field($model, 'idmember') ?>

    <?= $form->field($model, 'blog') ?>

    <?= $form->field($model, 'podcast') ?>

    <?php // echo $form->field($model, 'uploaded_times') ?>

    <?php // echo $form->field($model, 'daily') ?>

    <?php // echo $form->field($model, 'weekly') ?>

    <?php // echo $form->field($model, 'monthly') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
