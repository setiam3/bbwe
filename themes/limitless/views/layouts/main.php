<?php
use app\assets\LimitlessMainAsset;
use app\modules\chat\widgets\ChatRoomList;
use app\modules\chat\widgets\ChatList;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\MenuHelper;
use app\modules\chat\widgets\Menu;


LimitlessMainAsset::register($this);
//$favicon = Yii::$app->urlManager->createAbsoluteUrl(['images/artajasa.png']);
$logo  = Yii::$app->urlManager->createAbsoluteUrl(['logo.png']);

$userName = 'Phillip Coulson';


$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<!-- <link rel="icon" type="image/png" href="<?php  //echo $favicon; ?>"> -->
    <?php $this->head() ?>

</head>

<body class="layout-boxed pace-done">
<?php $this->beginBody(); ?>
	<!--
	<div class="navbar navbar-default header-highlight">
		<div class="navbar-header">
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li class="dropdown dropdown-user">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<img src="https://secure.gravatar.com/avatar/ddeb668258f69fdbc014b0179f99c1f0?s=24&d=mm&r=g" alt="">
							<span><?php echo $userName; ?></span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="<?php echo Url::to(['/setting/profile/']);?>"><i class="icon-user-plus"></i> My profile</a></li>
							<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
							<li><a href="#"><span class="badge bg-blue pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
							<li>
                            <?php
                            echo Html::beginForm(['/site/logout'], 'post')
                                . Html::submitButton(
                                    '<i class="icon-switch2"></i> Logout',
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm();
                            ?>
                            </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>-->

	<div class="page-container">
		<div class="page-content">
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">
					<img class="logo" src="<?=$logo;?>" alt="Logo" /><br />
					
					<a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
					<div class="sidebar-search">
						<div class="col-lg-12">
							<input type="text" name="search_group" class="form-control" id="search-group" placeholder="Search" />
						</div>
					</div>
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">

                            <?php echo ChatRoomList::widget(); ?>

						</div>
					</div>

				</div>
			</div>

			<div class="content-wrapper">
				<div class="navbar-collapse collapse" id="navbar-mobile">
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<li class="dropdown dropdown-user">
								<a class="dropdown-toggle" data-toggle="dropdown">
									<div class="media">
										<span class="media-left no-padding-right"><img src="<?=Url::home()?>/pictures/my-profile.png" class="img-circle" alt=""></span>
										<div class="media-body">
											<span class="media-heading">Nick Fury</span>
											<div class="text-size-small text-italic text-white">
												<i class="icon-pin text-size-small"></i> &nbsp;Active Now
											</div>
										</div>
										<div class="media-right media-middle">
											<i class="caret"></i>
										</div>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
                <div class="col-lg-10" style="width: 772px !important; max-height: 580px; overflow: scroll;">
				<?php echo ChatList::widget(); ?>
                </div>
                <div class="col-lg-2" style="width: 235px !important; max-height: 580px; background-color: #f0f0f0;">
                a
                </div>
			</div>
		</div>
	</div>
<?php $this->endBody(); ?>
</body>
<!-- <script type="text/javascript">
    $.ajaxSetup({
        data: <?= \yii\helpers\Json::encode([
            Yii::$app->request->csrfParam => Yii::$app->request->csrfToken,
        ]) ?>
    });
</script> -->
</html>
<?php $this->endPage(); ?>