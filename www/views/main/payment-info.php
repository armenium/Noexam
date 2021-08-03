<?php

use yii\helpers\CHtml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Policy Payment Information';
?>
<div class="row top-bar">
	<div class="head-block">
		<div class="iconbar">
			<div id="current_step_icon" class="icon-name active"></div>
			<div class="icon-heart"></div>
		</div>
		<div class="text">Policy Payment Information:</div>
		<a href="/faq/" class="q-mark" data-toggle="tooltip" data-placement="left" title="Please enter the information for the person who is applying for life insurance."></a>
	</div>
</div>

<div class="row content payment-info">
	<div class="form-block clearfix">

		<!--<div class="left-bar"><div class="vertical-line"><div class="inner-line"></div></div></div>-->

		<?php $form = ActiveForm::begin([
			'enableAjaxValidation' => false,
			'enableClientValidation'=>false,
			'validationUrl' => Url::toRoute('/validation/'),
			'id' => 'payment-form',
			'action' => '/post/',
			'options' => ['class' => 'payment-info-form trans_all'],
			//'fieldConfig' => ['options' => ['tag' => false,],],
		]);?>
		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'payment', 'id' => ''])->label(false);?>
		<!--<form action="" class="trans_all" method="post">-->
			<div class="payment-block clearfix">

				<div class="inner clearfix">
					<div class="payment-method clearfix">
						<div class="title">Payment Method</div>
						<div class="input checkbox">
							<div class="input radio">

								<?=Html::radio('CustomerData[payment][method]', true, ['id' => 'payment-method-eft', 'value' => 'eft']); ?>
								<label for="payment-method-eft">EFT Checking Account</label>
							</div>
							<div class="input radio hidden">
								<?=Html::radio('CustomerData[payment][method]', false, ['id' => 'payment-method-card', 'value' => 'card']); ?>
								<label for="payment-method-card">Credit Card</label>
							</div>
						</div>
					</div>

					<div class="payment-frequency clearfix">
						<div class="title">Payment Frequency</div>
						<div class="input checkbox">
							<div class="input radio">
								<?=Html::radio('CustomerData[payment][frequency]', true, ['id' => 'monthly', 'value' => 'monthly']); ?>
								<label for="monthly">Monthly ($<?=$customer_data->monthly_premium;?>)</label>
							</div>
							<div class="input radio">
								<?=Html::radio('CustomerData[payment][frequency]', false, ['id' => 'annual', 'value' => 'annual']); ?>
								<label for="annual">Annual ($<?=$customer_data->premium_amount;?>)</label>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row payment-fields">
				<div class="col-sm-7">
					<div class="row-input clearfix hovered">
						<div class="sign">
							<div class="picutre bank-name"></div>
						</div>
						<div class="onhowered">
							<div class="input bank-name">
								<?=$form->field($customer_data, "payment[bank-name]")->textInput(['class' => false, 'placeholder' => 'Bank Name', 'autocomplete' => 'on', 'autofocus ' => ''])->label('Bank Name');?>
							</div>
						</div>
					</div>

					<div class="row-input clearfix hovered">
						   <div class="sign">
						  <div class="picutre bank-account"></div>
						</div>
						<div class="onhowered">
							<div class="input bank-account-number">
								<?=$form->field($customer_data, "payment[bank-account-number]")->textInput(['class' => false, 'placeholder' => 'Bank Account Number', 'autocomplete' => 'on', 'autofocus ' => ''])->label('Bank Account Number');?>
							</div>
						</div>
					</div>

					<div class="row-input clearfix hovered">
						    <div class="sign">
						  <div class="picutre bank-account"></div>
						</div>
						<div class="onhowered">
							<div class="input bank-account">
								<?=$form->field($customer_data, "payment[routing-number]")->textInput(['class' => false, 'placeholder' => 'Routing Number', 'autocomplete' => 'on', 'autofocus ' => ''])->label('Routing Number');?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="desc">
						<b>Note:</b> The submission of this form does not bind your life insurance policy. Policy approvals occur in 24-48 hours of the initial application submission to the insurance company. Upon the time of your policy approval you will be notifiied by e-mail. If approved please expect 3-5 buisness days to recieve a hard copy of your policy in the mail.
					</div>
					<div class="info-img">
						<img src="/img/payment-page-img.png">
					</div>
				</div>
			</div>
		<?php ActiveForm::end();?>
		<!--</form>-->
	</div>
</div>

<div class="row bottom-bar">
	<div class="back-button">Back</div>
	<div class="bar-progress-wrapper">
		<div class="bar-progress">
			<div class="bar-line" data-progress="90"></div>
		</div>
	</div>
	<div class="next-button">Next</div>
</div>

