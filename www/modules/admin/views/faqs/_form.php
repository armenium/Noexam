<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Faqs */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript">
	function jsFunctionToBeCalled() {}
</script>
<div class="faqs-form">
	<?php $form = ActiveForm::begin();?>
	<div class="row">
		<div class="col-md-12">
			<?=$form->field($model, 'slug')->textInput(['maxlength' => 255]);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?=$form->field($model, 'question')->textInput(['maxlength' => 2048]);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<? //=$form->field($model, 'answer')->textarea(['rows' => 6]);?>
			<?=$form->field($model, 'answer')->widget(TinyMce::className(), [
				'options' => ['rows' => 6],
				'language' => 'en',
				'clientOptions' => [
					'plugins' => [
						"image",
						"advlist autolink lists link charmap print preview anchor",
						"searchreplace visualblocks code fullscreen",
						"insertdatetime media table contextmenu paste",
						//'file_picker_callback' => new JsExpression('jsFunctionToBeCalled'),
					],
					'image_advtab' => true,
					'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
				]
			]);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<?=$form->field($model, 'answer_tpl')->dropDownList(Yii::$app->controller->getTemplatesTree(), ['prompt' => '']);?>
		</div>
		<div class="col-md-6">
			<?=$form->field($model, 'category')->dropDownList(Yii::$app->controller->getCats(), ['prompt' => '']);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?=$form->field($model, 'links_area')->widget(TinyMce::className(), [
				'options' => ['rows' => 6],
				'language' => 'en',
				'clientOptions' => [
					'plugins' => [
						"image",
						"advlist autolink lists link charmap print preview anchor",
						"searchreplace visualblocks code fullscreen",
						"insertdatetime media table contextmenu paste",
						//'file_picker_callback' => new JsExpression('jsFunctionToBeCalled'),
					],
					'image_advtab' => true,
					'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
				]
			]);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?=$form->field($model, 'meta_title')->textInput(['maxlength' => 2048]);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?=$form->field($model, 'meta_desc')->textarea(['rows' => 2]);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9"></div>
		<div class="col-md-2">
			<?=$form->field($model, 'item_order')->textInput(['maxlength' => false]);?>
		</div>
		<div class="col-md-1">
			<label class="control-label">&nbsp;</label>
			<?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
		</div>
	</div>
	<?php ActiveForm::end(); ?>
</div>
