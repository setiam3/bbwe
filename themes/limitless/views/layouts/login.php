<?php
use app\assets\LimitlessLoginAsset;

LimitlessLoginAsset::register($this);
$favicon = Yii::$app->urlManager->createAbsoluteUrl(['images/atm-bersama-logo.png']);

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo Yii::$app->name; ?></title>
    <link rel="icon" type="image/png" href="<?php echo $favicon; ?>">
    <?php $this->head(); ?>
</head>

<body class="login-container">
<?php $this->beginBody(); ?>
	<div class="page-container">
		<div class="page-content">
			<div class="content-wrapper">
				<div class="content">
                    <?php echo $content; ?>
					<div class="footer text-muted text-center">
						&copy; <?php echo date('Y'); ?>. <a href="#"><?php echo Yii::$app->name; ?></a> 
                        by <a href="<?php echo Yii::$app->params['creatorUrl']; ?>" target="_blank"><?php echo Yii::$app->params['creatorName']; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>