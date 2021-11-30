<?php

/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\VarDumper;

$page_id = 'online-app-step-3';

$this->title = 'Beneficiary Information';
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$this->registerCssFile('@web/v2/my-application/css/online-app.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-application/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-application/js/online-app.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
?>
<div class="main-wrapp">
	<div class="wrapp">
		<div class="online-app-step-3 my-quote-steps">
			<div class="my-quote-steps__steps">
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">1</div>
				<span class="my-quote-steps__decor-line my-quote-steps__decor-line--active"></span>
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">2</div>
				<span class="my-quote-steps__decor-line my-quote-steps__decor-line--active"></span>
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">3</div>
			</div>
		</div>
		
		<?php $form = ActiveForm::begin([
			'enableAjaxValidation' => true,
			'enableClientValidation' => true,
			'validationUrl' => Url::toRoute('/my-application/validation'),
			'id' => 'js_step_3',
			'action' => '/my-application/post/',
			'options' => ['class' => 'online-app-step-3__form'],
			'fieldConfig' => ['options' => ['tag' => false]]
		]);?>
		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'step-3', 'id' => ''])->label(false);?>

		<form class="online-app-step-3__form">

			<div class="online-app-step-3__form-box">
				<h1 class="online-app-step-3__title heading-5">Beneficiary Information</h1>
				<p class="online-app-step-3__subtitle fontBodyM">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus feugiat lacus, orci duis.</p>

				<div id="benef_fields">
					<?=$this->render('_beneficiary', ["bf_id" => $bf_id, 'customer_data' => $customer_data, 'form' => $form, 'isMobile' => $isMobile]);?>
				</div>

				<div class="row">
					<div class="col-12 d-flex justify-content-end">
						<a role="button" class="d-flex flex-nowrap text-btn green icon-plus-green trans_me" data-trigger="js_action_click" data-action="add_beneficiary" data-target-form="#js_step_3">Add beneficiary</a>
					</div>
				</div>

			</div>

		</form>
		
		<?php ActiveForm::end();?>

		<div class="online-app-step-1__btns">
			<button type="submit" class="online-app-step-1-btn main-btn button-big prev" data-trigger="js_action_click" data-action="online_app_back">Back</button>
			<button type="submit" class="online-app-step-1-btn main-btn button-big next" data-trigger="js_action_click" data-action="online_app_next" data-target="#js_step_3">next</button>
		</div>

	</div>
</div>

<img class="bg-section__img1" src="/v2/common/images/online-app/online-app-bg-1.png" alt="">
<img class="bg-section__img2" src="/v2/common/images/online-app/online-app-bg-2.png" alt="">
<img class="bg-section__img3" src="/v2/common/images/online-app/online-app-bg-3.png" alt="">
