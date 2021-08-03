<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResourcesCompare */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resources-compare-form">

	<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-md-6">
			<?=$form->field($model, 'company1_id')->dropDownList(Yii::$app->controller->getCompanies(), ['prompt' => '']);?>
		</div>
		<div class="col-md-6">
			<?=$form->field($model, 'company2_id')->dropDownList(Yii::$app->controller->getCompanies(), ['prompt' => '']);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?=$form->field($model, 'title')->textInput(['maxlength' => true]);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?=$form->field($model, 'content')->textarea(['rows' => 6]);?>
			<small style="margin-top: -15px; display: block;"><em>Use "Enter" to form paragraphs when displayed on the page.</em></small>
		</div>
	</div>
	<div class="row mt30">
		<div class="col-md-2 text-right">
			<?=$form->field($model, 'no_index')->checkbox();?>
		</div>
		<div class="col-md-2">
			<?=$form->field($model, 'no_follow')->checkbox();?>
		</div>
		<div class="col-md-8 text-right">
			<div class="form-group">
				<?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);?>
			</div>
		</div>
	</div>
	<?php ActiveForm::end(); ?>

</div>
