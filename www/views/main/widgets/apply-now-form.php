<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use app\models\CustomerData;

$customer_data = new CustomerData();
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

$c = count($prices['plans']['sagicor']);

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
if(!isset($width)){
	$width = 'auto';
}
$h2_title = 'Get a Quote Today.';
$col_class = 'col-md-12';
if($position == 'center'){
	$h2_title = 'Compare and Save. Get a Quote Today.';
	$col_class = 'col-md-6';
}else{
	$position .= ' half';
}

?>
<div class="applynow-form-section widget <?=$position;?> trans_all" style="width:<?=$width;?>;">
	<?php if($display_title):?>
	<div class="row mb50">
		<div class="col-md-12">
			<h2 class="caption"><?=$h2_title;?></h2>
		</div>
	</div>
	<?php endif;?>
	<?php $form = ActiveForm::begin(['id' => 'applynow-form', 'action' => '/post/', 'options' => ['class' => 'applynow-form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
	<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'contentform', 'id' => ''])->label(false);?>
	<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => 'apply-now/quote-result/', 'id' => ''])->label(false);?>
	<div class="row first">
		<div class="<?=$col_class?>">
			<div class="row">
				<div class="col-md-6">
					<label>Coverage Amount</label>
				</div>
				<div class="col-md-6">
					<label>Term Length</label>
				</div>
				<div class="col-md-6 pta">
					<?=$form->field($customer_data, 'avg_amount')->dropDownList($customer_data::$avg_amounts, ['required' => 'required', 'class' => 'selectpicker avarage_amount form-control', 'id' => 'avarage_amount', 'data-style' => 'btn-info', 'data-mobile' => (string)$isMobile, 'options' => ['250' => ['selected' => 'selected']]])->label(false);?>
				</div>
				<div class="col-md-6 pt25">
					<?=$form->field($customer_data, 'term_length')->dropDownList($customer_data::$term_lengths, ['required' => 'required', 'class' => 'selectpicker form-control', 'id' => 'term_length', 'data-style' => 'btn-info', 'data-mobile' => (string)$isMobile, 'options' => ['10' => ['selected' => 'selected']]])->label(false);?>
				</div>
			</div>
		</div>
		<div class="<?=$col_class?>">
			<div class="row">
				<div class="col-md-12">
					<label>State you reside in</label>
				</div>
				<div class="col-xs-6 pt25">
					<?=$form->field($customer_data, 'state')->dropDownList($customer_data::$states_short, ['required' => 'required', 'class' => 'selectpicker state form-control', 'id' => 'state', 'data-style' => 'btn-success', 'data-title' => 'Select State', 'data-mobile' => (string)$isMobile])->label(false);?>
				</div>
				<div class="col-xs-6 pt25">
					<?=$form->field($customer_data, 'tobaco')->dropDownList(['0' => 'doesn’t use', '1' => 'does use'], ['required' => 'required', 'class' => 'selectpicker tobaco form-control', 'id' => 'tobaco', 'data-style' => 'btn-success', 'data-title' => 'Tobacco', 'data-mobile' => (string)$isMobile])->label(false);?>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt">
		<div class="<?=$col_class?>">
			<div class="row birthdate">
				<div class="col-md-12">
					<label>Date of Birth</label>
				</div>
				<div class="col-xs-4 pt15">
					<?=$form->field($customer_data, 'birthday[month]')->dropDownList($months, ['required' => 'required', 'class' => 'selectpicker birth_month form-control', 'id' => 'birth_month', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Month', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
				</div>
				<div class="col-xs-4 pt15">
					<?=$form->field($customer_data, 'birthday[day]')->dropDownList($days, ['required' => 'required', 'class' => 'selectpicker birth_day form-control', 'id' => 'birth_day', 'data-style' => 'btn-success', 'data-size' => 31, 'data-title' => 'Day', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
				</div>
				<div class="col-xs-4 pt15">
					<?=$form->field($customer_data, 'birthday[year]')->dropDownList($years, ['required' => 'required', 'class' => 'selectpicker birth_year form-control', 'id' => 'birth_year', 'data-style' => 'btn-success', 'data-size' => 16, 'data-title' => 'Year', 'data-mobile' => (string)$isMobile, 'options' => ['1970' => ['selected' => 'selected']]])->label(false);?>
				</div>
			</div>
		</div>
		<div class="<?=$col_class?> about">
			<div class="row">
				<div class="col-md-12">
					<label>About You</label>
				</div>
				<div class="col-xs-4 pt15">
					<?=$form->field($customer_data, 'sex')->dropDownList(['m' => 'Male', 'f' => 'Female'], ['required' => 'required', 'class' => 'selectpicker sex form-control', 'id' => 'sex', 'data-style' => 'btn-success', 'data-title' => 'Sex', 'data-mobile' => (string)$isMobile, ])->label(false);?>
				</div>
				<div class="col-xs-4 pt15">
					<?=$form->field($customer_data, 'height')->dropDownList($customer_data::$heights, ['required' => 'required', 'class' => 'selectpicker height form-control', 'id' => 'height', 'data-style' => 'btn-success', 'data-size' => 26, 'data-title' => 'Height', 'data-mobile' => (string)$isMobile, 'options' => ['5|10' => ['selected' => 'selected']]])->label(false);?>
				</div>
				<div class="col-xs-4 pt15">
					<?=$form->field($customer_data, 'weight')->dropDownList($wigths, ['required' => 'required', 'class' => 'selectpicker weight form-control', 'id' => 'weight', 'data-style' => 'btn-success', 'data-size' => 16, 'data-title' => 'Weight', 'data-mobile' => (string)$isMobile, 'options' => ['170' => ['selected' => 'selected']]])->label(false);?>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt contacts">
		<div class="col-md-12">
			<label>Contact Info</label>
		</div>
		<div class="<?=$col_class?> pt15">
			<?=$form->field($customer_data, 'first_name')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'First Name', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</div>
		<div class="<?=$col_class?> pt15">
			<?=$form->field($customer_data, 'last_name')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Last Name', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</div>
		<div class="<?=$col_class?> pt25">
			<?=$form->field($customer_data, 'phone_number')->input('tel', ['required' => 'required', 'class' => false, 'placeholder' => 'Phone Number', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</div>
		<div class="<?=$col_class?> pt25">
			<?=$form->field($customer_data, 'email')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Email Address', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
		</div>
	</div>

	<div class="row mt">
		<div class="col-md-12 text-center">
			<?=Html::submitButton('See My Quotes', ['class' => 'btn btn-quote', 'id' => 'submit_btn']);?>
		</div>
	</div>
	<?php ActiveForm::end();?>
</div>
