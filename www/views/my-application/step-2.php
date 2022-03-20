<?php

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;

$page_id = 'online-app-step-2';

/* @var $this yii\web\View */
$this->title = 'Questions';
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$this->registerCssFile('@web/v2/my-application/css/online-app.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-application/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-application/js/online-app.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$payment_frequencies = [
	'monthly' => 'Monthly ($'.$customer_data->monthly_premium.')',
	'annual' => 'Annual ($'.$customer_data->premium_amount.')',
];
?>
<div class="main-wrapp">
	<div class="wrapp">
		<div class="online-app-step-2 my-quote-steps">
			<div class="my-quote-steps__steps">
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">1</div>
				<span class="my-quote-steps__decor-line my-quote-steps__decor-line--active"></span>
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">2</div>
				<span class="my-quote-steps__decor-line"></span>
				<div class="my-quote-steps__steps-item">3</div>
			</div>
		</div>
		
		<?php $form = ActiveForm::begin([
			'enableAjaxValidation' => true,
			'enableClientValidation' => true,
			'validationUrl' => Url::toRoute('/my-application/validation'),
			'id' => 'js_step_2',
			'action' => '/my-application/post/',
			'options' => ['class' => 'online-app-step-2__form'],
			'fieldConfig' => ['options' => ['tag' => false]]
		]);?>
		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'step-2', 'id' => ''])->label(false);?>

		<div class="online-app-step-2__form-box">
			<h1 class="online-app-step-2__title heading-5"><?=$customer_data->first_name.' '.$customer_data->middle_name.' '.$customer_data->last_name;?> with $<?=$customer_data->avg_amount;?>,000 for a <?=$customer_data->term;?>-year Term</h1>

			<h3 class="online-app-step-2__subtitle main-title">Birth Place</h3>
			<div class="online-app-step-2__row">
				<div class="online-app-step-2__col">
					<label for="birth-state" class="online-app-step-2__label online-app-main-label">
						<span class="tags">Birth State</span>
						<?=$form->field($customer_data, 'birth_state')->dropDownList($customer_data::$states, [
							'required' => 'required',
							'class' => 'js_selectpicker show-tick online-app-step-2__select online-app-step-1__label--state',
							'id' => 'birth-state',
							'data-dropup-auto' => true,
							'data-live-search' => 'true',
							'data-style' => '',
							'data-size'  => 5,
							'data-title' => 'Select state',
							'data-mobile' => (string)$isMobile,
							'options' => Yii::$app->Helpers->createDropdownOptionsSubtext($customer_data::$states_short)
						])->label(false)->error(false);?>
					</label>
				</div>

				<div class="online-app-step-2__col">
					<label for="birth-country" class="online-app-step-2__label online-app-main-label">
						<span class="tags">Birth Country</span>
						<?=$form->field($customer_data, 'birth_country')->dropDownList($customer_data::$countries, [
							'required' => 'required',
							'class' => 'js_selectpicker show-tick online-app-step-2__select',
							'id' => 'birth-country',
							'data-dropup-auto' => true,
							'data-live-search' => 'true',
							'data-style' => '',
							'data-size'  => 5,
							'data-title' => 'Select country',
							'data-mobile' => (string)$isMobile,
							'options' => ['United States of America' => ['selected' => 'selected']]
						])->label(false)->error(false);?>
					</label>
				</div>
			</div>

			<h3 class="online-app-step-2__subtitle main-title">Job Information</h3>
			<div class="online-app-step-2__row">
				<label class="online-app-step-2__label online-app-main-label">
					<span class="tags">Occupation</span>
					<?=$form->field($customer_data, 'occupation')->textInput(['required' => 'required', 'class' => 'online-app-step-2__input online-app-main-input', 'placeholder' => 'e.g. Engineering, etc.', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
				</label>
				<label class="online-app-step-2__label online-app-main-label">
					<span class="tags">Household Income</span>
					<?=$form->field($customer_data, 'household_income')->textInput(['required' => 'required', 'class' => 'online-app-step-2__input online-app-main-input', 'placeholder' => 'Household Income', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
				</label>
			</div>

			<h3 class="online-app-step-2__subtitle main-title">Identity Information</h3>
			<div class="online-app-step-2__row">
				<label class="online-app-step-2__label online-app-main-label">
					<span class="tags">Social Security Number</span>
					<?=$form->field($customer_data, 'ssn')->input('number', ['required' => 'required', 'class' => 'online-app-step-2__input online-app-main-input', 'placeholder' => 'Social Security Number', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
				</label>
			</div>
			<div class="online-app-step-2__row">
				<label class="online-app-step-2__label online-app-main-label">
					<span class="tags">Drivers License Number</span>
					<?=$form->field($customer_data, 'dln')->input('number', ['required' => 'required', 'class' => 'online-app-step-2__input online-app-main-input', 'placeholder' => 'Drivers License Number', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
				</label>

				<div class="online-app-step-2__col">
					<label for="dls" class="online-app-step-2__label online-app-main-label">
						<span class="tags">Drivers License State</span>
						<?=$form->field($customer_data, 'dls')->dropDownList($customer_data::$states_short, [
							'required' => 'required',
							'class' => 'js_selectpicker show-tick online-app-step-2__select',
							'id' => 'dls',
							'data-dropup-auto' => true,
							'data-live-search' => 'true',
							'data-style' => '',
							'data-size' => 5,
							'data-title' => 'Enter your state',
							'data-mobile' => (string)$isMobile,
							#'data-header' => 'Select state',
							'options' => Yii::$app->Helpers->createDropdownOptionsSubtext($customer_data::$states, true)
						])->label(false)->error(false);?>
					</label>
				</div>
			</div>

			<h3 class="online-app-step-2__subtitle main-title">Payment Details</h3>
			<div class="online-app-step-2__row">
				<div class="online-app-step-2__col">
					<label for="payment-method" class="online-app-step-2__label online-app-main-label">
						<span class="tags">Payment Method</span>
						<?=$form->field($customer_data, 'payment[method]')->dropDownList($customer_data::$payment_methods, [
							'required' => 'required',
							'class' => 'js_selectpicker show-tick online-app-step-2__select',
							'id' => 'payment-method',
							'data-dropup-auto' => true,
							'data-live-search' => 'false',
							'data-style' => '',
							'data-size' => 5,
							'data-title' => 'Select payment method',
							'data-mobile' => (string)$isMobile,
							#'data-header' => 'Select state',
						])->label(false)->error(false);?>
					</label>
				</div>

				<div class="online-app-step-2__col">
					<label for="payment-frequency" class="online-app-step-2__label online-app-main-label">
						<span class="tags">Payment Frequency</span>
						<?=$form->field($customer_data, 'payment[frequency]')->dropDownList($payment_frequencies, [
							'required' => 'required',
							'class' => 'js_selectpicker show-tick online-app-step-2__select',
							'id' => 'payment-frequency',
							'data-dropup-auto' => true,
							'data-live-search' => 'false',
							'data-style' => '',
							'data-size' => 5,
							'data-title' => 'Select payment frequency',
							'data-mobile' => (string)$isMobile,
							#'data-header' => 'Select state',
						])->label(false)->error(false);?>
					</label>
				</div>
			</div>

			<h3 class="online-app-step-2__subtitle main-title">Bank Details</h3>
			<div class="online-app-step-2__row">
				<label class="online-app-step-2__label online-app-main-label">
					<span class="tags">Bank Name</span>
					<?=$form->field($customer_data, "payment[bank-name]")->textInput(['required' => 'required', 'class' => 'online-app-step-2__input online-app-main-input', 'placeholder' => 'Please enter your bank name', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
				</label>
			</div>
			<div class="online-app-step-2__row">
				<label class="online-app-step-2__label online-app-main-label">
					<span class="tags">Bank Account Number</span>
					<?=$form->field($customer_data, "payment[bank-account-number]")->input('number', ['required' => 'required', 'class' => 'online-app-step-2__input online-app-main-input', 'placeholder' => 'Bank Account Number', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
				</label>
				<label class="online-app-step-2__label online-app-main-label">
					<span class="tags">Routing Number</span>
					<?=$form->field($customer_data, "payment[routing-number]")->input('number', ['required' => 'required', 'class' => 'online-app-step-2__input online-app-main-input', 'placeholder' => 'Routing Number', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
				</label>
			</div>

			<p class="online-app-step-2__note fontBodyS">
				<b>Note:</b> The submissin of this form does not bind your life insurance policy. Policy approvals occur in 24-48 hours of the initial application submission to the insurance company. Upon the time of your policy approval you will
				be notified by e-mail. If approved please expect 3-5 business days to recieve a hard copy of your policy in the mail.
			</p>

		</div>
		
		<?php ActiveForm::end();?>

		<div class="online-app-step-1__btns">
			<button type="submit" class="online-app-step-1-btn main-btn button-big prev" data-trigger="js_action_click" data-action="online_app_back">Back</button>
			<button type="submit" class="online-app-step-1-btn main-btn button-big next" data-trigger="js_action_click" data-action="online_app_next" data-target="#js_step_2">next</button>
		</div>

	</div>
</div>

<img class="bg-section__img1" src="/v2/common/images/online-app/online-app-bg-1.png" alt="">
<img class="bg-section__img2" src="/v2/common/images/online-app/online-app-bg-2.png" alt="">
<img class="bg-section__img3" src="/v2/common/images/online-app/online-app-bg-3.png" alt="">


