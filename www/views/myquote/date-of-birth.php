<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$page_id = 'date-of-birth';

$this->title = 'Buy Life Insurance Online - Date of birth';
$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->registerCssFile('@web/v2/common/css/shared-styles.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/plugins/css/bootstrap-select.min.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/myquote/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerJsFile('@web/v2/plugins/js/bootstrap-select.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/myquote/js/'.$page_id.'.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$isMobile = Yii::$app->params['devicedetect']['isMobile'];
$days = $months = $years = [];
for($i = 1; $i <= 31; $i++){
	if(strlen($i) == 1){
		$n = '0'.$i;
	}else{
		$n = $i;
	}
	$days[$n] = $i;
	if($i <= 12){
		$months[$n] = $i;
	}
}
$y = date('Y');
for($i = $y; $i >= $y - 100; $i--){
	$years[$i] = $i;
}

?>
<div class="main-wrapp">
	<div class="wrapp">
		<div class="date-of-birth my-quote-steps">

			<div class="my-quote-steps__steps">
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">1</div>
				<span class="my-quote-steps__decor-line my-quote-steps__decor-line--active"></span>
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">2</div>
				<span class="my-quote-steps__decor-line"></span>
				<div class="my-quote-steps__steps-item">3</div>
			</div>

			<h1 class="date-of-birth__title heading-4">Date of Birth</h1>
			<?php $form = ActiveForm::begin(['id' => $page_id, 'action' => '/myquote/post/', 'options' => ['class' => 'date-of-birth__form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
				<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => $page_id, 'id' => ''])->label(false);?>
				<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => 'contract-details', 'id' => ''])->label(false);?>
				<div class="date-of-birth__container">
					<img src="/v2/myquote/img/date-of-birdth-bg.png" alt="image" class="date-of-birth__img">
					<div class="date-of-birth__box">
						<?=$form->field($customer_data, 'birthday[month]')->dropDownList($months, ['required' => 'required', 'class' => 'selectpicker birth_month form-control', 'id' => 'birth_month', 'data-style' => 'btn-success', 'data-size' => 12, 'data-title' => 'Month', 'data-mobile' => (string)$isMobile, 'options' => ['0' => ['selected' => 'selected']]])->label(false);?>
						<label class="date-of-birth__label">
							<span class="tags">Date</span>
							<select name="date" class="date-of-birth__select">
								<option value="DD">DD</option>
								<option value="DD2">DD</option>
								<option value="DD3">DD</option>
							</select>
						</label>
						<label class="date-of-birth__label">
							<span class="tags">Month</span>
							<select name="month" class="date-of-birth__select">
								<option value="MM">MM</option>
								<option value="MM2">MM</option>
								<option value="MM3">MM</option>
							</select>
						</label>
						<label class="date-of-birth__label">
							<span class="tags">Year</span>
							<select name="year" class="date-of-birth__select">
								<option value="YYYY">YYYY</option>
								<option value="YYYY2">YYYY</option>
								<option value="YYYY3">YYYY</option>
							</select>
						</label>
					</div>
				</div>
				<?=Html::submitButton('Continue', ['class' => 'date-of-birth__btn main-btn button-big', 'id' => 'submit_btn']);?>
			<?php ActiveForm::end();?>

		</div>
	</div>
</div>



