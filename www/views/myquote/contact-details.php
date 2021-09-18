<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;

$page_id = 'contact-details';

$this->title = 'Buy Life Insurance Online - Contact Details';
$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->registerCssFile('@web/v2/plugins/css/bootstrap-select.min.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/shared-styles.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/myquote/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerJsFile('@web/v2/plugins/js/bootstrap-select.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
#$this->registerJsFile('@web/v2/myquote/js/'.$page_id.'.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$isMobile = Yii::$app->params['devicedetect']['isMobile'];
?>

<div class="main-wrapp">
	<div class="wrapp">
		<div class="contact-details my-quote-steps">

			<div class="my-quote-steps__steps">
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">1</div>
				<span class="my-quote-steps__decor-line my-quote-steps__decor-line--active"></span>
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">2</div>
				<span class="my-quote-steps__decor-line my-quote-steps__decor-line--active"></span>
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">3</div>
			</div>

			<h1 class="contact-details__title heading-4">Contact Details</h1>
			<?php $form = ActiveForm::begin(['id' => $page_id, 'action' => '/myquote/post/', 'options' => ['class' => 'contact-details__form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
				<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => $page_id, 'id' => ''])->label(false);?>
				<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => 'quote-results', 'id' => ''])->label(false);?>
				<div class="contact-details__container">
					<div class="contact-details__row">
						<label class="contact-details__label">
							<span class="tags">First Name</span>
							<?=$form->field($customer_data, 'first_name')->textInput(['required' => 'required', 'class' => 'contact-details__input fontBodyM', 'placeholder' => 'Enter your first name', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
						</label>
						<label class="contact-details__label">
							<span class="tags">Last Name</span>
							<?=$form->field($customer_data, 'last_name')->textInput(['required' => 'required', 'class' => 'contact-details__input fontBodyM', 'placeholder' => 'Enter your last name', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
						</label>
					</div>

					<div class="contact-details__row">
						<label class="contact-details__label">
							<span class="tags">Email</span>
							<?=$form->field($customer_data, 'email')->input('email', ['required' => 'required', 'class' => 'contact-details__input contact-details__input--invalid fontBodyM', 'placeholder' => 'Enter your email', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
						</label>
						<label class="contact-details__label">
							<span class="tags">Phone number</span>
							<?=$form->field($customer_data, 'phone_number')->input('tel', ['required' => 'required', 'class' => 'contact-details__input fontBodyM', 'placeholder' => 'Enter your phone number', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
						</label>
					</div>

					<div class="contact-details__row">
						<label class="contact-details__label">
							<span class="tags">State</span>
							<?=$form->field($customer_data, 'state')->dropDownList($customer_data::$states_short, [
									'required' => 'required',
									'class' => 'js_selectpicker state',
									'id' => 'state',
									'data-dropup-auto' => true,
									'data-style' => 'contact-details__input fontBodyM',
									'data-size' => 10,
									'data-title' => 'Enter your state',
									'data-mobile' => (string)$isMobile
							])->label(false);?>
						</label>
						<label class="contact-details__label">
							<span class="tags">Zip Code</span>
							<?=$form->field($customer_data, 'zip')->textInput(['required' => 'required', 'class' => 'contact-details__input fontBodyM', 'placeholder' => 'Enter your zip code', 'autocomplete' => 'on', 'autofocus' => false])->label(false);?>
						</label>
					</div>

					<div class="contact-details__row">
						<label class="contact-details__checkbox-label">
							<input type="checkbox">
							<div class="fontBodyS">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictumst nisl proin lobortis morbi in vel elit molestie scelerisque. Dui pretium et nibh volutpat quisque.</div>
						</label>
					</div>
				</div>
				<?=Html::submitButton('see my quote', [
					'id' => 'submit_btn',
					'class' => 'contact-details__btn main-btn button-big',
					'data-trigger' => 'js_action_click',
					'data-action' => 'contact_details_form_submit',
				]);?>
			<?php ActiveForm::end();?>

		</div>
	</div>
</div>


