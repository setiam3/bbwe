<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\MemberPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cover_picture')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'description')->widget(CKEditor::className(), ['options' => ['rows' => 6],'preset' => 'full'])->label(false) ?>

    <?= $form->field($model, 'idmember')->textInput() ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
