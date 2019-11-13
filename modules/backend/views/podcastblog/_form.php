<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MemberPodcastBlog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-podcast-blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <?= $form->field($model, 'idmember')->textInput() ?>

    <?= $form->field($model, 'blog')->textInput() ?>

    <?= $form->field($model, 'podcast')->textInput() ?>

    <?= $form->field($model, 'uploaded_times')->textInput() ?>

    <?= $form->field($model, 'daily')->textInput() ?>

    <?= $form->field($model, 'weekly')->textInput() ?>

    <?= $form->field($model, 'monthly')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
