<?php
use yii\helpers\Html;
use yii\helpers\VarDumper;
?>
<head>
	<meta charset="<?=Yii::$app->charset;?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta name="robots" content="noindex,nofollow">
	<?=Html::csrfMetaTags();?>
	<title><?=Html::encode($this->title);?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php $this->head();?>
	<?=$this->render('google-tag/head');?>
	<meta name='ir-site-verification-token' value='-222576439' />
</head>
