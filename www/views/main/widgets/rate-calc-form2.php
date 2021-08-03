<?php

use app\assets\AppAsset;
use yii\web\Cookie;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use app\models\CustomerData;
use yii\widgets\Pjax;
use app\components\Helpers;
use app\components\BaseController;


$quots_count = Yii::$app->controller->getUsageCounterFromRateCalc();
$quots_count = number_format((intval($quots_count) / 3), 0, '.', ',');
#VarDumper::dump($quots_count, 10, 1);

$customer_data = new CustomerData(['scenario' => CustomerData::SCENARIO_RATE_CALC_TABLE]);
$isMobile = Yii::$app->params['devicedetect']['isMobile'];
$days = $months = $years = [];
for($i = 1; $i <= 31; $i++){
	if(strlen($i) == 1){
		$n = '0'.$i;
	}else{
		$n = $i;
	}
	$days[$n] = $i;
	if($i <= 12){
		$months[$n] = $i;
	}
}
$y = date('Y');
for($i = $y; $i >= $y - 100; $i--){
	$years[$i] = $i;
}

$wigths = [];
for($i = 80; $i <= 400; $i++){
	$wigths[$i] = $i.' lbs';
}

if(!isset($display_title)){
	$display_title = true;
}
if(!isset($title)){
	$title = 'Get a Quote Today.';
}

$submit_text = 'Load Rates';
$col_1_class = $col_2_class = $col_3_class = '';

if(!isset($autoload)){
	$autoload = 'off';
}

?>
<div class="applynow-form-section rate-calc v2 widget center trans_all">
	<div class="loader"></div>

	<?php if($display_title):?>
	<div class="row mb30 title-row">
		<div class="col-md-12">
			<div class="caption">
				<h2 id="compare"><?=$title;?></h2>
				<div class="desc">Over <span class="bt"><?=$quots_count;?></span> quotes generated to date!</div>
			</div>
		</div>
	</div>
	<?php endif;?>

	<div class="form-wrap">
		<?php $form = ActiveForm::begin([
			'id' => 'rate-calc-form',
			'action' => '/post-rate-calc-table/',
			'enableAjaxValidation' => false,
			'validationUrl' => '/validate-rate-calc/',
			'options' => ['class' => 'applynow-form', 'data-autoload' => $autoload, 'data-autoscroll' => $autoscroll, 'data-view' => 'table'], 'fieldConfig' => ['options' => ['tag' => false]]
		]);?>
		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'ajaxform', 'id' => ''])->label(false);?>
		<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => '', 'id' => ''])->label(false);?>

		<div class="row first">
			<div class="col-xs-6 col-sm-3">
				<label>My Age is</label>
				<div class="age-wrap" data-postfix="years old">
				<?=$form->field($customer_data, 'age')->textInput(['required' => 'required', 'class' => 'age form-control active-el', 'id' => 'v2_age', 'placeholder' => 'e.g. 42', 'value' => 55])->label(false);?>
				</div>
			</div>
			<div class="col-xs-6 col-sm-3">
				<label class="el_lbl">My Gender is</label>
				<?=$form->field($customer_data, 'sex')->dropDownList(['m' => 'Male', 'f' => 'Female'], ['class' => 'form-control selectpicker sex', 'id' => 'v2_sex', 'data-style' => 'active-el', 'data-mobile' => (string)$isMobile, 'options' => ['m' => ['selected' => 'selected']]])->label(false);?>
			</div>
			<div class="col-xs-6 col-sm-3">
				<label class="el_lbl">Term Length</label>
				<?=$form->field($customer_data, 'term_length')->dropDownList($customer_data::$term_lengths2, ['class' => 'form-control selectpicker term_length', 'id' => 'v2_term_length', 'data-style' => 'active-el', 'data-mobile' => (string)$isMobile, 'options' => [20 => ['selected' => 'selected']]])->label(false);?>
			</div>
			<div class="col-xs-6 col-sm-3">
				<label class="el_lbl">My Overall Health</label>
				<?=$form->field($customer_data, 'health')->dropDownList($customer_data::$healths2, ['class' => 'form-control selectpicker health', 'id' => 'v2_health', 'data-style' => 'active-el', 'data-mobile' => (string)$isMobile, 'options' => ['very-good' => ['selected' => 'selected']]])->label(false);?>
			</div>
		</div>
		<div class="row sixth">
			<div class="col-md-12 text-center">
				<?=Html::submitButton($submit_text, ['class' => 'btn btn-quote', 'id' => 'submit_btn']);?>
			</div>
		</div>

		<?php ActiveForm::end();?>
	</div>

	<div id="rate_calc_results" class="results">
		<?php if($autoload == 'instantly'):?>
			<?=Yii::$app->controller->getRateCalcTableDefaultResults();?>
		<?php endif;?>
	</div>

</div>
