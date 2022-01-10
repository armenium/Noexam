<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$page_id = 'start-quote';

$this->title = 'Buy Life Insurance Online - Get My Quote';
$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->registerCssFile('@web/v2/my-quote/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/plugins/css/ion.rangeSlider.min.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/range-slider.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/plugins/js/ion.rangeSlider.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-quote/js/'.$page_id.'.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
?>
<div class="main-wrapp">
	<div class="wrapp">
		<?php $form = ActiveForm::begin(['id' => $page_id, 'action' => '/my-quote/post/', 'options' => ['class' => $page_id], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
			<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => $page_id, 'id' => ''])->label(false);?>
			<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => 'overall-health', 'id' => ''])->label(false);?>
			<h1 class="start-quote__title heading-4">Let’s get started!</h1>
			<div class="start-quote__subtitle fontBodyM"><b>Coverage</b></div>
			<p class="start-quote__text fontBodyM">The amount of coverage you would like:</p>
			<div class="start-quote__range">
				<?=$form->field($customer_data, 'avg_amount')->input('text', [
					'required' => 'required',
					'class' => 'js_range_slider2 start-quote__range-slider',
					'id' => 'rc_coverage_amount',
					#'value' => '400',
					'data-from' => $from,
					'data-values' => implode(',', $customer_data::$coverage_amounts),
				])->label(false)->error(false);?>
			</div>
			<div class="start-quote__term">
				<div class="start-quote__subtitle fontBodyM"><b>Term Length</b></div>
				<?=$form->field($customer_data, 'term_length')->radioList(
					$customer_data::$term_lengths2, [
						'item' => function($index, $label, $name, $checked, $value) {
							$checked = $checked ? 'checked="checked"' : '';
							$return = '<label class="start-quote__label main-radio-btn-label">';
							$return .= '<input type="radio" name="'.$name.'" value="'.$value.'" '.$checked.' class="start-quote__radio-btn main-radio-btn" data-type="term">';
							$return .= '<span class="start-quote__btn-icon main-radio-btn-icon"></span>';
							$return .= '<span class="fontBodyM">'.$label.'</span>';
							$return .= '</label>';
							return $return;
						},
						'required' => 'required',
						'class' => 'start-quote__radio-btns',
						'id' => 'term_length',
						'unselect' => null,
				])->label(false)->error(false);?>
			</div>
			<?=Html::submitButton('Start my Quote', ['class' => 'start-quote__btn main-btn button-big', 'id' => 'submit_btn']);?>
		<?php ActiveForm::end();?>
	</div>
</div>

