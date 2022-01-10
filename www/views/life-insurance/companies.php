<?php

use app\assets\AppAsset;
use app\components\BreadcrumbsNew;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Url;
use app\widgets\Author;
use app\widgets\GetQuote;
use app\widgets\RateFormModal;
use yii\web\JqueryAsset;

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

$this->registerCssFile('@web/v2/life-insurance/css/best-companies.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/main-first-screen.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/life-insurance/js/best-companies.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/', 'class' => 'breadcrumbs__link tags'];
$this->params['breadcrumbs'][] = ['label' => 'Best Companies', 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];
#$this->params['breadcrumbs'][] = ['label' => 'Best Companies', 'url' => $this->context->current_cat->url, 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];
#$this->params['breadcrumbs'][] = ['label' => 'Life Insurance Companies', 'url' => '/life-insurance/companies/'];
#$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>

<div class="main-wrapp bg1">
	<div class="wrapp">
		<section class="best-companies">
			<div class="best-companies__nav breadcrumbs">
				<?=BreadcrumbsNew::widget(['links' => $this->params['breadcrumbs']]);?>
			</div>
			<div class="best-companies__first-screen main-first-screen">
				<div class="main-first-screen__top-title sub-title-2">top insurance companies</div>
				<h1 class="main-first-screen__title heading-0">Find the Best Life Insurance Company</h1>
				<div class="main-first-screen__subtitle fontBodyM">Filter life insurance companies by their financial ratings, products offered, and approval time.</div>
				<div class="main-first-screen__advice">
					<?=Author::widget(['db_time' => $this->context->current_cat->updated, 'file_time' => filemtime(__FILE__)]);?>
					<div class="fs-advice__body">
						<p class="fs-advice__text fontBodyM">Shopping for life insurance can be overwhelming. There are dozens of companies to choose from. This comparison shopping tool presents the top 10 best life insurance companies. With just a few clicks you can compare the best
							companies based on price, financial strength, products offered, and more.</p>
						<p class="fs-advice__text fontBodyM">Some of the life insurance companies on this page pay NoExam.com a commission if you decide to apply through us. We also include companies that we have no affiliation with whatsoever. Our goal is to provide shoppers with an
							unbiased list of the top-rated life insurance companies.</p>
					</div>
				</div>
			</div>
			<div class="best-companies__list-body">
				<?=$this->render('/main/partials/companies/short-links-list.php', ['dataProviderBest' => $dataProviderBest]);?>
			</div>
		</section>
	</div>
</div>

<div class="main-wrapp bg1">
	<div class="wrapp">
		<div class="loader fixed"></div>
		<div id="js_best_results" class="companies-list">
			<?=$this->render('/main/partials/companies/best-items.php', ['dataProviderBest' => $dataProviderBest]);?>
		</div>
	</div>
</div>

<div class="main-wrapp">
	<div class="wrapp">
		<section class="choose-company">
			<h1 class="choose-company__title heading-2">How to Choose a Life Insurance<br> Company</h1>
			<div class="choose-company__box">
				<h2 class="choose-company__subtitle"></h2>
				<p class="choose-company__text fontBodyM">NoExam.com has been in business since 2013. As a small business, we have helped over 10,000 families purchase life insurance. We have <b>over 1,000 verified 3rd party reviews</b> and maintain a score of 4.8 out of 5.</p>
				<p class="choose-company__text fontBodyM">Our philosophy is to go above and beyond without any expectation for something in return.</p>
			</div>
			<div class="choose-company__box">
				<h2 class="choose-company__subtitle heading-5">Our Company Ratings Explained</h2>
				<p class="choose-company__text fontBodyM">Our rating formula relies on financial data, product offering, underwriting time, history, and consumer complaints. We update our data in the 4th quarter of each year when new financial reports are released. Financial strength is a
					key component of our ratings, as it is the most important factor to consider when choosing a life insurance company. We put in many hours of analysis to have our list of the top 10 life insurance companies be free from bias.</p>
			</div>
			<div class="choose-company__box">
				<h2 class="choose-company__subtitle heading-5">Types of Coverage</h2>
				<p class="choose-company__text fontBodyM">There are two main types of life insurance you can buy. The most popular choice is term life insurance, which gives you coverage for a set number of years. The other type is permanent life insurance, also called whole life, which provides
					coverage for your entire life as long as premiums are paid.</p>
				<p class="choose-company__text fontBodyM">In terms of value, term life insurance is hard to beat. The monthly premiums are low and the coverage amounts are high. but has other features that term lacks, such as the cash value component. To learn more about the difference between
					term and whole life, see our article on <b>term vs whole life insurance.</b></p>
			</div>
			<div class="choose-company__box">
				<h2 class="choose-company__subtitle heading-5">Types of Coverage</h2>
				<p class="choose-company__text fontBodyM">When buying an insurance product that may be needed 20+ years from now, you want to be certain that the company will be able to pay the claim. To address this very concern, many 3rd party rating agencies grade the financial strength
					of insurance companies. There are several that you will see reporting grades for insurance companies:</p>
				<ul class="choose-company__list fontBodyM">
					<li><b>AM Best</b></li>
					<li>Moody’s</li>
					<li>Standard & Poors</li>
					<li>Fitch</li>
				</ul>
				<p class="choose-company__text fontBodyM">Each rating agency has a different way of assessing and reporting the financial strength of an insurance company. Generally, the companies are rated as a report card. You’ll see that the high ratings are A’s and the low ratings are
					B or C. We advise shoppers to choose a company with high financial ratings. The reasoning behind this is simple, life insurance is meant to be a safety net for your family. The net is only as strong as the insurance company’s ability
					to pay its claims. The rating agencies determine their ratings by analyzing data like:</p>
				<ul class="choose-company__list fontBodyM">
					<li>The Annual amount of premiums collected</li>
					<li>The Annual amount of claims paid</li>
					<li>Total reserves and assets</li>
					<li>Cash flow</li>
					<li>Return on investments</li>
					<li>Potential risks in the short-term and long-term.</li>
				</ul>

				<p class="choose-company__text fontBodyM">A good rule of thumb is to choose a company that has the letter “A” in its ratings and to avoid the companies that do not.</p>

				<div class="choose-company__chart text-center">
					<?=Yii::$app->Helpers->getImage(['class' => 'img-fluid', 'src' => '/v2/life-insurance/img/image-2828.jpg', 'alt' => 'average cost of life insurance', 'from_cdn' => true, 'lazyload' => true]);?>
				</div>

				<div class="choose-company__box">
					<h2 class="choose-company__subtitle heading-5">Underwriting Time</h2>
					<p class="choose-company__text fontBodyM">Underwriting is the process of the insurance company processing your application and issuing a decision. Underwriting time can vary widely from company to company and even from product to product. We are living in a time where
						technology is making life insurance easier to purchase, and one of the areas to recently improve in life insurance is underwriting time.</p>
					<p class="choose-company__text fontBodyM">The standard process of buying life insurance takes 4-6 weeks. This is how long it takes from start to finish. You submit your application, the health exam is scheduled, and then you take the exam and wait for a decision.</p>
					<p class="choose-company__text fontBodyM">Many companies now offer accelerated underwriting, which means that certain applicants can breeze through the process without needing to take an exam. Some companies offer products that do not require the exam at all. This is referred
						to as simplified issue life insurance. These policies generally get issued in under a week. This is possible because the insurance company can look at digital records such as your prescription report, driving record, and MIB
						record.
					</p>
					<p class="choose-company__text fontBodyM">One important thing to keep in mind when applying for life insurance that advertises an instant decision is what happens if you get declined. The <b>instant issue policies</b> have very strict requirements, and they are quick to
						decline an applicant. When you go to apply for a different policy, you now have to disclose that you applied somewhere else and were declined. This can affect their decision on your application.</p>
				</div>
				<div class="choose-company__box">
					<h2 class="choose-company__subtitle heading-5">Company Size</h2>
					<p class="choose-company__text fontBodyM">The size of the life insurance company can tell you a few things about the organization. A company with 10,000+ employees likely has a very high financial rating, offers many products, and is a stable choice. However, some people
						do not like dealing with large companies when it comes to customer service. You could end up with long hold times and a lack of personal service. You may like working with a financially strong, specialty life insurance company
						with just a few hundred employees.</p>
				</div>
				<div class="choose-company__box">
					<h2 class="choose-company__subtitle heading-5">Company Age</h2>
					<p class="choose-company__text fontBodyM">Why should the age of a life insurance company matter to you? The <b>average lifespan of a male and female in the US is around 80.</b> If you bought life insurance in your forties, it's important to know the company you are putting
						your business with has a positive financial outlook and will have the ability to pay claims years down the road. </p>
					<p class="choose-company__text fontBodyM">We factor in age as part of our criteria. After all, if a company has made it through the great depression, ww1,ww2, and the great recession, all while being able to make good on their commitment to their policyholders, we think
						that's worth something. </p>
					<p class="choose-company__text fontBodyM">It should come as no surprise that companies that are the oldest often have more assets under management. The assets each life insurance company accumulates throughout its time in business serve as a shield of financial strength
						and backing for its policyholders. A mature insurance company with a diverse portfolio is a key indicator that a company is well-positioned to be in business for years to come.</p>
				</div>
				<div class="choose-company__box">
					<h2 class="choose-company__subtitle heading-5">State Availability</h2>
					<p class="choose-company__text fontBodyM">Each state in the US has a department of insurance, and each company has to maintain a license in an individual state. Because of this, some companies do not sell their insurance products in certain states. To save time, be sure
						to select your state in the filter to make sure you don’t choose a company that isn’t available to you.</p>
					<p class="choose-company__text fontBodyM">You are not required to work with an agent or company in your state. Many people seem to think they need to find a life insurance company near them to buy. Life insurance can be bought online and over the phone without needing
						to find a local agent. Of course, you are welcome to work with a local agent should you prefer to do so.</p>
				</div>

				<div class="choose-company__box">
					<h2 class="choose-company__subtitle heading-5">Ways to Buy</h2>
					<h3 class="choose-company__subtitle-small heading-6">Online</h3>
					<p class="choose-company__text fontBodyM">Even the century-old life insurance industry has caught on to the fact the consumer expectations are changing. 98% of consumers say they would use the internet to research a product before buying. If you are one in that group that
						seeks a user-friendly buying process, we have you covered.</p>
				</div>

				<div class="choose-company__box">
					<h3 class="choose-company__subtitle-small heading-6">Phone</h3>
					<p class="choose-company__text fontBodyM">While most prefer to research online, we have found that some consumers still desire the assistance of a licensed agent. With the amount of information life insurance companies require, it can feel reassuring to hear a voice on
						the other line before submitting your information.</p>
				</div>

				<div class="choose-company__box">
					<h3 class="choose-company__subtitle-small heading-6">In-Person - Agent</h3>
					<p class="choose-company__text fontBodyM">Whether you buy online, via phone, or in person, you are always buying from a <b>licensed life insurance agent.</b> How you go about purchasing, receiving customer support, and maintaining your life insurance policy is your choice.
						If you choose to buy from a local life insurance agent that's in your network, we can help point you in the right direction. </p>
				</div>

				<div class="choose-company__box">
					<h2 class="choose-company__subtitle heading-5">Customer Complaints</h2>
					<p class="choose-company__text fontBodyM">When looking at complaints on a company, you have to take this data with a grain of salt. Most complaints stem from billing errors and customer service. Rarely does a life insurance company not pay a claim. When conducting research,
						we analyzed the annual reports of over 50 companies. We looked at the percentage of claims that were contested and why they were contested. Overall we found it to be a very small percentage, and the most common reason claims
						are contested is due to material misrepresentation. Material misrepresentation is a fancy term for lying on the application. If you are looking for the best life insurance company that will payout, just be sure to answer the
						questions on the application truthfully, and select a company with strong financial ratings.</p>
					<p class="choose-company__text fontBodyM">A good place to look at reviews of a life insurance company is the Better Business Bureau. However, remember that the BBB is a complaint board. It is easy to get a feeling that a company is bad by looking at their BBB page and
						seeing hundreds of complaints. Remember to consider how many customers an insurance company and that 100 complaints may be a very small fraction of their total customers.</p>
					<p class="choose-company__text fontBodyM">Another good place to start is the NAIC. They have a public-facing tool that allows you to look up complaint data on insurance companies. However, the reason for these complaints can be about marketing & sales and have nothing
						to do with customer service or paying claims.</p>
				</div>

				<div class="choose-company__box">
					<h2 class="choose-company__subtitle heading-5">Price</h2>
					<p class="choose-company__text fontBodyM">As a budget-minded shopper, price is always going to play a role in any purchase decision. We see life insurance shoppers looking for the cheapest prices every day. Before you go jumping on the lowest price you see, there are a
						few key things to consider.</p>
					<ul class="choose-company__list fontBodyM">
						<li>The best life insurance company is the one with the highest rating that will underwrite you favorably. This means the best financial ratings and the best price given your current health.</li>
					</ul>
					<p class="choose-company__text fontBodyM">Every insurance company has different rules for how they price policies. For example, if you are in the 50% of Americans that have used at least one prescription drug in the last 30 days, your price can vary from company to company.
						If you are overweight, you will also see that your price can vary from company to company. These are quick examples, but you can imagine how complex it can get when you are factoring in your health history, medications, and
						family history.</p>
					<p class="choose-company__text fontBodyM">Some life insurance companies quote people low rates, and once the underwriting is complete they determine they do not qualify for the initial rates. The industry refers to this as a “bait and switch”. This is something to keep
						in mind when you see a life insurance rate that is much lower than the other quotes.</p>
				</div>
			</div>
		</section>
	</div>
</div>

<div id="js_rate_from_modal" class="rate-from-modal">
	<?=RateFormModal::widget();?>
</div>
