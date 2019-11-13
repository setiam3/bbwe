<?php
use app\models\MerchantAccounts;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use app\components\MenuHelper;
use app\widgets\Menu;

?>


<ul class="navigation navigation-main navigation-accordion">
    <li class="navigation-header text-semibold"><span>Group</span> <i class="icon-menu" title="" data-original-title="Main pages"></i></li>
    <?php foreach ($list as $val) { ?>
	<li><a href="javascript:void(0)"><i class="icon-home4"></i> <span><?php echo $val->chatRoom->room_name; ?></span></a></li>
    <?php } ?>
</ul>