<?php

use app\assets\AppAsset;
use app\components\BreadcrumbsNew;
use app\widgets\Author;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\View;
use app\widgets\ApplyNowForm;
use app\widgets\RateCalcForm2;
use app\widgets\CompanyRating;


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

$this->registerCssFile('@web/v2/common/css/get-started.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/questions.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/life-insurance/css/top-companies-v1.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/life-insurance/css/top-companies-v2.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/life-insurance/js/top-companies.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/'];
#$this->params['breadcrumbs'][] = ['label' => 'Term Life Insurance', 'url' => '/life-insurance/term/'];
$this->params['breadcrumbs'][] = ['label' => 'Top 8 Life Insurance Companies', 'url' => $this->context->current_cat->url, 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];
#$this->params['breadcrumbs'][] = $this->context->current_cat->title;


?>
<div class="main-wrapp get-started-wrap-mirrored">
	<div class="wrapp">
		<section class="get-started">
			<h1 class="get-started__title heading-2">Top 8 life insurance companies for 2019</h1>
			<p class="get-started__subtitle fontBodyL">Our best life insurance companies based on research.</p>
			<span class="get-started__date">august 2, 2021</span>
			<div class="fs-advice__col" data-toggle="popover">
				<a class="get-started__link"
				   role="button"
				   tabindex="-1"
				   data-content="NoExam.com may receive compensation when visitors click on and/or apply to life insurance offers featured on NoExam.com.">Advertiser Disclosure
				</a>
			</div>
		</section>
	</div>
</div>

<div class="main-wrapp" style="background-color: #FCF9F3;">
	<div class="wrapp">
		<div class="top-companies-v1">
			<h1 class="top-companies-v1__title heading-5">Top 8 Life Insurance Companies - Get Multiple Quotes for the Best Price</h1>

			<div class="top-companies-v1__box">
				<span class="top-companies-v1__box-label fontBodyM">Are you over the age of 55?</span>
				<div class="top-companies-v1__box-switch">
					yes/no**
				</div>
			</div>

			<div class="top-companies-v2__body">
				
				<div class="top-companies-v2__row" data-weight="1" data-peoples-count="95" data-company-name="Legal & General">
					<div class="top-companies-v2__card company-card-v2">
						<div class="top-companies-v2-card__col">
							<?=CompanyRating::widget(['logo_url' => '/img/company_logos/logo_legal_general2.png', 'logo_alt' => 'Legal & General', 'reviews' => 129, 'rating' => 4.8]);?>
						</div>
						<div class="top-companies-v2-card__col">
							<div class="company-card__company-name heading-6">Legal and General Life Insurance</div>
							<ul class="company-card__list">
								<li class="company-card__list-item fontBodyM">Competitive Term Life Prices</li>
								<li class="company-card__list-item fontBodyM">High Acceptance Rate</li>
								<li class="company-card__list-item fontBodyM">5th Largest Term Life Provider</li>
							</ul>
						</div>
						<div class="top-companies-v2-card__col">
							<a href="/out/quotes-2.php" class="company-card__link button-small main-btn">Get Rates</a>
							<div class="top-companies-v2-card__order">1</div>
						</div>
					</div>
				</div>
				
				<div class="top-companies-v2__row" data-weight="2" data-peoples-count="87" data-company-name="Prudential">
					<div class="top-companies-v2__card company-card-v2">
						<div class="top-companies-v2-card__col">
							<?=CompanyRating::widget(['logo_url' => '/img/company_logos/logo_prudential2.png', 'logo_alt' => 'Prudential', 'reviews' => 121, 'rating' => 4.7]);?>
						</div>
						<div class="top-companies-v2-card__col">
							<div class="company-card__company-name heading-6">Prudential Life Insurance</div>
							<ul class="company-card__list">
								<li class="company-card__list-item fontBodyM">Lenient Underwriting</li>
								<li class="company-card__list-item fontBodyM">Good for Seniors</li>
								<li class="company-card__list-item fontBodyM">Competitive Tobacco Rates</li>
							</ul>
						</div>
						<div class="top-companies-v2-card__col">
							<a href="/out/quotes-2.php" class="company-card__link button-small main-btn">Get Rates</a>
							<div class="top-companies-v2-card__order">2</div>
						</div>
					</div>
				</div>
				
				<div class="top-companies-v2__row" data-weight="3" data-peoples-count="144" data-company-name="Mutual Omaha">
					<div class="top-companies-v2__card company-card-v2">
						<div class="top-companies-v2-card__col">
							<?=CompanyRating::widget(['logo_url' => '/img/company_logos/logo_mutual_omaha2.png', 'logo_alt' => 'Mutual Omaha', 'reviews' => 151, 'rating' => 4.7]);?>
						</div>
						<div class="top-companies-v2-card__col">
							<div class="company-card__company-name heading-6">Mutual of Omaha Life Insurance</div>
							<ul class="company-card__list">
								<li class="company-card__list-item fontBodyM">Best Product Selection</li>
								<li class="company-card__list-item fontBodyM">Strong Financial Ratings</li>
								<li class="company-card__list-item fontBodyM">Mutual Life Insurance Company</li>
							</ul>
						</div>
						<div class="top-companies-v2-card__col">
							<a href="/out/quotes-2.php" class="company-card__link button-small main-btn">Get Rates</a>
							<div class="top-companies-v2-card__order">3</div>
						</div>
					</div>
				</div>
				
				<div class="top-companies-v2__row" data-weight="4" data-peoples-count="203" data-company-name="AIG">
					<div class="top-companies-v2__card company-card-v2">
						<div class="top-companies-v2-card__col">
							<?=CompanyRating::widget(['logo_url' => '/img/company_logos/logo_aig2.png', 'logo_alt' => 'AIG', 'reviews' => 151, 'rating' => 4.7]);?>
						</div>
						<div class="top-companies-v2-card__col">
							<div class="company-card__company-name heading-6">AIG Life Insurance</div>
							<ul class="company-card__list">
								<li class="company-card__list-item fontBodyM">Strong Financial Ratings</li>
								<li class="company-card__list-item fontBodyM">Wide Selection of Products</li>
								<li class="company-card__list-item fontBodyM">Online Application</li>
							</ul>
						</div>
						<div class="top-companies-v2-card__col">
							<a href="/out/aig.php" class="company-card__link button-small main-btn">Get Rates</a>
							<div class="top-companies-v2-card__order">4</div>
						</div>
					</div>
				</div>
				
				<div class="top-companies-v2__row" data-weight="5" data-peoples-count="137" data-company-name="Bestow Life">
					<div class="top-companies-v2__card company-card-v2">
						<div class="top-companies-v2-card__col">
							<?=CompanyRating::widget(['logo_url' => '/img/bestow.svg', 'logo_alt' => 'Bestow Life', 'reviews' => 151, 'rating' => 4.7]);?>
						</div>
						<div class="top-companies-v2-card__col">
							<div class="company-card__company-name heading-6">Bestow Life Insurance</div>
							<ul class="company-card__list">
								<li class="company-card__list-item fontBodyM">Age 21 to 55 Only</li>
								<li class="company-card__list-item fontBodyM">Short Terms</li>
								<li class="company-card__list-item fontBodyM">Quick Application and Decision</li>
							</ul>
						</div>
						<div class="top-companies-v2-card__col">
							<a href="/out/bestow-2.php" class="company-card__link button-small main-btn">Get Rates</a>
							<div class="top-companies-v2-card__order">5</div>
						</div>
					</div>
				</div>
				
				<div class="top-companies-v2__row" data-weight="6" data-peoples-count="112" data-company-name="Ladder Life">
					<div class="top-companies-v2__card company-card-v2">
						<div class="top-companies-v2-card__col">
							<?=CompanyRating::widget(['logo_url' => '/img/company_logos/logo_ladder.png', 'logo_alt' => 'Ladder Life', 'reviews' => 151, 'rating' => 4.7]);?>
						</div>
						<div class="top-companies-v2-card__col">
							<div class="company-card__company-name heading-6">Ladder Life Insurance</div>
							<ul class="company-card__list">
								<li class="company-card__list-item fontBodyM">Adjustable Coverage Amount</li>
								<li class="company-card__list-item fontBodyM">Low Prices</li>
								<li class="company-card__list-item fontBodyM">Fast Online Application</li>
							</ul>
						</div>
						<div class="top-companies-v2-card__col">
							<a href="/out/ladder-2.php" class="company-card__link button-small main-btn">Get Rates</a>
							<div class="top-companies-v2-card__order">6</div>
						</div>
					</div>
				</div>
				
				<div class="top-companies-v2__row" data-weight="7" data-peoples-count="189" data-company-name="Haven Life">
					<div class="top-companies-v2__card company-card-v2">
						<div class="top-companies-v2-card__col">
							<?=CompanyRating::widget(['logo_url' => '/img/company_logos/logo_haven_life3.png', 'logo_alt' => 'Haven Life', 'reviews' => 151, 'rating' => 4.7]);?>
						</div>
						<div class="top-companies-v2-card__col">
							<div class="company-card__company-name heading-6">Haven Life Insurance</div>
							<ul class="company-card__list">
								<li class="company-card__list-item fontBodyM">Competitive Prices</li>
								<li class="company-card__list-item fontBodyM">Online Application</li>
								<li class="company-card__list-item fontBodyM">Fast Decision & No Exam</li>
							</ul>
						</div>
						<div class="top-companies-v2-card__col">
							<a href="/out/haven-2.php" class="company-card__link button-small main-btn">Get Rates</a>
							<div class="top-companies-v2-card__order">7</div>
						</div>
					</div>
				</div>
				
				<div class="top-companies-v2__row" data-weight="8" data-peoples-count="122" data-company-name="Health IQ">
					<div class="top-companies-v2__card company-card-v2">
						<div class="top-companies-v2-card__col">
							<?=CompanyRating::widget(['logo_url' => '/img/company_logos/logo_health_iq2.png', 'logo_alt' => 'Health IQ', 'reviews' => 151, 'rating' => 4.7]);?>
						</div>
						<div class="top-companies-v2-card__col">
							<div class="company-card__company-name heading-6">Health IQ Life Insurance</div>
							<ul class="company-card__list">
								<li class="company-card__list-item fontBodyM">Best for Active People</li>
								<li class="company-card__list-item fontBodyM">Cheaper Rates if You Exercise Often</li>
								<li class="company-card__list-item fontBodyM">Online Application</li>
							</ul>
						</div>
						<div class="top-companies-v2-card__col">
							<a href="/out/health-iq-2.php" class="company-card__link button-small main-btn">Get Rates</a>
							<div class="top-companies-v2-card__order">8</div>
						</div>
					</div>
				</div>
				
			</div>

		</div>
	</div>
</div>

<?=$this->render('../../../pages/sections/home/faqs.php', ['faq_items' => $faq_items]);?>
