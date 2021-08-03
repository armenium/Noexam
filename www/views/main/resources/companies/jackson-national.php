<?php

use yii\widgets\Breadcrumbs;

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
$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/'];
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => '/life-insurance/companies/'];
$this->params['breadcrumbs'][] = $this->context->current_cat->title;

$this->registerCss(".boxcontent{ max-width:382px; float: right; margin:0 auto; width:100%; margin: 0 0 10px 10px; -webkit-box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);-moz-box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);}
@media only screen and (max-width:40.625em) {
.boxcontent{ margin:0 auto; width:100%; max-width: 100%; float: right; margin: 0 0 10px 10px; -webkit-box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);-moz-box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);}}
.boxcontentinner { width:90%; margin: 0 auto; overflow:hidden; padding:25px 0;}
.logocon{ text-align:center; margin:0 0 50px;}

.boxconinfull{ width:100%; clear:both; overflow:hidden; font-family: 'Open Sans', sans-serif; margin:0 0  30px;}
.boxconinfull h6{ font-size:14px; color:#4f8b9f; font-family: 'Open Sans', sans-serif; text-transform:uppercase; margin:0; padding:0;}
.boxconinfull h5{ font-size:26px; color:#3c3c3c; font-family: 'Open Sans', sans-serif; text-transform:uppercase; margin:0; padding:0;}
.boxconinfull p{ font-size:15px; color:#3c3c3c; margin:0; padding:0; font-family: 'Open Sans', sans-serif;}
.boxconinlt, .boxconinrt{ width:50%; float:left;}

.boxconinrt ul{ margin:10px 0 0 0; padding:0;}
.boxconinrt ul li{ display:block; float:left; list-style:none; margin:0 10px 0 0;}
.boxconinmid{ width:100%; clear:both; overflow:hidden; margin-bottom:25px;}
.boxcontentinner a {border: 1px solid #8ac58a;background: #99d199;height: auto;padding: 13px 00;text-align: center;font-size: 21px;color: #fff;font-weight: bold;text-transform: none;font-family: 'Open Sans', sans-serif;display: block;width: 100%;text-decoration: navajowhite;margin:0 auto 0;}
");
?>
<div class="page-content page-wrapper trans_all">

	<!-- START PAGE-CONTENT -->
	<section class="page">
		<aside>
			<div class="sticky-block">
				<h2>Jump to a section</h2>
				<ul>
					<li><a href="#ourtake">Our Take</a></li>
					<li><a href="#history">History</a></li>
					<li><a href="#ratings">Financial Ratings</a></li>
					<li><a href="#products">Products Offered</a></li>
					<li><a href="#pros">Pros</a></li>
					<li><a href="#cons">Cons</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Jackson National Life Insurance Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/jackson.jpg"/></div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>AM Best Rating</h6>
							<h5>A+</h5>
						</div>
						<div class="boxconinrt">
							<h6>Our Rating</h6>
							<ul>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/grey-star.png" width="19" height="18"/></li>
							</ul>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>Phone</h6>
							<p>877-565-2968</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>1961</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Annuities</p>
						</div>

					</div>
					<a href="https://www.noexam.com/apply-now/">Compare Quotes</a>
				</div>
			</div>
			<p>Jackson National Life Insurance – more commonly referred to as Jackson – is a Lansing, Michigan based company which offers a wide range of annuity products for retirement planning purposes.</p>

			<p>The company operates as a subsidiary of Prudential – a multinational corporation based in the UK – and has a nationwide presence.</p>

			<p>Is Jackson a prudent choice for those who are in need of annuity products? Let us find out.</p>

			<h2 id="ourtake">Our Take</h2>
			<blockquote class="blue">The company’s annuity products are second to none in terms of features and financial benefits. If you are in need of an annuity product to plan for your post-retirement life, Jackson is a solid choice.</blockquote>
			<h2>Other Options for Life Insurance</h2>
			<p>Despite it's name, Jackson National Life Insurance does not offer life insurance products, only annuity products. Below are some great options for life insurance.</p>
			<?=$this->render('/main/widgets/vs-page-companies.php'); //Top Three Companies Embed Code?>
			<h2 id="history">History</h2>

			<p>Jackson National Life Insurance Company, named after President Andrew Jackson (a great American), was established in 1961.</p>

			<p>The company sold its products through a large network of independent agents and successfully managed to build a large customer base within a couple of decades. By 1982, the total value of annuity products sold by the company was <a href="https://www.jackson.com/our-company/the-jackson-story/history.xhtml">over $162 million</a>.</p>

			<p>Owing to its rapid growth, Jackson was considered an extremely valuable asset with massive growth potential by many established players in the industry. In 1986, it was acquired by UK-based Prudential, which is one of the largest financial services groups in the world today.</p>

			<p>In 1989, Jackson achieved a major landmark – crossing $2 billion in annuity sales. In 1996, the company added indexed and variable annuity products to its range of products. In 1998, the company established its subsidiary in New York and expanded its presence to all 50 states of the country.</p>

			<p>Today, Jackson is one of the largest sellers of annuity products in the United States. The company also offers retail brokerage and asset management services to its customer base.</p>

			<h2 id="ratings">Jackson National Financial Ratings</h2>
			<ul>
				<li>A.M. Best: A+ (Superior)</li>

				<li>Moody’s: A1 (Good)</li>

				<li>Standard & Poor’s: AA– (Very Strong)</li>

				<li>Fitch: AA– (Very Strong)</li>
				<li><a href="https://www.jackson.com/our-company/financials/ratings-and-rankings.xhtml">Source</a></li>
			</ul>

			<p>Jackson also has well over $250 billion in assets, which makes it one of the most financially stable companies in the industry today.</p>

			<h2 id="products">Products Offered</h2>

			<p>Jackson offers three types of products – fixed annuities, fixed index annuities, and variable annuities.</p>

			<h3>Fixed Annuity</h3>

			<p>The product, true to its name, grows at a fixed rate, which is determined by the company. If you are risk averse, this is the ideal product for you, since it offers a guaranteed rate of return irrespective of market conditions.</p>

			<p>Jackson offers five different types of fixed annuity products, out of which four are deferred annuity products (Max Family, Bonus Max Family, Action Family, and Super Max Family) and one is an immediate annuity product.</p>

			<p>The key features of deferred annuity products include:</p>

			<h4>Preservation of Your Investment </h4>

			<p>The money you invest is protected against market volatility, which means you do not have to worry about losing your nest egg even if the market is on a downward trajectory. The principal grows at a guaranteed rate, as long as you do not make any early withdrawals.</p>

			<h4>Guaranteed Interest Rate</h4>

			<p>The rate of interest paid by the company is guaranteed for a specific period of time (1, 3, or 5 years). Once the guaranteed interest period is over, the rate of interest might go down, but it will not fall below the minimum rate specified in the contract at any point.</p>

			<p>So, irrespective of how the company performs and how the market behaves, your investment is guaranteed to grow in value – year after year.</p>

			<h4>Payment Options</h4>

			<p>You can choose to convert the accumulated value of your contract into a series of monthly payments. On top of this, you can also choose to receive it in the form of a lump sum. There are several other options available as well, from which you can choose one depending on your needs.</p>

			<h4>Accelerated Living Benefits</h4>
			<ul>
				<li>If you are diagnosed with a qualified medical condition, you are eligible to withdraw up to 25% of your contract’s accumulated value.</li>

				<li>If you are diagnosed with a qualified medical condition and only have a year to live, you are eligible to withdraw the entire accumulated value.</li>

				<li>If you are institutionalized (hospital or a long-term care facility) for a period of 90 days for medical reasons, you are eligible to withdraw the entire accumulated value.</li>
			</ul>

			<p>In all of the aforementioned scenarios, withdrawal charges do not apply.</p>

			<h4>Death Benefit</h4>

			<p>In case you pass away while your contract is in force, the beneficiary designated by you will receive the accumulated value. Your beneficiary too can choose to receive it either as a lump sum or as a series of payments.</p>

			<h3>Immediate Annuity</h3>

			<p>Jackson’s immediate annuity product is different from its deferred annuity products. The payments start within the first year itself and continue as long as you live. So you do not need to worry about the possibility of outliving your retirement corpus which is not appealing at all.</p>

			<p>The principal amount is protected against market volatility. The interest rate is set to increase by 3% year after year to make sure your income increases in proportion to the average inflation rate.</p>

			<h3>Fixed Index Annuity</h3>

			<p>This is a product which truly offers you the best of both worlds – the safety of a fixed annuity product and the high growth potential of an index fund. If you are not entirely averse to taking risks, but still need the protection of a minimum guaranteed rate of growth, this is the perfect choice for you.</p>

			<p>Jackson offers six different types of fixed index annuity products – Market Protector, Market Protector Advisory, Jackson AscenderPlus Select, Elite Choice, Elite Choice Rewards, and Select Annual Reset.</p>

			<strong>The key features include:</strong>

			<h4>Principal Protection</h4>

			<p>The principal amount (the money you invest) is protected against market turbulence. It’s the base on which your retirement corpus gets built – year after year.</p>

			<h4>Index Choices</h4>

			<p>You can link your annuity with an index of your choice – S&P 500 Index, Multi-Strategy Index, or Strategic4 Index. You can also choose the method in which the interest is calculated for your index-linked annuity.</p>

			<h4>Indexed As Well As Fixed Accounts</h4>

			<p>The premium you pay earns interest based on the performance of the index you choose. You can choose to allocate the entire premium payment to the index account or leave a portion of it in the fixed account. The money in the fixed account is guaranteed to earn anywhere from 1% to 3% interest per year.</p>

			<h4>Free Withdrawals</h4>

			<p>Every year, you are allowed to withdraw up to 10% of your annuity’s total accumulated value without paying any withdrawal charges. You can choose to withdraw 10% of the accumulated value in a single withdrawal or make multiple withdrawals throughout the year, as long as the sum total does not exceed the 10% mark.</p>

			<h4>Living Benefits</h4>
			<ul>
				<li>If you become terminally ill while your contract is in effect and expected to live only for 12 months, you are allowed to withdraw up to 100% of your annuity’s accumulation value or the minimum guaranteed accumulation value, whichever is greater.</li>

				<li>If you get hospitalized or admitted to a long-term care facility for a period of 90 days due to a medical condition, you are allowed to withdraw up to 20% of your annuity’s accumulation value.</li>
			</ul>

			<p>Both these options are available only from the second year of your contract. The amount of money you can withdraw – in case of a terminal illness or hospitalization – is limited to $250,000, irrespective of your annuity’s total value. Withdrawal charges are not applicable in both these cases.</p>

			<h4>Death Benefit</h4>

			<p>In case you pass away while your annuity contract is still in force, your designated beneficiary will receive either the accumulation value or the minimum guaranteed accumulation value (whichever is greater). They can choose to receive payments on a regular basis or receive the entire amount in a lump sum.</p>

			<h3>Variable Annuity</h3>

			<p>Among the annuity products offered by Jackson, this is the one with the highest growth potential. You can choose to invest your money in a wide range of asset classes, multiply your investment, and build a solid retirement corpus that you can rely on when you need it the most.</p>

			<p>Jackson offers five different types of variable annuity products – Elite Access, Elite Access Advisory, Elite Access Advisory II, Perspective II, and Perspective Advisory II.</p>

			<strong>The key features include:</strong>

			<h4>Multiple Investment Options </h4>

			<p>The money you contribute to your annuity is invested in a wide range of asset classes to maximize your portfolio’s growth potential. Jackson offers you more than 100 investment options, all of which are managed by experienced professionals, to choose from.</p>

			<p>So, you can build an extremely diverse portfolio, which not only increases your chances of getting high returns, but also minimizes the risks caused by market volatility to a great extent.</p>

			<h4>Fixed Interest Account</h4>

			<p>There is a fixed account, which earns an interest of 1% to 3% for a particular period of time – 1, 3, 5, or 7 years.</p>

			<h4>Automatic Investments</h4>

			<p>You can have a certain amount of money – it could be as little as $50 – automatically transferred to your investment portfolio on a monthly or quarterly basis. Regular investing is the best way to minimize the risk of losses and ensure higher returns in the long run.</p>

			<h4>Charge-Free Transfers</h4>

			<p>You can transfer the money from one investment to another without incurring any charges – up to 25 times a year.</p>

			<h4>Rebalancing </h4>

			<p>You are allowed to rebalance your investment portfolio – on a monthly, quarterly, or annual basis – by increasing and decreasing your contributions to various accounts.</p>

			<h4>Reinvestment of Earnings</h4>

			<p>You have the option of reinvesting the earnings from your fixed account into any investment option of your choice.</p>

			<h4>Free Withdrawals</h4>

			<p>Every year, you can withdraw the earnings from your investments or 10% of the premium – whichever is greater – free of cost.</p>

			<h4>Systematic Withdrawals</h4>

			<p>Instead of withdrawing money in the form of a lump sum, you can choose to receive the earnings or a small percentage of the premium in a systematic manner – on a monthly, quarterly, or yearly basis.</p>

			<h4>Living Benefits</h4>
			<ul>
				<li>If you are diagnosed with an illness (specified in the contract), you are allowed to withdraw up to 25% of your annuity’s value.</li>

				<li>In case of a terminal illness, wherein you only have 12 months to live, you are allowed to withdraw up to $250,000 from your account.</li>

				<li>In case you are hospitalized or institutionalized in an assisted living facility for 90 days, you are allowed to withdraw up to $250,000 from your account.</li>
			</ul>

			<h4>Death Benefit</h4>

			<p>In the event of your death, your beneficiary will receive your contract’s accumulated value or the total amount of premiums you paid, whichever is greater. In some cases, depending on the annuity product you opt for, your spouse or partner might be able to continue your contract after your death.</p>

			<h2>Pros and Cons of Jackson National Life Insurance</h2>

			<h3 id="pros">Pros</h3>
			<ul>
				<li>Jackson has an ‘A’ rating or above from all the major rating agencies. It is a financially stable and reliable company.</li>

				<li>Jackson offers an extraordinarily wide range of annuity products which can help you plan for your retirement. So, you can easily find a product which is ideally suited for your retirement needs.</li>
			</ul>

			<h3 id="cons">Cons</h3>
			<ul>
				<li>Despite its name, Jackson does not offer any life insurance products at all. It is certainly a downside, as not everyone needs an annuity.</li>
			</ul>

			<h2>Final Thoughts on Jackson National Life Insurance</h2>

			<p>Jackson is a financially strong company which has earned a name and reputation for itself in the industry, but they don't offer life insurance.</p>

			<p>If you need to insure yourself and your family, you have to look at other options, of which there are many. There are a large number of <a href="https://www.noexam.com/life-insurance/companies/">life insurance companies</a> that offer term as well as permanent life insurance products.</p>

		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
