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
<?=$this->render('header');?>

<body class="questions-body <?=Yii::$app->controller->getBodyClasses('fullscreen');?>">
	<?php $this->beginBody() ?>
	<div class="wrapper-main site-nav">
		<?=$this->render('nav-top-questions');?>
	</div>

	<div class="wrapper-main">
	    <div class="main-questions">
	        <div class="container">
	            <?=$content;?>
	        </div>
	    </div>

		<?=$this->render('nav-bottom');?>
	</div>


	<?php $this->endBody();?>
</body>

<?=$this->render('footer');?>
<?php $this->endPage();?>
