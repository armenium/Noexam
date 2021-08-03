<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;
use app\models\ResourcesCompanies;

$cc = new ResourcesCompanies();
$comparison_companies = $cc->getCompaniesWithSlug();
//VarDumper::dump($comparison_companies, 10, 1);
?>
<section class="comparison-form">
	<div class="loader"></div>
	<div class="title">Compare Life Insurance Companies</div>
	<div class="desc">Make the most informed decision possible with our side by side comparisons.</div>
	<?php $form = ActiveForm::begin([
		'enableAjaxValidation'   => false,
		'enableClientValidation' => false,
		'id'                     => 'compare-form',
		'action'                 => '/life-insurance/companies/',
		'method'                 => 'get',
		'options'                => ['class' => 'compare-form', 'data-request-type' => 'ajax'],
	]); ?>
	<div class="fields-box">
		<div>I would like to compare</div>
		<div style="line-height: 1;">
			<?=Html::dropDownList('insurance_company1', '', $comparison_companies, ['class' => 'selectpicker', 'id' => 'insurance_company1', 'data-style' => 'btn-info', 'data-title' => 'Select a company']);?>
		</div>
		with
		<?=Html::dropDownList('insurance_company2', '', $comparison_companies, ['class' => 'selectpicker', 'id' => 'insurance_company2', 'data-style' => 'btn-info', 'data-title' => 'Select a company']);?>
	</div>
	<div class="button-box">
		<?=Html::submitButton('Compare Now', ['class' => 'btn btn-success']) ?>
	</div>
	<?=Html::hiddenInput('request_type', 'ajax');?>
	<?php ActiveForm::end(); ?>

	<div id="comparison_results" class="comparison-result-container"></div>
</section>
