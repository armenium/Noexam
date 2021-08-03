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
					<li><a href="#products">Products</a></li>
					<li><a href="#pros">Pro's</a></li>
					<li><a href="#cons">Con's</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>AIG Life Insurance Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/aig-life-insurance-review-300x159.jpg" width="150" height="75"/></div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>Financial Rating</h6>
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
							<h6>Phone </h6>
							<p>800-888-2452</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>1919</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Term, Whole, Universal</p>
						</div>

					</div>
					<a href="https://www.noexam.com/out/aig.php">Get A Quote</a>
				</div>
			</div>
			<p>On December 19th, 2019 AIG will celebrate their 100th anniversary in business. If you're researching life insurance online, odds are you have come across rates from AIG. With nearly 100 years of underwriting expertise, you will find AIG among the most competitive life insurance companies in business. In other words, their life insurance products are priced to compete with the best rates you will find on the market.
			</p>
			<p>In this review, we take a detailed look at AIG's history, current position in the market, products offerd, and the pros and cons of choosing the company as your provider.</p>

			<h2 id="ourtake">Our Take - Is AIG the Right Choice for You?</h2>
			<blockquote class="blue">
				<p>On the whole, AIG is a well-known, financially stable company that offers a unique range of policies for customers with different needs. You cannot go wrong with most of their policies, as they are structured with a great deal of flexibility and customization options. You should, however, keep in mind that AIG is one of the many choices available for you in the market today.</p>
				<p>You can take a look at the policies offered by some of the best life insurance companies, compare the prices with AIG’s policies, and then choose one that fits your budget.</p>
			</blockquote>

			<?=$this->render('/main/widgets/comparison-ratings.php', ['company_1_id' => $this->context->current_cat->company_id, 'company_2_id' => null]);?>

			<h2 id="history">About AIG Life Insurance</h2>
			<p>Today, the company has a solid presence in over 80 countries around the world and does business with a large number of the Fortune Global 500 corporations. Despite being one of the worst-hit companies of the 2008 financial crisis, AIG has managed to bounce back strongly to retain its position in the market. Because of AIG’s current broad investment diversification and superior financial strength, we have included them as a contender in our overview of the top life insurance companies.</p>
			<h2 id="ratings">AIG Financial Ratings</h2>

			<ul>
				<li>Standard &amp; Poor’s = A+ (Strong)</li>
				<li>Moody’s = A2 (Good)</li>
				<li>Fitch = A+ (Strong)</li>
				<li>A.M. Best = A (Excellent)</li>
				<li>Comdex Score = 81</li>
			</ul>
			<p>Financial ratings are one of the most important indicators of an insurance company’s financial stability. The financial crisis in 2008 and the subsequent bailout by the government affected AIG’s ratings and its standing in the market for a brief period of time, but the company has reconsolidated its position in the market and regained the trust of rating agencies.</p>
			<p>Above is a list of ratings that AIG has earned from the leading agencies in the industry.</p>
			<p>AIG has $491 billion in assets (<a href="#1">1</a>), which is yet another reason why it is considered a financially stable company by many experts.</p>
			<h2 id="products">AIG’s Life Insurance Policies</h2>
			<blockquote class="green">AIG offers a wide range of life insurance policies to meet the needs of people from different backgrounds and income levels.</blockquote>
			<h2>AIG Term Life Insurance</h2>
			<p>AIG offers a very unique <a href="https://www.noexam.com/life-insurance/term/">term life insurance</a> policy called Select-a-Term, which allows you to choose the term period of the policy. Unlike other insurance companies, which offer term life policies with fixed time periods, AIG offers you a significant deal of flexibility with respect to the term period.</p>
			<p>You have the option of choosing an AIG term life policy that lasts for 10 years or a policy that lasts anywhere from 15 to 35 years. You can choose from 18 different durations, depending on your financial needs.</p>
			<p>For instance, if you have 16 years left on your <a href="https://www.noexam.com/life-insurance/mortgage/">mortgage</a>, it makes little sense to choose a 20-year term policy, as you will have to pay for another four years even after your mortgage is paid off.</p>
			<p>Similarly, if you are retiring in 22 years, it is not a good idea to choose a 20-year policy, as it will leave you without coverage for the last two years, which is when you need it the most. So, your only choice is to opt for a 25-year policy, which means you have to pay for coverage that you do not need.</p>
			<p>AIG Select-a-Term eliminates the problem completely by letting you choose the term period that you need. Whether you need a 16-year policy, 21-year policy, 27-year policy, or a 34-year policy, it is entirely your choice. Kind of like Burger King, you can order that Whopper how you prefer it.</p>
			<h2>Convertible Term Life Insurance</h2>
			<blockquote class="blue">AIG also offers you the choice to convert your term life policy into a permanent policy any time before the policy expires or when you turn 70, whichever comes first.</blockquote>
			<p>The best part about the convertibility option is that there is no additional underwriting involved and your insurability is not taken into account.</p>
			<p>There are two scenarios where the convertible option might come in handy.</p>
			<ul>
				<li>Your term policy is about to expire, but you still have financial commitments and want to stay insured. In such a case, it is not advisable to let your existing policy expire and then buy a new policy, as you will have a hard time qualifying for a policy. Even if you do, you will have to pay more due to your age. So, it is an astute idea to convert your existing policy into a permanent one without having to go through a number of medical tests again.</li>
				<li>You have been diagnosed with a health ailment towards the end of your term policy and you want to make sure that your family’s needs are taken care of in case something happens to you. Again, in such a scenario, you cannot let your policy expire and then buy a new one, since you are not likely to qualify for one with an existing health problem. Even if you do, you will be charged a much higher premium compared to a normal or healthy person. So, converting the term policy into a permanent one is the best option for you.</li>
			</ul>
			<h2>Quality of Life Insurance</h2>
			<div class="company-box">
				<p>AIG’s Quality of Life policy provides a death benefit in the event of the policyholder’s death, just like a term life policy. In addition to it, the policy also offers what is called ‘living benefits’ – financial assistance while the policyholder is still alive. The benefits are paid out to the policyholder if they are diagnosed with a chronic illness, critical illness, or terminal illness.</p>
				<p>There are four types of Quality of Life policies available.</p>
				<p><u>QoL Flex Term</u> – It includes guaranteed benefit and living benefits and also allows you to choose the term period – 10 years, 15-30 years, or 35 years.</p>
				<p><u>QoL Guarantee Plus GUL II</u> – It includes guaranteed benefit and living benefits and also builds cash value to provide you with supplementary income.</p>
				<p><u>QoL Value<sup>+</sup> Protector</u> – It includes guaranteed benefit up to the age of 100 and living benefits. Being an index universal life policy, it allocates a portion of your premium in index accounts. Whenever the stock market index goes up, your account earns an interest. If the cash value grows larger than the company’s assumptions thanks to an upward trending stock market, you have the option of withdrawing the excess cash value as well.</p>
				<p><u>QoL Max Accumulator<sup>+</sup></u> – It includes guaranteed death benefit and living benefits. It is an index universal life policy with downside protection. When the index goes up, your account earns interest. When it goes down, your account does not lose money, as the policy’s built-in feature protects the existing cash value.</p>
			</div>
			<h2>Universal Life Insurance</h2>
			<div class="company-box"><p>AIG offers four guaranteed universal life policies.</p>
				<p><u>Secure Lifetime GUL 3</u> – It includes a guaranteed death benefit and the option to surrender the policy in the 20<sup>th</sup> year (you will receive 50% of the premiums you paid) or in the 25<sup>th</sup> year (you will receive 100% of the premiums you paid or 40% of the face value, whichever is smaller).</p>
				<p>You can choose the term period or the age at which you need the death benefit and also structure your own payment plan. You can access your death benefit while you are still alive, if you are diagnosed with a chronic illness. If you live beyond 85, you can access the death benefit in the form of supplemental monthly payments as well.</p>
				<p><u>AG Secure Survivor GUL II</u> – It offers a guaranteed death benefit, which is paid out to your beneficiaries when you and your spouse pass away. You can choose the term period or the age at which you want the death benefit to be paid out. You also have the option to surrender the policy in the 15<sup>th</sup> year and receive up to 100% of the premiums you paid. The policy accrues cash value at a guaranteed rate, which you can access for various purposes.</p>
				<p><u>Value<sup>+</sup> Protector</u> – This is the same as the QoL Value<sup>+</sup> Protector policy. It includes a guaranteed death benefit, living benefits, and a cash value whose growth depends on the performance of the stock market index.</p>
				<p><u>Max Accumulator<sup>+</sup></u> – This is the same as the QoL Max Accumulator<sup>+</sup> policy. It includes a guaranteed death benefit, living benefit, and a cash value whose growth is tied to the market’s performance, but is protected against a market downturn.</p>
			</div>
			<h2>Variable Universal Life Insurance</h2>
			<p><u>AG Platinum Choice VUL 2</u> – It includes a guaranteed death benefit and a variable investment component, whose growth depends on the performance of the stock market. You can plan your own premium payment structure.</p>
			<p>You can make a partial or full surrender any time you want and receive the accumulated value. You can transfer your premium payments between the fixed account and the variable investment accounts. You can also take a policy loan any time you want.</p>
			<h2>Guaranteed Issue Whole Life Insurance</h2>
			<p>It is a no-strings attached policy for those who are between 50 – 85 years of age. There is <a href="https://www.noexam.com/life-insurance/companies/no-exam/">no medical exam involved</a> and you cannot be rejected for health reasons. It provides a guaranteed death benefit and also offers living benefits, which you can access in case you are diagnosed with a chronic or terminal illness.</p>
			<h2>Accidental Death &amp; Dismemberment Insurance</h2>
			<p>It is a policy that does not involve a medical exam. It includes a guaranteed death benefit (which will be paid out if you are killed in an accident) and living benefits (which will be paid out if you lose your sight or any of your limbs, if you suffer a stroke, and suffer certain other types of injuries).</p>
			<h2 id="pros">AIG Life Insurance – Pros</h2>
			<p>So, what are the advantages of choosing AIG as your insurance provider? There are quite a few, actually.</p>
			<ul>
				<li>Liberal underwriting policies for people in high-risk health categories, which make it easier for them to qualify.</li>
				<li>Premium payments are mostly affordable, compared to many other companies.</li>
				<li>The company offers a wide range of policies, so no matter how unique your needs are, chances are you can find a policy that matches your requirements sharply.</li>
				<li>Most policies have extremely flexible terms and allow you to customize the premium payment structure, policy duration, and other aspects.</li>
				<li>Many policies offer a built-in living benefits feature at no extra cost, which is a huge advantage.</li>
			</ul>
			<h2 id="cons">AIG Life Insurance – Cons</h2>
			<p>The majority of policies offered by AIG involve a medical exam (the only exceptions are the Guaranteed Issue Whole Life policy and the Accidental Death &amp; Dismemberment policy).</p>
			<p>The limitation with a medical exam is that if you have any illness or <a href="https://www.noexam.com/life-insurance/health-conditions/">condition</a> that could put you in the high-risk category – high blood pressure, diabetes, high cholesterol levels, a family history of heart disease, and so on – and you might have to pay more towards the premium.</p>


			<h2>References</h2>
			<ol>
				<li><strong>AIG 2018 Combined Annual Statement</strong> - Available from: <a href="https://www.aig.com/content/dam/aig/america-canada/us/documents/investor-relations/2019/aig-2018-combined-annual-statement.pdf">https://www.aig.com/content/dam/aig/america-canada/us/documents/investor-relations/2019/aig-2018-combined-annual-statement.pdf</a></li>
			</ol>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
