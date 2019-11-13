<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Member Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Member Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'tag',
            'cover_picture',
            'description:ntext',
            //'idmember',
            //'datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
