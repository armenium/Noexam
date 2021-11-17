<?php

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$page_id = 'online-app-step-1';

/* @var $this yii\web\View */
$this->title = 'Questions';
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$this->registerCssFile('@web/v2/my-questions/css/online-app.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-questions/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
?>
<div class="row top-bar">
	<div class="head-block">
		<div class="iconbar">
			<div id="current_step_icon" class="icon-name active"></div>
			<div class="icon-heart"></div>
		</div>
		<div class="text">Proposed Insured Information</div>
		<a href="/faq/" class="q-mark" data-toggle="tooltip" data-placement="left" title="Please enter the information for the person who is applying for life insurance."></a>
	</div>
</div>
<div class="row content personal-info">
	<div class="form-block clearfix">
		<?php $form = ActiveForm::begin([
			'enableAjaxValidation' => true,
			'enableClientValidation'=>true,
			'validationUrl' => Url::toRoute('/validation'),
			'id' => 'term-form',
			'action' => '/post/',
			'options' => ['class' => 'personal-info-form'],
			//'fieldConfig' => ['options' => ['tag' => false,],],
		]);?>
		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'pi', 'id' => ''])->label(false);?>
		<div class="timeline-list">
			<?php if($isMobile):?>
				<div class="icon-name clearfix active">
					<div class="input first-name">
						<?=$form->field($customer_data, 'first_name')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'First Name', 'autocomplete' => 'on', 'autofocus ' => '']);?>
					</div>
					<div class="input last-name">
						<?=$form->field($customer_data,'middle_name')->textInput(['required' => 'required', 'class'=>false,'placeholder'=>'MN', 'autocomplete'=>'on', 'autofocus '=>'']);?>
					</div>
					<div class="input last-name">
						<?=$form->field($customer_data, 'last_name')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Last Name', 'autocomplete' => 'on', 'autofocus ' => '']);?>
					</div>
				</div>
				<div class="icon-address clearfix">
					<div class="input street-address">
						<?=$form->field($customer_data, 'street_address')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Street Address', 'autocomplete' => 'on', 'autofocus ' => '']);?>
					</div>
					<div class="input city">
						<?=$form->field($customer_data, 'city')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'City', 'autocomplete' => 'on', 'autofocus ' => '']);?>
					</div>
					<div class="input select state">
						<?=$form->field($customer_data,'state')->dropDownList($customer_data::$states, ['required' => 'required', 'class' => 'selectpicker state', 'id' => 'state', 'data-style' => 'btn-info', 'data-size' => '5', 'options' => ['AL' => ['selected' => 'selected']]]);?>
					</div>
					<div class="input zip">
						<?=$form->field($customer_data,'zip')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Zip Code', 'autocomplete' => 'on', 'autofocus' => '', 'enableAjaxValidation' => true]);?>
					</div>
				</div>
				<div class="icon-email clearfix">
					<div class="input phone-number">
						<?=$form->field($customer_data, 'phone_number')->input('tel', ['required' => 'required', 'class' => false, 'placeholder' => 'Phone Number', 'autocomplete' => 'on', 'autofocus ' => '', 'data-pattern' => "([0-9]{3}) [0-9]{3}-[0-9]{4}"]);?>
					</div>
					<div class="input email">
						<?=$form->field($customer_data, 'email')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Email Address', 'autocomplete' => 'on', 'autofocus ' => '']);?>
					</div>
				</div>
			<?php else:?>
				<div class="icon-name clearfix active">
					<div class="tcontent">
						<div class="input first-name">
							<?=$form->field($customer_data, 'first_name')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'First Name', 'autocomplete' => 'on', 'autofocus ' => '']);?>
						</div>
						<div class="input middle-name">
							<?=$form->field($customer_data,'middle_name')->textInput(['required' => 'required', 'class'=>false,'placeholder'=>'MN', 'autocomplete'=>'on', 'autofocus '=>''])->label('Middle Initial')?>
						</div>
						<div class="input last-name">
							<?=$form->field($customer_data, 'last_name')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Last Name', 'autocomplete' => 'on', 'autofocus ' => '']);?>
						</div>
					</div>
				</div>
				<div class="icon-address clearfix">
					<div class="tcontent">
						<div class="input street-address">
							<?=$form->field($customer_data, 'street_address')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Street Address', 'autocomplete' => 'on', 'autofocus ' => '']);?>
						</div>
					</div>
				</div>
				<div class="icon-address clearfix ">
					<div class="tcontent">
						<div class="input city">
							<?=$form->field($customer_data, 'city')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'City', 'autocomplete' => 'on', 'autofocus ' => '']);?>
						</div>
						<div class="input select state">
							<?=$form->field($customer_data,'state')->dropDownList($customer_data::$states, ['required' => 'required', 'class' => 'selectpicker state', 'id' => 'state', 'data-style' => 'btn-info', 'data-size' => '5', 'options' => ['AL' => ['selected' => 'selected']]]);?>
						</div>
						<div class="input zip">
							<?=$form->field($customer_data,'zip')->textInput(['required' => 'required', 'class' => false, 'placeholder' => 'Zip Code', 'autocomplete' => 'on', 'autofocus' => '', 'enableAjaxValidation' => true]);?>
							<?php //echo $form->error($customer_data,'zip', array(), false); ?>
						</div>
					</div>
				</div>
				<div class="icon-phone clearfix">
					<div class="tcontent">
						<div class="input phone-number">
							<?=$form->field($customer_data,'phone_number')->input('tel', ['required' => 'required', 'class'=>false,'placeholder'=>'Phone Number', 'autocomplete'=>'on', 'autofocus '=>'', 'data-pattern' => "([0-9]{3}) [0-9]{3}-[0-9]{4}"])?>
						</div>
					</div>
				</div>
				<div class="icon-email clearfix">
					<div class="tcontent">
						<div class="input email">
							<?=$form->field($customer_data,'email')->textInput(['required' => 'required', 'class'=>false,'placeholder'=>'Email Address', 'autocomplete'=>'on', 'autofocus '=>''])?>
						</div>
					</div>
				</div>
			<?php endif;?>
		</div>
		<?php ActiveForm::end();?>
	</div>
</div>
<div class="row bottom-bar">
	<div class="back-button">Back</div>
	<div class="bar-progress-wrapper">
		<div class="bar-progress">
			<div class="bar-line" data-progress="30"></div>
		</div>
	</div>
	<div class="next-button">Next</div>
</div>
