<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;

$page_id = 'date-of-birth';

$this->title = 'Buy Life Insurance Online - Date of birth';
$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->registerCssFile('@web/v2/plugins/css/bootstrap-select.min.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/shared-styles.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/myquote/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerJsFile('@web/v2/plugins/js/bootstrap-select.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
#$this->registerJsFile('@web/v2/myquote/js/'.$page_id.'.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$days = $months = $years = [];
for($i = 1; $i <= 31; $i++){
	$n = $i;
	if(strlen($i) == 1) $n = '0'.$i;

	$days[$n] = $n;
	if($i <= 12) $months[$n] = $n;
}
$y = date('Y');
for($i = $y; $i >= $y - 100; $i--){
	$years[$i] = $i;
}

$dropdown_options = [
	'required' => 'required',
	'class' => 'js_selectpicker date-of-birth__select',
	'data-dropup-auto' => true,
	'data-style' => 'date-of-birth__select',
	'data-size' => 10,
	'data-mobile' => (string)$isMobile,
];

#VarDumper::dump($customer_data->birthday, 10, 1);
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
				<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => 'contact-details', 'id' => ''])->label(false);?>
				<div class="date-of-birth__container">
					<img src="/v2/myquote/img/date-of-birdth-bg.png" alt="image" class="date-of-birth__img">
					<div class="date-of-birth__box">
						<label class="date-of-birth__label">
							<span class="tags">Date</span>
							<?=$form->field($customer_data, 'birthday[day]')->dropDownList($days, array_merge($dropdown_options, [
									'id' => 'birth_day',
									'data-title' => 'Day',
									'options' => [$customer_data->birthday['day'] => ['selected' => 'selected']]
							]))->label(false);?>
						</label>
						<label class="date-of-birth__label">
							<span class="tags">Month</span>
							<?=$form->field($customer_data, 'birthday[month]')->dropDownList($months, array_merge($dropdown_options, [
									'id' => 'birth_month',
									'data-title' => 'Month',
									'options' => [$customer_data->birthday['month'] => ['selected' => 'selected']]
							]))->label(false);?>
						</label>
						<label class="date-of-birth__label">
							<span class="tags">Year</span>
							<?=$form->field($customer_data, 'birthday[year]')->dropDownList($years, array_merge($dropdown_options, [
									'id' => 'birth_year',
									'data-title' => 'Year',
									'options' => [$customer_data->birthday['year'] => ['selected' => 'selected']]
							]))->label(false);?>
						</label>
					</div>
				</div>
				<?=Html::submitButton('Continue', ['class' => 'date-of-birth__btn main-btn button-big', 'id' => 'submit_btn']);?>
			<?php ActiveForm::end();?>

		</div>
	</div>
</div>



