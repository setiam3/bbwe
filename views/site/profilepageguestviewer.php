<?php 
use  yii\web\View;
use app\widgets\Flags;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
$tes=app\widgets\Gradation::widget(['type'=>'border','width'=>3]);
$js=<<<js
  $('main').addClass('long-decorate');
    $('.modal-content').attr('style',"$tes; background-color:black;color:#fff;");
js;
$this->registerJS($js,View::POS_END,'long');
    Modal::begin([
         'title' => 'Hello world',
         'size'=>'modal-xl',
         'toggleButton' => ['label' => 'click me'],
         'closeButton'=>['class'=>'','style'=>'background: #ae498b;border: 0;color: #fff;border: 0;border-radius: 50rem;position: absolute;top: -2%;right: -1%;']
     ]);
     echo '<div class="row">';
    echo '<div class="col-md-7">';
     $chartConfiguration = [
        'type'         => 'serial',
        'dataProvider' => [['year'  => 2005, 'income' => 23.5],
                           ['year' => 2006, 'income' => 26.2],
                           ['year' => 2007, 'income' => 30.1]
                          ],
       'categoryField' =>  'year',
       'rotate'        => true,
       'categoryAxis' => ['gridPosition' => 'start', 'axisColor' => '#DADADA'],
       'valueAxes'    => [['axisAlpha' => 0.2]],
       'graphs'       => [['type' => 'column',
                           'title' => 'Income',
                           'valueField' => 'income',
                           'lineAlpha' => 0,
                           'fillColors' => '#ADD981',
                           'fillAlphas' => 0.8,
                           'balloonText' => '[[title]] in [[category]]:<b>[[value]]</b>'
                         ]]
    ];
    echo mitrm\amcharts\amChart::widget(['chartConfiguration' => $chartConfiguration]);
    echo '</div>';
    echo '<div class="col-md-5">Viewer</div>';
    echo '</div>';
     Modal::end();
     
?>
<div class="row">
</div>