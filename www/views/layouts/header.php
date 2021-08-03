<?php
use yii\helpers\Html;
use yii\helpers\VarDumper;

//VarDumper::dump($this, 10, 1);
?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language;?>">
<head>
	<meta charset="<?=Yii::$app->charset;?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta name="robots" content="noindex,nofollow">
	<?=Html::csrfMetaTags();?>
	<title><?=Html::encode($this->title);?></title>
	<?php $this->head();?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NS2J3J3');</script>
	<!-- End Google Tag Manager -->
	<meta name='ir-site-verification-token' value='-222576439' />
</head>
