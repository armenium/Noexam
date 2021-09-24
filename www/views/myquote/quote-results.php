<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;

$page_id = 'quote-results';

$this->title = 'Buy Life Insurance Online - Quote results';
$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->registerCssFile('@web/v2/plugins/css/bootstrap-select.min.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/shared-styles.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/myquote/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/plugins/css/ion.rangeSlider.min.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/range-slider.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/questions.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/plugins/css/slick.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerJsFile('@web/v2/plugins/js/bootstrap-select.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/plugins/js/ion.rangeSlider.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/plugins/js/slick.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/myquote/js/'.$page_id.'.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$isMobile = Yii::$app->params['devicedetect']['isMobile'];
?>

<div class="main-wrapp" style="background-color: #FCF9F3;">
	<div class="wrapp">
		<section class="quotes-result">
			<h1 class="quotes-result__title heading-1"><span>Compare</span> Quotes</h1>
			<div class="quotes-result__subtitle fontBodyL">See the top companies prices side by side to compare.</div>

			<div class="quotes-result__container">
				<?php $form = ActiveForm::begin(['id' => $page_id, 'action' => '/myquote/post/', 'options' => ['class' => 'quotes-result__form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
					<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => $page_id, 'id' => ''])->label(false)->error(false);?>
					<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => '', 'id' => ''])->label(false)->error(false);?>
					<div class="quotes-result__formColumn first">
						<h4 class="quotes-result__formTitle main-title">Coverage</h4>
						<label class="quotes-result__label">
						<?=$form->field($customer_data, 'coverage_amount')->input('text', [
							'required' => 'required',
							'class' => 'js-range-slider start-quote__range-slider',
							'id' => 'rc_coverage_amount',
							'data-from' => $from,
							'data-values' => implode(',', $customer_data::$avg_amounts4),
						])->label(false);?>
						</label>
					</div>
					<div class="quotes-result__formColumn last">
						<h4 class="quotes-result__formTitle main-title">Term Length</h4>
						<div class="quotes-result__label">
							<label for="term_length">
								<span class="tags">Select from dropdown</span>
							</label>
							<?=$form->field($customer_data, 'term_length')->dropDownList($customer_data::$term_lengths2, [
								'id' => 'term_length',
								'required' => 'required',
								'class' => 'js_selectpicker quotes-result__termSelect',
								'data-dropup-auto' => true,
								'data-size' => 10,
								'data-mobile' => (string)$isMobile,
							])->label(false);?>
						</div>
					</div>
				<?php ActiveForm::end();?>
			</div>

			<div class="quotes-result__container results-table">
				<div class="quotes-result__containerHeader">
					<h2 class="quotes-result__containerTitle heading-5">No Medical Exam Policies</h2>
					<div class="heading-6">Total: <span>2</span></div>
				</div>
				<div class="quotes-result__tableHeader tableHeader">
					<div class="tableHeader__col fontBodyS">Insurance Company</div>
					<div class="tableHeader__col fontBodyS">Monthly Payment</div>
					<div class="tableHeader__col fontBodyS">Financial Rating</div>
					<div class="tableHeader__col fontBodyS">Term Length</div>
				</div>
				<hr>

				<div class="quotes-result__tableRow tableRow">
					<div class="tableRow__col">
						<div class="tableRow__imgWrapp">
							<img src="./img/quote-result-logo-1.png" alt="logo" class="tableRow__img">
							<div class="tableRow__starsWrapp">
								* * * * *
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__price fontBodyM">$46.55</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__rating fontBodyM">A <span>(Excellent)</span></div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__term fontBodyM">10 Year Plan</div>
					</div>
					<div class="tableRow__col tableRow__col--hiden">
						<div class="tableRow__box">
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Monthly Payment</span>
								<span class="fontBodyM">$46.55</span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Financial Rating</span>
								<span class="fontBodyM">A <span>(Excellent)</span></span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Term Length</span>
								<span class="fontBodyM">10 Year Plan</span>
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<button type="submit" class="tableRow__btn main-btn button-big">apply now</button>
					</div>
				</div>
				<hr>

				<div class="quotes-result__tableRow tableRow">
					<div class="tableRow__col">
						<div class="tableRow__imgWrapp">
							<img src="./img/quote-result-logo-4.png" alt="logo" class="tableRow__img">
							<div class="tableRow__starsWrapp">
								* * * * *
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__price fontBodyM">$46.55</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__rating fontBodyM">A <span>(Excellent)</span></div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__term fontBodyM">10 Year Plan</div>
					</div>
					<div class="tableRow__col tableRow__col--hiden">
						<div class="tableRow__box">
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Monthly Payment</span>
								<span class="fontBodyM">$46.55</span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Financial Rating</span>
								<span class="fontBodyM">A <span>(Excellent)</span></span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Term Length</span>
								<span class="fontBodyM">10 Year Plan</span>
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<button type="submit" class="tableRow__btn main-btn button-big">apply now</button>
					</div>
				</div>

			</div>

			<div class="quotes-result__container results-table">
				<div class="quotes-result__containerHeader">
					<h2 class="quotes-result__containerTitle heading-5">Policies that Offer Accelerated Underwriting</h2>
					<div class="heading-6">Total: 3</div>
				</div>
				<div class="quotes-result__tableHeader tableHeader">
					<div class="tableHeader__col fontBodyS">Insurance Company</div>
					<div class="tableHeader__col fontBodyS">Monthly Payment</div>
					<div class="tableHeader__col fontBodyS">Financial Rating</div>
					<div class="tableHeader__col fontBodyS">Term Length</div>
				</div>
				<hr>

				<div class="quotes-result__tableRow tableRow">
					<div class="tableRow__col">
						<div class="tableRow__imgWrapp">
							<img src="./img/quote-result-logo-3.png" alt="logo" class="tableRow__img">
							<div class="tableRow__starsWrapp">
								* * * * *
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__price fontBodyM">$46.55</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__rating fontBodyM">A <span>(Excellent)</span></div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__term fontBodyM">10 Year Plan</div>
					</div>
					<div class="tableRow__col tableRow__col--hiden">
						<div class="tableRow__box">
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Monthly Payment</span>
								<span class="fontBodyM">$46.55</span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Financial Rating</span>
								<span class="fontBodyM">A <span>(Excellent)</span></span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Term Length</span>
								<span class="fontBodyM">10 Year Plan</span>
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<button type="submit" class="tableRow__btn main-btn button-big">apply now</button>
					</div>
				</div>
				<hr>

				<div class="quotes-result__tableRow tableRow">
					<div class="tableRow__col">
						<div class="tableRow__imgWrapp">
							<img src="./img/quote-result-logo-4.png" alt="logo" class="tableRow__img">
							<div class="tableRow__starsWrapp">
								* * * * *
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__price fontBodyM">$46.55</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__rating fontBodyM">A <span>(Excellent)</span></div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__term fontBodyM">10 Year Plan</div>
					</div>
					<div class="tableRow__col tableRow__col--hiden">
						<div class="tableRow__box">
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Monthly Payment</span>
								<span class="fontBodyM">$46.55</span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Financial Rating</span>
								<span class="fontBodyM">A <span>(Excellent)</span></span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Term Length</span>
								<span class="fontBodyM">10 Year Plan</span>
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<button type="submit" class="tableRow__btn main-btn button-big">apply now</button>
					</div>
				</div>
				<hr>

				<div class="quotes-result__tableRow tableRow">
					<div class="tableRow__col">
						<div class="tableRow__imgWrapp">
							<img src="./img/quote-result-logo-1.png" alt="logo" class="tableRow__img">
							<div class="tableRow__starsWrapp">
								* * * * *
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__price fontBodyM">$46.55</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__rating fontBodyM">A <span>(Excellent)</span></div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__term fontBodyM">10 Year Plan</div>
					</div>
					<div class="tableRow__col tableRow__col--hiden">
						<div class="tableRow__box">
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Monthly Payment</span>
								<span class="fontBodyM">$46.55</span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Financial Rating</span>
								<span class="fontBodyM">A <span>(Excellent)</span></span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Term Length</span>
								<span class="fontBodyM">10 Year Plan</span>
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<button type="submit" class="tableRow__btn main-btn button-big">apply now</button>
					</div>
				</div>

			</div>

		</section>
	</div>
</div>

<?=$this->render('../myquote/sections/03.php');?>

<?=$this->render('../home/sections/08.php', ['faq_items' => $faq_items]);?>




