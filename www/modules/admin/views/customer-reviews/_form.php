<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\web\JsExpression;
use kartik\datetime\DateTimePicker;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\CustomerReviews */
/* @var $form yii\widgets\ActiveForm */

$pluginOptions = [
	'browseOnZoneClick' => true,
	'showCaption' => false,
	'showRemove' => false,
	'showUpload' => false,
	'showBrowse' => false,
	'showCancel' => false,
];

?>
<div class="faqs-form">
	<?php $form = ActiveForm::begin();?>
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<?=$form->field($model, 'review_title')->textInput(['maxlength' => 255]);?>
				</div>
				<div class="col-md-12">
					<?=$form->field($model, 'review_content')->textarea(['rows' => 3]);?>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<?=$form->field($model, 'review_date_alt')->textInput(['maxlength' => false])->widget(DatePicker::classname(), [
						'options' => ['placeholder' => 'Set post date'],
						#'convertFormat' => true,
						'type' => DatePicker::TYPE_COMPONENT_APPEND,
						'layout' => '{input}{picker}',
						'pickerIcon' => '<i class="bi bi-calendar3"></i>',
						#'removeIcon' => '<i class="bi bi-calendar-x"></i>',
						#'size' => 'md',
						'pluginOptions' => [
							'format' => 'MM d, yyyy',
							'startDate' => 'January 1, 2018',
							'todayHighlight' => true,
							'autoclose' => true,
							'todayBtn' => true,
						]
					]);?>
				</div>
				<div class="col-md-12">
					<?=$form->field($model, 'review_stars')->input('number', ['maxlength' => 1, 'min' => 0, 'max' => 5])->label('Stars');?>
				</div>
				<div class="col-md-12">
					<?=$form->field($model, 'customer_name')->textInput(['maxlength' => 50]);?>
				</div>
				<div class="col-md-12">
					<?=$form->field($model, 'preview')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*', 'multiple' => false], 'pluginOptions' => $pluginOptions])->label('Customer Avatar');?>
					<?php if(!empty($model->customer_avatar)):?>
						<ul class="gallery-images">
							<li>
								<a role="button" class="fileinput-remove"
								   data-trigger="js_action_click"
								   data-action="remove_image"
								   data-controller="customer-reviews"
								   data-id="<?=$model->id;?>"
								   data-field="customer_avatar"
								   data-file="<?=$model->customer_avatar;?>"
								   aria-label="Remove"><i class="bi bi-x"></i></a>
								<?=Html::img($model->getAvatar('150'));?>
							</li>
						</ul>
					<?php endif;?>
				</div>
				<div class="col-md-12 text-right mt-4">
					<?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary').' d-block w-100'])?>
				</div>
			</div>
		</div>
	</div>
	<?php ActiveForm::end(); ?>
</div>
