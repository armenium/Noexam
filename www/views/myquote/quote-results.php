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

$this->registerCssFile('@web/v2/myquote/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/plugins/css/ion.rangeSlider.min.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/range-slider.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/questions.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/plugins/css/slick.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
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
				<?php $form = ActiveForm::begin(['id' => $page_id, 'action' => '/myquote/ajax/', 'options' => ['class' => 'quotes-result__form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
					<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => $page_id, 'id' => ''])->label(false)->error(false);?>
					<?=$form->field($customer_data, 'redirect')->hiddenInput(['value' => '', 'id' => ''])->label(false)->error(false);?>
					<div class="quotes-result__formColumn first">
						<h4 class="quotes-result__formTitle main-title">Coverage</h4>
						<label class="quotes-result__label">
						<?=$form->field($customer_data, 'avg_amount')->input('text', [
							'required' => 'required',
							'class' => 'js_range_slider start-quote__range-slider',
							'id' => 'rc_coverage_amount',
							'data-from' => $from,
							'data-values' => implode(',', $customer_data::$coverage_amounts),
							#'data-trigger' => 'js_action_change',
							#'data-action' => 'ajax_quote_results_request',
							'data-parent' => "#$page_id",
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
								'data-trigger' => 'js_action_change',
								'data-action' => 'ajax_quote_results_request',
								'data-parent' => "#$page_id",
							])->label(false);?>
						</div>
					</div>
				<?php ActiveForm::end();?>
			</div>
			
			<div id="js_quote_results">
				<?=$this->render('../myquote/partials/quote-results-list', [
					'customer_data' => $customer_data,
					'prices' => $prices,
					'no_plans_count' => $no_plans_count,
					'yes_plans_count' => $yes_plans_count,
					'total_plans_count' => $total_plans_count,
					'total_terms_count' => $total_terms_count
				]);?>
			</div>
			
		</section>
	</div>
</div>

<?=$this->render('../myquote/sections/03.php');?>

<?=$this->render('../pages/sections/home/faqs.php', ['faq_items' => $faq_items]);?>




