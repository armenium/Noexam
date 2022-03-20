<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\web\HttpException;
use yii\helpers\VarDumper;

$this->title = $name;
#VarDumper::dump($exception, 10, 1);
?>
<section class="site-error container">
	<div class="inner">
		<img src="/img/no-exam-logo-symbol-white.svg">
	    <h1>Oops! <?=$exception->statusCode;?></h1>
	    <h2><?=nl2br($message);?></h2>
	</div>
</section>
