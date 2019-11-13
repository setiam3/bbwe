<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MemberActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idmember') ?>

    <?= $form->field($model, 'activity') ?>

    <?= $form->field($model, 'inactivity') ?>

    <?= $form->field($model, 'reported_abuse') ?>

    <?php // echo $form->field($model, 'daily') ?>

    <?php // echo $form->field($model, 'weekly') ?>

    <?php // echo $form->field($model, 'monthly') ?>

    <?php // echo $form->field($model, 'increase') ?>

    <?php // echo $form->field($model, 'decrease') ?>

    <?php // echo $form->field($model, 'date_activity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
