<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 29.09.2018
 * Time: 15:32
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;

$this->title = 'Apply Now2';
$isMobile = Yii::$app->params['devicedetect']['isMobile'];
$days = $months = $years = $exercise = [];
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

for($i=0; $i <= 40; $i++){
	$exercise[$i] = $i;
}
$c = count($prices);

$wigths = [];
for($i = 80; $i <= 400; $i++){
	$wigths[$i] = $i.' lbs';
}
//VarDumper::dump($prices);
?>

<div class="page-content page-wrapper">

	<section class="container first text-center <?php if(!$display_form):?>hidden<?php endif;?>">
		<h1 class="title">NoExam life insurance, fact and affordable coverage.</h1>
		<div class="desc hidden-xs">Compare Quotes To Get The Right Policy At The Right Price</div>
		<div class="trust-logos visible-xs"><img src="/img/trust_logos.jpg"></div>
	</section>

	<section class="container first text-center <?php if($display_form):?>hidden<?php endif;?>">
		<h1 class="title">Quote Results<span class="badge"><?=$c;?></span></h1>
		<div class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
		<div class="trust-logos visible-xs mt20"><img src="/img/trust_logos.jpg"></div>
	</section>

	<section class="container second w1274 <?php if(!$display_form):?>hidden<?php endif;?>">
		<div class="row intro">
			<div class="col-sm-6 hidden-xs bg-image">
				<div class="slick-left">
					<div class="item">
						<div class="title">Lengthy Physicals</div>
						<p>Lorem ipsum dolor sit amet, consectetur et adipiscing elit, sed do eiusmod tempor allto incididunt ut labore et dolore.</p>
					</div>
					<div class="item">
						<div class="title">No Pressure</div>
						<p>Lorem dolor ipsum sit amet, consectetur et adipiscing elit, sed do eiusmod tempor allto incididunt ut labore et dolore.</p>
					</div>
					<div class="item">
						<div class="title">Instant Delivery</div>
						<p>Lorem sit ipsum dolor amet, consectetur et adipiscing elit, sed do eiusmod tempor allto incididunt ut labore et dolore.</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12 col-sm-offset-6">
				<div class="applynow-form-section trans_all">
					<?php $form = ActiveForm::begin(['id' => 'applynow-form', 'action' => '/post2/', 'options' => ['class' => 'applynow-form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
					<?=$form->field($model_data, 'form_name')->hiddenInput(['value' => 'applynow2', 'id' => ''])->label(false);?>
					<?=$form->field($model_data, 'redirect')->hiddenInput(['value' => 'apply-now2/quote-result/', 'id' => ''])->label(false);?>
					<?=$form->field($model_data, 'universal_leadid')->hiddenInput(['value' => '', 'id' => 'leadid_token'])->label(false);?>

					<div class="slide-form">
						<div class="item">
							<div class="row">
								<div class="col-md-12">
									<label>Policy Amount</label>
								</div>
								<div class="col-sm-12 mb10">
									<?=$form->field($model_data, 'coverage_amount')->dropDownList($model_data::$amounts, ['class' => 'selectpicker avarage_amount form-control', 'id' => 'avarage_amount', 'data-size' => 12, 'data-style' => 'btn-info', 'data-mobile' => (string)$isMobile, 'options' => ['250' => ['selected' => 'selected']]])->label(false);?>
								</div>
								<div class="col-md-12">
									<label>Length of term</label>
								</div>
								<div class="col-sm-12 mb20">
									<?=$form->field($model_data, 'coverage_type')->dropDownList($model_data::$terms, ['class' => 'selectpicker coverage_type form-control', 'id' => 'coverage_type', 'data-size' => 5, 'data-style' => 'btn-info', 'data-mobile' => (string)$isMobile, 'options' => ['10 Years' => ['selected' => 'selected']]])->label(false);?>
								</div>
								<div class="col-md-12">
									<label>Do you have any of the following illnesses?</label>
								</div>
								<div class="col-sm-12">
									<div class="dlist cols-view">
										<div>•	AIDS/HIV</div>
										<div>•	Diabetes Type 1</div>
										<div>•	Diabetes Type 2</div>
										<div>•	Liver Disease</div>
										<div>•	Kidney Disease</div>
										<div>•	Alzheimers Disease</div>
										<div>•	Lung Diseasev</div>
										<div>•	Drug Abuse</div>
										<div>•	Mental Illness</div>
										<div>•	Cancer</div>
										<div>•	Heart Disease</div>
										<div>•	Stroke</div>
										<div>•	Depression</div>
									</div>
									<?=$form->field($model_data, 'illnesses')->radioList(
											['yes' => 'Yes', 'no' => 'No'],
											[
												'item' => function($index, $label, $name, $checked, $value) {
													$checked = $checked ? 'checked="checked"' : '';
				                                    $return = '<label>';
				                                    $return .= '<input type="radio" name="'.$name.'" value="'.$value.'" tabindex="3" '.$checked.'>';
				                                    $return .= '<span>' . ucwords($label) . '</span>';
				                                    $return .= '</label>';
				                                    return $return;
	                                            },
												'class' => 'form-control-radio',
												'id' => 'illnesses',
											])->label(false);?>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row mb20">
								<div class="col-md-12">
									<label>About You</label>
								</div>
								<div class="col-sm-12 col-md-4">
									<?=$form->field($model_data, 'gender')->dropDownList(['m' => 'Male', 'f' => 'Female'], ['required' => 'required', 'class' => 'selectpicker sex form-control', 'id' => 'gender', 'data-style' => 'btn-success', 'data-title' => 'Gender', 'data-mobile' => (string)$isMobile, 'options' => ['f' => ['selected' => 'selected']]])->label(false);?>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4">
									<?=$form->field($model_data, 'height')->dropDownList($model_data::$heights, ['required' => 'required', 'class' => 'selectpicker height form-control', 'id' => 'height', 'data-style' => 'btn-success', 'data-size' => 6, 'data-title' => 'Height', 'data-mobile' => (string)$isMobile, 'options' => ['5|10' => ['selected' => 'selected']]])->label(false);?>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4">
									<?=$form->field($model_data, 'weight')->dropDownList($wigths, ['required' => 'required', 'class' => 'selectpicker weight form-control', 'id' => 'weight', 'data-style' => 'btn-success', 'data-size' => 6, 'data-title' => 'Weight', 'data-mobile' => (string)$isMobile, 'options' => ['170' => ['selected' => 'selected']]])->label(false);?>
								</div>
							</div>
							<div class="row mb40 birthdate">
								<div class="col-md-12">
									<label>Date of Birth</label>
								</div>
								<div class="col-sm-12 col-md-5">
									<?=$form->field($model_data, 'birth_date[month]')->dropDownList($model_data::$months_full, ['required' => 'required', 'class' => 'selectpicker birth_month form-control', 'id' => 'birth_month', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Month', 'data-mobile' => (string)$isMobile, 'options' => ['5' => ['selected' => 'selected']]])->label(false);?>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-3">
									<?=$form->field($model_data, 'birth_date[day]')->dropDownList($days, ['required' => 'required', 'class' => 'selectpicker birth_day form-control', 'id' => 'birth_day', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Day', 'data-mobile' => (string)$isMobile, 'options' => ['19' => ['selected' => 'selected']]])->label(false);?>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4">
									<?=$form->field($model_data, 'birth_date[year]')->dropDownList($years, ['required' => 'required', 'class' => 'selectpicker birth_year form-control', 'id' => 'birth_year', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Year', 'data-mobile' => (string)$isMobile, 'options' => ['1970' => ['selected' => 'selected']]])->label(false);?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-8">
									<div class="desc-gray">
										How many hours do you typically exercise in a week?
									</div>
								</div>
								<div class="col-sm-12 col-md-4">
									<?=$form->field($model_data, 'weekly_exercise_hours')->dropDownList($exercise, ['required' => 'required', 'class' => 'selectpicker weekly_exercise_hours form-control', 'id' => 'weekly_exercise_hours', 'data-style' => 'btn-success', 'data-size' => 6, 'data-mobile' => (string)$isMobile, 'options' => ['14' => ['selected' => 'selected']]])->label(false);?>
								</div>
							</div>
						</div>
						<div class="item contact-info">
							<div class="row mb20">
								<div class="col-md-12">
									<label>Your Contact Info</label>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-5">
									<?=$form->field($model_data, 'first_name')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'First Name', 'autocomplete' => 'off'])->label(false);?>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-2">
									<?=$form->field($model_data, 'middle_name')->textInput(['class' => false, 'placeholder' => 'MI', 'autocomplete' => 'off'])->label(false);?>
								</div>
								<div class="col-sm-12 col-md-5">
									<?=$form->field($model_data, 'last_name')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Last Name', 'autocomplete' => 'off'])->label(false);?>
								</div>
							</div>
							<div class="row mb20">
								<div class="col-sm-12 col-md-12">
									<?=$form->field($model_data, 'address')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Address', 'autocomplete' => 'off'])->label(false);?>
								</div>
								<div class="col-sm-12 col-md-6">
									<?=$form->field($model_data, 'city')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'City', 'autocomplete' => 'off'])->label(false);?>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-3">
									<?=$form->field($model_data,'state')->dropDownList($model_data::$states_short, ['required' => 'required', 'class' => 'selectpicker form-control', 'id' => 'state', 'data-style' => 'btn-info', 'data-size' => 6, 'data-mobile' => (string)$isMobile, 'options' => ['AL' => ['selected' => 'selected']]])->label(false);?>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-3">
									<?=$form->field($model_data,'zip')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Zip Code', 'autocomplete' => 'off', 'enableAjaxValidation' => false])->label(false);?>
								</div>
							</div>
							<div class="row mb20">
								<div class="col-sm-12">
									<?=$form->field($model_data, 'phone')->input('tel', ['required' => 'required', 'class' => false, 'placeholder' => 'Phone Number', 'autocomplete' => 'off', 'data-pattern' => "([0-9]{3}) [0-9]{3}-[0-9]{4}"])->label(false);?>
								</div>
							</div>
							<div class="row mb20">
								<div class="col-sm-12">
									<?=$form->field($model_data, 'email')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Email Address', 'autocomplete' => 'off'])->label(false);?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="desc-gray-small">
										By entering a phone number and submitting this form, I am providing a QuoteLab LLC and one or more AIG, AAA, Accuquote, Mutual of Omaha, New York Life, TermProvider or these other organizations* or their agents my signature expressly consenting to receive telemarketing calls or texts (including by prerecorded messages or using an autodialer or automated means at the mice type.
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row mt">
						<div class="col-md-12 text-center-xs">
							<?=Html::buttonInput('Continue', ['class' => 'btn continue-button']);?>
							<?=Html::submitButton('Submit', ['class' => 'btn btn-success submit_btn', 'id' => 'submit_btn']);?>
							<?=Html::buttonInput('Back', ['class' => 'btn prev-button']);?>
						</div>
					</div>

					<?php ActiveForm::end() ?>
				</div>
			</div>
		</div>
	</section>

	<section class="container second w1034 quote-results <?php if($display_form):?>hidden<?php endif;?>">
		<?php if(count($prices)):?>
			<?php $i=0; foreach($prices as $term => $data): $i++;?>
			<div class="row">
				<div class="col-md-12">
					<div class="plan">
						<div class="logo-block text-center">
							<div class="met-logo"><img src="/img/metlife-logo.png"></div>
							<div><img src="/img/stars_4_8.gif"> (149)</div>
							<div class="t hidden-sm hidden-md hidden-lg"><?=$term;?> Year Plan Term Length</div>
						</div>
						<div class="price">
							<div class="right-border">
								<div class="t">$<?=round($data['month'], 2);?></div>
								<div class="d">Monthly Payment</div>
							</div>
						</div>
						<div class="offer">
							<div class="right-border">
								<div class="t">A++ <small>(Superior)</small></div>
								<div class="d">Financial Rating</div>
							</div>
						</div>
						<div class="term hidden-xs">
							<div class="t"><?=$term;?> Year Plan</div>
							<div class="d">Term Length</div>
						</div>
						<div class="action">
							<button id="applynow_<?=$i;?>" type="button" class="btn btn-info-o btn-lg btn-apply">Apply Now</button>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach;?>
		<?php else:?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger">
					<strong>Sorry, but we could not find the appropriate plan for you.</strong>
				</div>
			</div>
		</div>
		<?php endif;?>
		<pre class="hidden"><?php VarDumper::dump($prices);?></pre>
	</section>

	<section class="container third <?php if(!$display_form):?>hidden<?php endif;?>">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="testimonial">
					<span class="logo"></span>
					<span class="text">“Buying life insurane online from noexam.com was as easy as 1-2-3!”</span>
					<span class="author">- Brittany Anderson</span>
				</div>
			</div>
		</div>
	</section>

	<section class="container-fluid fourth">
		<div class="container w1130">
			<div class="row">
				<div class="col-sm-4 pgrid">
					<div class="tile">
						<div class="gray-title">
							Insurance Provider
							<img src="/img/ab_logo.gif">
						</div>
						<div class="title">North American Life Insurance Company</div>
						<div class="description">A+ (Superior) A.M. Best Rated <a href="#">Why this matters</a><br>in Business since 1966</div>
					</div>
				</div>

				<div class="col-sm-4 pgrid">
					<div class="tile">
						<div class="gray-title">
							Your Coverage
							<img src="/img/sa_logo.gif">
						</div>
						<div class="title">$250,000 term life insurance</div>
						<div class="description">For a 32 year old male. We offer 15, 20 and 30 year options.</div>
					</div>
				</div>

				<div class="col-sm-4 pgrid">
					<div class="tile">
						<div class="gray-title">
							Our Track Record
							<img src="/img/ab_logo.gif">
						</div>
						<div class="title">NoExam.com</div>
						<div class="description">BBB A+ Rated<br>4.8/5 Reviews (598 Customers)<br><img src="/img/stars_4_8.gif"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container fifth w854">
		<div class="row">
			<div class="col-md-12">
				<h2>NoExam's.com Security Promise</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tincidunt ante lorem, ut ornare augue ultrices vitae. Nulla nec aliquam orci, vitae molestie lorem. Nulla non enim id erat dignissim consequat eu nec eros. Donec molestie tincidunt urna nec malesuada. Nulla blandit eget risus non semper. In at suscipit diam, ac finibus erat.</p>
				<p>Integer iaculis mollis ipsum. Fusce eleifend metus quam, eget posuere velit molestie eget. In et enim ligula. Donec venenatis purus enim, quis ornare sapien dapibus sed. Nam ornare gravida tincidunt. Vivamus viverra nisi odio, vel dictum velit bibendum malesuada. Vivamus ullamcorper dictum maximus. Aenean facilisis rutrum tellus sit amet tincidunt.</p>
				<p>Maecenas gravida fringilla eros, in sagittis dolor varius in. Suspendisse lacinia vel mauris quis scelerisque. Praesent venenatis tincidunt augue quis pharetra. Aenean quis erat eu nulla maximus dictum et sit amet enim. Pellentesque pellentesque rutrum arcu, sed sodales purus scelerisque sed. Nunc bibendum pulvinar erat, ac fermentum felis posuere id.</p>
			</div>
		</div>
	</section>
</div>
<script id="LeadiDscript" type="text/javascript">
	// <!--
	(function() {
		var s = document.createElement('script');
		s.id = 'LeadiDscript_campaign';
		s.type = 'text/javascript';
		s.async = true;
		s.src = '//create.lidstatic.com/campaign/cea2848f-4655-4551-aefc-6b7db4baba43.js?snippet_version=2';
		var LeadiDscript = document.getElementById('LeadiDscript');
		LeadiDscript.parentNode.insertBefore(s, LeadiDscript);
	})();
	// -->
</script>
<noscript><img src='//create.leadid.com/noscript.gif?lac=88117035-dc97-59a7-5cb6-a400518c774f&lck=cea2848f-4655-4551-aefc-6b7db4baba43&snippet_version=2' /></noscript>