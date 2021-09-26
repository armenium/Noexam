<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 29.09.2018
 * Time: 15:32
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;

$this->title = 'Life Insurance Quotes - Compare and Apply Online';
//$c = count($prices['plans']['sagicor']);
?>

<div class="page-content page-wrapper">

	<section class="container first text-center <?php if(!$display_form):?>hidden<?php endif;?>">
		<h1 class="title">Life Insurance Quotes</h1>
		<div class="desc hidden-xs">Compare Quotes To Get The Right Policy At The Right Price</div>
		<div class="trust-logos visible-xs"><img src="/img/trust_logos.jpg"></div>
	</section>

	<section class="container first text-center <?php if($display_form):?>hidden<?php endif;?>">
		<h1 class="title">Compare Quotes<span class="badge"><?=$total_terms_count;?></span></h1>
		<div class="desc">See the top companies prices side by side to compare.</div>
		<div class="trust-logos visible-xs mt20"><img src="/img/trust_logos.jpg"></div>
	</section>

	<?php if($display_form):?>
		<?=$this->render('/main/widgets/apply-now-main-form.php');?>
	<?php endif;?>

	<?php if(!$display_form):?>
		<?=$this->render('/main/widgets/quote-results-form.php', ['prices' => $prices, 'total_plans_count' => $total_plans_count, 'total_terms_count' => $total_terms_count]);?>
	<?php endif;?>

	<?php if($display_form):?>
		<section class="container third">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="testimonial">
						<div style="min-height: 100px; overflow: hidden;" class="shopperapproved_widget sa_rotate sa_count4 sa_horizontal sa_count4 sa_bgWhite sa_colorBlack sa_borderGray sa_rounded sa_jMy sa_fixed sa_showlinks sa_large sa_showdate "></div><script type="text/javascript">var sa_interval = 5000;function saLoadScript(src) { var js = window.document.createElement('script'); js.src = src; js.type = 'text/javascript'; document.getElementsByTagName("head")[0].appendChild(js); } if (typeof(shopper_first) == 'undefined') saLoadScript('//www.shopperapproved.com/widgets/testimonial/3.0/12271.js'); shopper_first = true; </script><div style="text-align:right;"><a class="sa_footer" href="https://www.shopperapproved.com/reviews/noexam.com/" target="_blank" rel="nofollow"><img class="sa_widget_footer" style="border: 0;" alt="" src=https://www.shopperapproved.com/widgets/widgetfooter-darklogo.png></a></div>
						<!--<span class="logo"></span>
						<span class="text">“Buying life insurane online from noexam.com was as easy as 1-2-3!”</span>
						<span class="author">- Brittany Anderson</span>-->
					</div>
				</div>
			</div>
		</section>
	<?php endif;?>

	<section class="container-fluid fourth">
		<div class="container w1130">
			<div class="row">
				<div class="col-sm-4 pgrid">
					<div class="tile">
						<div class="gray-title">
							Top Rated Companies
							<img src="/img/ab_logo.gif">
						</div>
						<div class="title">Compare Quotes from the Top Companies</div>
						<div class="description">Shop A Rated Carriers with Proven Track Records.</div>
					</div>
				</div>

				<div class="col-sm-4 pgrid">
					<div class="tile">
						<div class="gray-title">
							Coverage Amounts
							<img src="/img/umbrella.png">
						</div>
						<div class="title">Up to $1,000,000 of Coverage</div>
						<div class="description">Coverage with or without an exam available for ages 18-65.</div>
					</div>
				</div>

				<div class="col-sm-4 pgrid">
					<div class="tile">
						<div class="gray-title">
							Our Track Record
							<img src="/img/sa_logo.gif">
						</div>
						<div class="title">NoExam.com</div>
						<div class="description">BBB A+ Rated<br>4.8/5 Reviews (1000+ Ratings)<br><img src="/img/stars_4_8.gif"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container fifth w854">
		<div class="row">
			<div class="col-md-12">

				<h2>What Is Life Insurance?</h2>

				<p>Life insurance is a form of insurance that pays out a tax free lump sum of money when the insured passes away. The payout is paid to the beneficiary of the policy, usually a spouse or children, once a claim is filed. Life insurance has been around for hundreds of years and has been providing peace of mind for families who rely on their loved ones to provide for them financially. </p>

				<h2>What is a Life Insurance Quote?</h2>

				<p>A life insurance quote is a preliminary estimate of the cost of a life insurance policy. The prices are usually presented in monthly premium payments. The quote is not a final offer. It is an estimation. There are many factors life insurers look at during underwriting to determine your final rate. Here are some examples:</p>
				<ul>
				<li>Height and Weight</li>
				<li>Age</li>
				<li>Gender</li>
				<li>Health History</li>
				<li>Medical Records</li>
				<li>Prescription Report</li>
				<li>Driving Record</li>
				<li>Family Health History</li>
				<li>Lab Results</li>
				</ul>

				<p>If you are in perfect health chances are the final price comes back at the same price quoted. If you have health conditions or a family history of illness, you could have your price raised higher than the quoted amount.</p>

				<h2>Who Needs Life Insurance?</h2>

				<blockquote>Anyone who provides for other people financially should have life insurance. People who are the primary income earner in the family should certainly have a life insurance policy. </blockquote>

					<p><strong>If you or your spouse were to suddenly pass away, would your life be turned upside down financially?</strong> If so, you need life insurance.</p>

				<h2>How Much Life Insurance Do I Need?</h2>

				<p>The amount of life insurance you need is 7-10x your annual income plus enough coverage to cover all debts and and pay for your children's education expenses. For example, if you make $100,000 per year, have 3 young children that will attend college, and have a $200,000 mortgage you would calculate your needs as follows. </p>

				<p>In this calculation we have assumed the cost of 4 years of college to be $100,000 per child. The result of this calculation is the death benefit of the policy.</p>

				<p><strong>10 X $100,000 + 3 ($100,000) + $200,000 = $1,500,000 of life insurance coverage.</strong></p>

				<p>With the above calculation, you will want to get a life insurance quote with a coverage amount of $1,500,000.</p>

				<p>The term length should be whatever length of time you will have financial dependents and a mortgage. For most people this is 20-30 years, but it is different depending on your own personal situation.</p>


				<h2>What Are the Different Types of Life Insurance?</h2>

				<p>There are two main types of life insurance products you should be aware of as a consumer. They are <a href="https://www.noexam.com/life-insurance/term/">term life insurance</a> and <a href="https://www.noexam.com/life-insurance/whole/">whole life insurance</a> (also called permanent life insurance). Term life insurance provides coverage for a set number of years. Whole life insurance provides coverage for the rest of your life. </p>

				<p>The main benefit of term life insurance is its affordability. The drawback is that you can <a href="https://www.noexam.com/life-insurance/term/outlive-policy/">outlive your policy</a> and be left with no life insurance later in life when it becomes more expensive to buy coverage.</p>

				<p>The main benefit of whole life insurance is that the coverage does not expire. The drawback is the price. Whole life insurance is much more expensive than term. Whole life insurance also involves a cash value component which grows over time as you pay your premium. </p>

				<p>We do not recommend you purchase life insurance as an investment. There are many other investment options that will outperform the returns on a whole life policy. This is why most financial pundits recommend to buy term and invest the difference of money saved elsewhere. Read more on <a ref="https://www.noexam.com/life-insurance/term-vs-whole/">term vs whole life insurance</a>.</p>

				<h2>Which Type of Life Insurance is Right for You?</h2>

				<p>Most people buy term insurance. It provides a death benefit for the period of time when you need it the most. Your life insurance needs will decline over time, so it may not make sense to purchase a whole life policy.</p>

				<h2>How Do I Know I Am Getting The Right Policy?</h2>

				<p>To make sure you are getting the right life insurance policy there are a few questions you can ask yourself. Is it a reputable company? Does it provide a death benefit equal to or greater than my needs? Does the payment fit my budget? Do I understand what I am buying 100%?</p>

				<p><strong>A few red flags to watch out for are:</strong></p>
				<ul>
				<li>A sales agent that is aggressive and insisting you purchase a complicated policy that you do not understand.</li>
				<li>You've never heard of the company and it has low financial ratings.</li>
				<li>The premium is high but it is being justified as being a great investment.</li>
				<li>The sales agent you spoke with only represents one company.</li>
				</ul>

				<h2>What Life Insurance Companies Are Reputable?</h2>

				<p>In the United States, there are dozens of financially stable insurance companies. There are major ratings organizations that review the finances of these companies. As a consumer, you should only do business with the companies that have exceptional financial strength. If you are considering a company, check their AM Best, Moody's, S&P, and Comdex scores.</p>

				<p>This is a common request for shoppers on our website, so we compiled a list of the <a href="https://www.noexam.com/life-insurance/companies/">best life insurance companies</a> complete with ratings and comparisons.</p>

				<h2>Should I Buy Life Insurance Online?</h2>

				<p>We are living in a time where just about any product can be purchased online. Life insurance is one of those products. Shopping online has the benefit of comparing prices side by side to get the best value for yourself. With modern day technology there are even life insurance <a href="https://www.noexam.com/life-insurance/companies/no-exam/">policies that allow you to avoid the medical exam</a>.</p>

				<p>Whether you buy online or in person, the application process is the same.</p>

				<p>Something to be careful of is dodgy websites that will spam you with calls and emails non-stop. Before you submit your contact information or phone number on any website offering life insurance quotes, be sure to read the reviews about that website.</p>

				<h2>Do I Need an Agent?</h2>

				<p>The main benefit of using an agent in person is to have someone to answer your questions. A good insurance agency will represent many companies and help you to find the best rate. A bad agent will present you with only one option and try to convince you why it's a good idea to not shop around.</p>

				<h2>When is the Best Time to Buy Life Insurance?</h2>

				<p>We conducted a life insurance rate study where we found the best time to buy a term life policy is in your 30's. <a href="https://www.noexam.com/life-insurance/term/rates/">Life insurance rates</a> increase as you age. The longer you wait to buy life insurance, the more it will cost you. </p>

				<h2>What If I Have Health Conditions?</h2>

				<p>Life insurance is priced based on the risk of you passing away early. Having certain health conditions increases this risk, so therefore the price is higher if you have certain health conditions. This does not mean that you can't afford it. Millions of people with a less than perfect health history are able to get <a href="https://www.noexam.com/life-insurance/cheap/">affordable term life insurance</a> coverage every year.</p>

				<p>If you have serious health conditions and have been declined from traditional term life insurance, <a href="https://www.noexam.com/life-insurance/burial-insurance/">final expense</a> may be something to consider. This is a form of permanent life insurance that provides a small death benefit, usually $5,000 - $25,000 to cover funeral expenses.</p>

				<h2>NoExam's.com Security Promise</h2>
				<p>NoExam.com is committed to helping our customers shop for life insurance coverage online securely. As a company that sells life insurance, we understand just how important it is to safeguard your information.</p>

				<p>NoExam.com utilizes a strict privacy policy that governs data security and collection procedures. This policy includes that NoExam.com:</p>

				<p>Does not share your personal contact information with third parties unrelated to your application. </p>
				<p>Encrypts sensitive data and does not store it.</p>
				<p>Does not sell, rent or share your personal information to any third parties.</p>
				<p>In addition to these measures, NoExam.com partners with Comodo Security, Trust Guard, The Better Business Bureau, and Shopper Approved to verify that we are upholding the highest security and customer satisfaction standards.</p>
			</div>
		</div>
	</section>
</div>
