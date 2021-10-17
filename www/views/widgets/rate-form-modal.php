<?php

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Customers;
use app\components\Helpers;
use yii\helpers\VarDumper;

$this->registerCssFile('@web/v2/common/css/range-slider.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/plugins/css/ion.rangeSlider.min.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/widgets/css/rate-form-modal.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/plugins/js/ion.rangeSlider.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/widgets/js/rate-form-modal.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

?>
<div class="form-inner">
	<div class="rate-form">
		<div class="loader"></div>
		<a class="close-btn btn-close-rate-form" data-trigger="js_action_click" data-action="hide_rate_modal"></a>

		<?php $form = ActiveForm::begin(['id' => 'js_rate_form_modal', 'action' => $action, 'enableAjaxValidation' => false, 'options' => ['class' => 'applynow-form', 'data-view' => 'product', 'data-trigger' => 'js_action_submit', 'data-action' => 'rate_form_modal_submit'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>

		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'ajaxform', 'id' => ''])->label(false)->error(false);?>

		<h2 class="get-your-rate-popup__title heading-4"><span>Get your rate</span></h2>

		<h3 class="get-your-rate-popup__subtitle main-title">Coverage Amount</h3>
		<div class="get-your-rate-popup__range">
			<?=$form->field($customer_data, 'amount')->input('text', [
				'required' => 'required',
				'class' => 'js-range-slider get-your-rate-popup__range-slider',
				'id' => 'rc_coverage_amount',
				'data-from' => $from,
				'value' => $customer_data->amount,
				'data-values' => implode(',', $customer_data::$coverage_amounts),
			])->label(false)->error(false);?>
		</div>

		<h3 class="get-your-rate-popup__subtitle main-title">Term Lenght</h3>
		<?=$form->field($customer_data, 'term')->radioList(
			$customer_data::$term_lengths2, [
				'item' => function($index, $label, $name, $checked, $value) {
					$checked = $checked ? 'checked="checked"' : '';
					$return = '<label class="get-your-rate-popup__label main-radio-btn-label">';
					$return .= '<input type="radio" name="'.$name.'" value="'.$value.'" '.$checked.' class="get-your-rate-popup__radio-btn main-radio-btn">';
					$return .= '<span class="get-your-rate-popup__btn-icon main-radio-btn-icon"></span>';
					$return .= '<span class="fontBodyM">'.$label.'</span>';
					$return .= '</label>';
					return $return;
				},
				'required' => 'required',
				'class' => 'get-your-rate-popup__radio-btns get-your-rate-popup__radio-btns--term',
				'id' => 'term',
				'unselect' => null,
			])->label(false);?>

		<h3 class="get-your-rate-popup__subtitle main-title">My Gender</h3>
		<?=$form->field($customer_data, 'gender')->radioList(
			$customer_data::$genders, [
				'item' => function($index, $label, $name, $checked, $value) {
					$checked = $checked ? 'checked="checked"' : '';
					$return = '<label class="get-your-rate-popup__label main-radio-btn-label">';
					$return .= '<input type="radio" name="'.$name.'" value="'.$value.'" '.$checked.' class="get-your-rate-popup__radio-btn main-radio-btn">';
					$return .= '<span class="get-your-rate-popup__btn-icon main-radio-btn-icon"></span>';
					$return .= '<span class="fontBodyM">'.$label.'</span>';
					$return .= '</label>';
					return $return;
				},
				'required' => 'required',
				'class' => 'get-your-rate-popup__radio-btns get-your-rate-popup__radio-btns--gender',
				'id' => 'rc_gender',
				'unselect' => null
			])->label(false);?>

		<div class="get-your-rate-popup__row">
			<div class="get-your-rate-popup__item">
				<label class="get-your-rate-popup__label main-title" for="age">My Age</label>
				<?=$form->field($customer_data, 'age')->input('number', ['required' => 'required', 'class' => 'age get-your-rate-popup__input fontBodyM', 'id' => 'rc_age', 'placeholder' => ''])->label(false);?>
				<span class="get-your-rate-popup__input-text tags">years old</span>
			</div>
			<div class="get-your-rate-popup__item">
				<label for="health" class="get-your-rate-popup__label main-title">My Overall Health Is ...</label>
				<?=$form->field($customer_data, 'health')->dropDownList($customer_data::$healths2, ['class' => 'js_selectpicker health get-your-rate-popup__select fontBodyM', 'id' => 'v2_health', 'data-style' => 'btn-light', 'data-mobile' => (string)$isMobile])->label(false);?>
			</div>
		</div>

		<?=Html::submitButton('Show my rates', ['class' => 'get-your-rate-popup__btn main-btn button-big', 'id' => 'submit_btn', 'disabled' => 'disabled']);?>

		<?php ActiveForm::end();?>
	</div>
</div>