<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WheelMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wheel Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wheel-menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Wheel Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'url:url',
            [
                'label'=>'icons',
                'format'=>'image',
                'value'=>function($data){
                    return Yii::$app->homeUrl.$data->icons;
                }
            ],
            'label',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
