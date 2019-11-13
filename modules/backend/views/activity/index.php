<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Member Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .oflow{
        overflow-x: scroll;
    }
    /*.dataTables_filter{
        float: left !important;
        position: fixed;
        top: 0;
        z-index: 1200;
    }*/
</style>
<script type="text/javascript">
   // $('.dataTables_filter').parents('div').class('pull-left');
</script>
<div class="member-activity-index">

<div class="oflow">
    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'label'=>'Date',
                'value'=>function($data){
                    return date('Y-m-d',strtotime($data->date_activity));
                }
            ],[
                'label'=>'Time',
                'value'=>function($data){
                    return date('H:i:s',strtotime($data->date_activity));
                }
            ],
            [
                'label'=>'Name',
                'attribute'=>'idmember',
                'value'=>'member.name',
            ],
            [
                'label'=>'Country',
                'format'=>'image',
                'value'=>function($data){
                    return "https://www.countryflags.io/gb/flat/24.png";
                }
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
            'activity',
            'inactivity',
            'reported_abuse',
            'daily',
            'weekly',
            'monthly',
            'increase',
            'decrease',
            [
                'label'=>'deactivated account',
                'attribute'=>'idmember',
                'value'=>'member.deactivated_account'
            ],
            //'date_activity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

</div>
