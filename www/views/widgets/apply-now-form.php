<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;
?>
<div class="rates-form applynow-form-section widget <?=$position;?>" style="width:<?=$width;?>;">
	<?php $form = ActiveForm::begin(['id' => 'applynow-form', 'action' => '/post/', 'options' => ['class' => 'rates-form__form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
	<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'contentform', 'id' => ''])->label(false);?>
	<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => 'apply-now/quote-result/', 'id' => ''])->label(false);?>
	
	<?php if($display_title):?>
		<h1 class="rates-form__title heading-5"><?=$title;?></h1>
	<?php endif;?>

	<div class="rates-form__row">
		<div class="rates-form__label">
			<label for="amount"><span class="tags">Coverage amount</span></label>
			<?=$form->field($customer_data, 'avg_amount')->dropDownList($customer_data::$avg_amounts, ['required' => 'required', 'class' => 'rates-form__select js_selectpicker', 'id' => 'avarage_amount', 'data-style' => 'btn-light', 'data-mobile' => (string)$isMobile, 'options' => ['250' => ['selected' => 'selected']]])->label(false);?>
		</div>

		<div class="rates-form__label">
			<label for="term"><span class="tags">Term Length</span></label>
			<?=$form->field($customer_data, 'term_length')->dropDownList($customer_data::$term_lengths, ['required' => 'required', 'class' => 'rates-form__select js_selectpicker', 'id' => 'term_length', 'data-style' => 'btn-light', 'data-mobile' => (string)$isMobile, 'options' => ['10' => ['selected' => 'selected']]])->label(false);?>
		</div>

		<div class="rates-form__label">
			<label for="state"><span class="tags">State you reside in</span></label>
			<?=$form->field($customer_data, 'state')->dropDownList($customer_data::$states_short, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select', 'id' => 'state', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Select State', 'data-mobile' => (string)$isMobile])->label(false);?>
		</div>

		<div class="rates-form__label">
			<label for="tobacco"><span class="tags">Do you use tobacco?</span></label>
			<?=$form->field($customer_data, 'tobaco')->dropDownList(['0' => 'doesn’t use', '1' => 'does use'], ['required' => 'required', 'class' => 'js_selectpicker rates-form__select', 'id' => 'tobaco', 'data-style' => 'btn-light', 'data-title' => 'Tobacco', 'data-mobile' => (string)$isMobile])->label(false);?>
		</div>
	</div>

	<h2 class="rates-form__subtitle main-title">Date of Birth</h2>
	<div class="rates-form__row rates-form__row--no-wrap">
		<div class="rates-form__label">
			<label for="date"><span class="tags">Date</span></label>
			<?=$form->field($customer_data, 'birthday[day]')->dropDownList($days, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select', 'id' => 'birth_day', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Day', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
		</div>

		<div class="rates-form__label">
			<label for="month"><span class="tags">Month</span></label>
			<?=$form->field($customer_data, 'birthday[month]')->dropDownList($months, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select', 'id' => 'birth_month', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Month', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
		</div>

		<div class="rates-form__label">
			<label for="year"><span class="tags">Year</span></label>
			<?=$form->field($customer_data, 'birthday[year]')->dropDownList($years, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select', 'id' => 'birth_year', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Year', 'data-mobile' => (string)$isMobile, 'options' => ['1970' => ['selected' => 'selected']]])->label(false);?>
		</div>
	</div>

	<h2 class="rates-form__subtitle main-title">About You</h2>
	<div class="rates-form__row rates-form__row--no-column">
		<div class="rates-form__label">
			<label for="sex" class="rates-form__label--full-width"><span class="tags">Sex</span></label>
			<?=$form->field($customer_data, 'sex')->dropDownList(['m' => 'Male', 'f' => 'Female'], ['required' => 'required', 'class' => 'js_selectpicker rates-form__select rates-form__select--full-width', 'id' => 'sex', 'data-style' => 'btn-light', 'data-title' => 'Sex', 'data-mobile' => (string)$isMobile, ])->label(false);?>
		</div>

		<div class="rates-form__label">
			<label for="height" class="rates-form__label--margin"><span class="tags">Height</span></label>
			<?=$form->field($customer_data, 'height')->dropDownList($customer_data::$heights, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select rates-form__select--half-width', 'id' => 'height', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Height', 'data-mobile' => (string)$isMobile, 'options' => ['5|10' => ['selected' => 'selected']]])->label(false);?>
		</div>

		<div class="rates-form__label">
			<label for="weight"><span class="tags">Weight</span></label>
			<?=$form->field($customer_data, 'weight')->dropDownList($wigths, ['required' => 'required', 'class' => 'js_selectpicker rates-form__select rates-form__select--half-width', 'id' => 'weight', 'data-style' => 'btn-light', 'data-size' => 8, 'data-title' => 'Weight', 'data-mobile' => (string)$isMobile, 'options' => ['170' => ['selected' => 'selected']]])->label(false);?>
		</div>
	</div>

	<h2 class="rates-form__subtitle main-title">Contact Details</h2>
	<div class="rates-form__row">
		<label class="rates-form__label">
			<span class="tags">First Name</span>
			<?=$form->field($customer_data, 'first_name')->textInput(['required' => 'required', 'class' => 'rates-form__input fontBodyM', 'placeholder' => 'First Name', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</label>
		<label class="rates-form__label">
			<span class="tags">Last Name</span>
			<?=$form->field($customer_data, 'last_name')->textInput(['required' => 'required', 'class' => 'rates-form__input fontBodyM', 'placeholder' => 'Last Name', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</label>
		<label class="rates-form__label">
			<span class="tags">Email</span>
			<?=$form->field($customer_data, 'email')->input('email', ['required' => 'required', 'class' => 'rates-form__input fontBodyM', 'placeholder' => 'Email Address', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</label>
		<label class="rates-form__label">
			<span class="tags">Phone Number</span>
			<?=$form->field($customer_data, 'phone_number')->input('tel', ['required' => 'required', 'class' => 'rates-form__input fontBodyM', 'placeholder' => 'Phone Number', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</label>
	</div>

	<div class="rates-form__decor-line"></div>

	<?=Html::submitButton('See My Quotes', [
		'id' => 'submit_btn',
		'class' => 'rates-form__btn main-btn button-big',
		'data-trigger' => 'js_action_click',
		'data-action' => 'contact_details_form_submit',
	]);?>
	<?php ActiveForm::end();?>
</div>
