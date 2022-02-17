<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$page_id = 'overall-health';

$this->title = 'Buy Life Insurance Online - Overal health';
$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->registerCssFile('@web/v2/my-quote/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-quote/js/'.$page_id.'.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
?>
<div class="main-wrapp">
	<div class="wrapp">
		<div class="overal-health my-quote-steps">
			<div class="my-quote-steps__steps">
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">1</div>
				<span class="my-quote-steps__decor-line my-quote-steps__decor-line--active"></span>
				<div class="my-quote-steps__steps-item">2</div>
				<span class="my-quote-steps__decor-line"></span>
				<div class="my-quote-steps__steps-item">3</div>
			</div>

			<h1 class="overal-health__title heading-4">Overall health</h1>
			<?php $form = ActiveForm::begin(['id' => $page_id, 'action' => '/my-quote/post/', 'options' => ['class' => 'overal-health__form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
				<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => $page_id, 'id' => ''])->label(false);?>
				<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => 'date-of-birth', 'id' => ''])->label(false);?>
				<?=$form->field($customer_data, 'health')->radioList(
					$customer_data::$healths3,
					[
						'item' => function($index, $label, $name, $checked, $value) {
							$checked = $checked ? 'checked="checked"' : '';
							$return = '<div class="overal-health__item">';
							$return .= '<img src="/v2/my-quote/img/overall-health-smile-'.($index+1).'.png" class="overal-health__icon" alt="icon" />';
							$return .= '<label class="overal-health__label main-radio-btn-label">';
							$return .= '<input type="radio" name="'.$name.'" value="'.$value.'" '.$checked.' class="overal-health__radio-btn main-radio-btn">';
							$return .= '<span class="overal-health__btn-icon main-radio-btn-icon"></span>';
							$return .= '<span class="fontBodyM">'.$label.'</span>';
							$return .= '</label>';
							$return .= '</div>';
							return $return;
						},
						'required' => 'required',
						'class' => 'overal-health__container',
						'id' => 'overal_health',
					])->label(false);?>
				<div class="overal-health__box">
					<div class="overal-health__col">
						<div class="overal-health__subtitle fontBodyM"><b>Do you use tobacco?</b></div>
						<?=$form->field($customer_data, 'tobaco')->radioList(
							$customer_data::$yes_no,
							[
								'item' => function($index, $label, $name, $checked, $value) {
									$checked = $checked ? 'checked="checked"' : '';
									$return = '';
									$return .= '<label class="overal-health__label main-radio-btn-label">';
									$return .= '<input type="radio" name="'.$name.'" value="'.$value.'" '.$checked.' class="overal-health__radio-btn main-radio-btn">';
									$return .= '<span class="overal-health__btn-icon main-radio-btn-icon"></span>';
									$return .= '<span class="fontBodyM">'.$label.'</span>';
									$return .= '</label>';
									return $return;
								},
								'required' => 'required',
								'class' => 'overal-health__radio-btns',
								'id' => 'tobaco',
							])->label(false);?>
					</div>
					<div class="overal-health__col">
						<div class="overal-health__subtitle fontBodyM"><b>Sex</b></div>
						<?=$form->field($customer_data, 'sex')->radioList(
							$customer_data::$genders,
							[
								'item' => function($index, $label, $name, $checked, $value) {
									$checked = $checked ? 'checked="checked"' : '';
									$return = '';
									$return .= '<label class="overal-health__label main-radio-btn-label">';
									$return .= '<input type="radio" name="'.$name.'" value="'.$value.'" '.$checked.' class="overal-health__radio-btn main-radio-btn">';
									$return .= '<span class="overal-health__btn-icon main-radio-btn-icon"></span>';
									$return .= '<span class="fontBodyM">'.$label.'</span>';
									$return .= '</label>';
									return $return;
								},
								'required' => 'required',
								'class' => 'overal-health__radio-btns',
								'id' => 'sex',
							])->label(false);?>
					</div>
				</div>

				<?=Html::submitButton('Continue', ['class' => 'overal-health__btn main-btn button-big', 'id' => 'submit_btn']);?>
			<?php ActiveForm::end();?>

		</div>
	</div>
</div>


