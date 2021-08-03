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
					<li><a href="#proscons">Pros and Cons</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Bankers Life Insurance Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/bankers.png" width="125" height="125"/></div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>AM Best Rating</h6>
							<h5>A-</h5>
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
							<h6>Phone </h6>
							<p>1-312-396-6000</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>1879</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Term, Whole, Universal</p>
						</div>

					</div>
					<a href="https://www.noexam.com/apply-now/">Compare Quotes</a>
				</div>
			</div>
			<p>Bankers Life is one of the oldest and most well-known insurance companies in the United States. </p>

			<p>Based in Chicago, Bankers Life Insurance Company has a nationwide presence and employs a large network of agents to sell its <a href="https://www.noexam.com/life-insurance/term/">term life</a> and permanent life policies to customers all over the country. </p>

			<p>Like many <a href="https://www.noexam.com/life-insurance/companies/">life insurance companies</a>, Bankers Life is owned by a parent holding company that owns similar companies in the life insurance space. Bankers is a subsidiary of CNO Financial Group which is a reputable Fortune 1000 company.</p>

			<p>Is Bankers Life the right life insurance provider for you? Like other insurance companies, they have a target market they just so happen to be very competitive in. Find out in this review if Bankers is a good fit for you. </p>

			<p>You will find the answers to all these questions in this review. </p>

			<h2 id="ourtake">Our Take</h2>
			<blockquote class="blue">Bankers life insurance has a sweet spot, if you happen to fit inside their target market you are likely to be very satisfied with your rates and coverage. Their niche is individuals in retirement or very close to retirement age.</blockquote>
			<?=$this->render('/main/widgets/apply-now-form.php', ['position' => 'center', 'width' => '100%']);?>
			<h2 id="about">About Bankers Life</h2>

			<p>The journey of Bankers Life and Casualty Company started in 1879, when its predecessor – the Hotel Men’s Mutual Benefit Association – was established. The company was acquired by noted businessman and philanthropist John D. MacArthur in 1935.</p>

			<p>MacArthur, who was a keen observer of the manufacturing sector, was impressed with the mass marketing strategies used by American manufacturers and decided to employ the same strategies to sell insurance. He made insurance products more affordable for people from middle-income households and widened the company’s customer base greatly. </p>

			<p>Today, Bankers Life operates as a wholly-owned subsidiary of CNO Financial Group, which is a Fortune 1000 company with $30 billion in assets. Apart from life insurance, the company also offers long-term care insurance, supplemental health insurance, and annuities. </p>

			<h2 id="ratings">Financial Ratings</h2>
			<ul>
				<li>A.M. Best: A- (Excellent)</li>
				<li>Moody’s: Baa1 (Medium Grade)</li>
				<li>Standard & Poor’s: BBB+ (Adequate)</li>
				<li>Fitch: BBB+ (Satisfactory)</li>
				<li>Comdex: 56</li>
				<li><a href="http://news.ambest.com/presscontent.aspx?altsrc=14&refnum=27534">Source</a></li>
			</ul>

			<blockquote class="green">Bankers Life, Colonial Penn, and Washington National are owned by CNO. They share one financial rating and long-term financial outlook that is based on the financial strength of CNO as a whole.</blockquote>

			<p>It matters a lot in the insurance industry, as there are also companies which have been given an ‘A’ rating by all four agencies consistently. </p>

			<h2 id="products">Policies Offered by Bankers Life</h2>

			<h3>Term Life Insurance</h3>

			<p>Bankers Life offers a traditional term life policy which provides you with coverage for a specific time period. You can choose to buy a 5-year, 10-year, or a 20-year policy, depending on your needs. </p>

			<p>This, as you are probably aware of, is one of the best features of a term life policy. You get to choose the coverage period, which means you only pay for what you need.</p>

			<p>The policy offers a fixed death benefit, which remains unchanged throughout the coverage period. If you happen to pass away while the policy is active, the beneficiary designated by you will receive the death benefit amount. </p>

			<p>This is a level-premium plan, which means you do not have to worry about paying more towards premium as the years go by.</p>

			<p>What you pay at the start of the coverage period is also what you will pay when the coverage ends. So, you can plan your monthly and yearly budgets accordingly, without worrying about sudden, unexpected increases in premium payments.</p>

			<p>The policy is affordably priced and is far <a href="https://www.noexam.com/life-insurance/cheap/">cheaper than a permanent life policy</a>. If you are a non-smoker who happens to be in good health, you can qualify for the lowest risk class and get sufficient coverage at extremely competitive <a href="https://www.noexam.com/life-insurance/term/rates/">life insurance rates</a>.</p>

			<h3>Whole Life Insurance</h3>
			<div class="company-box">
				<p>Bankers Life’s whole life policy is designed to provide you with lifetime coverage. As long as the premium payments are made on time, you never have to worry about the coverage ending at any point in your life. </p>

				<p>One of the biggest advantages of buying a whole life policy is that you do not have to worry about your insurability anymore. It is not the case with a traditional term life policy. </p>

				<h4>The Insurability Conundrum</h4>

				<p>Let us say someone buys a 30-year term life policy at the age of 30. When it expires, they will be 60. Now, at this point, if they are in a financially secure position, they might not need life insurance anymore, in which case they are lucky.</p>

				<p>If, on the other hand, they still need life insurance at 60, they will have to apply for a new policy. They might, however, find it difficult to qualify for a policy, owing to their age and any health problems they might have developed in the meantime.</p>

				<p>With a whole life policy, you can avoid these problems entirely. Once you buy a policy, it stays in effect until your death – you never have to worry about applying for another policy in your lifetime. </p>

				<p>Just like the company’s term life policy, this one too is a level-premium policy, which means the amount of premium you pay remains the same throughout the policy’s term. </p>

				<h4>Living Benefits Offered by Cash Value Component</h4>

				<p>The most important feature of a whole life policy – and the reason why many people prefer it over a term life policy – is the built-in cash value account. It is similar to a savings account. </p>

				<p>You deposit a certain amount of money (a portion of your premium payment) on a regular basis. The account grows in value by accruing interest at a fixed rate, which is determined by your insurance provider. </p>

				<p>You can think of the cash value account as a contingency fund. In case of an emergency, you can get the money you need by borrowing against your policy’s cash value. </p>

				<p>The important thing to be noted here is that a cash value loan is similar to a regular loan – you need to pay it back with interest. </p>

				<p>In case you fail to do so, the outstanding amount (principal as well as interest) will be deducted from your policy’s cash value.</p>
			</div>

			<h3>Universal Life Insurance</h3>
			<div class="company-box">
				<p>Bankers Life’s universal life policy offers you a lifetime of protection. You are covered for as long as you live, which means you do not have to worry about leaving your dependents in a lurch in the event of your untimely death. </p>

				<p>The policy has a cash value account which steadily grows in value all through the coverage period.</p>

				<p>The rate of interest for the account is decided by the insurance provider. It is a guaranteed rate of interest, which means it will be paid irrespective of the company’s performance or market conditions. </p>

				<p>You can borrow against your policy’s accumulated cash value, should the need arise, and repay it with interest. The interest rate charged by the insurance company is usually lower than the rate typically charged by banks and other financial institutions.</p>

				<p>You can also use the money in your cash value account to make the premium payments. You should, however, be conservative in your approach and make sure you do not deplete your policy’s cash value. </p>

				<p>If your cash value account does not have sufficient money to meet the minimum limits set by the company, your policy could lapse. So you should use your policy’s cash value only in case of an emergency. </p>

				<p>Perhaps the biggest advantage of a universal life policy is that you get to choose the amount of premium you pay on a monthly or yearly basis. If you are strapped for cash, you can choose to pay the minimum amount, which is set by the company. If you get an unexpected bonus or incentive, you can choose to pay more.</p>

				<h4>Living Benefits Option</h4>

				<p>One of the highlights of Bankers Life’s universal life policy is that it comes with a living benefit option. If – during the course of the policy, you develop a chronic illness, a portion of your death benefit will be paid out to you in the form of monthly payments.</p>

				<p>You can use the money to pay for the treatment as well as the ongoing medical management expenses. </p>

				<p>The living benefits option can be particularly beneficial for families with a single breadwinner. In the absence of such an option, the primary earner developing a chronic illness might be a nightmare-like scenario for the family. </p>

				<p>If the breadwinner has a regular life insurance policy which does not cover such expenses, the family might be left with no option but to use their savings to pay for the treatment. In some cases, they might be forced to sell their possessions as well.</p>

				<p>With the living benefit option, you can afford to pay for your medical expenses all by yourself, without passing on the burden to your loved ones. If you pass away after having made use of the living benefits option, your beneficiary will receive what is left of your death benefit amount. </p>
			</div>
			<h3>Long-Term Care Insurance</h3>

			<p>Bankers Life offers two types of long-term care insurance policies – facility-only policy and comprehensive policy.</p>

			<p>Facility-only policy, as the name indicates, pays for your long-term care expenses if you are institutionalized in a nursing home or an assisted living facility. </p>

			<p>Comprehensive policy, on the other hand, covers the expenses associated with your long-term care, irrespective of where you are. You could be bedridden in your own home and cared for by your family members or you could be institutionalized. Either way, the policy will pay for your needs. </p>

			<h2 id="proscons">Pros and cons of Choosing Bankers Life as Your Insurer</h2>

			<strong>Pros</strong>
			<ul>
				<li>The company offers traditional term life and whole life policies which are designed to meet your financial needs.</li>

				<li>While there are no standout features or benefits, these policies can be a good choice for those who are in need of a pure term or whole life product without too many add-ons or riders.</li>

				<li>The company’s best offering it its universal life policy, which includes a living benefits option. Knowing that you can access your policy’s death benefit in case you develop a chronic disease can give you a sense of security.</li>

				<li>The company’s long-term care policy is an excellent choice for senior citizens. You can choose the cheaper facility-only policy or the slightly more expensive, but very comprehensive long-term care policy, depending on your preference.</li>

				<li>The company offers free consultation services for anyone who is looking to buy life insurance, long-term care insurance, health insurance, or annuities. You can talk to a knowledgeable agent, who can suggest the product for you based on your needs and financial situation.</li>
			</ul>
			<strong>Cons</strong>
			<ul>
				<li>Bankers Life has a ‘B’ rating from all the major credit rating agencies. As mentioned above, it is not a bad rating at all. However, it does look average in comparison to companies which boast of ‘A’ and ‘A+’ ratings.</li>

				<li>The company does not offer a large selection of policies. The lack of a variable universal life policy and an indexed universal life policy is certainly a downside, especially if you are someone who is looking to get higher returns on your investment.</li>
			</ul>
			<h2>Is Bankers Life the Right Choice for You? </h2>

			<p>Bankers Life is an established name in the industry. The company has been around for more than a hundred years, which should instill a sense of trust in anyone who is looking to buy a policy from them. </p>

			<p>So, is Bankers Life a good choice for you? It really depends on your insurance needs. </p>

			<p>If all you need is a pure term life policy or a traditional whole life policy – without any additional features or benefits – Bankers Life might be a good fit for you. You can get a free, personalized quote from the company, compare it with what other companies offer, and make a decision. </p>

			<p>If you, on the other hand, need something more, there are several other options available for you. Especially, if you are in need of a variable universal life policy or an indexed universal life policy, Bankers Life is not the right company for you, since they do not offer any of these products. </p>

		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
