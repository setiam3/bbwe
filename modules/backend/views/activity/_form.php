<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MemberActivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idmember')->textInput() ?>

    <?= $form->field($model, 'activity')->textInput() ?>

    <?= $form->field($model, 'inactivity')->textInput() ?>

    <?= $form->field($model, 'reported_abuse')->textInput() ?>

    <?= $form->field($model, 'daily')->textInput() ?>

    <?= $form->field($model, 'weekly')->textInput() ?>

    <?= $form->field($model, 'monthly')->textInput() ?>

    <?= $form->field($model, 'increase')->textInput() ?>

    <?= $form->field($model, 'decrease')->textInput() ?>

    <?= $form->field($model, 'date_activity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
