<?php

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

	<div class="wrapper-main site-nav">
		<?=$this->render('nav-top-main');?>
	</div>

	<div class="wrapper-main">
	    <!-- <div class="container"> -->
	        <?=$content;?>
	    <!-- </div> -->
	</div>

	<!-- <footer class="footer">
	    <div class="container">
	        <p class="pull-left">&copy; My Company <?=date('Y');?></p>

	        <p class="pull-right"><?=Yii::powered();?></p>
	    </div>
	</footer> -->

	<?php $this->endBody();?>
</body>

<?=$this->render('footer'); ?>
<?php $this->endPage();?>
