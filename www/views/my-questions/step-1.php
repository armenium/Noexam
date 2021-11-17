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
		<form class="online-app-step-1__form">
			
			<div class="online-app-step-2__form-box">
				<h1 class="online-app-step-1__title heading-5">Proposed Insured Information</h1>
				<h3 class="online-app-step-1__subtitle main-title">Name</h3>
				
				<div class="online-app-step-1__row">
					<label class="online-app-step-1__label online-app-step-1__label--first-name online-app-main-label">
						<span class="tags">First Name</span>
						<input type="text" class="online-app-step-1__input online-app-main-input" value="Magda">
					</label>
					<label class="online-app-step-1__label online-app-main-label online-app-step-1__input--initial-label">
						<span class="tags">Initial</span>
						<input type="text" class="online-app-step-1__input online-app-step-1__input--initial online-app-main-input" value="A">
					</label>
					<label class="online-app-step-1__label online-app-main-label">
						<span class="tags">Last Name</span>
						<input type="text" class="online-app-step-1__input online-app-main-input" value="Bierman">
					</label>
				</div>
				
				<h3 class="online-app-step-1__subtitle main-title">Address</h3>
				
				<div class="online-app-step-1__row">
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-main-label">
						<span class="tags">Street Address</span>
						<input type="text" class="online-app-step-1__input online-app-main-input" placeholder="Enter your street address">
					</label>
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-main-label">
						<span class="tags">City</span>
						<input type="text" class="online-app-step-1__input online-app-main-input" placeholder="Enter your city">
					</label>
				</div>
				
				<div class="online-app-step-1__row online-app-step-1__row--direction-row">
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-main-label">
						<span class="tags">State</span>
						<select class="online-app-step-1__select online-app-step-1__label--state js-selectpicker">
							<option value="Select state" disabled selected>Select state</option>
							<option value="12">12</option>
							<option value="13">13</option>
						</select>
					</label>
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-step-1__label--zip-code online-app-main-label">
						<span class="tags">Zip Code</span>
						<input type="text" class="online-app-step-1__input online-app-main-input" placeholder="Enter your zip code">
					</label>
				</div>
				
				<h3 class="online-app-step-1__subtitle main-title">Contact Details</h3>
				<div class="online-app-step-1__row">
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-main-label">
						<span class="tags">Phone Number</span>
						<input type="text" class="online-app-step-1__input online-app-main-input" placeholder="Enter your phone number">
					</label>
					<label class="online-app-step-1__label online-app-step-1__label--full-width online-app-main-label">
						<span class="tags">Email</span>
						<input type="text" class="online-app-step-1__input online-app-main-input online-app-main-input--invalid" value="mag">
					</label>
				</div>
			</div>
		
		</form>
		
		<div class="online-app-step-1__btns">
			<button type="submit" class="online-app-step-1-btn main-btn button-big">Back</button>
			<button type="submit" class="online-app-step-1-btn main-btn button-big">next</button>
		</div>
	
	</div>
</div>

<img class="bg-section__img1" src="/v2/common/images/online-app/online-app-bg-1.png" alt="">
<img class="bg-section__img2" src="/v2/common/images/online-app/online-app-bg-2.png" alt="">
<img class="bg-section__img3" src="/v2/common/images/online-app/online-app-bg-3.png" alt="">

<div class="row content personal-info">
	<div class="form-block clearfix">
		<?php $form = ActiveForm::begin(['enableAjaxValidation' => true, 'enableClientValidation'=>true, 'validationUrl' => Url::toRoute('/validation'), 'id' => 'term-form', 'action' => '/post/', 'options' => ['class' => 'personal-info-form']]);?>
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
