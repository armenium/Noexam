<?php


use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;


/* @var $this yii\web\View */

$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->title = 'Questions';
$isMobile = Yii::$app->params['devicedetect']['isMobile'];
//VarDumper::dump($isMobile);
//$dropdown_css_class = $isMobile ? '' : 'selectpicker';
?>
<div class="row top-bar">
	<div class="head-block">
		<div class="iconbar">
			<div id="current_step_icon" class="icon-name active"></div>
			<div class="icon-heart"></div>
		</div>
		<div class="text"><?=$customer_data->first_name.' '.$customer_data->middle_name.' '.$customer_data->last_name;?> with $<?=$customer_data->avg_amount;?>,000 coverage for a <?=$customer_data->term;?> Year Term</div>
		<a href="#" class="q-mark" data-toggle="tooltip" data-placement="left" title="Please enter the information for the person who is applying for life insurance."></a>
	</div>
</div>

<div class="row content personal-info">
	<div class="form-block clearfix">
		<?php $form = ActiveForm::begin([
			'enableAjaxValidation'   => true,
			'enableClientValidation' => false,
			'validationUrl'          => Url::toRoute('/validation'),
			'id'                     => 'term-form',
			'action'                 => '/post/',
			'options'                => ['class' => 'personal-info2-form'],
			//'fieldConfig' => ['options' => ['tag' => false]]
		]);?>
		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'pi2', 'id' => ''])->label(false);?>
		<div class="timeline-list">
			<?php if($isMobile):?>
				<div class="icon-address clearfix active">
					<div class="input select birth-state">
						<?=$form->field($customer_data, 'birth_state')->dropDownList(['N/A' => 'N/A']+$customer_data::$states, ['required' => 'required', 'class' => 'selectpicker', 'id' => '', 'data-style' => 'btn-info', 'data-size'  => '5', 'data-mobile' => (string)$isMobile, 'options' => ['AL' => ['selected' => 'selected']]]);?>
					</div>
				</div>
				<div class="icon-address clearfix active">
					<div class="input select birth-country">
						<?=$form->field($customer_data, 'birth_country')->dropDownList($customer_data::$countries, ['required' => 'required', 'class' => 'selectpicker', 'id' => '', 'data-style' => 'btn-info', 'data-size'  => '5', 'data-mobile' => (string)$isMobile, 'options' => ['United States of America' => ['selected' => 'selected']]]);?>
					</div>
				</div>
				<div class="icon-name clearfix">
					<div class="input occupation">
						<?=$form->field($customer_data, 'occupation')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Occupation', 'autocomplete' => 'on', 'autofocus ' => '']);?>
					</div>
				</div>
				<div class="icon-money clearfix">
					<div class="input household-income">
						<?=$form->field($customer_data, 'household_income')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Household Income', 'autocomplete' => 'on', 'autofocus ' => '']);?>
					</div>
				</div>
				<div class="icon-phone clearfix">
					<div class="input ssn">
						<?=$form->field($customer_data, 'ssn')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Social Security Number', 'autocomplete' => 'on', 'autofocus ' => '']);?>
					</div>
					<div class="input dls">
						<?=$form->field($customer_data, 'dln')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Drivers License Number', 'autocomplete' => 'on', 'autofocus ' => '']);?>
					</div>
					<div class="input select state">
						<?=$form->field($customer_data, 'dls')->dropDownList($customer_data::$states_short, ['required' => 'required', 'class' => 'selectpicker dls', 'id' => '', 'data-style' => 'btn-info', 'data-size' => '5', 'data-mobile' => (string)$isMobile, 'options' => ['AL' => ['selected' => 'selected']]]);?>
					</div>
				</div>
			<?php else:?>
				<div class="icon-address clearfix active">
					<div class="tcontent">
						<div class="input select birth-state">
							<?=$form->field($customer_data, 'birth_state')->dropDownList(['N/A' => 'N/A']+$customer_data::$states, ['required' => 'required', 'class' => 'selectpicker', 'id' => '', 'data-style' => 'btn-info', 'data-size'  => '5', 'data-mobile' => (string)$isMobile, 'options' => ['AL' => ['selected' => 'selected']]]);?>
						</div>
						<div class="input select birth-country">
							<?=$form->field($customer_data, 'birth_country')->dropDownList($customer_data::$countries, ['required' => 'required', 'class' => 'selectpicker', 'id' => '', 'data-style' => 'btn-info', 'data-size'  => '5', 'data-mobile' => (string)$isMobile, 'options' => ['United States of America' => ['selected' => 'selected']]]);?>
						</div>
					</div>
				</div>
				<div class="icon-name clearfix">
					<div class="tcontent">
						<div class="input occupation">
							<?=$form->field($customer_data, 'occupation')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Occupation', 'autocomplete' => 'on', 'autofocus ' => ''])?>
						</div>
						<div class="input household-income">
							<?=$form->field($customer_data, 'household_income')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Household Income', 'autocomplete' => 'on', 'autofocus ' => ''])?>
						</div>
					</div>
				</div>
				<div class="icon-phone clearfix">
					<div class="tcontent">
						<div class="input ssn">
							<?=$form->field($customer_data, 'ssn')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Social Security Number', 'autocomplete' => 'on', 'autofocus ' => ''])?>
						</div>
					</div>
				</div>
				<div class="icon-address clearfix">
					<div class="tcontent">
						<div class="input dls">
							<?=$form->field($customer_data, 'dln')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Drivers License Number', 'autocomplete' => 'on', 'autofocus ' => ''])?>
						</div>
						<div class="input select state">
							<?=$form->field($customer_data, 'dls')->dropDownList($customer_data::$states_short, ['required' => 'required', 'class' => 'selectpicker dls', 'id' => '', 'data-style' => 'btn-info', 'data-size' => '5', 'data-mobile' => (string)$isMobile, 'options' => ['AL' => ['selected' => 'selected']]]);?>
						</div>
					</div>
				</div>
			<?php endif;?>
		</div>
		<?php ActiveForm::end() ?>
	</div>
</div>

<div class="row bottom-bar">
	<div class="back-button">Back</div>
	<div class="bar-progress-wrapper">
		<div class="bar-progress">
			<div class="bar-line" data-progress="40"></div>
		</div>
	</div>
	<div class="next-button">Next</div>
</div>
