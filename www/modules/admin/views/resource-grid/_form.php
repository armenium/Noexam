<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;

/* @var $this yii\web\View */
/* @var $model app\models\ResourcesGrid */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="resources-grid-form">
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
	<div class="row">
		<div class="col-md-3">
			<?=$form->field($model, 'category_id')->dropDownList(Yii::$app->controller->getCatsTree(), ['prompt' => '']);?>
		</div>
		<div class="col-md-7">
			<?=$form->field($model, 'title')->textInput(['maxlength' => true]);?>
		</div>
		<div class="col-md-2">
			<?=$form->field($model, 'txcolor')->dropDownList($txcolor_list, ['prompt' => '']) ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?=$form->field($model, 'content')->textarea(['rows' => 2]);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<?=$form->field($model, 'link')->textInput(['maxlength' => true]);?>
		</div>
		<div class="col-md-3">
			<?=$form->field($model, 'label')->dropDownList($label_list, ['prompt' => '']) ?>
		</div>
		<div class="col-md-3">
			<?=$form->field($model, 'lbcolor')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select color ...']]);?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<?=$form->field($model, 'placement')->dropDownList($placement_list, ['prompt' => '']) ?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'bgcolor')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select color ...']]);?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'file')->fileInput();?>
			<?php if(!empty($model->bgimage)):?>
			<img src="<?=$model->bgimage;?>" style="width: 70px; height: auto;">
			<br>
			<?=Html::checkbox('remove_bgimage', false, ['label' => 'Remove background image']);?>
			<?php endif;?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		    <div class="form-group">
		        <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);?>
		    </div>
		</div>
	</div>
    <?php ActiveForm::end(); ?>
</div>
