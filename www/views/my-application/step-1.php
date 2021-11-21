<?php

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$page_id = 'online-app-step-1';

/* @var $this yii\web\View */
$this->title = 'Questions';
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$this->registerCssFile('@web/v2/my-application/css/online-app.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-application/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-application/js/online-app.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
?>
<div class="main-wrapp">
	<div class="wrapp">
		<div class="online-app-step-1 my-quote-steps">
			<div class="my-quote-steps__steps">
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">1</div>
				<span class="my-quote-steps__decor-line my-quote-steps__decor-line--active"></span>
				<div class="my-quote-steps__steps-item">2</div>
				<span class="my-quote-steps__decor-line"></span>
				<div class="my-quote-steps__steps-item">3</div>
			</div>
		</div>
		
		<?php $form = ActiveForm::begin([
			'enableAjaxValidation' => true,
			'enableClientValidation' => true,
			'validationUrl' => Url::toRoute('/my-application/validation'),
			'id' => 'js_pii',
			'action' => '/my-application/post/',
			'options' => ['class' => 'online-app-step-1__form'], 'fieldConfig' => ['options' => ['tag' => false]]
		]);?>
			<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'step-1', 'id' => ''])->label(false);?>
			
			<div class="online-app-step-2__form-box">
				<h1 class="online-app-step-1__title heading-5">Proposed Insured Information</h1>
				<h3 class="online-app-step-1__subtitle main-title">Name</h3>
				
				<div class="online-app-step-1__row">
					<label class="online-app-step-1__label online-app-step-1__label--first-name online-app-main-label">
						<span class="tags">First Name</span>
						<?=$form->field($customer_data, 'first_name')->textInput(['required' => 'required', 'class' => 'online-app-step-1__input online-app-main-input', 'placeholder' => 'First Name', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
					</label>
					<label class="online-app-step-1__label online-app-main-label online-app-step-1__input--initial-label">
						<span class="tags">Initial</span>
						<?=$form->field($customer_data, 'middle_name')->textInput(['required' => 'required', 'class' => 'online-app-step-1__input online-app-step-1__input--initial online-app-main-input', 'placeholder' => 'MN', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false)?>
					</label>
					<label class="online-app-step-1__label online-app-main-label">
						<span class="tags">Last Name</span>
						<?=$form->field($customer_data, 'last_name')->textInput(['required' => 'required', 'class' => 'online-app-step-1__input online-app-main-input', 'placeholder' => 'Last Name', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
					</label>
				</div>
				
				<h3 class="online-app-step-1__subtitle main-title">Address</h3>
				
				<div class="online-app-step-1__row">
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-main-label">
						<span class="tags">Street Address</span>
						<?=$form->field($customer_data, 'street_address')->textInput(['required' => 'required', 'class' => 'online-app-step-1__input online-app-main-input', 'placeholder' => 'Enter your street address', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
					</label>
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-main-label">
						<span class="tags">City</span>
						<?=$form->field($customer_data, 'city')->textInput(['required' => 'required', 'class' => 'online-app-step-1__input online-app-main-input', 'placeholder' => 'Enter your city', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
					</label>
				</div>
				
				<div class="online-app-step-1__row online-app-step-1__row--direction-row">
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-main-label">
						<span class="tags">State</span>
						<?=$form->field($customer_data, 'state')->dropDownList($customer_data::$states_short, [
							'required' => 'required',
							'class' => 'js_selectpicker online-app-step-1__select online-app-step-1__label--state show-tick',
							'id' => 'state',
							'data-dropup-auto' => true,
							'data-live-search' => 'true',
							'data-style' => '',
							'data-size' => 5,
							'data-title' => 'Enter your state',
							'data-mobile' => (string)$isMobile,
							#'data-header' => 'Select state',
							'options' => Yii::$app->Helpers->createDropdownOptionsSubtext($customer_data::$states)
						])->label(false)->error(false);?>
					</label>
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-step-1__label--zip-code online-app-main-label">
						<span class="tags">Zip Code</span>
						<?=$form->field($customer_data, 'zip')->textInput(['required' => 'required', 'class' => 'online-app-step-1__input online-app-main-input', 'placeholder' => 'Enter your zip code', 'autocomplete' => 'on', 'autofocus' => '', 'enableAjaxValidation' => true])->label(false)->error(false);?>
					</label>
				</div>
				
				<h3 class="online-app-step-1__subtitle main-title">Contact Details</h3>
				<div class="online-app-step-1__row">
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-main-label">
						<span class="tags">Phone Number</span>
						<?=$form->field($customer_data, 'phone_number')->input('tel', ['required' => 'required', 'class' => 'online-app-step-1__input online-app-main-input', 'placeholder' => 'Enter your phone number', 'autocomplete' => 'on', 'autofocus ' => '', 'data-pattern' => "([0-9]{3}) [0-9]{3}-[0-9]{4}"])->label(false)->error(false);?>
					</label>
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-main-label">
						<span class="tags">Email</span>
						<?=$form->field($customer_data, 'email')->input('email', ['required' => 'required', 'class' => 'online-app-step-1__input online-app-main-input', 'placeholder' => 'Enter your Email Address', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
					</label>
				</div>
			</div>
		
		<?php ActiveForm::end();?>
		
		<div class="online-app-step-1__btns">
			<button type="submit" class="online-app-step-1-btn main-btn button-big prev" data-trigger="js_action_click" data-action="online_app_back">Back</button>
			<button type="submit" class="online-app-step-1-btn main-btn button-big next" data-trigger="js_action_click" data-action="online_app_next" data-target="#js_pii">next</button>
		</div>
	
	</div>
</div>

<img class="bg-section__img1" src="/v2/common/images/online-app/online-app-bg-1.png" alt="">
<img class="bg-section__img2" src="/v2/common/images/online-app/online-app-bg-2.png" alt="">
<img class="bg-section__img3" src="/v2/common/images/online-app/online-app-bg-3.png" alt="">
