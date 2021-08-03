<?php

use yii\web\Cookie;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use app\models\Customers;
use yii\widgets\Pjax;
use app\components\Helpers;
use app\components\BaseController;

$customer_data = new Customers(['scenario' => Customers::SCENARIO_RATE_DATA]);
$isMobile = Yii::$app->params['devicedetect']['isMobile'];
?>
<div class="form-inner">
	<div class="rate-form trans_all">
		<div class="loader"></div>
		<a class="close-btn btn-close-rate-form"></a>
		<?php $form = ActiveForm::begin([
			'id' => 'rate_form_flat',
			'action' => '/companies-filter/post-rate-flat/',
			'enableAjaxValidation' => false,
			'options' => ['class' => 'applynow-form', 'data-view' => 'product'], 'fieldConfig' => ['options' => ['tag' => false]]
		]);?>
		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'ajaxform', 'id' => ''])->label(false);?>

		<h2 class="text-center">Get your rate</h2>

		<div class="row first">
			<div class="col-xs-12 col-sm-6 el">
				<label class="el_lbl">My Age and Gender</label>
				<div class="age-wrap" data-postfix="years old">
				<?=$form->field($customer_data, 'age')->textInput(['required' => 'required', 'class' => 'age form-control dark-border', 'id' => 'rc_age', 'placeholder' => '', 'value' => ''])->label(false);?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 el">
				<label class="el_lbl">&nbsp;</label>
				<?=$form->field($customer_data, 'gender')->radioList(
					['f' => 'Female', 'm' => 'Male'],
					[
						'item' => function($index, $label, $name, $checked, $value) {
							$checked = $checked ? 'checked="checked"' : '';
							$return = '<label>';
							$return .= '<input type="radio" name="'.$name.'" value="'.$value.'" '.$checked.'>';
							$return .= '<span>'.$label.'</span>';
							$return .= '</label>';
							return $return;
						},
						'required' => 'required',
						'class' => 'form-control-radio dot',
						'id' => 'rc_gender',
						'unselect' => null
					])->label(false);?>
			</div>
		</div>

		<div class="row second">
			<div class="col-md-12 trans_none_all">
				<label class="el_lbl">Coverage Amount</label>
				<div class="coverage-amount-lbl"></div>
				<?=$form->field($customer_data, 'amount')->input('text', [
					'required' => 'required',
					'class' => 'js-range-slider avarage_amount',
					'id' => 'rc_avarage_amount',
					'value' => '100000',
					'data-values' => implode(',', $customer_data::$avg_amounts2),
				])->label(false);?>
			</div>
		</div>

		<div class="row third">
			<div class="col-md-12 el">
				<label class="el_lbl">Term Length</label>
				<?=$form->field($customer_data, 'term')->radioList(
					$customer_data::$term_lengths3,
					[
						'item' => function($index, $label, $name, $checked, $value) {
							$checked = ($checked) ? 'checked="checked"' : '';
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
				<label class="el_lbl">My Overall Health is <span class="selected-health-lbl">...</span></label>
				<div class="healths">
					<?=$form->field($customer_data, 'health')->radioList(
						$customer_data::$healths,
						[
							'item' => function($index, $label, $name, $checked, $value) {
								$c = count(Customers::$healths);
								#$id = str_replace(['[', ']'], '', strtolower($name)).'-'.($c-$index);
								$id = 'star-'.($c-$index);
								$checked = ($checked || $value == -1) ? 'checked="checked"' : '';
								$s_class = ($checked || $value == -1) ? 'class="checked"' : '';
								$return = '<span '.$s_class.'>';
								$return .= '<input type="radio" id="'.$id.'" name="'.$name.'" value="'.$value.'" '.$checked.' label="'.$label.'">';
								$return .= '<label for="'.$id.'" title="'.$label.'">';
								$return .= Helpers::get_svg_inline('stars_sprite_1_level.svg');
								$return .= '</label>';
								$return .= '</span>';
								return $return;
							},
							'required' => 'required',
							'class' => 'health',
							'id' => 'rc_health',
							'unselect' => null,
						])->label(false);?>

				</div>
			</div>
		</div>

		<div class="row sixth">
			<div class="col-md-12 text-center">
				<?=Html::submitButton('Show my rates', ['class' => 'btn btn-quote', 'id' => 'submit_btn', 'disabled' => 'disabled']);?>
			</div>
		</div>

		<?php ActiveForm::end();?>
	</div>
</div>