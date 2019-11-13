<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'flag')->textInput(['maxlength' => true]) ?>
    <?=$form->field($model,'flag')->fileInput(['maxlength' => true,'id'=>'flag','style'=>'z-index:-1;','class'=>'rounded-pill p-1 col-8'])->label('flag',['class'=>'text-gradation']) ?>
    <div class="btn gradation-bg rounded-pill" onclick="document.getElementById('flag').click()" style="position: absolute;right: 0;">Browse</div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
