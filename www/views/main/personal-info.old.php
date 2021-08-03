<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Questions';
?>
<div class="row content personal-info">
	<div class="scroll-bar">
		<div class="head-block">
			<div class="text">Proposed Insured Information</div>
			<div class="q-mark"></div>
		</div>
		<div class="form-block clearfix">


			<div class="left-bar">
				<div class="vertical-line">
					<div class="inner-line"></div>
				</div>
			</div>

			<?php $form = ActiveForm::begin([
				'enableAjaxValidation' => true,
				'enableClientValidation'=>true,
				'validationUrl' => Url::toRoute('/validation'),
				'id' => 'term-form',
				'action' => 'post',
				'options' => ['class' => 'personal-info-form'],
				//'fieldConfig' => ['options' => ['tag' => false,],],
			]);?>
				<?=$form->field($customer_data,'form_name')->hiddenInput(['value'=>'pi','id'=>''])->label(false);?>

				<div class="row-input clearfix active">
					<div class="sign"><div class="picutre name"></div></div>
					<div class="input first-name">
						<?=$form->field($customer_data,'first_name')->textInput(['class'=>false,'placeholder'=>'First Name', 'autocomplete'=>'off', 'autofocus '=>''])?>
					</div>
					<div class="input middle-name">
						<?=$form->field($customer_data,'middle_name')->textInput(['class'=>false,'placeholder'=>'MN', 'autocomplete'=>'off', 'autofocus '=>''])->label('Middle Initial')?>
					</div>
					<div class="input last-name">
						<?=$form->field($customer_data,'last_name')->textInput(['class'=>false,'placeholder'=>'Last Name', 'autocomplete'=>'off', 'autofocus '=>''])?>
					</div>
				</div>

				<div class="row-input clearfix">
					<div class="sign"><div class="picutre street-address"></div></div>
					<div class="input street-address">
						<?=$form->field($customer_data,'street_address')->textInput(['class'=>false,'placeholder'=>'Street Address', 'autocomplete'=>'off', 'autofocus '=>''])?>
					</div>
				</div>

				<div class="row-input clearfix ">
					<div class="sign"><div class="picutre street-address"></div></div>
					<div class="input city">
						<?=$form->field($customer_data,'city')->textInput(['class'=>false,'placeholder'=>'City', 'autocomplete'=>'off', 'autofocus '=>''])?>
					</div>
					<div class="input select state">
						<?=$form->field($customer_data,'state')->dropDownList($customer_data::$states, ['class' => 'selectpicker state', 'id' => 'state', 'data-style' => 'btn-info', 'data-size' => '5', 'options' => ['AL' => ['selected' => 'selected']]]);?>
					</div>
					<div class="input zip">
						<?=$form->field($customer_data,'zip')->textInput(['class'=>false,'placeholder'=>'Zip Code', 'autocomplete'=>'off', 'autofocus '=>'', 'enableAjaxValidation' => true])?>
						<?php //echo $form->error($customer_data,'zip', array(), false); ?>
					</div>
				</div>

				<div class="row-input clearfix">
					<div class="sign"><div class="picutre phone-number"></div></div>
					<div class="input phone-number">
						<?=$form->field($customer_data,'phone_number')->textInput(['class'=>false,'placeholder'=>'Phone Number', 'autocomplete'=>'off', 'autofocus '=>''])?>
					</div>
				</div>

				<div class="row-input clearfix">
					<div class="sign"><div class="picutre email"></div></div>
					<div class="input email">
						<?=$form->field($customer_data,'email')->textInput(['class'=>false,'placeholder'=>'Email Address', 'autocomplete'=>'off', 'autofocus '=>''])?>
					</div>
				</div>

			<?php ActiveForm::end();?>
		</div>
	</div>
</div>
<div class="row bottom-bar">
	<div class="back-button">Back</div>
	<div class="bar-progress-wrapper">
		<div class="bar-progress">
			<div class="bar-line"></div>
		</div>
	</div>
	<div class="next-button">Next</div>
</div>

