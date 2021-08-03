<?php

use yii\helpers\Html;
use yii\helpers\CHtml;
/* @var $this yii\web\View */
$this->title = 'Payment Info';
?>

<div class="row top-bar">
	<div class="head-block">
		<div class="iconbar">
			<div id="current_step_icon" class="icon-name active"></div>
			<div class="icon-heart"></div>
		</div>
		<div class="text">Proposed Insured Information</div>
		<div class="q-mark"></div>
	</div>
</div>

<div class="row content payment-info">
	<iframe src="/iframe/" frameborder="0" width="100%" height="100%"></iframe>
</div>

<div class="row bottom-bar">
  <div class="back-button">Back</div>
   <div class="bar-progress-wrapper">
      <div class="bar-progress">
       <div class="bar-line" data-progress="95"></div>
     </div>
   </div>
  <div class="next-button">Next</div>
</div>

