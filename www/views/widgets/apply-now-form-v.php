<?php

use himiklab\yii2\recaptcha\ReCaptcha3;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;
?>
<div class="rates-form vertical applynow-form-section widget <?=$position;?>">
	<?php $form = ActiveForm::begin(['id' => 'applynow-form', 'action' => '/post/', 'options' => ['class' => 'rates-form__form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
	<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'applynow', 'id' => ''])->label(false);?>
	<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => 'quote-results', 'id' => ''])->label(false);?>
	<?=$form->field($customer_data, 'reCaptcha')->widget(ReCaptcha3::className(), ['action' => '/post/', 'jsCallback' => 'RECAPTCHA.test'])->label(false);?>
	
	<?php if($display_title):?>
		<h2 class="rates-form__subtitle main-title"><?=$title;?></h2>
	<?php endif;?>

	<div class="row rates-form__row">
		<div class="col-12 col-md-6 rates-form__label d-flex flex-column">
			<label for="term"><span class="tags">Term Length</span></label>
			<?=$form->field($customer_data, 'term_length')->dropDownList($customer_data::$term_lengths, [
				'required' => 'required',
				'class' => 'rates-form__select js_selectpicker',
				'id' => 'js_term_length',
				'data-style' => 'btn-light',
				'data-mobile' => (string)$isMobile,
				'data-trigger' => 'js_action_change',
				'data-action' => 'change_term_length',
				'data-target' => '#an_avarage_amount',
				'options' => ['10' => ['selected' => 'selected']]
			])->label(false);?>
		</div>

		<div class="col-12 col-md-6 rates-form__label d-flex flex-column">
			<label for="amount"><span class="tags">Coverage amount</span></label>
			<?=$form->field($customer_data, 'avg_amount')->dropDownList($customer_data::$avg_amounts, [
				'required' => 'required',
				'class' => 'rates-form__select js_selectpicker',
				'id' => 'an_avarage_amount',
				'data-style' => 'btn-light',
				'data-mobile' => (string)$isMobile,
				'options' => ['250' => ['selected' => 'selected']]
			])->label(false);?>
		</div>
	</div>

	<div class="row rates-form__row">
		<div class="col-12 col-md-6 rates-form__label d-flex flex-column">
			<label for="state"><span class="tags">State</span></label>
			<?=$form->field($customer_data, 'state')->dropDownList($customer_data::$states_short, [
				'required' => 'required',
				'class' => 'js_selectpicker show-tick online-app-step-1__select online-app-step-1__label--state',
				'id' => 'state',
				'data-dropup-auto' => true,
				'data-live-search' => 'true',
				'data-style' => '',
				'data-size' => 5,
				'data-title' => 'Select state',
				'data-mobile' => (string)$isMobile,
				#'data-header' => 'Select state',
				'options' => Yii::$app->Helpers->createDropdownOptionsSubtext($customer_data::$states)
			])->label(false)->error(false);?>
		</div>

		<div class="col-12 col-md-6 rates-form__label d-flex flex-column">
			<label for="tobacco"><span class="tags">Do you use tobacco?</span></label>
			<?=$form->field($customer_data, 'tobaco')->dropDownList(['0' => 'doesn’t use', '1' => 'does use'], ['required' => 'required', 'class' => 'js_selectpicker rates-form__select', 'id' => 'tobaco', 'data-style' => 'btn-light', 'data-title' => 'Tobacco', 'data-mobile' => (string)$isMobile])->label(false);?>
		</div>
	</div>

	<h2 class="rates-form__subtitle main-title">Date of Birth</h2>

	<div class="row rates-form__row  rates-form__row--date-of-birth">
		<div class="col-6 col-sm-4 rates-form__label d-flex flex-column">
			<label for="month"><span class="tags">Month</span></label>
			<?=$form->field($customer_data, 'birth_month')->dropDownList($months, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select', 'id' => 'birth_month', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Month', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
		</div>

		<div class="col-6 col-sm-4 rates-form__label d-flex flex-column">
			<label for="date"><span class="tags">Date</span></label>
			<?=$form->field($customer_data, 'birth_day')->dropDownList($days, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select', 'id' => 'birth_day', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Day', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
		</div>

		<div class="col-12 col-sm-4 rates-form__label d-flex flex-column">
			<label for="year"><span class="tags">Year</span></label>
			<?=$form->field($customer_data, 'birth_year')->dropDownList($years, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select', 'id' => 'birth_year', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Year', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
		</div>
	</div>

	<h2 class="rates-form__subtitle main-title">About You</h2>

	<div class="row rates-form__row rates-form__row--no-margin">
		<div class="col-12 col-md-4 rates-form__label d-flex flex-column">
			<label for="sex" class="rates-form__label--full-width"><span class="tags">Sex</span></label>
			<?=$form->field($customer_data, 'sex')->dropDownList(['m' => 'Male', 'f' => 'Female'], ['required' => 'required', 'class' => 'js_selectpicker rates-form__select rates-form__select--full-width', 'id' => 'sex', 'data-style' => 'btn-light', 'data-title' => 'Sex', 'data-mobile' => (string)$isMobile, ])->label(false);?>
		</div>

		<div class="col-6 col-md-4 rates-form__label d-flex flex-column">
			<label for="height" class="rates-form__label--margin"><span class="tags">Height</span></label>
			<?=$form->field($customer_data, 'height')->dropDownList($customer_data::$heights, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select rates-form__select--half-width', 'id' => 'height', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Height', 'data-mobile' => (string)$isMobile, 'options' => ['5|10' => ['selected' => 'selected']]])->label(false);?>
		</div>

		<div class="col-6 col-md-4 rates-form__label d-flex flex-column">
			<label for="weight"><span class="tags">Weight</span></label>
			<?=$form->field($customer_data, 'weight')->dropDownList($wigths, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select rates-form__select--half-width', 'id' => 'weight', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Weight', 'data-mobile' => (string)$isMobile, 'options' => ['170' => ['selected' => 'selected']]])->label(false);?>
		</div>
	</div>

	<div class="row rates-form__row rates-form__row--no-margin">
		<label class="col-12 col-md-6 rates-form__label d-flex flex-column">
			<span class="tags">First Name</span>
			<?=$form->field($customer_data, 'first_name')->textInput(['required' => 'required', 'class' => 'rates-form__input fontBodyM', 'placeholder' => 'First Name', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</label>
		<label class="col-12 col-md-6 rates-form__label d-flex flex-column">
			<span class="tags">Last Name</span>
			<?=$form->field($customer_data, 'last_name')->textInput(['required' => 'required', 'class' => 'rates-form__input fontBodyM', 'placeholder' => 'Last Name', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</label>
	</div>
	
	<div class="row rates-form__row">
		<label class="col-12 col-md-6 rates-form__label d-flex flex-column">
			<span class="tags">Phone Number</span>
			<?=$form->field($customer_data, 'phone_number')->input('tel', ['required' => 'required', 'class' => 'rates-form__input fontBodyM', 'placeholder' => 'Phone Number', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</label>
		<label class="col-12 col-md-6 rates-form__label d-flex flex-column">
			<span class="tags">Email</span>
			<?=$form->field($customer_data, 'email')->input('email', ['required' => 'required', 'class' => 'rates-form__input fontBodyM', 'placeholder' => 'Email Address', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</label>
	</div>

	<div class="rates-form__decor-line"></div>

	<?=Html::submitButton('See My Quotes', [
		#'id' => 'submit_btn',
		'class' => 'rates-form__btn main-btn button-big',
		'data-trigger' => 'js_action_click',
		'data-action' => 'apply_now_form_submit',
	]);?>
	<?php ActiveForm::end();?>
</div>
