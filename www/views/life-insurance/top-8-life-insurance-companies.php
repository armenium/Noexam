<?php

use app\assets\AppAsset;
use app\components\BreadcrumbsNew;
use app\widgets\Author;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\View;
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
$this->registerCssFile('@web/v2/common/css/toggle-btn.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/life-insurance/css/top-companies-v1.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/life-insurance/css/top-companies-v2.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/plugins/js/tinysort.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/plugins/js/jquery.tinysort.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
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
				<div class="button b2" id="button-10">
					<input type="checkbox" class="checkbox" name="sorting" data-trigger="js_action_click" data-action="sort_companies" data-target="sorting_list" data-prevent-default="false">
					<div class="knobs">
						<span class="button-small">YES</span>
					</div>
					<div class="layer"></div>
				</div>
			</div>

			<div id="sorting_list" class="top-companies-v2__body position-relative">
				
				<div class="item top-companies-v2__row" data-weight="1" data-peoples-count="95" data-company-name="Legal & General">
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
				
				<div class="item top-companies-v2__row" data-weight="2" data-peoples-count="87" data-company-name="Prudential">
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
				
				<div class="item top-companies-v2__row" data-weight="3" data-peoples-count="144" data-company-name="Mutual Omaha">
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
				
				<div class="item top-companies-v2__row" data-weight="4" data-peoples-count="203" data-company-name="AIG">
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
				
				<div class="item top-companies-v2__row" data-weight="5" data-peoples-count="137" data-company-name="Bestow Life">
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
				
				<div class="item top-companies-v2__row" data-weight="6" data-peoples-count="112" data-company-name="Ladder Life">
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
				
				<div class="item top-companies-v2__row" data-weight="7" data-peoples-count="189" data-company-name="Haven Life">
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
				
				<div class="item top-companies-v2__row" data-weight="8" data-peoples-count="122" data-company-name="Health IQ">
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

<div class="main-wrapp" style="background-color: #FFFFFF;">
	<div class="wrapp">
		<div class="top-companies-v1__content">
			<section class="top-companies-v1-content">
				<h5 class="top-companies-v1-content__title heading-5">Best For No Medical Exam & Fast 100% Online Application: Bestow</h5>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					If you’re looking for quick life insurance coverage that doesn’t require a medical exam, Bestow might be the right choice for you.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					<b>Bestow offers quotes in just seconds</b> and coverage can be purchased in minutes, if approved. They never require a medical exam, which means no needles and no waiting. Term life insurance policies are offered in every state
					except New York, with coverage all the way up to $1,500,000.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					You can purchase life insurance offered by Bestow as long as you are between the ages of 18 and 59½. The 20-year term policy is only available to applicants under 45 years-old, however.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					For added peace of mind, <b>Bestow offers a free 30-day look period.</b> This means that if you decide the policy isn’t right for you, you can get a full refund of your premiums as long as you cancel within the first 30 days of
					purchasing. Bestow also offers a 60-day grace period, if you ever have trouble making your premium payments.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					Quick facts about policies offered by Bestow:
				</p>
				<ul class="top-companies-v1-content__list">
					<li class="top-companies-v1-content__list-item fontBodyM">No medical exam required, ever</li>
					<li class="top-companies-v1-content__list-item fontBodyM">Get quotes 100% online in seconds and a decision in as a little as 5 minutes</li>
					<li class="top-companies-v1-content__list-item fontBodyM">Purchase coverage from $50,000 to $1,500,000</li>
					<li class="top-companies-v1-content__list-item fontBodyM">Choose from 10- and 20-year term policies</li>
					<li class="top-companies-v1-content__list-item fontBodyM">Coverage available in 49 states (New York excluded)</li>
					<li class="top-companies-v1-content__list-item fontBodyM">Policies provided by A+ (Superior) rated carrier</li>
				</ul>
			</section>

			<section class="top-companies-v1-content">
				<h5 class="top-companies-v1-content__title heading-5">Most Flexible Life Insurance: Ladder</h5>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					Buying life insurance can be a decades-long commitment. Considering that your financial needs may change over time, though, it makes sense that you should be able to change your life insurance coverage as well.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					With Ladder, you are able to decrease your coverage at any time through the online platform. Whether you pay down your mortgage, your kids become adults, or your household debt is eliminated, you can easily lower your coverage (and premiums) with just
					a few clicks.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					If you decide later on that you actually need more coverage — up to a maximum of $8,000,000 — you can apply for additional coverage. This makes Ladder incredibly unique in the life insurance world, and a great option if you think there’s a chance that
					your needs will change over the years (in either direction).
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					Policies from Ladder are available in 10-, 15-, 20-, 25-, and 30-year terms, ranging from $100,000 to $8,000,000 in coverage. Coverage up to $3,000,000 is available 100% digitally from start to finish. You can apply for a policy as long as you’re between
					20 and 60 years of age. Keep in mind that your age plus term length cannot exceed 70.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					Ladder term life insurance policies are available in all 50 states, with their carrier partners, Allianz Life Insurance Company of North America and Allianz Life Insurance Company of New York insurer holding an A+ (Superior) ratings affirmed September
					2020 from AM Best. For the latest rating, access www.ambest.com¹.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					Quick facts about Ladder:
				</p>
				<ul class="top-companies-v1-content__list">
					<li class="top-companies-v1-content__list-item fontBodyM">Decrease or apply to increase as needed</li>
					<li class="top-companies-v1-content__list-item fontBodyM">Available in all 50 states</li>
					<li class="top-companies-v1-content__list-item fontBodyM">Up to $3,000,000 in coverage available 100% online and $8,000,000 in total coverage offered</li>
					<li class="top-companies-v1-content__list-item fontBodyM">Allianz Life Insurance Company of New York and Allianz Life Insurance Company of North America hold A+ (Superior) ratings from AM Best</li>
				</ul>
			</section>

			<section class="top-companies-v1-content">
				<h5 class="top-companies-v1-content__title heading-5">Best Rated For Financial Strength & Best Riders: Haven Life</h5>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					When buying life insurance, it’s important to pick a policy that can be customized to fit your personal needs while also providing you with peace of mind for years to come. Through Haven Life, you can check both of those boxes.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					Haven Life offers a number of rider options to choose from, so you can build the coverage that suits you best. One rider option is a waiver of premium (available in certain states), which means the insured won’t have to pay premiums if they are totally
					disabled due to illness or injury.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					The next is an accelerated death benefit, which allows the insured to collect a portion of their policy’s death benefit while still living, if they are diagnosed with a terminal illness. With guaranteed renewability, a policy can be renewed at the end
					of its term no matter what, even if the insured becomes ill.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					Lastly, Haven Life Plus is an add-on rider that offers the insured access to a variety of helpful benefits and services including MinuteClinic access, Aaptiv enrollment, and LifeSite storage.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					Haven Life term life insurance policies are available to applicants ages 18-64, for coverage up to $3,000,000 (only $1,000,000 if you’re 60-64). Products are offered in all 50 states and the District of Columbia, with all policies being backed by MassMutual,
					an A++ (Superior) rated insurer from AM Best.
				</p>
				<p class="top-companies-v1-content__paragraph fontBodyM">
					Quick facts about Haven Life:
				</p>
				<ul class="top-companies-v1-content__list">
					<li class="top-companies-v1-content__list-item fontBodyM">Available in all 50 states and DC</li>
					<li class="top-companies-v1-content__list-item fontBodyM">Up to $3,000,000 in coverage offered</li>
					<li class="top-companies-v1-content__list-item fontBodyM">InstantTerm gives immediate coverage (up to $1,000,000) for qualified applicants age 59 and under</li>
					<li class="top-companies-v1-content__list-item fontBodyM">Multiple riders to choose from</li>
					<li class="top-companies-v1-content__list-item fontBodyM">A++ (Superior) rating from AM Best</li>
				</ul>
			</section>
		</div>
	</div>
</div>

<?=$this->render('../pages/sections/home/faqs.php', ['faq_items' => $faq_items]);?>
