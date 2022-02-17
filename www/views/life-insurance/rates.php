<?php

use app\assets\AppAsset;
use app\components\BreadcrumbsNew;
use app\widgets\Author;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\View;
use app\widgets\ApplyNowForm;
use app\widgets\RateCalcForm2;
use app\widgets\RateChartByAge;

$isMobile = Yii::$app->params['devicedetect']['isMobile'];


if(!empty($this->context->current_cat->meta_desc)){
	$this->registerMetaTag(['name' => 'description', 'content' => $this->context->current_cat->meta_desc]);
}
if(!empty($this->context->current_cat->meta_keys)){
	$this->registerMetaTag(['name' => 'keywords', 'content' => $this->context->current_cat->meta_keys]);
}
if(!empty($this->context->current_cat->meta_title)){
	$this->title = $this->context->current_cat->meta_title;
}else{
	$this->title = $this->context->current_cat->title;
}

#$this->registerCssFile('@web/v2/plugins/css/table-default.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
#$this->registerCssFile('@web/v2/plugins/css/datatables-row-details.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/life-insurance/css/rates.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/main-first-screen.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/get-started.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
#$this->registerJsFile('@web/v2/plugins/js/tabby.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
//$this->registerJS('jQuery(document).ready(function($) { RESPONSIVEUI.responsiveTabs(); });', View::POS_END, 'responsive-tab-js');
#$this->registerJsFile('@web/v2/life-insurance/js/rates.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/', 'class' => 'breadcrumbs__link tags'];
$this->params['breadcrumbs'][] = ['label' => 'Term Life Insurance', 'url' => '/life-insurance/term/', 'class' => 'breadcrumbs__link tags'];
$this->params['breadcrumbs'][] = ['label' => 'Rates', 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];
#$this->params['breadcrumbs'][] = ['label' => 'Rates', 'url' => $this->context->current_cat->url, 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];
#$this->params['breadcrumbs'][] = $this->context->current_cat->title;


?>
<div class="main-wrapp bg1">
	<div class="wrapp">
		<section class="rates">
			<div class="rates__nav breadcrumbs">
				<?=BreadcrumbsNew::widget(['links' => $this->params['breadcrumbs']]);?>
			</div>
			<div class="rates__first-screen main-first-screen">
				<h1 class="main-first-screen__title heading-0">See Life Insurance Rate Charts By Age</h1>
				<div class="main-first-screen__advice">
					<?=Author::widget(['db_time' => $this->context->current_cat->updated, 'file_time' => filemtime(__FILE__)]);?>
					<div class="fs-advice__body">
						<p class="fs-advice__text fontBodyM">Life insurance rates are heavily influenced by age. The older you are, the higher the rate. If you are curious about how much life insurance will cost for someone your age, use the tool below to quickly show sample life insurance rates from seven companies.</p>
					</div>
				</div>
				<h2 class="main-first-screen__info heading-6">Use the tool below to see life insurance rates for your age. Enter your details and desired coverage amount to see sample rates to compare.</h2>
			</div>
		</section>
	</div>
</div>

<div class="main-wrapp bg1">
	<div class="wrapp">
		<?=ApplyNowForm::widget(['form' => 'apply-now-form']);?>
	</div>
</div>

<div class="main-wrapp">
	<div class="wrapp">
		<section class="rates-charts">
			<h1 class="rates-charts__title heading-2">Term life insurance rate Charts</h1>
			<p class="rates-charts__info fontBodyL">Below are sample term life insurance rates by age for comparison purposes. The rates are broken up by term length, gender, age, and coverage amounts. We recommend you use this <b>comparison tool</b> to compare actual rates from <b>the best life insurance companies.</b></p>
			<div class="rates-charts__links">
				<a role="button" class="rates-charts__link button-small button-small--arrow" data-trigger="js_action_click" data-action="goto_age_tab" data-target="ages-18-28">Rates by Age 18-28</a>
				<a role="button" class="rates-charts__link button-small button-small--arrow" data-trigger="js_action_click" data-action="goto_age_tab" data-target="ages-29-39">Rates by Age 29-39</a>
				<a role="button" class="rates-charts__link button-small button-small--arrow" data-trigger="js_action_click" data-action="goto_age_tab" data-target="ages-40-49">Rates by Age 40-49</a>
				<a role="button" class="rates-charts__link button-small button-small--arrow" data-trigger="js_action_click" data-action="goto_age_tab" data-target="ages-50-59">Rates by Age 50-59</a>
				<a role="button" class="rates-charts__link button-small button-small--arrow" data-trigger="js_action_click" data-action="goto_age_tab" data-target="ages-60-69">Rates by Age 60-69</a>
				<a role="button" class="rates-charts__link button-small button-small--arrow" data-trigger="js_action_click" data-action="goto_age_tab" data-target="ages-70-74">Rates by Age 70-74</a>
			</div>
			<h2 class="rates-charts__title rates-charts__title--small-title heading-5">Average Cost of Life Insurance - How Much Does Term Insurance Cost?</h2>
			<div class="rates-charts__chart">
				<?=Yii::$app->Helpers->getImage(['class' => 'img-fluid', 'src' => '/v2/life-insurance/img/frame-46312.svg', 'alt' => 'average cost of life insurance', 'from_cdn' => true, 'lazyload' => true]);?>
			</div>

			<div class="rates-charts__footer">
				<p class="rates-charts__text-content">Term insurance can cost as low as $10 per month or as high as $500+ per month depending on age, term length, coverage amount, and overall health. The charts below provide average rates for a 50-year old man in good health.</p>
				<p class="rates-charts__text-content">It is important to note that once you buy a term life policy, the rates do not increase over the term period of the policy.</p>
				<div class="rates-charts__table">
					<table class="rates-table">
						<thead class="rates-table__head">
						<tr class="rates-table__row">
							<td class="rates-table__col fontBodyS">Term Life Coverage Amount</td>
							<td class="rates-table__col fontBodyS">Average Monthly Cost of a 10 Year Term Policy * </td>
						</tr>
						</thead>
						<tbody class="rates-table__body">
						<tr class="rates-table__row">
							<td class="rates-table__col fontBodyM">$100,000</td>
							<td class="rates-table__col fontBodyM">$18.22</td>
						</tr>
						<tr class="rates-table__row">
							<td class="rates-table__col fontBodyM">$250,000</td>
							<td class="rates-table__col fontBodyM">$36.55</td>
						</tr>
						<tr class="rates-table__row">
							<td class="rates-table__col fontBodyM">$500,000</td>
							<td class="rates-table__col fontBodyM">$57.36</td>
						</tr>
						<tr class="rates-table__row">
							<td class="rates-table__col fontBodyM">$1,000,000</td>
							<td class="rates-table__col fontBodyM">$108.72</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="rates-charts__banner">
					<p class="rates-charts__banner-text quote-s">* These life insurance rates are for a healthy 50-year-old male. An older male can expect higher rates. Use our comparison tool for a personalized quote.</p>
				</div>
			</div>
		</section>
	</div>
</div>

<div class="main-wrapp">
	<?=RateChartByAge::widget();?>
</div>

<div class="main-wrapp bg3 get-started-wrap">
	<div class="wrapp">
		<section class="get-started">
			<h1 class="get-started__title heading-2">Apply now</h1>
			<p class="get-started__subtitle fontBodyL">Our expert agents are standing by to help you find the right policy.<br>Call 888-407-0714 to speak with an agent now, or click the button to apply online.</p>
			<a href="../../../start-quote/" class="get-started__btn main-btn button-big">apply now</a>
		</section>
	</div>
</div>

<div class="main-wrapp bg1">
	<div class="wrapp">
		<section class="pricing-study">
			<h1 class="pricing-study__title  heading-2">Life Insurance Pricing Study</h1>
			<p class="pricing-study__text fontBodyM">In a recent study, we analyzed over 100,000 quotes that were requested on our website. The results are significant, but not surprising. The longer you wait to buy it, the more it will cost you in monthly premiums. But what is more surprising
				is that <b>60% of shoppers are waiting to get life insurance until after the age of 45.</b> This is the problem that we are working to solve. Helping to raise awareness on the importance of life insurance. If you have financial dependents,
				get some type of coverage in force. As you are about to find out, you get the most bang for your buck by buying it younger.</p>
			<p class="pricing-study__text fontBodyM">As part of our research, we asked nearly 4,000 people to guess their price. The results were surprising. Of the group, 94% of the answers came nowhere close to the actual price of life insurance. Our research shows that Americans have
				no idea how much term life insurance should cost.</p>

			<div class="pricing-study__chart pricing-study-chart">
				<div class="pricing-study-chart__title tags">After 3,953 guesses <span class="color-y">16%</span> guessed too high, <span class="color-g">78%</span> guessed too low, and <span class="color-o">6%</span> guessed correctly.</div>
				<div class="pricing-study-chart__body">
					<div class="pricing-study-chart__col">
						<?=Yii::$app->Helpers->getImage(['class' => 'img-fluid', 'src' => '/v2/life-insurance/img/c-chart.svg', 'alt' => 'Life Insurance Pricing Study', 'from_cdn' => true, 'lazyload' => true]);?>
					</div>
					<div class="pricing-study-chart__col">
						<ul class="pricing-study-chart__list">
							<li class="pricing-study-chart__list-item fontBodyS y">16% of participants that guessed too high</li>
							<li class="pricing-study-chart__list-item fontBodyS g">78% of participants that guessed too low</li>
							<li class="pricing-study-chart__list-item fontBodyS o">6% of participants that guessed correctly</li>
						</ul>
					</div>
				</div>
			</div>

			<h2 class="pricing-study__subtitle heading-5 pricing-study__subtitle--hide">Life Insurance Rates Increase By Age</h2>

			<ul class="pricing-study__list">
				<li class="pricing-study__list-item fontBodyM">The average cost increases by <b class="color-o">22%</b> from age <b>20</b> to age <b>30</b></li>
				<li class="pricing-study__list-item fontBodyM">The average cost increases by <b class="color-o">22%</b> from age <b>30</b> to age <b>40</b></li>
				<li class="pricing-study__list-item fontBodyM">The average cost increases by <b class="color-o">22%</b> from age <b>40</b> to age <b>50</b></li>
				<li class="pricing-study__list-item fontBodyM">The average cost increases by <b class="color-o">22%</b> from age <b>50</b> to age <b>60</b></li>
				<li class="pricing-study__list-item fontBodyM">The average cost increases by <b class="color-o">22%</b> from age <b>30</b> to age <b>50</b></li>
			</ul>
			<h2 class="pricing-study__subtitle heading-5">Overall Price Increases Ages 20 -70</h2>
			<p class="pricing-study__text fontBodyM pricing-study__text--hide">The data shows that the price increases with age.</p>

			<div class="pricing-study__graph">
				<?=Yii::$app->Helpers->getImage(['class' => 'img-fluid', 'src' => '/v2/life-insurance/img/frame-46362.svg', 'alt' => 'Overall Price Increases Ages 20 -70', 'from_cdn' => true, 'lazyload' => true]);?>
			</div>

			<p class="pricing-study__text fontBodyM">An important thing to note is that this is for monthly premiums. The total cost of a life insurance policy bought at age 30 vs age 45 could end up being the same if you are in perfect health. This is because as you age your needs decrease
				(both term length and coverage amount). You'll be paying a higher rate but for a lesser amount of time.</p>
			<p class="pricing-study__text fontBodyM">The reason we show the prices in monthly premiums is that most people do their budgets on a monthly basis. Cash in, cash out. If your income increases along this same curve you won't feel a squeeze. If it doesn't, you will certainly be
				feeling it when you go to buy coverage later in life.</p>
		</section>
	</div>
</div>

<div class="main-wrapp">
	<div class="wrapp">
		<section class="listen-us">
			<h1 class="listen-us__title heading-2">Why Should You Listen to Us?</h1>
			<p class="listen-us__info fontBodyL"><b>NoExam.com</b> has been in business since 2013. As a small business, we have helped 10,000 families purchase life insurance. We have <b>over 1,000 verified 3rd party reviews</b> and maintain a score of 4.8 out of 5. Our philosophy is
				to go above and beyond without any expectation for something in return.</p>
			<h2 class="listen-us__subtitle heading-5">How Are Life Insurance Rates Calculated?</h2>
			<div class="listen-us__card card card-red quote-s">
				Rates are calculated by factoring in an applicant’s age, gender, height, weight, and overall health.
			</div>
			<div class="listen-us__text fontBodyM">
				The rate charts on this page represent the starting point. Age, gender, height, and weight are used to determine the rate class. Rate classes are typically labeled as:
				<ul style="list-style: circle; padding: 30px 0 30px 40px;">
					<li>Preferred Plus </li>
					<li>Preferred</li>
					<li>Standard</li>
					<li>Rated</li>
				</ul>
				After using the quote calculator listed above, when an acceptable quote is offered, users can click "apply" to begin their application. Once the application begins, the applicant will need to answer some health questions to determine health classification.
				These questions involve family history and any current or past medical conditions. Having a medical condition like high blood pressure can move you to the next health class. A family history of heart disease or cancer before the age
				of 60 can also affect an applicant’s class.
			</div>

			<h2 class="listen-us__subtitle heading-5">Term Life Insurance Calculator</h2>
			<div class="listen-us__card card card-green quote-s">
				Use the term coverage calculator to <span>determine how much coverage to get</span>. A good rule of thumb is to have at least seven to 10 times the annual income of the household’s main financial provider in life insurance coverage.
			</div>
			<div class="listen-us__text fontBodyM">
				The answer to the question of how much coverage varies and is based on many factors. When determining the amount of coverage, consider the size of the applicant’s family, as well as their future needs, such as college tuition or wedding expenses. Also
				to be considered are any debts, <b>such as a mortgage.</b> Adding all these expenses up will give an idea of how much life insurance that family will need. It's not uncommon to need a <b>$1,000,000 life insurance policy.</b>
			</div>

			<h2 class="listen-us__subtitle heading-5">Choosing a Life Insurance Term Length</h2>
			<div class="listen-us__card card card-green quote-s">
				The right term length is one that provides coverage while it is needed most. A 30-year term will provide the best value but may not be the right option, given the situation.
			</div>
			<div class="listen-us__text fontBodyM" style="margin-bottom: 25px;"> When choosing a term length, consider your age and insurance needs. A 30-year policy term makes more sense if it is affordable. This is because the older an applicant gets, the more expensive a life insurance policy is. A 30-year term
				policy at age 40 is cheaper than a 20-year term policy at age 50. Most importantly, the policy must meet the needs of the insured and be affordable.</div>
			<div class="listen-us__text fontBodyM">Whole life insurance, on the other hand, specifically its cash value component, is confusing to many people. It is also more expensive, which is why we almost always recommend term life insurance.</div>

		</section>
	</div>
</div>

<div class="main-wrapp bg1">
	<div class="wrapp">
		<section class="charts-by-age">
			<h2 class="charts-by-age__title heading-2">Life Insurance Rate</br> Charts by Age</h2>
			<?=RateCalcForm2::widget(['autoload' => 'ajax', 'autoscroll' => 0, 'title' => 'Compare Life Insurance Rates by Age']);?>
		</section>
	</div>
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://www.noexam.com/life-insurance/term/rates/"
  },
  "headline": "See Life Insurance Rates for Your Age",
  "description": "See how much life insurance costs for someone your age.",
  "image": "https://www.noexam.com/img/rate-increase.png",  
  "author": {
    "@type": "Person",
    "name": "Jonathan Fritz"
  },  
  "publisher": {
    "@type": "Organization",
    "name": "NoExam.com",
    "logo": {
      "@type": "ImageObject",
      "url": "https://www.noexam.com/img/no-exam-logo.svg"
    }
  },
  "datePublished": "2020-09-16",
  "dateModified": "2020-09-16"
}
</script>