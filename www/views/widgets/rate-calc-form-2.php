<?php

use app\assets\AppAsset;
use yii\web\Cookie;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use app\models\CustomerData;
use yii\widgets\Pjax;
use app\components\Helpers;
use app\components\BaseController;


?>

<div class="applynow-form-section rate-calc v2 widget center trans_all position-relative">
	<div class="desc text-center">Over <span class="bt"><?=$quots_count;?></span> quotes generated to date!</div>

	<div class="loader bg1"></div>

	<div class="form-wrap">
		<?php $form = ActiveForm::begin([
			'id' => 'rate-calc-form',
			'action' => '/post-rate-calc-table/',
			'enableAjaxValidation' => false,
			'validationUrl' => '/validate-rate-calc/',
			'options' => ['class' => 'charts-by-age__form applynow-form', 'data-autoload' => $autoload, 'data-autoscroll' => $autoscroll, 'data-view' => 'table'], 'fieldConfig' => ['options' => ['tag' => false]]
		]);?>
		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'ajaxform', 'id' => ''])->label(false);?>
		<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => '', 'id' => ''])->label(false);?>
		
		<?php if($display_title):?>
			<h2 class="charts-by-age__subtitle heading-4"><?=$title;?></h2>
		<?php endif;?>

		<div class="row charts-by-age__container">
			<div class="col-12 col-md-6 col-lg-3 charts-by-age__label d-flex flex-column mb-md-4">
				<label for="v2_age"><span class="tags">My age is</span></label>
				<?=$form->field($customer_data, 'age')->input('number', ['required' => 'required', 'class' => 'age charts-by-age__input fontBodyM active-el', 'id' => 'v2_age', 'placeholder' => 'e.g. 42', 'value' => 55])->label(false)->error(false);?>
				<span class="charts-by-age__input-text tags">years old</span>
			</div>
			<div class="col-12 col-md-6 col-lg-3 charts-by-age__label d-flex flex-column mb-md-4">
				<label for="v2_sex"><span class="tags">My gender is</span></label>
				<?=$form->field($customer_data, 'sex')->dropDownList(['m' => 'Male', 'f' => 'Female'], ['class' => 'js_selectpicker sex charts-by-age__select fontBodyM', 'id' => 'v2_sex', 'data-style' => 'btn-light', 'data-mobile' => (string)$isMobile, 'options' => ['m' => ['selected' => 'selected']]])->label(false)->error(false);?>
			</div>
			
			<div class="col-12 col-md-6 col-lg-3 charts-by-age__label d-flex flex-column">
				<label for="v2_term_length"><span class="tags">Term length</span></label>
				<?=$form->field($customer_data, 'term_length')->dropDownList($customer_data::$term_lengths2, ['class' => 'js_selectpicker term_length charts-by-age__select fontBodyM', 'id' => 'v2_term_length', 'data-style' => 'btn-light', 'data-mobile' => (string)$isMobile, 'options' => [20 => ['selected' => 'selected']]])->label(false)->error(false);?>
			</div>
			
			<div class="col-12 col-md-6 col-lg-3 charts-by-age__label d-flex flex-column">
				<label for="v2_health"><span class="tags">My overall health</span></label>
				<?=$form->field($customer_data, 'health')->dropDownList($customer_data::$healths2, ['class' => 'js_selectpicker health charts-by-age__select fontBodyM', 'id' => 'v2_health', 'data-style' => 'btn-light', 'data-mobile' => (string)$isMobile, 'options' => ['very-good' => ['selected' => 'selected']]])->label(false)->error(false);?>
			</div>

		</div>

		<div class="charts-by-age__decor-line"></div>

		<?=Html::submitButton($submit_text, ['class' => 'charts-by-age__btn main-btn button-big', 'id' => 'submit_btn']);?>

		<?php ActiveForm::end();?>
	</div>

	<div id="rate_calc_results" class="results"><?=$default_results;?></div>

</div>
