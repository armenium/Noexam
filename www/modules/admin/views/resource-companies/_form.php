<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResourcesCompanies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resources-companies-form admin-form mt">
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<div class="row mb">
		<div class="col-md-12 bg-warning"><h2>Main params</h2></div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<?=$form->field($model, 'internal_code')->textInput(['maxlength' => true, 'placeholder' => 'Enter code in lowercase and underscore instead of dashes and spaces']);?>
		</div>
		<div class="col-md-3">
			<label></label>
			<?=$form->field($model, 'display_in_page')->checkbox();?>
		</div>
		<div class="col-md-3">
			<label></label>
			<?=$form->field($model, 'best_company')->checkbox();?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<?=$form->field($model, 'title')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'slug')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'file')->fileInput();?>
			<?php if(!empty($model->logo)): ?>
				<img src="<?=$model->logo;?>" style="width: 70px; height: auto;">
				<br>
				<?=Html::checkbox('remove_logo', false, ['label' => 'Remove logo']);?>
			<?php endif; ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<?=$form->field($model, 'website')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'phone')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'year_founded')->textInput()?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<?=$form->field($model, 'current_ceo')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'available')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'address')->textInput(['maxlength' => true])?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<?=$form->field($model, 'top_awards')->textarea(['rows' => 6])->hint('Enter each value on a new line.');?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'pros')->textarea(['rows' => 6])->hint('Enter each value on a new line.');?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'cons')->textarea(['rows' => 6])->hint('Enter each value on a new line.');?>
		</div>
	</div>

	<div class="row mb">
		<div class="col-md-12 bg-warning"><h2>Financial Ratings</h2></div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<?=$form->field($model, 'jd_power')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-3">
			<?=$form->field($model, 'bbb')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-3">
			<?=$form->field($model, 'am_best')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-3">
			<?=$form->field($model, 'moodys')->textInput(['maxlength' => true])?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<?=$form->field($model, 'fitch')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-3">
			<?=$form->field($model, 'standard_poor')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-3">
			<?=$form->field($model, 'comdex_score')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-3"></div>
	</div>

	<div class="row mb">
		<div class="col-md-12 bg-warning"><h2>Financial Status</h2></div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<?=$form->field($model, 'total_assets')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-6">
			<?=$form->field($model, 'life_insurance_in_force')->textInput(['maxlength' => true])?>
		</div>
	</div>

	<div class="row mb">
		<div class="col-md-12 bg-warning"><h2>Other tabs</h2></div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<?=$form->field($model, 'types_of_insurance')->textarea(['rows' => 10])->hint('Enter each value on a new line.');?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'products_offered')->textarea(['rows' => 10])->hint('Enter each value on a new line.');?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'riders_available')->textarea(['rows' => 10])->hint('Enter each value on a new line.');?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<?=$form->field($model, 'companys_field_1')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'companys_field_2')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'companys_field_3')->textInput(['maxlength' => true])?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<?=$form->field($model, 'companys_field_4')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-6">
			<?=$form->field($model, 'companys_field_5')->textInput(['maxlength' => true])?>
		</div>
	</div>

	<div class="row mb">
		<div class="col-md-12 bg-warning"><h2>Our rating fields</h2></div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<?=$form->field($model, 'financial_strength')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-3">
			<?=$form->field($model, 'financial_strength_sorting')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-3">
			<?=$form->field($model, 'underwriting_time')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-3">
			<?=$form->field($model, 'types_offered')->textInput(['maxlength' => true])?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<?=$form->field($model, 'complaint_index')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'most_popular')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'our_rating')->textInput(['maxlength' => true])?>
		</div>
	</div>

	<div class="row mb">
		<div class="col-md-12 bg-warning"><h2>New fields</h2></div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<?=$form->field($model, 'state_availability')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'number_of_employees')->textInput(['maxlength' => true])?>
		</div>
		<div class="col-md-4">
			<?=$form->field($model, 'ways_to_buy')->dropDownList($model->_ways_to_buy_list, ['class'=>'chosen-select input-md required form-control', 'multiple'=>'multiple', 'size' => 3]);?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<?=$form->field($model, 'content')->textarea();?>
		</div>
	</div>

	<hr>

	<div class="row mb">
		<div class="col-md-12">
			<div class="form-group">
				<?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
			</div>
		</div>
	</div>
	<?php ActiveForm::end(); ?>

</div>
