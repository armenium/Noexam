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
					<li><a href="#about">About</a></li>
					<li><a href="#ratings">Financial Ratings</a></li>
					<li><a href="#products">Products Offered</a></li>
					<li><a href="#pros">Pros</a></li>
					<li><a href="#cons">Cons</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>North American Life Insurance Company Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/north-american.jpg" alt="north american life insurance"/></div>
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
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
							</ul>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>Phone</h6>
							<p>877-872-0757</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>1886</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Prouducts sold</h6>
							<p>Term, Whole, Universal</p>
						</div>

					</div>
					<a href="https://www.noexam.com/out/quotes-2.php">Get A Quote</a>
				</div>
			</div>
			<p>North American Company for Life and Health Insurance is an insurance provider based in West Des Moines, Iowa.</p>

			<p>One of the oldest insurers in the country, North American offers a diverse range of life insurance as well as annuity products to a nationwide customer base.</p>

			<p>In this life insurance review, we discuss the history and background of North American Life Insurance Company, its financial strength, its product range, and the upsides and downsides of choosing the company as your life insurance provider.</p>

			<h2 id="ourtake">Our Take</h2>
			<blockquote class="blue">If you are considering coverage from north american life insurance company, you are likely working with an independent agent. Independent agents have free reign on which <a href="https://www.noexam.com/life-insurance/companies/">life insurance companies</a> they choose to offer their clients. It's a fair question to ask your life insurance agent what made North American a top recommendation. Price is typically not their strong suit.</blockquote>
			<h2 id="about">History and Background</h2>

			<p>North American Life Insurance Company’s history can be traced back to 1886. Initially, it was established under the name of North American Accident Association.</p>

			<p>Slowly, the company started expanding its presence by offering different products and by catering to the needs of customers from different walks of life.</p>

			<p><strong>In 1918</strong>, North American earned the distinction of being the first insurance provider to offer disability insurance for women.</p>

			<p>In the following decades, the company managed to survive the prolonged economic downturn caused as a result of the stock market crash and the great depression.</p>

			<p>The company could manage this thanks to its conservative and disciplined approach towards investing.</p>

			<p><strong>In 1984</strong>, North American started offering universal life insurance policies. In 1996, the company was acquired by Sammons Financial Group, Inc which is a subsidiary of Sammons Enterprises, a Texas based holding company.</p>

			<p><strong>In 2001</strong>, North American added fixed annuities to its product range. In 2011, the company completed its 125th year in the life insurance industry, which is a rare milestone achieved only by a handful of insurance providers in the country.</p>

			<p>North American Company for Life and Health Insurance announced on <strong>September 07, 2017</strong> its <a href="https://www.prweb.com/releases/2017/09/prweb14673130.htm">partnership with Insure Tech disruptor Bestow</a>. Bestow will issue North American Policies online for eligible applicants. This is a change of pace for North American who has traditionally offered life insurance only through the independent agent channel. You no longer have to work with a commissioned sales agent to buy a North American policy. </p>

			<h2 id="ratings">North American Financial Ratings</h2>

			<p>North American is one of the top-rated insurance providers in the country today. Given below are its current ratings.</p>
			<ul>
				<li><strong>A.M. Best:</strong> A+ (Superior)</li>
				<li><strong>Standard & Poor’s:</strong> A+ (Strong)</li>
				<li><strong>Fitch:</strong> A+ (Stable)</li>
				<li><strong>Comdex:</strong> 92</li>
				<li><a href="https://www.northamericancompany.com/why-choose-north-american">Source for ratings</a></li>
			</ul>
			<p>North American has over $27 billion in assets and <a href="https://www.northamericancompany.com/documents/434862/8956056/339NM+Strength+and+Stability+Flyer.pdf/ce8561d0-b488-ad0d-ccdc-c8012e2267f2">holds over 615,000</a> life insurance and annuity policues. In 2018, it paid more than $431 million in death benefits to its policyholders.</p>

			<p>Data from the National Association of Insurance Commissioners (NAIC) shows that 95% of the company’s bond investments are investment grade, which is a sign of prudent investment management.</p>

			<p>North American is one of the strongest insurance carriers in terms of financial ratings. This is what you want when your loved ones rely on your life insurance policy.</p>

			<p>Continue reading to learn more about the <strong>life insurance products offered by North American</strong>.</p>

			<h2 id="products">Term Life Insurance from North American</h2>

			<p>North American offers a traditional term policy which can replace your income in the event of your death and provide for your family’s financial needs. Like all <a href="https://www.noexam.com/life-insurance/term/">term insurance</a>, the coverage will last for a set amount of time.</p>

			<p>It is a level premium, level death benefit policy, which means the premium amount and the death benefit amount remain the same until the expiration date.</p>

			<p>The company offers an accelerated death benefit rider along with its term life policy. If you develop an illness, which is declared ‘critical’ or ‘terminal’ by a medical professional, you are allowed to access a portion of the coverage amount to pay for your treatment and other expenses.</p>

			<p>Treating a terminal or critical illness can be very expensive, even if you have health insurance. As you probably know, a health insurance plan usually does not cover all the expenses associated with your treatment.</p>

			<p>The out-of-pocket expenses associated with your hospitalization, treatment, and care can burn a hole in your pocket. An accelerated death benefit rider can be very helpful in such cases.</p>

			<p>The best part about an accelerated death rider is that it is not designed to cover your hospitalization and treatment costs alone. The insurance company pays you, not the hospital.</p>

			<p>So, you can use the money for any purpose – treatment and care, loan payments, household expenses, or even a nice vacation with your family.</p>

			<h2>Universal Life Insurance from North American</h2>

			<p>North American offers three different universal life policies – a traditional universal life policy, a guaranteed universal life policy, and an indexed universal life policy.</p>

			<h2>North American Traditional Universal Life Insurance</h2>

			<p>This is a flexible policy which is designed to build cash value for the entirety of the coverage period. The growth rate of the cash value component depends on the interest paid by the insurance company.</p>

			<p>The interest rate is decided by the insurer based on a number of factors and is declared periodically. There is, however, a minimum guaranteed rate of interest, which the company will pay irrespective of its performance, market conditions, or other factors.</p>

			<p>With every payment you make, the cash value component grows in value. It also keeps accruing interest throughout the coverage period.</p>

			<p>Once your policy has built up sufficient cash value, you can access it for your needs from time to time, either by making partial withdrawals or by getting a low-interest loan from the insurance company.</p>

			<p>An important thing you need to remember is that the policy loan needs to be repaid with interest.</p>

			<p>If you do not, the amount you owe the company (loan amount, interest, and penalties, if any) will be deducted from the death benefit amount. The remaining amount will be paid out to your designated beneficiary after your death.</p>

			<p>As is the case with all universal life policies, this one too does not have a fixed premium. You can decide how much you want to pay every month or every year.</p>

			<p>At the same time, you are required to meet the minimum premium requirements set by the company. If your payments dip below the minimum limit set by the company, your policy could lapse.</p>

			<p>The policy offers you death benefit protection for your entire lifetime. Any time you pass away, the designated beneficiary will receive the death benefit amount, assuming your policy is still in force.</p>

			<h2>North American Guaranteed Universal Life Insurance</h2>

			<p>This is a policy which provides you with guaranteed life insurance coverage until the age of 120. You can, however, stop paying the premiums when you turn 100.</p>

			<p>Unlike a traditional universal life policy, this policy does not allow you to choose the amount of premium you want to pay. The premium is fixed by the insurer at the time of issuing the policy and remains unchanged until your death.</p>

			<p>There is a guaranteed death benefit, which your beneficiary stands to receive in the event of your death. There is a cash value component as well, which grows at a steady rate and serves as an emergency fund for your financial needs.</p>

			<h2>North American Indexed Universal Life Insurance</h2>

			<p>This is a policy which not only offers you death benefit protection, but also has a higher growth potential compared to a traditional universal life policy.</p>

			<p>The policy’s cash value component is tied to a stock market index, which means its growth rate depends entirely on the performance of the index. Whenever the market is on an upward trajectory, you can expect your policy to rapidly accumulate cash value.</p>

			<p>The insurance company, however, places a cap or upper limit on the amount of money that can be credited to your cash value account. Even with the cap in place, your policy’s earning potential is much higher than that of a regular universal life plan. </p>

			<p>Moreover, North American also protects your policy from market risks by placing a lower limit called the 0% floor.</p>

			<p>It means that even in the event of a downturn, the interest credited to your account will never be less than zero. It eliminates the risk of negative returns and the possibility of losing money.</p>

			<p>This is one of the main reasons why many people, especially those who are averse to taking risks, prefer an indexed policy over a variable policy.</p>

			<p>A variable policy offers unlimited growth potential, but does not protect your account against market risks. An indexed policy, on the contrary, allows you to take advantage of a bull market and protects you from the negative consequences of a bear market.</p>

			<p>North American’s indexed universal life policy comes with a built-in accelerated death benefit rider, which is included in the policy at no additional cost. If you become critically or terminally ill at any point during the coverage period, the insurer will pay you a portion of the coverage amount.</p>

			<p>You can use the money to pay your bills, take care of your medical expenses, replace your lost income, or for any other purpose.</p>

			<strong>Now, let us discuss and the upsides and downsides of choosing North American as your life insurance provider.</strong>

			<h2 id="pros">Upsides to North American's Life Insurance</h2>

			<strong>Stable and Reliable</strong>

			<p>North American has been in the insurance business for over 130 years. The company has excellent financial ratings, has issued policies worth billions, and also has assets worth billions.</p>

			<p>Moreover, longevity is usually a sign of financial stability and prudence, especially in the insurance industry. North American has survived a number of downturns and has emerged stronger on each occasion. It means you can trust the company with your money.</p>

			<h3>Employee Owned (ESOP)</h3>

			<p>North American is privately owned, which certainly has its own advantages. Publicly held companies often have to worry about short-term earnings and have to take unwanted risks with their investments. In addition to being privately owned, it is owned by its employees.</p>

			<p>A privately owned company, on the other hand, can afford to make conservative investment choices and focus on long-term growth, rather than being obsessed with quarterly earnings.</p>

			<h3>Liberal Underwriting</h3>

			<p>North American is known to approve people who are likely to be considered high risk by most other companies. So, even if you are not in the best of health, you can expect to get approved by the company. The underwriting process mirrors that of competitor <a href="https://www.noexam.com/life-insurance/companies/protective/">Protective</a>. Both companies allow for accelerated underwriting if you are in generally good health. </p>

			<h3>Excellent Indexed Universal Life Policy</h3>

			<p>North American offers an excellent indexed universal life policy, which is flexible, has high growth potential, and offers accelerated death benefits at no cost.</p>

			<p>The policy has a 0% interest floor, which prevents the risk of negative returns and makes sure your policy does not lose its cash value even during a downturn. The built-in accelerated death benefit rider pays you if you are diagnosed with a critical or terminal illness.</p>

			<p>The premium payments are flexible, which means you can adjust your monthly or yearly contributions to the policy based on your financial situation.</p>

			<p>On the whole, it is a very good product which is ideal for those who are looking for a permanent life policy with high growth potential and downside protection.</p>

			<h2 id="cons">Downsides to North American's Life Insurance</h2>

			<h3>Not the Cheapest</h3>

			<p>North American’s policies are not expensive, but they are also not <a href="https://www.noexam.com/life-insurance/cheap/">the cheapest</a>. The company is in the middle of the pack in terms of policy costs. So, if you are looking for the cheapest <a href="https://www.noexam.com/life-insurance/term/rates/">life insurance rates</a>, North American is probably not the right choice for you. If you are young and healthy you are better off shopping with other A+ rated providers. Try looking at North Americans top rivals Prudential, <a href="https://www.noexam.com/life-insurance/companies/aig/">AIG</a>, and <a href="https://www.noexam.com/life-insurance/companies/lincoln-national/">Lincoln</a></p>

			<h2>Final Thoughts on North American</h2>

			<p>North American Company for Life and Health Insurance is financially stable and reliable. It is also one of the oldest and most reputable insurers in the country today. If you are looking to buy an indexed universal life policy, North American might be a good choice for you.</p>

		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
