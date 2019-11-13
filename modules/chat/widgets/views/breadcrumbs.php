<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<br />
<div class="page-header">
    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <?php
            $i = 1;
            foreach ($links as $key => $val) {
                if ($i < $total)
                    echo '<li>' . Html::a($key, Url::toRoute($val)) . '</li>';
                else
                    echo '<li class="active">' . $val . '</li>';
    
                $i++;
            }
            ?>
        </ul>
    </div>
</div>
<br />