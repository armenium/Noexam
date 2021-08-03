<?php

use yii\widgets\Breadcrumbs;
use yii\web\JqueryAsset;
use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;

$this->registerCssFile('@web/css/Chart.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/js/Chart.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/js/charts.options.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

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
//$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/'];
//$this->params['breadcrumbs'][] = ['label' => 'Term Life Insurance', 'url' => '/life-insurance/term/'];
//$this->params['breadcrumbs'][] = $this->context->current_cat->title;
//$this->registerJS('jQuery(document).ready(function($) { RESPONSIVEUI.responsiveTabs(); });', View::POS_END, 'responsive-tab-js');


?>
<div class="page-content page-wrapper trans_all">

	<?=$this->render('@app/views/layouts/resource_grid.php', ['grid_data' => $grid_data]);?>

	<!-- START PAGE-CONTENT -->
	<section class="page">
		<article class="content">
			<h1>Life Insurance Pricing Study</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F jS, Y', filemtime(__FILE__))]);?>
			<p>Published <?=date('F jS, Y', strtotime($this->context->current_cat->updated));?></p>

			<?php //=$this->render('/main/widgets/statistic-participants-count.php');?>

			<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			<p>To help with life insurance awareness, we have analyzed over 80,000 life insurance quotes that were requested on our website. The results are significant, but not surprising. The longer you wait to buy life insurance, the more it will cost you in monthly premiums. But what is more surprising is that <strong>60% of shoppers are waiting to get life insurance until after the age of 45</strong>. This is the problem that we are working to solve. Helping to raise awareness on the importance of life insurance. If you have financial dependents, get life insurance. As you are about to find out, you get the most bang for your buck by buying it younger.</p>

			<h2>Methodology</h2>

			<p>On our website, we have a widget that allows people to <a href="https://www.noexam.com/life-insurance/term/rates/">get a life insurance quote without entering any personal information</a>. It’s something we’ve become known for. We receive a lot of traffic from people searching google for phrases like life insurance quotes, life insurance rates, etc. It’s broad, non-specific traffic, and it is perfect for getting a cross section of real life insurance shoppers.</p>


			<div class="row mt-5">
				<div class="col-sm-12 text-center pb-5">
					<h2 class="text-center">Life Insurance Price Increase By Age</h2>
					<?=$this->render('/main/widgets/statistic-summarizing.php', ['age_diapasons' => ['20-30', '30-40', '40-50', '50-60', '30-50'], 'variant' => 1]);?>
					<? //=$this->render('/main/widgets/statistic-summarizing.php', ['age_diapasons' => ['20-30', '30-40', '40-50', '50-60'], 'variant' => 2]);?>
				</div>
			</div>
			<hr>
			<div class="row mt-5">
				<div class="col-sm-12 text-center pb-5">
					<p>The data shows that the price increases with age.</p>
					<h2>Overall Price Increases Ages 20 -70</h2>
					<?=$this->render('/main/widgets/statistic-prices.php', ['data_type' => 'overall', 'by' => 'age_price']);?>
					<p>An important thing to note is that this is for monthly premium. The total cost of a life insurance policy bought at age 30 vs age 45 could end up being the same if you are in perfect health, because as you age, your needs decrease (both term length and coverage amount). You'll be paying a higher rate but for a lesser amount of time.</p>

					<p>The reason we show the prices in monthly premium is because most people do their budgets on a monthly basis. Cash in, cash out. If your income increases along this same curve you won't feel a squeeze. If it doesn't, you will certainly be feeling it when you go to buy life insurance later in life.</p>
				</div>
			</div>
			<hr>
			<div class="row mt-5">
				<div class="col-sm-12 text-center pb-5">
					<p>Here is the same data broken up into more granular ages. The same trend continues. The older the person is, the more expensive the monthly payment gets.</p>
					<h2 class="text-center">Overall Prices by Generations</h2>
					<?=$this->render('/main/widgets/statistic-prices.php', ['data_type' => 'overall', 'by' => 'generation', 'for' => ['GenZ', 'Millennials', 'GenerationX', 'BabyBoomers']]);?>
				</div>
			</div>
			<hr>

			<div class="row mt-5">
				<div class="col-sm-12 text-center pb-5">
					<p>Life insurance needs tend to go decrease over time, but the monthly price still increases.</p>
					<h2 class="text-center">Coverage amount selected vs age. Ages 20 -70</h2>
					<?=$this->render('/main/widgets/statistic-prices.php', ['data_type' => 'overall', 'by' => 'age_coverage']);?>
				</div>
			</div>
			<hr>
			<div class="row mt-5">
				<div class="col-sm-12 text-center pb-5">
					<p>Older shoppers are getting quotes for shorter term lengths.</p>
					<h2 class="text-center">Term length selected vs age. Ages 20 -70</h2>
					<?=$this->render('/main/widgets/statistic-prices.php', ['data_type' => 'overall', 'by' => 'age_term']);?>
				</div>
			</div>
			<hr>
			<div class="row mt-5">
				<div class="col-sm-12 text-center pb-5">
					<p>Here is how shoppers rated their own health. Note at age 55 the increase in people reporting less than perfect health.</p>
					<h2 class="text-center">Health rating vs age. Ages 20 -70</h2>
					<?=$this->render('/main/widgets/statistic-prices.php', ['data_type' => 'counts', 'by' => 'age_health']);?>
				</div>
			</div>
			<p>Lastly, we asked a random segment of shoppers to take a guess at the price. This result goes against previous studies where they determined that most people thought life insurance was more expensive than it actually was. The data shows that most people think life insurance is cheaper than it actually is.</p>
			<?=$this->render('/main/widgets/statistic-guessed-prices.php');?>

			<h2>What does all of this data mean?</h2>

			<p>The main takeaway</p>
			<blockquote>Pricing data shows that the best time to buy life insurance is in your 30's.</blockquote>

			<p>Not taking advantage of this buying window will result in paying higher premiums for less coverage.</p>


			<p>People understand that life insurance is needed once you have a mortgage and financial dependents. Yet, many people that need it don’t have it. </p>
			<p>When I meet people and tell them that I work in life insurance, the next words out of their mouth are, <strong>“Oh nice, yea I need to get some life insurance."</strong></p>

			<p>Studies in recent years have tried to explain this phenomenon by saying that most people don’t have life insurance because they think they can’t afford it. We were skeptical of this, so <strong>we asked over 2,000 shoppers to take a guess at their price.</strong> We found 70% of people thought it would be cheaper than it actually was. </p>

			<p>Hmm. Could it be that it doesn’t matter if people don’t know how much a product costs? The only stat that we thought was interesting from our guessing game was that <strong>95% of people have no idea what life insurance costs</strong>. But 100% of people shopping for it know that they need it.</p>

			<p>Why do people not buy a product that they know they need? Because no one plans on dying in their 30’s, and there is always more time. </p>

			<blockquote>It boils down to a lack of financial discipline.</blockquote>

			<p>The thought process goes like this.</p>

			<p>Yes, I need life insurance. But that costs money every month. Things are tight. I’m not gonna die anytime soon. I’m in great health. I had to buy the kids back to school clothes, and the braves are playing the dodgers this weekend. <strong>Let’s worry about this later.</strong></p>

			<p>Later goes from a few days to a few weeks to a few years then all of the sudden you are 50 years old with high cholesterol. You realize you are in fact mortal, and you really need some life insurance.</p>

			<blockquote>Poor Nance would be in a real pickle if you were to suddenly pass away.</blockquote>

			<p>Now that 30 year term policy you considered buying in your 30’s is twice the price for 15 years of coverage with a smaller death benefit.</p>

			<h2>So what is the solution?</h2>

			<p>I’d like to think that these pretty charts showing how much better of a deal buying life insurance in your 30’s is than in your 50’s is enough.</p>

			<p>But <strong>the real solution is to just be an adult</strong>. Suck it up and pay the $30 a month for life insurance. That is what I am doing. Buy it in your 30’s when you buy your first house or have a child.</p>

			<p>It sucks. As a millennial, the early 30’s are rough. Our fun carefree lives are fading over the horizon as a mountainous path to sacrifice and adult responsibility lies ahead. Don't play yourself. Get some coverage now.</p>
			<p><strong>This is your life insurance awareness notice.</strong></p>

			<blockquote>You have hereby been made aware that not buying life insurance in your 30's will result in you paying over 2X the monthly rate for nearly half the coverage at age 50.</blockquote>


	</section>
	<!-- END PAGE-CONTENT -->

</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@noexam">
<meta name="twitter:title" content="Study Reveals the Best Time to Buy Life Insurance">
<meta name="twitter:description" content="Analysis of over 80,000 life insurance quotes determine when the best time to buy life insurance is.">
<meta name="twitter:image" content="https://www.noexam.com/img/life-insurance-prices.png">
