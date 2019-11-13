<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TemplateAdv */

$this->title = Yii::t('app', 'Create Template Adv');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Template Advs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-adv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
