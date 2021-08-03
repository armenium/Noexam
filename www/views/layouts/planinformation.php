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
	<div class="wrapper-main full-height">
	    <nav class="header-nav">
	        <div class="container navbar hidden-xs">
		        <div class="row">
		            <div class="col-md-2 col-sm-3 full-height">
		                <div class="logo"></div>
		            </div>
		            <div class="col-md-10 col-sm-9 full-height text-right">
		                <div class="trust-logos"><img src="/img/trust_logos.jpg"></div>
		            </div>
		        </div>
	        </div>

	        <div class="container navbar-mobile hidden visible-xs">
	            <div class="row">
	                <div class="col-xs-12 full-height">
	                    <div class="logo"></div>
	                </div>
	            </div>
	        </div>
	    </nav>
		<?=$content;?>
	</div>

	<footer class="container-fluid main">
		<div class="row">
			<div class="col-md-12 text-center">
				<span>Copyright © <?=date('Y');?> NoExam</span>
				<span class="sep">|</span>
				<a href="/about/">About</a>
				<span class="sep">|</span>
				<a href="/licenses/">Licenses</a>
				<span class="sep">|</span>
				<a href="/careers/getting-started-life-insurance/">Careers</a>
				<span class="sep">|</span>
				<a href="/privacy/">Privacy Policy</a>
				<span class="sep"></span>
			</div>
		</div>
	</footer>

	<?php $this->endBody();?>
</body>

<?=$this->render('footer'); ?>
<?php $this->endPage();?>
