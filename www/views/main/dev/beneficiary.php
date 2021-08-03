<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$this->title = 'Beneficiary Information';

?>

<div class="row top-bar">
	<div class="head-block">
		<div class="iconbar">
			<div id="current_step_icon" class="icon-name active"></div>
			<div class="icon-heart"></div>
		</div>
		<div class="text">Beneficiary Information</div>
		<a href="/faq/" class="q-mark" data-toggle="tooltip" data-placement="left" title="Please enter the information for the person who is applying for life insurance."></a>
	</div>
</div>

<div class="row content beneficiary">
	<div class="scroll-bar">
		<div class="form-block clearfix">
			<?= $this->render('_beneficiary',["beneficiaryModels"=>$beneficiaryModels,"beneficiaryContingentModels"=>$beneficiaryContingentModels]); ?>
		</div>
	</div>
</div>

<div class="row bottom-bar">
	<div class="back-button">Back</div>
	<div class="bar-progress-wrapper">
		<div class="bar-progress">
			<div class="bar-line" data-progress="80"></div>
		</div>
	</div>
	<div class="next-button">Next</div>
</div>


