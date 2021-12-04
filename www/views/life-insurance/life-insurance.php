<?php

use app\assets\AppAsset;
use app\components\BreadcrumbsNew;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Url;
use app\widgets\Author;
use app\widgets\GetQuote;
use yii\web\JqueryAsset;

//VarDumper::dump($this->context->current_cat, 10, 1);

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

$this->registerCssFile('@web/v2/life-insurance/css/life-insurance.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/main-first-screen.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/life-insurance/js/life-insurance.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$this->params['breadcrumbs'][] = ['label' => $this->context->current_cat->title, 'url' => Url::toRoute('life-insurance/'), 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];
#$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>

<div class="main-wrapp" style="background-color: #FCF9F3;">
	<div class="wrapp">
		<section class="life-insurance">
			<div class="life-insurance__nav breadcrumbs">
				<?=BreadcrumbsNew::widget(['links' => $this->params['breadcrumbs']]);?>
			</div>
			<div class="life-insurance__first-screen main-first-screen">
				<h1 class="main-first-screen__title heading-0">Life Insurance</h1>
				<div class="main-first-screen__advice">
					<?=Author::widget(['db_time' => $this->context->current_cat->updated, 'file_time' => filemtime(__FILE__)]);?>
					<div class="fs-advice__body">
						<p class="fs-advice__text fontBodyM">The <b>2019 Insurance Barometer</b> published by LIMRA describes the current market as the best environment to purchase life insurance since the history of the study. However, most consumers are already worried enough about
							having money for retirement, let alone making room in their budget for life insurance. Still, considering their options to have financial protection in place for their families should they pass away, gives many people a
							sense of comfort. Though the study presents life insurance as one of the lesser-weighted priorities in the minds of Americans when it comes to financial planning, consumers who do seek out final expense options typically
							find an affordable and adequate policy after all.</p>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<div class="main-wrapp" style="background-color: #FCF9F3;">
	<div class="wrapp">
		<?=GetQuote::widget();?>
	</div>
</div>

<div class="main-wrapp" style="background-color: #FCF9F3;">
	<div class="wrapp">
		<article class="article">
			<div class="article__box">
				<h1 class="article__title heading-5">Life Insurance</h1>
				<p class="article__paragraph fontBodyM">The following guide is designed to be an informative breakdown of life insurance, presenting a better understanding of the types of policies and coverage options available. Once you read this guide, you should feel confident in making
					decisions regarding coverage options, and policy choices in general, according to you and your family’s unique needs. As you read, look for TIPS (“Tricky Insurance Principles Simplified”) throughout the guide that offer helpful
					summaries and suggestions.</p>
				<div class="article__card card card-red quote-s ">
					Sara is a 28-year-old stay-at-home mom to a three-year-old. Her husband has a policy through work, but they worry about the financial strain on the family should Sara pass away while their daughter is still young. Sara decides to take out a 20-year term
					life policy that will provide coverage until her daughter graduates college. Thus, her family will only receive money from her policy if she dies before age 48.
				</div>
			</div>
			<h2 class="article__chapter-title heading-5">I. A Layman’s Guide to Deciphering Life Insurance</h2>
			<div class="article__box">
				<h3 class="article__subtitle heading-6">Should I Get Life Insurance?</h3>
				<p class="article__paragraph fontBodyM">If you are reading this guide, you have already thought about this question. The answer is yes; most adults need some type of policy. There are, however, a few exceptions to the rule. People who do not need life insurance coverage
					are those with no financial dependents.</p>
				<div class="article__card card card-green quote-s ">
					Sara is a 28-year-old stay-at-home mom to a three-year-old. Her husband has a policy through work, but they worry about the financial strain on the family should Sara pass away while their daughter is still young. Sara decides to take out a 20-year term
					life policy that will provide coverage until her daughter graduates college. Thus, her family will only receive money from her policy if she dies before age 48.
				</div>
				<p class="article__paragraph fontBodyM">TIPS – Remember, if you have anyone depending on your income (your spouse, children, siblings, aging parents, etc.), and you are not independently wealthy, you need some form of coverage.</p>
			</div>
			<div class="article__btn button-small" onclick="">Back to top</div>
		</article>
	</div>
</div>

<div class="main-wrapp" style="background-color: #3D413E;">
	<div class="wrapp">
		<section class="states">
			<h1 class="states__title heading-2">Life Insurance in Your State</h1>

			<div class="states__body">
				<a href="#" class="states__item"><span>California</span></a>
				<a href="#" class="states__item"><span>Georgia</span></a>
				<a href="#" class="states__item"><span>New Jersey</span></a>
				<a href="#" class="states__item"><span>North Carolina</span></a>
				<a href="#" class="states__item"><span>Ohio</span></a>
				<a href="#" class="states__item"><span>Texas</span></a>
			</div>
		</section>
	</div>
</div>

<div class="main-wrapp" style="background-color: #FCF9F3;">
	<div class="wrapp">
		<article class="article">
			<div class="article__box">
				<h1 class="article__title heading-2 article__title--center">Frequently Asked Questions</h1>
				<div class="article__links">
					<div class="article__links-column">
						<a href="#" class="article__link fontBodyS">What are the different types of life insurance?</a>
						<a href="#" class="article__link fontBodyS">Should I buy term or whole life?</a>
						<a href="#" class="article__link fontBodyS">How much coverage should I buy?</a>
						<a href="#" class="article__link fontBodyS">Is life insurance worth it?</a>
					</div>
					<div class="article__links-column">
						<a href="#" class="article__link fontBodyS">What are the different types of life insurance?</a>
						<a href="#" class="article__link fontBodyS">Should I buy term or whole life?</a>
						<a href="#" class="article__link fontBodyS">How much coverage should I buy?</a>
						<a href="#" class="article__link fontBodyS">Is life insurance worth it?</a>
					</div>
				</div>
				<p class="article__paragraph fontBodyM">If you have read this guide and taken the information to heart, you are already on the right track toward obtaining the coverage you need, but you may have lingering questions.</p>
			</div>

			<div class="article__box">
				<h3 class="article__subtitle">Life Insurance Glossary</h3>
				<div class="article__glossary">
					<div class="article__glossary-column">
						<a href="#" class="article__glossary-item fontBodyS">1035 Exchange</a>
						<a href="#" class="article__glossary-item fontBodyS">Burial Insurance</a>
						<a href="#" class="article__glossary-item fontBodyS">Contestability Period</a>
						<a href="#" class="article__glossary-item fontBodyS">Decreasing Term</a>
					</div>
					<div class="article__glossary-column">
						<a href="#" class="article__glossary-item fontBodyS">1035 Exchange</a>
						<a href="#" class="article__glossary-item fontBodyS">Burial Insurance</a>
						<a href="#" class="article__glossary-item fontBodyS">Contestability Period</a>
						<a href="#" class="article__glossary-item fontBodyS">Decreasing Term</a>
					</div>
					<div class="article__glossary-column">
						<a href="#" class="article__glossary-item fontBodyS">1035 Exchange</a>
						<a href="#" class="article__glossary-item fontBodyS">Burial Insurance</a>
						<a href="#" class="article__glossary-item fontBodyS">Contestability Period</a>
						<a href="#" class="article__glossary-item fontBodyS">Decreasing Term</a>
					</div>
				</div>
			</div>
			<div class="article__btn button-small">Back to top</div>
		</article>
	</div>
</div>

