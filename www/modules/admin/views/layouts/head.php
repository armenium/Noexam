<?php

use yii\helpers\Html;

?>
<head>
	<meta charset="<?= Yii::$app->charset;?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow">
	<?php $this->registerCsrfMetaTags();?>
	<title><?=Html::encode($this->title);?> | Control panel</title>
	<?php $this->head() ?>
</head>
