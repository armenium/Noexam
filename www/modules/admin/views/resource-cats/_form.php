<?php

use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;
use app\models\ResourcesCompanies;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use yii\web\JsExpression;


/* @var $this yii\web\View */
/* @var $model app\models\ResourcesGrid */
/* @var $form yii\widgets\ActiveForm */

?>
<style>
	label {display: block;}
	select[multiple="multiple"] {min-height: 200px;}
</style>
<div class="resources-grid-form">
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
	<?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn-float '.($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')]);?>
	
	<div class="panel panel-danger">
		<div class="panel-heading">Main params</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<?=$form->field($model, 'title')->textInput(['maxlength' => true]);?>
				</div>
				<div class="col-md-4">
					<?=$form->field($model, 'url')->textInput(['maxlength' => true]);?>
				</div>
				<div class="col-md-4">
					<?=$form->field($model, 'company_id')->dropDownList($resources_companies->getCompaniesWithId(), ['prompt' => ''])->label('Select if this entry is an insurance company page');?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<?=$form->field($model, 'parent_id')->dropDownList(Yii::$app->controller->getCatsTree(), ['prompt' => '']);?>
				</div>
				<div class="col-md-4">
					<?=$form->field($model, 'template')->dropDownList(Yii::$app->controller->getTemplatesTree(), ['prompt' => '- Custom HTML Content -']);?>
				</div>
				<div class="col-md-4">
					<?=$form->field($model, 'layout')->dropDownList(Yii::$app->controller->getLayouts());?>
				</div>
			</div>
		</div>
	</div>

	<div id="js_page_content" class="panel panel-primary">
		<div class="panel-heading">Custom Content</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<?=$form->field($model, 'content')->widget(TinyMce::className(), Yii::$app->params['tinymce']);?>
					
					<?php /*echo $form->field($model, 'content')->widget(Widget::className(), [
						'settings' => [
							'lang' => 'en',
							'minHeight' => 200,
							#'allowedAttr' => true,
							#'breakline' => true,
							#'removeWithoutAttr' => false,
							#'removeEmpty' => false,
							#'paragraphize' => false,
							#'cleanOnPaste' => false,
							'formatting' => ['p', 'blockquote', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
							#'verifiedTags' => ['?php'],
							'imageUpload' => Url::to(['resource-cats/image-upload']),
							'imageManagerJson' => Url::to(['/resource-cats/images-get']),
							'plugins' => [
								//'filemanager',
								'imagemanager',
								'clips',
								'fullscreen',
							],
							'clips' => [
								['breadcrumbs​', '[breadcrumbs​]'],
								['authors-small', '[authors-small]'],
								['authors-small-wd', '[authors-small-wd]'],
							],
						],
					])->label(false);*/?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="tablepress table">
						<thead>
							<tr>
								<th>Shortcode</th>
								<th>Attrs</th>
								<th>Desc</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>[authors-small]</td>
								<td>
									<b>id</b> = post_id <em><small>(<a href="http://joxi.ru/BA0KNL0spwRPJ2" target="_blank">Screenshot</a>)</small></em><br>
									<b>model</b> = "resources-cats" or "ResourcesCats" <em><small>(defualt value = "ResourcesCats")</small></em>
								</td>
								<td>Param "id" is required<br>Param "model" is optional</td>
							</tr>
							<tr>
								<td>[rate-widget-cta]</td>
								<td><em>No params</em></td>
								<td>-</td>
							</tr>
							<tr>
								<td>[rate-calc-form]</td>
								<td>
									<b>position</b> = left | center | right <em><small>(defualt value = "center")</small></em><br>
									<b>width</b> = any digits or empty <em><small>(default value = empty)</small></em><br>
									<b>cols</b> = 1 or 2 <em><small>(default value = 1)</small></em><br>
									<b>autoload</b> = 0 or 1 <em><small>(default value = 0)</small></em><br>
									<b>title</b> = string <em><small>(default value = empty)</small></em><br>
									<b>guessing</b> = 0 or 1 <em><small>(default value = 0)</small></em><br>
									<b>guessing_statistic_type</b> = short or detail <em><small>(default value = "short")</small></em>
								</td>
								<td>
									Param "position" is optional<br>
									Param "width" is optional<br>
									Param "cols" is optional<br>
									Param "autoload" is optional<br>
									Param "title" is optional<br>
									Param "guessing" is optional<br>
									Param "guessing_statistic_type" is optional
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">Header params</div>
		<div class="panel-body">
			<div class="row" data-layout="resource_fw_modern">
				<div class="col-md-12">
					<?=$form->field($model, 'header_title')->textInput(['maxlength' => true]);?>
				</div>
			</div>
			<div class="row" data-layout="resource_fw_modern">
				<div class="col-md-12">
					<?=$form->field($model, 'header_subtitle')->textInput(['maxlength' => true]);?>
				</div>
			</div>
			<div class="row" data-layout="resource_fw_modern">
				<div class="col-md-4">
					<?=$form->field($model, 'file')->fileInput()->label('Header background');?>
					<?php if(!empty($model->header_image)):?>
						<img src="<?=$model->header_image;?>" style="width: 70px; height: auto;">
						<br>
						<?=Html::checkbox('remove_header_image', false, ['label' => 'Remove background image']);?>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-success">
		<div class="panel-heading">Meta params</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<?=$form->field($model, 'meta_title')->textInput(['maxlength' => true]);?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?=$form->field($model, 'meta_desc')->textarea(['rows' => 2]);?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?=$form->field($model, 'meta_keys')->textInput(['maxlength' => true]);?>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-warning">
		<div class="panel-heading">Additional params</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-5">
					<?=$form->field($model, 'child_to_parent_links')->checkbox();?>
					<?=$form->field($model, 'custom_childs_links')->dropDownList($model->CategoryDropdown, ['class'=>'chosen-select input-md required form-control', 'multiple'=>'multiple'])->label("Custom childs to display on this page");?>
				</div>
				<div class="col-md-3">
					<?=$form->field($model, 'is_companies_main_page')->checkbox();?>
					<?=$form->field($model, 'is_best_companies_page')->checkbox();?>
					<?=$form->field($model, 'display_subpages_in_footer')->checkbox();?>
				</div>
				<div class="col-md-2">
					<?=$form->field($model, 'item_order')->textInput(['maxlength' => false]);?>
				</div>
				<div class="col-md-2 text-right">
					<label class="control-label">&nbsp;</label>
					<?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);?>
				</div>
			</div>
		</div>
	</div>
    <?php ActiveForm::end(); ?>
</div>
