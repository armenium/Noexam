<?php

use yii\web\Cookie;
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

$customer_data = new CustomerData(['scenario' => CustomerData::SCENARIO_RATE_CALC]);
$user_guess_price = $customer_data->get_user_guess_price();
#VarDumper::dump($user_guess_price, 10, 1);
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
if(!isset($position)){
	$position = 'center';
}
if(isset($width)){
	$width = 'max-width:'.$width.';';
}
if(!isset($title)){
	$title = 'Get a Quote Today.';
}

$submit_text = 'Get Rates';
$col_1_class = $col_2_class = $col_3_class = '';
if($position == 'center'){
	$submit_text = 'Get Rates';
	$container_class = 'cols-'.$cols;
	$row_class = 'row';

	$width = '';
	if($cols > 2){
		$cols = 2;
	}
	if($cols == 1){
		$col_1_class = 'col-md-12';
		$col_2_class = 'col-md-12';
		$col_3_class = 'col-md-12';
	}else{
		$col_1_class = 'col-md-5';
		$col_2_class = 'col-md-1';
		$col_3_class = 'col-md-6';
	}

}else{
	$position .= ' half';
}


?>
<div class="applynow-form-section rate-calc widget <?=$position;?> <?=$container_class;?> trans_all" style="<?=$width;?>">
	<div class="loader"></div>
	<?php if($display_title):?>
	<div class="row mb30 title-row">
		<div class="col-md-12">
			<div class="caption">
				<h2><?=$title;?></h2>
				<div class="desc">Over <span class="bt"><?=$quots_count;?></span> quotes generated to date!</div>
			</div>
		</div>
	</div>
	<?php endif;?>

	<div class="<?=$row_class;?>">

		<div class="<?=$col_1_class;?>">
			<div class="form-wrap">
				<?php $form = ActiveForm::begin([
					'id' => 'rate-calc-form',
					'action' => '/post-rate-calc-simple/',
					'enableAjaxValidation' => false,
					'validationUrl' => '/validate-rate-calc/',
					'options' => ['class' => 'applynow-form', 'data-autoload' => $autoload, 'data-view' => 'list'],'fieldConfig' => ['options' => ['tag' => false]]
				]);?>
				<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'ajaxform', 'id' => ''])->label(false);?>
				<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => '', 'id' => ''])->label(false);?>
				<?=$form->field($customer_data, 'answer')->hiddenInput(['value' => 'no', 'id' => 'answer'])->label(false);?>

				<div class="row first">
					<div class="col-xs-6">
						<label>My Age is</label>
						<div class="age-wrap" data-postfix="years old">
						<?=$form->field($customer_data, 'age')->textInput(['required' => 'required', 'class' => 'age form-control bark-border', 'id' => 'rc_age', 'placeholder' => 'e.g. 42', 'value' => 30])->label(false);?>
						</div>
					</div>
					<div class="col-xs-6 el">
						<label class="el_lbl">My Gender is</label>
						<?=$form->field($customer_data, 'sex')->radioList(
							['m' => 'Male', 'f' => 'Female'],
							[
								'item' => function($index, $label, $name, $checked, $value) {
									$checked = ($checked || $value == 'm') ? 'checked="checked"' : '';
									$return = '<label>';
									$return .= '<input type="radio" id="rc_'.$value.'" name="'.$name.'" value="'.$value.'" '.$checked.'>';
									$return .= '<span>'.$label.'</span>';
									$return .= '</label>';
									return $return;
								},
								'required' => 'required',
								'class' => 'form-control-radio rbtn',
								'id' => 'rc_sex',
								'unselect' => null
							])->label(false);?>
					</div>
				</div>

				<div class="row second">
					<div class="col-md-12 trans_none_all">
						<label>Coverage Amount</label>
						<div class="coverage-amount-lbl"></div>
						<?=$form->field($customer_data, 'avg_amount')->input('text', [
							'required' => 'required',
							'class' => 'js-range-slider avarage_amount',
							'id' => 'rc_avarage_amount',
							'value' => '250000',
							'data-values' => implode(',', $customer_data::$avg_amounts2),
						])->label(false);?>
					</div>
				</div>

				<div class="row third">
					<div class="col-md-12 el">
						<label class="el_lbl">Term Length</label>
						<?=$form->field($customer_data, 'term_length')->radioList(
							$customer_data::$term_lengths3,
							[
								'item' => function($index, $label, $name, $checked, $value) {
									$checked = ($checked || $value == 15) ? 'checked="checked"' : '';
									$return = '<label>';
									$return .= '<input type="radio" id="rc_'.$value.'" name="'.$name.'" value="'.$value.'" '.$checked.'>';
									$return .= '<span>'.$label.'</span>';
									$return .= '</label>';
									return $return;
								},
								'required' => 'required',
								'class' => 'form-control-radio rbtn',
								'id' => 'rc_term',
								'unselect' => null,
							])->label(false);?>
					</div>
				</div>

				<div class="row fourth">
					<div class="col-md-12 el">
						<label class="el_lbl">My Overall Health</label>
						<div class="healths">
						<?=$form->field($customer_data, 'health')->radioList(
							$customer_data::$healths,
							[
								'item' => function($index, $label, $name, $checked, $value) {
									$c = count(CustomerData::$healths);
									#$id = str_replace(['[', ']'], '', strtolower($name)).'-'.($c-$index);
									$id = 'star-'.($c-$index);
									$checked = ($checked || $value == 4 || $value == 'very-good') ? 'checked="checked"' : '';
									$s_class = ($checked || $value == 4 || $value == 'very-good') ? 'class="checked"' : '';
									$return = '<span '.$s_class.'>';
									$return .= '<input type="radio" id="'.$id.'" name="'.$name.'" value="'.$value.'" '.$checked.' label="'.$label.'">';
									$return .= '<label for="'.$id.'" title="'.$label.'">';
									$return .= Helpers::get_svg_inline('stars_sprite_1_level.svg');
									$return .= '</label>';
									$return .= '</span>';
									return $return;
								},
								'required' => 'required',
								'class' => 'rating',
								'id' => 'rc_health',
								'unselect' => null,
							])->label(false);?>
							<div class="selected-health-lbl">&nbsp;</div>
						</div>
					</div>
				</div>

				<div id="question_row" class="row fifth">
					<div class="col-md-12 text-center">
						<div class="sub-lbl x2">Do you exercise 3 or more times per week?</div>
						<div class="question-wrap" data-prefix="$">
							<?=Html::submitButton('Yes', ['name' => 'CustomerData[quote-submit]', 'value' => 'yes', 'class' => 'btn btn-quote inline filled submit_question', 'id' => 'submit_btn_yes']);?>
							<?=Html::submitButton('No', ['name' => 'CustomerData[quote-submit]', 'value' => 'no', 'class' => 'btn btn-quote inline trans submit_question', 'id' => 'submit_btn_no']);?>
						</div>
					</div>
				</div>

				<div class="row sixth">
					<div class="col-md-12 text-center">
						<?=Html::submitButton($submit_text, ['class' => 'btn btn-quote', 'id' => 'submit_btn']);?>
					</div>
				</div>

				<?php ActiveForm::end();?>
			</div>
		</div>
		<div class="<?=$col_2_class;?>"></div>
		<div class="<?=$col_3_class;?>">
			<div id="rate_calc_results" class="results">
				<?php if($autoload):?>
				<?=Yii::$app->controller->getRateCalcSimpleResults();?>
				<?php endif;?>
			</div>
		</div>

	</div>
</div>
