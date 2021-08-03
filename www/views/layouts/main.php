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
	<header class="wrapper-main site-nav">
		<?=$this->render('nav-top-main');?>
		<?php //include "nav-top-main.php";?>
	</header>
	<main class="site-main" role="main">
		<?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]);?>
		<?=$content;?>
	</main>

	<footer class="container-fluid main">
		<div class="row">
			<div class="col-md-12 text-center">
				<span>Copyright © <?=date('Y');?> <a href="https://www.noexam.com">NoExam.com</a></span>
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

	<a role="button" class="scroll-top trans_me"></a>

	<?php $this->endBody();?>
</body>

<?=$this->render('footer'); ?>
<?php $this->endPage();?>
