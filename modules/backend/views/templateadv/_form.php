<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TemplateAdv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="template-adv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'style')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(dosamigos\ckeditor\CKEditor::className(), ['options' => ['rows' => 6],'preset' => 'custom']) ?>

    <?= $form->field($model, 'layout')->textInput() ?>

    <?= $form->field($model, 'accept_file_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'design')->widget(dosamigos\ckeditor\CKEditor::className(), ['options' => ['rows' => 6],'preset' => 'custom']) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
