<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use app\models\CustomerData;
use app\models\MyActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha3;

$customer_data = new CustomerData();
$customer_data->tobaco = '0';
$customer_data->term_length = '10';

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
?>
<div class="applynow-form-section wrap trans_me">
		<?php $form = ActiveForm::begin(['id' => 'hp-applynow-form', 'enableAjaxValidation' => false, 'action' => '/post/', 'options' => ['class' => 'hp-applynow-form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'homeform', 'id' => ''])->label(false);?>
		<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => 'apply-now/quote-result/', 'id' => ''])->label(false);?>
		<?=$form->field($customer_data, 'reCaptcha')->widget(ReCaptcha3::className(), ['action' => '/post/', 'jsCallback' => 'RECAPTCHA.test'])->label(false);?>

		<ul id="progressbar" class="h0 trans_all">
			<li>ABOUT YOU<div></div></li>
			<li>DATE OF BIRTH<div></div></li>
			<li>CONTACT INFO<div></div></li>
		</ul>

			<fieldset>
				<div class="row">
					<div class="col-md-12">
						<label>Coverage Amount</label>
					</div>
					<div class="col-md-12 pta">
						<?=$form->field($customer_data, 'avg_amount')->dropDownList($customer_data::$avg_amounts, ['required' => 'required', 'class' => 'selectpicker avarage_amount form-control', 'id' => 'avarage_amount', 'data-style' => 'btn-info', 'data-mobile' => (string)$isMobile, 'options' => ['250' => ['selected' => 'selected']]])->label(false);?>
					</div>
				</div>
				<div class="row mt">
					<div class="col-md-12">
						<label>Term Length</label>
					</div>
					<div class="col-md-12 pt25">
						<?=$form->field($customer_data, 'term_length')->radioList(
							$customer_data::$term_lengths2,
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
								'class' => 'form-control-radio',
								'id' => 'term_length',
							])->label(false);?>
					</div>
				</div>
				<div class="row mt">
					<div class="col-md-12 text-center">
						<?=Html::buttonInput('Start My Quote', ['class' => 'btn continue-button next action-button']);?>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row mt">
					<div class="col-md-12">
						<label class="mb">About You</label>
					</div>
					<div class="col-xs-4 pt15">
						<?=$form->field($customer_data, 'sex')->dropDownList(['m' => 'Male', 'f' => 'Female'], ['required' => 'required', 'class' => 'selectpicker sex form-control', 'id' => 'sex', 'data-style' => 'btn-success', 'data-title' => 'Sex', 'data-mobile' => (string)$isMobile, ])->label(false);?>
					</div>
					<div class="col-xs-4 pt15">
						<?=$form->field($customer_data, 'height')->dropDownList($customer_data::$heights, ['required' => 'required', 'class' => 'selectpicker height form-control', 'id' => 'height', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Height', 'data-mobile' => (string)$isMobile, 'options' => ['5|10' => ['selected' => 'selected']]])->label(false);?>
					</div>
					<div class="col-xs-4 pt15">
						<?=$form->field($customer_data, 'weight')->dropDownList($wigths, ['required' => 'required', 'class' => 'selectpicker weight form-control', 'id' => 'weight', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Weight', 'data-mobile' => (string)$isMobile, 'options' => ['170' => ['selected' => 'selected']]])->label(false);?>
					</div>
				</div>
				<div class="row mt">
					<div class="col-md-12">
						<label class="mb">Do you use tobacco?</label>
					</div>
					<div class="col-md-12 pt25">
						<?=$form->field($customer_data, 'tobaco')->radioList(
							['1' => 'Yes', '0' => 'No'],
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
								'class' => 'form-control-radio',
								'id' => 'tobaco',
							])->label(false);?>
					</div>
				</div>
				<div class="row mt">
					<div class="col-md-12 text-center">
						<?=Html::buttonInput('Next', ['class' => 'btn next-button next action-button']);?>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row mt birthdate">
					<div class="col-md-12">
						<label class="mb">Date of Birth</label>
					</div>
					<div class="col-xs-4 pt15">
						<?=$form->field($customer_data, 'birthday[month]')->dropDownList($months, ['required' => 'required', 'class' => 'selectpicker birth_month form-control', 'id' => 'birth_month', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Month', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
					</div>
					<div class="col-xs-4 pt15">
						<?=$form->field($customer_data, 'birthday[day]')->dropDownList($days, ['required' => 'required', 'class' => 'selectpicker birth_day form-control', 'id' => 'birth_day', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Day', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
					</div>
					<div class="col-xs-4 pt15">
						<?=$form->field($customer_data, 'birthday[year]')->dropDownList($years, ['required' => 'required', 'class' => 'selectpicker birth_year form-control', 'id' => 'birth_year', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Year', 'data-mobile' => (string)$isMobile, 'options' => ['1970' => ['selected' => 'selected']]])->label(false);?>
					</div>
				</div>
				<div class="row mt">
					<div class="col-md-12 text-center">
						<?=Html::buttonInput('Next', ['class' => 'btn next-button next action-button']);?>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row mt contacts">
					<div class="col-md-12">
						<label class="mb">Contact Info</label>
					</div>
					<div class="col-md-6">
						<?=$form->field($customer_data, 'first_name')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'First Name', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
					</div>
					<div class="col-md-6">
						<?=$form->field($customer_data, 'last_name')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Last Name', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
					</div>
					<div class="col-md-12 mt">
						<?=$form->field($customer_data, 'email')->input('email', ['required' => 'required', 'class' => false, 'placeholder' => 'Email Address', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
					</div>
					<div class="col-md-6 mt">
						<?=$form->field($customer_data, 'phone_number')->input('tel', ['required' => 'required', 'class' => false, 'placeholder' => 'Phone Number', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
					</div>
					<div class="col-md-6 mt">
						<?=$form->field($customer_data, 'state')->dropDownList($customer_data::$states_short, ['required' => 'required', 'class' => 'selectpicker state form-control', 'id' => 'state', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Select State', 'data-mobile' => (string)$isMobile])->label(false);?>
					</div>
				</div>
				<div class="row mt">
					<div class="col-md-12 text-center">
						<?=Html::submitButton('See My Quote', ['class' => 'btn btn-success submit-button', 'id' => 'submit_btn']);?>
					</div>
				</div>
			</fieldset>
		
		<?php ActiveForm::end();?>
</div>
