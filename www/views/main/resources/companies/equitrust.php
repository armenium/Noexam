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
					<li><a href="#ratings">Financial Strength</a></li>
					<li><a href="#products">Products</a></li>
					<li><a href="#proscons">Pros and Cons</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Equitrust Life Insurance Company Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/equitrust.jpg" width="200" height="auto"/></div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>AM Best Rating</h6>
							<h5>B++</h5>
						</div>
						<div class="boxconinrt">
							<h6>Our Rating</h6>
							<ul>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/grey-star.png" width="19" height="18"/></li>
								<li><img src="../../../img/grey-star.png" width="19" height="18"/></li>
							</ul>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>Phone </h6>
							<p>877-249-3694</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>2003</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Annuities, Permanent</p>
						</div>

					</div>
					<a href="https://www.noexam.com/apply-now/">Compare Quotes</a>
				</div>
			</div>
			<p>EquiTrust life insurance company is a West Des Moines, Iowa based company which offers a wide array of life insurance and annuity products for wealth building and retirement planning purposes.</p>

			<p>Despite being a new entrant into the insurance industry, the company has successfully managed to carve out a niche for itself, which is no small feat.</p>

			<p>This review will cover the history of Equitrust, its financial ratings, products offered, and pros and cons of choosing them as an insurance provider.</p>

			<h2 id="ourtake">Our Take</h2>
			<blockquote class="blue"><p>EquiTrust is a small company with a niche set of products. Its index-linked life insurance policies and annuity products are actually concrete, but they do not cater to the needs of a diverse customer base.</p>

				<p>If you are in need of a <a href="https://www.noexam.com/life-insurance/term/">term life</a> policy, a <a href="https://www.noexam.com/life-insurance/whole/">whole life</a> policy, or a variable universal life policy, EquiTrust is not the company for you, as it does not offer any of these products.</p>

				<p>There are a number of other insurance providers who offer a wide selection of term, whole, and universal policies for you to choose from. You can find a <a href="https://www.noexam.com/life-insurance/companies/">list of these companies here</a>.</p></blockquote>
			<?=$this->render('/main/widgets/apply-now-form.php', ['position' => 'center', 'width' => '100%']);?>
			<h2 id="history">Company History and Background</h2>

			<p>EquiTrust is not exactly a household name in the insurance industry, as the company has only been around for two decades. It has, however, managed to achieve a number of milestones within a short span of time, which is very impressive.</p>

			<p>EquiTrust began its operations in 2003 as a subsidiary of FBL Financial Group, which is a multi-billion dollar holding company based in Iowa. Initially, FBL’s presence was limited only to 15 states. After the entry of EquiTrust, the company’s presence spread all over the country.</p>

			<p>In 2004, EquiTrust started offering index-linked annuity products for retirement planning purposes. In 2006, the company had assets worth over $5 billion under its management.</p>

			<p>In 2011, EquiTrust was acquired by Guggenheim Partners for $440 million. In 2012, the company had assets worth over $10 billion under its management.</p>

			<p>In 2015, <a href="http://magicjohnson.com/">Magic Johnson Enterprises</a> bought a 60% interest in EquiTrust and became a controlling shareholder. In 2016, EquiTrust had assets worth over $17 billion under its management. In 2019, Equitrust was recognized by Ward Benchmarking as one of the top 50 life insurance companies in the country.(<a href="#1">1</a>)</p>

			<h2>Financial Strength and Ratings</h2>

			<p>One of the reasons why EquiTrust has managed to solidify its position in the industry, despite only catering to the financial needs of a niche customer base, is its financial stability.</p>

			<p>In 2008, EquiTrust had just over $7 billion in assets under its management. By 2017, the value of assets under its management had grown to $18 billion. It goes to show that the company has been stable and prudent in its approach towards investments.</p>

			<p>EquiTrust has a strong solvency ratio, which is a strong indicator of the company’s ability to survive unforeseen emergencies and meet its financial commitments.</p>

			<h2 id="ratings">Current Financial Ratings of EquiTrust.</h2>
			<ul>
				<li>A.M. Best: B++ (Good)(<a href="#2">2</a>)</li>
				<li>Standard & Poor’s: BBB+ (Good)(<a href="#3">3</a>)</li>
			</ul>

			<p>Technically, a B++ rating is not bad at all. It is well above the average and shows that the company is financially stable. At the same time, it pales in comparison to an A+ rating, which is what most of the top players in the life insurance industry boast of.</p>

			<p>Financial ratings, however, change from time to time, depending on the company’s performance and debt to asset ratio. EquiTrust, as mentioned above, has only been around for two decades. So if it continues to perform well, its ratings are likely to improve in the coming years.</p>

			<h2 id="products">EquiTrust Products</h2>

			<h3>Life Insurance</h3>
			<div class="company-box">
				<p>EquiTrust offers two index linked life insurance policies which offer a guaranteed death benefit as well as a wide range of living benefits.</p>

				<h4>Growth Suite Life</h4>

				<p>This is a single premium policy, which you can apply for if you are between the ages of 45 and 80. The company offers you four different index accounts to choose from. Whichever one you choose is linked to your policy’s cash value component.</p>

				<p>The cash value account grows in value throughout the policy’s term period. The growth rate is dependent on the index account’s performance.</p>

				<p>Your account is protected against the possibility of negative returns, so the index credit will never be less than zero, irrespective of market conditions.</p>

				<p>The company allows you to take out loans from your policy’s cash value. You need to pay it back with a 4% interest. If the loan amount remains unpaid for a long period of time, the policy could lapse.</p>

				<p>In case you pass away after taking a loan, the company will deduct the outstanding amount from the death benefit and pay out the rest of the amount to your beneficiary.</p>

				<p>From the second year of the coverage period, you are allowed to make partial withdrawals every year, as long as the amount does not exceed 10% of the accumulation value.</p>

				<p>You can choose to surrender the policy – either partially or fully – at any time for any reason. You might have to pay a surrender charge, depending on the face value amount of your policy and how far you are into the coverage period.</p>

				<p>Upon your death, your beneficiary will receive either the face value amount or the accumulation value, whichever is greater.</p>

				<h4>Secure Suite Life</h4>

				<p>You can apply for the policy if you are between the ages of 45 and 85. This one too is an index-linked single premium policy. There are four different index accounts available, out of which you can choose one to link your cash value account to.</p>

				<p>The cash value account is protected against negative returns. So, the rate of return will never dip below zero, regardless of the market conditions. You are allowed to take out a loan from your accumulated cash value.</p>

				<p>Failing to repay the loan in a timely manner will attract penalties. If you fail to repay it altogether, the outstanding amount will get deducted from your policy’s death benefit.</p>

				<p>If you pass away while your policy is still in force, your beneficiary will receive the face value amount or the accumulated cash value, whichever one is greater.</p>

				<p>The company also pays a 5% bonus on the <a href="https://www.noexam.com/life-insurance/term/rates/">premium you pay</a>, which is added to the total value of the policy.</p>

				<p>You are allowed to make partial withdrawals every year, as long as the amount you withdraw does not exceed 5% of the total accumulation value. You also have the option of surrendering your policy fully or partially any time you want.</p>

				<h4>Accelerated Death Benefit Rider</h4>

				<p>EquiTrust offers an accelerated death benefit rider, which is included with both the index-linked life insurance policies free of cost.</p>

				<p>If you happen to develop a chronic or terminal illness or if you get admitted to a long-term care facility due to your health condition, you will be paid a portion of the death benefit amount, which you can use to pay for your treatment and care.</p>
			</div>
			<h3>Annuity Products</h3>
			<div class="company-box">
				<p>EquiTrust offers a variety of annuity products to plan for your post-retirement life.</p>

				<h4>Choice Four Annuity</h4>

				<p>This is a single premium annuity product with an annual reset rate of interest. The premium amount could be anywhere from $10,000 to $1 million.</p>

				<p>The interest rate is reset every 12 months, depending on a number of factors. It will, however, never fall below the minimum guaranteed rate of interest.</p>

				<h4>Certainty Select Annuity</h4>

				<p>This is a single premium annuity product with a guaranteed rate of interest for a specific period of time – 3, 5, 6, 8, or 10 years. Thereafter, the interest rate might be changed by the company, depending on a number of factors. It will not fall below the minimum rate of interest guaranteed by the company at any point.</p>

				<h4>Market Seven Index Annuity</h4>

				<p>This is a flexible premium annuity product with a fixed-rate account as well as four index-linked accounts. You need to pay $10,000 as premium in the first year. From the second year onwards, you can pay anywhere from $2,000 to $250,000 per year, depending on your preference.</p>

				<p>Surrender charges are applicable for the first seven years, after which you can partially or fully surrender the contract without any charges.</p>

				<h4>Market Value Index Annuity</h4>

				<p>This is a flexible premium annuity product with a fixed-rate account as well as eight index-linked accounts. You need to pay $10,000 in the first year. You can pay anywhere from $2,000 to $250,000 from the second year onwards.</p>

				<p>Surrender charges are applicable for ten years, after which you can partially or fully surrender the contract without any charges.</p>

				<h4>Market Ten Bonus Index Annuity</h4>

				<p>This is a flexible premium product with an optional income rider. If added to your contract, the income rider provides you with a guaranteed income for a lifetime.</p>

				<p>The company pays a 6% bonus on the premiums you pay in the first five years. The product has a fixed-rate account and a number of index-linked accounts.</p>

				<h4>Market Power Bonus Index Annuity</h4>

				<p>This is a single premium product with a fixed-rate account and a variety of index-linked accounts. This one too has an optional income rider which provides you with lifetime income. The company pays a 12% bonus on the premium you pay in the first year.</p>
			</div>
			<h2 id="proscons">Pros and Cons of EquiTrust</h2>

			<h3>Pros</h3>
			<ul>
				<li>The company offers a wide range of annuity products along with a couple of index-linked life insurance products, from which you can choose a product which is ideally suited for your financial needs.</li>
				<li>The biggest advantage of index linked products is that they are not as volatile as market-based products, but offer a much higher rate of return than fixed-rate products. So, if you are looking to maximize the returns on your investment without taking big risks, an index-linked product is the best choice for you.</li>
				<li>EquiTrust offers a wide range of living benefits, which you can make use of in the event of an emergency – medical or otherwise. If you buy a life insurance policy, you can access the accumulated cash value for your financial needs. If you buy an annuity, you can make a partial withdrawal for your financial needs.</li>
				<li>The company also offers an accelerated death benefit rider with almost all of its products. In case you develop a chronic or terminal illness during the course of your annuity product or insurance policy, you can make a partial withdrawal or access the cash value to pay for your treatment.</li>
			</ul>
			<p>The same rule applies to long-term care as well. If you are admitted to a long-term care facility owing to health problems, you can make a partial withdrawal or access the cash value to cover the expenses associated with your treatment and care.</p>

			<h3>Cons</h3>
			<ul>
				<li>EquiTrust is a small company and its products are designed to cater to the needs of a niche customer base. It does not have a diverse range of products, which most other top insurance providers in the industry boast of.</li>
				<li>EquiTrust does not offer traditional term and whole life policies, which is what a majority of customers are in need of. While its index-linked products have good growth potential, they are not the right choice for anyone who is looking for affordable coverage for a specific period (pure term policy) or lifelong coverage (whole life or universal life policies).</li>
				<li>The company has a B+ rating, which as mentioned above is not a bad rating. At the same time, it does look ‘ordinary’ when compared to an A+ rating, which is what the top insurers in the country have managed to receive on a consistent basis.</li>
			</ul>

			<h2>About NoExam.com</h2>

			<p>Choosing the right kind of life insurance product from the right provider is very important, especially if you are looking for lifelong protection. Not all policies offer the same kind of protection, nor do they cost the same.</p>

			<p>This is why we at NoExam.com always insist people to get quotes from multiple insurance providers, compare the features, and choose the best policy.</p>

			<p>NoExam.com can not only get you customized quotes from the top companies in the industry, but also help you choose the policy which is ideally suited for your financial needs.</p>
			<h2>References</h2>
			<ol>
				<li id="1"><strong>Life Health Ward's 50 Companies</strong> - Available from: <a href="https://ward.aon.com/ward-benchmarking/wards50/life-health/">https://ward.aon.com/ward-benchmarking/wards50/life-health/</a></li>
				<li id="2"><strong>AM Best Downgrades Issuer Credit Rating of EquiTrust Life Insurance Company - Available From: </strong><a href="https://www.marketwatch.com/press-release/am-best-downgrades-issuer-credit-rating-of-equitrust-life-insurance-company-2019-02-08">https://www.marketwatch.com/press-release/am-best-downgrades-issuer-credit-rating-of-equitrust-life-insurance-company-2019-02-08</a></li>
				<li id="3"><strong>Equitrust Financial Strength</strong> - Available from: <a href="https://www.equitrust.com/strength/financial-strength/">https://www.equitrust.com/strength/financial-strength/</a></li>
			</ol>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
