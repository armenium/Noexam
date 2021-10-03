<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\JqueryAsset;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\VarDumper;

AppAsset::register($this);

$this->registerCssFile('@web/v2/common/css/shared-styles.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/life-insurance/css/life-insurance.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/breadcrumbs.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/main-first-screen.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerJsFile('@web/v2/life-insurance/js/life-insurance.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language;?>">

	<?=$this->render('common/head'); ?>
	
	<body class="<?=Yii::$app->controller->getBodyClasses();?>">
		<?php $this->beginBody();?>
	
		<?=$this->render('common/google-tag/body');?>
	
		<?=$this->render('main/header');?>
	
		<?php #=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]);?>
		
		<?=$content;?>
		
		<?=$this->render('common/footer');?>
		<?=$this->render('common/copyright');?>
		<?=$this->render('common/overlays');?>
	
		<?php $this->endBody();?>
	</body>
</html>
<?php $this->endPage();?>
