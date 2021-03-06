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

	<?=$this->render('common/head'); ?>
	
	<body class="<?=Yii::$app->controller->getBodyClasses();?>">
		<?php $this->beginBody();?>
		
		<?=$this->render('common/google-tag/body');?>
		
		<?=$this->render('my-quote/header');?>
		
		<?php #=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]);?>
		
		<?=$content;?>
		
		<?=$this->render('common/overlays');?>
		
		<?php $this->endBody();?>
	</body>
</html>
<?php $this->endPage();?>
