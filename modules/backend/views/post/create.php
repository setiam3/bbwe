<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MemberPost */

$this->title = 'Create Member Post';
$this->params['breadcrumbs'][] = ['label' => 'Member Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
