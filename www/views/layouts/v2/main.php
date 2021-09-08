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
<!DOCTYPE html>
<html lang="<?=Yii::$app->language;?>">

	<?=$this->render('main/head'); ?>
	
	<body class="<?=Yii::$app->controller->getBodyClasses();?>">
		<?php $this->beginBody();?>
	
		<?=$this->render('main/google-tag/body');?>
	
		<?=$this->render('main/header');?>
	
		<?php #=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]);?>
		
		<?=$content;?>
		
		<?=$this->render('main/footer');?>
		<?=$this->render('main/copyright');?>
		<?=$this->render('main/overlays');?>
	
		<?php $this->endBody();?>
	</body>
</html>
<?php $this->endPage();?>
