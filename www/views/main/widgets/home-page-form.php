<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
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
	$days[$i] = $i;
	if($i <= 12){
		$months[$i] = $i;
	}
}
$y = date('Y');
for($i = $y; $i >= $y - 100; $i--){
	$years[$i] = $i;
}

?>
<?php $form = ActiveForm::begin(['id' => 'term-form', 'action' => '/post/', 'options' => ['class' => 'term-form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
<section class="form-section">
	<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'term', 'id' => ''])->label(false);?>
	<?=$form->field($customer_data, 'birthday')->hiddenInput(['value' => '5/9/1981', 'id' => 'birthdate'])->label(false);?>
	<div class="form container">I would like
		<div class="input select cost">
			<?=$form->field($customer_data, 'avg_amount')->dropDownList($customer_data::$avg_amounts, ['class' => 'selectpicker avarage_amount', 'id' => 'avarage_amount', 'data-style' => 'btn-success', 'data-mobile' => (string)$isMobile, 'options' => ['250' => ['selected' => 'selected']]])->label(false);?>
		</div>
		of life insurance coverage. My birthday is
		<?php /*<div class="input text birthday">
				<div class="alert alert-danger error-input" >
					<strong>Admissible age is 18-65 years.</strong>
				</div>
				<?=$form->field($customer_data,'birthday')->textInput(['class'=>'birthdate', 'id'=>'birthdate', 'value'=>'05/09/1981'])->label(false)?>
            </div>*/?>
		<div class="select-group birthdate">
			<div class="alert alert-danger error-input" >
				<strong>Admissible age is 18-65 years.</strong>
			</div>
			<div class="input select bdy month">
				<?//=$form->field($customer_data, 'birthday[month]')->dropDownList($months, ['class' => 'selectpicker birth_month', 'id' => 'birth_month', 'data-style' => 'btn-info', 'data-size' => 12, 'data-mobile' => (string)$isMobile, 'options' => ['5' => ['selected' => 'selected']]])->label(false);?>
				<?=Html::dropDownList('', ['5'], $months, ['class' => 'selectpicker birth_month', 'id' => 'birth_month', 'data-style' => 'btn-info', 'data-size' => 12, 'data-mobile' => (string)$isMobile, 'options' => ['5' => ['selected' => 'selected']]]);?>
			</div>
			<div class="input select bdy day">
				<?//=$form->field($customer_data, 'birthday[day]')->dropDownList($days, ['class' => 'selectpicker birth_day', 'id' => 'birth_day', 'data-style' => 'btn-info', 'data-size' => 12, 'data-mobile' => (string)$isMobile, 'options' => ['9' => ['selected' => 'selected']]])->label(false);?>
				<?=Html::dropDownList('', ['9'], $days, ['class' => 'selectpicker birth_day', 'id' => 'birth_day', 'data-style' => 'btn-info', 'data-size' => 12, 'data-mobile' => (string)$isMobile, 'options' => ['9' => ['selected' => 'selected']]]);?>
			</div>
			<div class="input select bdy year">
				<?//=$form->field($customer_data, 'birthday[year]')->dropDownList($years, ['class' => 'selectpicker birth_year', 'id' => 'birth_year', 'data-style' => 'btn-info', 'data-size' => 12, 'data-mobile' => (string)$isMobile, 'options' => ['1981' => ['selected' => 'selected']]])->label(false);?>
				<?=Html::dropDownList('', ['1981'], $years, ['class' => 'selectpicker birth_year', 'id' => 'birth_year', 'data-style' => 'btn-info', 'data-size' => 12, 'data-mobile' => (string)$isMobile, 'options' => ['1981' => ['selected' => 'selected']]]);?>
			</div>
		</div>
		and I’m a
		<div class="select-group">
			<div class="input select h_foot">
				<?=$form->field($customer_data, 'h_foot')->dropDownList($customer_data::$foots, ['class' => 'selectpicker avarage_amount', 'id' => 'h_foot', 'data-style' => 'btn-info', 'data-mobile' => (string)$isMobile, 'options' => ['5' => ['selected' => 'selected']]])->label(false);?>
			</div>
			<div class="input select h_inch">
				<?=$form->field($customer_data, 'h_inch')->dropDownList($customer_data::$inchs, ['class' => 'selectpicker h_inch', 'id' => 'h_inch', 'data-style' => 'btn-info', 'data-mobile' => (string)$isMobile, 'options' => ['10' => ['selected' => 'selected']]])->label(false);?>
			</div>
		</div>
		<div class="input text weight">
			<div class="alert alert-danger error-input" >
				<strong>Your weight should be bewtween 84lb - 402lb.</strong>
			</div>
			<?=$form->field($customer_data,'weight')->textInput(['class'=>'weight', 'id'=>'weight', 'value'=>'180'])->label(false)?>
		</div>
		lb
		<div class="input select sex">
			<?=$form->field($customer_data, 'sex')->dropDownList(['m' => 'male', 'f' => 'female'], ['class' => 'selectpicker sex', 'id' => 'sex', 'data-style' => 'btn-info', 'data-mobile' => (string)$isMobile, 'options' => ['m' => ['selected' => 'selected']]])->label(false);?>
		</div>
		living in
		<div class="input select state">
			<?=$form->field($customer_data, 'state')->dropDownList($customer_data::$states_short, ['class' => 'selectpicker state', 'id' => 'state', 'data-style' => 'btn-info', 'data-mobile' => (string)$isMobile, 'options' => ['AL' => ['selected' => 'selected']]])->label(false);?>
		</div>
		that
		<div class="input select tobaco">
			<?=$form->field($customer_data, 'tobaco')->dropDownList(['0' => 'doesn’t use', '1' => 'does use'], ['class' => 'selectpicker tobaco', 'id' => 'tobaco', 'data-style' => 'btn-info', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
		</div>
		tobacco.
	</div>
</section>

<section class="plans-section">
	<div class="container plans">
		<div class="col-md-3 wrap hidden">
			<div class="plan">
				<div class="offer">best value</div>
				<div class="term">15 Years</div>
				<div class="price">$19.02/month</div>
				<div class="button">
					<button type="button" class="btn btn-default btn-lg btn-apply">Apply Now</button>
				</div>
			</div>
		</div>
		<div class="col-md-3 wrap hidden">
			<div class="plan">
				<div class="offer">great value</div>
				<div class="term">20 Years</div>
				<div class="price">$19.02/month</div>
				<div class="button">
					<button type="button" class="btn btn-default btn-lg btn-apply">Apply Now</button>
				</div>
			</div>
		</div>
		<div class="col-md-3 wrap hidden">
			<div class="plan">
				<div class="offer">most popular</div>
				<div class="term">25 Years</div>
				<div class="price">$19.02/month</div>
				<div class="button">
					<button type="button" class="btn btn-default btn-lg btn-apply">Apply Now</button>
				</div>
			</div>
		</div>
		<div class="col-md-3 wrap hidden">
			<div class="plan">
				<div class="offer">long term</div>
				<div class="term">30 Years</div>
				<div class="price">$19.02/month</div>
				<div class="button">
					<button type="button" class="btn btn-default btn-lg btn-apply">Apply Now</button>
				</div>
			</div>
		</div>
	</div>
	<div class="testimonial">
		<!--	<span class="logo"></span>
		<span class="text">“Buying life insurane online from noexam.com was as easy as 1-2-3!”</span>
		<span class="author">- Brittany Anderson</span>-->
	</div>
</section>
<?php ActiveForm::end() ?>
