<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WheelMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wheel-menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'icons')->textInput(['maxlength' => true]) ?>
    <?php use dosamigos\ckeditor\CKEditor;

echo $form->field($model, 'icons')->widget(CKEditor::className(), [
    'kcfinder' => false,
    'kcfOptions' => [
        'uploadURL' => '@web/uploads',
        'uploadDir' => '@webroot/uploads',
        'access' => [  // @link http://kcfinder.sunhater.com/install#_access
            'files' => [
                'upload' => true,
                'delete' => true,
                'copy' => true,
                'move' => true,
                'rename' => true,
            ],
            'dirs' => [
                'create' => true,
                'delete' => true,
                'rename' => true,
            ],
        ],
        'types' => [  // @link http://kcfinder.sunhater.com/install#_types
            'files' => [
                'type' => '',
            ],
        ],
    ],
]);?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
