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
					<li><a href="#about">About Ethos</a></li>
					<li><a href="#ratings">Financial Strength</a></li>
					<li><a href="#products">Products Offered</a></li>
					<li><a href="#application">Application Process</a></li>
					<li><a href="#advantages">Advantages</a></li>
					<li><a href="#disadvantages">Disadvantages</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Ethos Life Insurance Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/ethos-logo-black.svg" width="122" height="99"/></div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>Financial Rating</h6>
							<h5>A-</h5>
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
							<p>415-843-8467</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>2016</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Term</p>
						</div>

					</div>
					<a href="https://www.noexam.com/out/ethos.php">Get A Quote</a>
				</div>
			</div>
			<p>Have you ever wondered what it would be like to apply for, get qualified, and buy a life insurance policy instantly, instead of having to wait for weeks?</p>

			<p>Up until a few years ago, it would have sounded too good to be true, but today it is entirely possible thanks to a new breed of digital insurers who allow you to buy the insurance products you need within minutes.</p>

			<p>Ethos is one such insurance company which has quickly made a name for itself by offering term life policies which can be bought through its website.</p>

			<p>What does Ethos bring to the table as an insurance provider? How does the company’s application process differ from traditional insurance providers? Let us take a look in this <strong>in depth Ethos life insurance review</strong>.</p>

			<h2 id="ourtake">Our Take</h2>
			<blockquote class="blue">Ethos is the ideal insurance provider for the digital age. There is no paperwork, no waiting period, and no tests in most cases. You can get approved within 10 – 15 minutes of applying for a policy. Their products are issued by financially strong companies, and there should be no cause for concern in that department. If the price is right for your needs, Ethos is a solid choice.</blockquote>

			<h2 id="about">About Ethos</h2>


			<p>Ethos was founded in 2016 by Lingke Wang and Peter Colis. It is based in San Francisco, California. The company offers term policies which can be bought online without the need for any middlemen. Their website is <a href="https://www.noexam.com/out/ethos.php">GetEthos.com</a>.</p>

			<p>Ethos has partnered with a number of major players in the industry including Assurity Life Insurance, Aon, RGA, and Munich Re.</p>

			<p>They recently <a href="https://news.crunchbase.com/news/ethos-raises-46-5m-to-simplify-and-modernize-life-insurance/">raised another round</a> totaling $35m in additional funding. This brings their total amount of funding to $46.5m. Investors include Sequoia Capital, Arrive (Roc Nation), Stanford University, Robert Downey Jr, Will Smith and Kevin Durant.</p>

			<p><strong>Update: Aug 2019</strong></p>
			<p>Ethos raised an additional <a h ref="https://news.crunchbase.com/news/ethos-raises-60m-more-in-gv-led-series-c-marking-third-raise-in-14-months/">$60 million dollar of series C funding in August of 2019</a>. Ethos plans to expand their locations to Austin and Singapore. In addition Ethos has added <a href="https://www.noexam.com/life-insurance/companies/banner/">Banner Life Insurance company</a> to their platform. This is a significant update to their coverage offering as Banner boasts an A+ financial rating from A.M. Best. Ethos is now only one of two life insurance startups offering more than one direct option, the other being <a href="https://www.noexam.com/life-insurance/companies/health-iq/">Health IQ</a></p>


			<h2 id="ratings">Financial Strength</h2>

			<p><strong>Ethos policies are underwritten and issued by Assurity Life Insurance Company or Banner Life.</strong> Assurity is a mutual life insurance company based in Nebraska. Having been in business for over 120 years, Assurity is one of the most reliable insurance providers in the country today.</p>

			<p>Assurity has an A– (Excellent) rating from A.M. Best. It is the second highest rating offered by the agency, which is a testament to the company’s financial stability.</p>

			<p>Assurity has over <a href="https://www.assurity.com/our-impact">$2.5 billion in assets</a>. In 2017, the company paid $69.3 million in death benefits, $124.7 million in living benefits, and $12.9 million in dividends to its policyholders. It is, without a doubt, one of the most financially sound insurance providers in the United States. Ethos products are available in all US states except New York.</p>

			<p>Banner Life, whose parent company is Legal and General, boasts some strong financials as well. According to their <a href="https://www.lgamerica.com/corporate/financials">corporate financials</a>, Legal & General has 1.3 million US customers, $734 billion of coverage in force, and over $5 billion in assets. Legal & General is rated A+ by AM Best, AA- by S&P, and AA- by Fitch.</p>


			<h2 id="products">Term Life Policies by Ethos</h2>

			<p>The <a href="https://www.noexam.com/life-insurance/term/">term life insurance</a> policies offered by Ethos provides you with the coverage you need for a specific time period. The key features of the policy include</p>
			<ul>
				<li>Four term lengths to choose from – 10, 15, 20, or 30 years.</li>
				<li>The coverage amount can range from $25,000 to $10 million.</li>
				<li>To be able to apply for the policy, you need to be a US citizen between the ages of 18 and 75.</li>
				<li>The premium is determined by the company at the time of issuing the policy and it remains unchanged until the end of your policy’s term.</li>
				<li>The coverage amount also remains the same until the end of your policy’s term.</li>
				<li>You are allowed to cancel the policy at any time for any reason.</li>
			</ul>
			<h2 id="application">Ethos Application Process</h2>
			<a href="https://www.noexam.com/out/ethos.php"><img class="img-fluid rounded float-right" src="https://www.noexam.com/img/ethos-rates-min.png" alt="ethos rates"/></a>
			<p>To apply for a policy, you need to first create an account with Ethos. It is very simple and only takes about a minute. Once you have an account, you can get started with the application process.</p>

			<p>You need to answer a wide range of questions regarding your health status, occupation, lifestyle, financial situation, family history of health, and more. The company uses advanced algorithms to analyze the information you provide in real time and determine your insurability.</p>

			<p>Within 10 minutes of your application, the company lets you know of your status – whether you are approved, declined, or if you need to undergo a medical exam.</p>

			<h2>Getting Approved</h2>

			<p>If you are healthy and do not have any pre-existing conditions, you are likely to <a href="https://www.noexam.com/life-insurance/approval-time/">get approved instantly</a>. In which case, your life insurance coverage starts immediately.</p>

			<h2>Does Ethos Require a Medical Exam?</h2>

			<blockquote class="green">In some cases, depending on your health condition, you might be asked by the company to undergo a medical exam. Similarly, if you need more than $1 million in coverage, you might be asked to undergo a medical exam.</blockquote>

			<p>You can get it done at a time and place (your home or office) of your choosing. It does not cost you any money and you can expect to get the results in a week’s time.</p>

			<h2>Getting Declined</h2>

			<p>If you have health issues, which are serious enough for the company to consider you a high-risk applicant, you might be declined, in which case the company will give you a letter of explanation to inform you as to why your application was rejected.</p>

			<h2>No-Exam Policy</h2>

			<p>One of the biggest advantages of applying for a policy with a digital insurer like Ethos is that you might be able to buy the <a href="https://www.noexam.com/life-insurance/companies/no-exam/">coverage you need without taking any medical tests</a>.</p>

			<p>If you are healthy and need less than $1 million in coverage, you can get approved without going through any medical exam. It saves you a lot of time, as there is no need for you to give your blood and urine samples and then wait for a week to hear from the company.</p>

			<h2>The Underwriting Process</h2>

			<p>The underwriting process is as fast as it is sophisticated. The algorithms used by the company do not just analyze the numbers, but also examine various other factors to determine your true insurability.</p>

			<p>Let us say two individuals apply for a policy with Ethos. Person A has $50,000 in credit card debt and Person B has $100,000 in college loan debt. In such a scenario, Person B is more likely to get approved and assigned a lower risk class compared to Person A, even though the former is carrying more debt.</p>

			<p>The company’s algorithms are sophisticated enough to distinguish between different forms of debt and assign an appropriate risk class for individual applicants. While there is no utility or value in credit card debt, a degree (particularly in STEM fields) can improve your career prospects considerably.</p>

			<h2>Term Length</h2>

			<p>Ethos offers you four term lengths to choose from – 10, 15, 20, or 30 years, depending on your age. Given below is a table in which you can find the maximum term length applicable for different age groups.</p>

			<table>
				<tr>
					<th>Age</th>
					<th>Maximum Term Length</th>
				</tr>
				<tr>
					<td>18 - 55 (50 if you are a smoker)</td>
					<td>30 Years</td>
				</tr>
				<tr>
					<td>56 - 65</td>
					<td>20 Years</td>
				</tr>
				<tr>
					<td>66-70</td>
					<td>15 Years</td>
				</tr>
				<tr>
					<td>71-75</td>
					<td>10 Years</td>
				</tr>
			</table>

			<h2>Riders Offered</h2>

			<p>Ethos offers a number of riders along with its term life policy. They include:</p>
			<ul>
				<li><strong>Critical Illness Rider</strong> – It pays you a portion of the coverage amount in case you are diagnosed with a critical illness.</li>
				<li><strong>Child Term Rider</strong> – It offers life insurance coverage for your children until the age of 18.</li>
				<li><strong><a href="https://www.noexam.com/life-insurance/waiver-of-premium/">Waiver of Premium Rider</a></strong> – It waives off your premiums in case you get disabled due to an injury or illness.</li>
				<li><strong>Return of Premium Rider</strong> – It repays the total amount of premiums you paid in case you outlive your policy.</li>
			</ul>
			<h2>Premium Payments</h2>

			<p>You are required to pay the premium on a monthly basis. In case you miss a month’s payment, you have a 31-day grace period, within which you can make the payment. If you fail to do so, the company will terminate your coverage.</p>

			<p>Now, let us take an in-depth look at the advantages and disadvantages of choosing Ethos as your life insurance provider.</p>

			<h2 id="advantages">Ethos Advantages </h2>

			<h3>Online Application Process</h3>

			<p>Being a digital insurer, Ethos allows you to apply for and buy a term life policy through its official website. The Ethos application can be completed online, so there is no paperwork involved and you do not have to deal with pushy sales people.</p>

			<p>It only takes about 10 minutes to apply for a policy and if you are approved, your life coverage starts immediately. With traditional insurance providers, the same process could take anywhere from two to six weeks.</p>

			<h3>No Medical Exam (Potentially)</h3>

			<p>Ethos allows you to purchase life insurance coverage without any lab tests or physicals, as long as you are healthy and do not need more than $1 million in coverage.</p>

			<p>While a lab test or a physical is not terribly inconvenient and only takes about 20 minutes, it does delay the whole process. You have to wait at least 7 to 10 days to get the results and hear from the company, which can be frustrating. With Ethos, you can skip the exam and get approved straightaway.</p>

			<h3>Affordable Term Life Insurance</h3>

			<p>The term life policy offered by Ethos is affordably priced and is <a href="https://www.noexam.com/life-insurance/cheap/">cheaper than the term life plans</a> offered by most other insurance providers. If you are a 30-year old woman in good health, you can buy $1 million in coverage for $30 a month. It’s less than what most people spend on coffee and with lower taxes it’s even more affordable!</p>

			<h3>Substantial Coverage</h3>

			Depending on your age, your coverage amount can be anywhere from $25,000 to $10 million. Such a wide range allows you to choose the exact amount of coverage you need depending on your income level and financial needs.

			<h3>Fits Within Your Budget</h3>

			<p>With Ethos, you can make sure that the monthly rates fits within your budget.</p>

			<p>Let us say that your budget is $25 a month. If a $250,000 policy costs $30 a month, Ethos will offer you a policy for $220,000 with a monthly premium of $30.</p>

			<p>In other words, the death benefit does not have to be $250,000 or $500,000. It can be any amount in between, depending on your budget. Not many insurance providers offer you this kind of flexibility with respect to the coverage amount.</p>

			<h3>Optional Riders </h3>

			<p>Ethos offers four different riders along with its term life policies. In this aspect, it stands out from other digital insurers like Haven Life (which only offers two riders) and Ladder (which does not offer riders at all).</p>

			<p>The riders provide you with living benefits in the event of a critical illness or disability, provide life insurance coverage for your children, and pay you back the total amount of premiums you pay over the policy term. Depending on your needs, you can choose to add one or more riders to your policy.</p>

			<h3>Financial Strength</h3>

			<p>Assurity is the company which underwrites and issues the term life policies offered by Ethos. It has been in the insurance industry for nearly 130 years now. Ethos has also partnered with major players like Aon, RGA, and Munich Re, all of which are well-established, reliable, and financially stable.</p>

			<h2 id="disadvantages">Ethos Disadvantages</h2>

			<h3>No Whole Life Insurance</h3>

			<p>This is a common complaint against digital insurance companies in general, as they only offer term life policies. It makes sense, since these companies aim to simplify the process of buying life insurance.</p>

			<p>Permanent life policies, by their very nature, are complicated. There are too many variables involved (cash value, interest rate, dividends, index performance, market conditions, and so on) and the costs are also much higher.</p>

			<p>However, there are many people who prefer to buy permanent life policies thanks to the sense of lifelong security they offer, even if it means paying a little more. If you are one of them, you should consider other companies which offer a number of whole life and universal life policies.</p>

			<h3>Email Based Support</h3>

			<p>Ethos uses email as its main point of contact with its policyholders. The official website does not have any phone numbers, which means you cannot talk to anyone directly. Whether you are a new applicant, existing policyholder, or a beneficiary who is looking to file a claim, you have to contact the company via email only.</p>

			<p>While the company is prompt in responding to emails, it does seem a little impersonal, as many people prefer to talk to a real person, especially if they are grieving the loss of a loved one.</p>

			<h2>Final Thoughts on Ethos</h2>

			<p>If you are looking to buy a term life policy without going through the hassle of paperwork or medical tests, Ethos is a sagacious choice. On the other hand, if you need lifelong coverage or if you are over the age of 60 and need a 20 or 30-year term life policy, a traditional insurance company might be the right choice for you.</p>


		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
