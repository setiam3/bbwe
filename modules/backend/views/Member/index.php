<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\web\View;
$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;

?>
<style type="text/css">
    div.dataTables_scrollBody table.dataTable thead .sorting:after,
div.dataTables_scrollBody table.dataTable thead .sorting_asc:after,
div.dataTables_scrollBody table.dataTable thead .sorting_desc:after {
    display: none;
}
</style>
<div class="member-index">

    <?= Datatables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'Date',
                'value'=>function($data){
                    return date('Y-m-d',strtotime($data->datetime));
                }
            ],
            [
                'label'=>'Time',
                'value'=>function($data){
                    return date('H:i:s',strtotime($data->datetime));
                }
            ],
            'name',
            [
                'label'=>'Country',
                'format'=>'image',
                'value'=>function($data){
                    return Yii::$app->homeUrl.$data->flags->flag;
                }
            ],
             'email:email',
            
             'profession', 'password',
            // 'deactivated_account',
            // 'username',
            // 'referral',
            // 'latest_login',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'clientOptions'=>[
            'scrollX'=>true,
            'scrollXInner'=>'150%',
        ]
    ]); ?>


</div>
