<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->title = 'Beneficiary Information';
?>
<div class="row top-bar">
	<div class="head-block">
		<div class="iconbar">
			<div id="current_step_icon" class="icon-name active"></div>
			<div class="icon-heart"></div>
		</div>
		<div class="text">Beneficiary Information</div>
		<a href="/faq/" class="q-mark" data-toggle="tooltip" data-placement="left" title="Please enter the information for the person who is applying for life insurance."></a>
	</div>
</div>

<div class="row content beneficiary">
	<div class="scroll-bar">
		<div class="form-block clearfix">
			<?php $form = ActiveForm::begin([
				'enableAjaxValidation'   => false,
				'enableClientValidation' => false,
				'validationUrl'          => Url::toRoute('/validation/'),
				'id'                     => 'beneficiary',
				'action'                 => '/post/',
				'options'                => ['class' => 'beneficiary-form'],
				//'fieldConfig' => ['options' => ['tag' => false]]
			]);?>
				<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'benef', 'id' => ''])->label(false);?>
				<div class="benefline">
					<div id="benef_fields">
						<?=$this->render('_beneficiary', ["bf_id" => $bf_id, 'customer_data' => $customer_data, 'form' => $form]);?>
					</div>
					<div class="add-beneficiary clearfix">
						<div class="picture"></div>
						<div class="text">Add Beneficiary</div>
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
			<div class="bar-line" data-progress="80"></div>
		</div>
	</div>
	<div class="next-button">Next</div>
</div>
