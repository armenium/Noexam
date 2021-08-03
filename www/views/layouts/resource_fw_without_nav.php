<?php
/* Layout Name: Resource Full width without navigation*/
/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<?=$this->render('header');?>

<body class="<?=Yii::$app->controller->getBodyClasses('resources fw');?>">
	<?php $this->beginBody(); ?>
	<?=$this->render('body-google-tag');?>

	<header class="wrapper-main site-nav">
		<?=$this->render('nav-top-main');?>
	</header>

	<main class="wrapper-main">
		<div class="dtable clearfix">
			<div class="section">
				<?=$content;?>
			</div>
		</div>
	</main>

	<section class="sidebar footer">
		<?=$this->render('resource_fw_sidebar');?>
	</section>

	<footer class="container-fluid main">
		<div class="row">
			<div class="col-md-12 text-center">
				<span>Copyright © <?=date('Y');?> NoExam</span>
				<span class="sep">|</span>
				<a href="/about/">About</a>
				<span class="sep">|</span>
				<a href="/privacy/">Privacy Policy</a>
				<span class="sep"></span>
			</div>
		</div>
	</footer>

	<a role="button" class="scroll-top trans_me"></a>

	<?php $this->endBody(); ?>
</body>

<?=$this->render('footer');?>
<?php $this->endPage(); ?>
