<?php
/* Layout Name: Resource Standart */
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\VarDumper;

AppAsset::register($this);
?>
<?php $this->beginPage();?>
<?=$this->render('header'); ?>

<body class="<?=Yii::$app->controller->getBodyClasses();?>">
	<?php $this->beginBody();?>
	<?=$this->render('body-google-tag');?>

	<div class="wrapper-main resources">
		<?=$this->render('nav-top-main');?>

		<div class="dtable clearfix">
			<div class="section">
				<?=$content;?>
			</div>
			<div class="sidebar">
				<?=$this->render('resource_sidebar');?>
			</div>
		</div>
	</div>

	<footer class="container-fluid main">
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="/privacy/">Privacy policy</a> -
				<?php

				ini_set('default_socket_timeout', 3);
				echo file_get_contents('https://www.shopperapproved.com/feeds/schema.php/?siteid=12271&token=7CkgVXPN');

				?>
			</div>
		</div>
	</footer>

	<?php $this->endBody();?>
</body>

<?=$this->render('footer'); ?>
<?php $this->endPage();?>
