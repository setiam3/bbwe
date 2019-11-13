<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PodcastBlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Member Podcast Blogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-podcast-blog-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Datatables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'datetime',
            [
                'label'=>'Name',
                'attribute'=>'idmember',
                'value'=>'member.name',
            ],
            [
                'label'=>'Country',
                'attribute'=>'idmember',
                'value'=>'member.country',
            ],
            [
                'label'=>'Email',
                'attribute'=>'idmember',
                'value'=>'member.email',
            ],
            [
                'label'=>'Profession',
                'attribute'=>'idmember',
                'value'=>'member.profession',
            ],
            'blog',
            'podcast',
            //'uploaded_times:datetime',
            //'daily',
            //'weekly',
            //'monthly',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
