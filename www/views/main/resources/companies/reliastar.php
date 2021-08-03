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
					<li><a href="#products">Products</a></li>
					<li><a href="#pros">Pros</a></li>
					<li><a href="#cons">Cons</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Reliastar (Voya) Life Insurance Company Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/voya.jpg" alt="voya financial logo" width="150" height="auto"/></div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>AM Best Rating</h6>
							<h5>A</h5>
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
							<p>855-663-8692</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>1991</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Term, Permanent, Accident</p>
						</div>

					</div>
					<a href="https://www.noexam.com/apply-now/">Get A Quote</a>
				</div>
			</div>
			<p>ReliaStar life insurance company is a Minneapolis based insurance company which offers <a href="https://www.noexam.com/life-insurance/term/">term life</a>, <a href="https://www.noexam.com/life-insurance/whole/">whole life</a>, accident insurance, critical illness insurance, and disability income insurance products.</p>

			<p>It is a subsidiary of Voya Financial, which is a financial services company based in the United States in New York.</p>

			<p>In this review, we take an in-depth look at ReliaStar’s life insurance products and the strengths and weakness of the company as an insurance provider. <strong>Note: Reliastar has now changed their branding to match Voya, and all of it's products are now sold under the Voya Financial name.</strong></p>

			<h2 id="ourtake">Our Take</h2>
			<blockquote class="blue">Reliastar (Now Voya Financial) is a financially stable insurance company offering workplace benefits and investment products. Their products can only be bought as a group through an employer. If you are looking for an individual life insurance policy, see our <a href="https://www.noexam.com/life-insurance/companies/">list of life insurance companies</a>.</blockquote>

			<h2 id="about">History and Background</h2>

			<p>ReliaStar Life Insurance Company is a relatively new entrant to the industry, having been established only in 1985. However, its predecessor – Northwestern National Life Insurance Company (NWNL) – was incorporated in 1885 and was one of the largest insurance providers in the country at one point.</p>

			<p>In 2000, ReliaStar was acquired by ING Group, which is one of the largest financial services companies in the world today. For 14 years, the company operated as a subsidiary of ING Group under the name of ING US. In 2014, ING US was renamed and rebranded as Voya Financial.</p>

			<p>Today, ReliaStar operates as a fully owned subsidiary of Voya Financial and offers a wide range of insurance policies for a nationwide customer base.</p>
			<?=$this->render('/main/widgets/map-widget.php');?>
			<h2 id="ratings">Reliastar Financial Ratings</h2>
			<ul>
				<li><strong>A.M. Best:</strong> A (Excellent)</li>

				<li><strong>Moody’s:</strong> A2 (Good)</li>

				<li><strong>Standard & Poor’s:</strong> A+</li>

				<li><strong>Fitch:</strong> A (Strong)</li>
				<li><a href="http://investors.voya.com/financial-reporting/credit-ratings/">Ratings Source</a></li>
			</ul>
			<p>As you can see, ReliaStar has solid ratings, which is always a good sign in an insurance provider. Its parent company Voya Financial has assets worth $500 billion under its management and has a <a href="https://professionals.voya.com/stellent/public/VOYA_FINANCIAL_FACT_SHEET.pdf">market cap of $8.5 billion</a>.</p>

			<p>The company has close to 14 million customers and employs over 6,000 people.</p>

			<p>In addition to the strong ratings it has managed to receive as an insurer, ReliaStar is also backed by a parent company which is financially stable and reliable in its own right. So, in terms of financial strength, ReliaStar definitely meets our expectations.</p>

			<p>Let us now move to the next section of the review, where we discuss the products offered by ReliaStar.</p>

			<h2 id="products">Insurance Products Offered by ReliaStar</h2>

			<p>ReliaStar offers a variety of insurance policies in the form of employee benefits. The policies are made available through employer’s benefit programs.</p>

			<h3>Term Life Insurance</h3>

			<p>ReliaStar’s term life policies are designed to offer financial protection for your loved ones in the event of your death.</p>

			<p>They provide you with the coverage you need for a specific time period. If you die while your policy is active, the company pays the designated beneficiary. The death benefit received by the beneficiary is not taxable under federal laws.</p>

			<p>ReliaStar offers an accelerated death benefit rider, which lets you access a portion of the coverage amount if you become terminally ill. You can use the payments from the insurance company to cover the expenses associated with your treatment and care.</p>

			<p>This is a level premium, level death benefit policy, which means you do not have to worry about paying more for your policy or your death benefit getting reduced for any reason.</p>

			<h3>Whole Life Insurance</h3>

			<p>ReliaStar offers a flexible whole life policy which provides you with lifetime insurance coverage.</p>

			<strong>The key features include:</strong>
			<ul>
				<li>You can increase or decrease the coverage amount depending on your financial needs and budget.</li>

				<li>Your coverage starts right from the day your policy is issued and lasts your entire lifetime, as long as the payments are promptly made.</li>

				<li>The premium is determined by the insurer at the start of the coverage period and it remains the same until your death.</li>

				<li>The death benefit payout your beneficiaries receive is <a href="https://www.noexam.com/life-insurance/payouts-and-taxes/">not taxable under federal income tax laws</a>.</li>

				<li>The policy has a built-in account which builds cash value. The rate of interest (the rate at which the policy builds cash value) is determined by the insurance company.</li>

				<li>You can withdraw money from your cash value account or get a loan against your policy’s built-up cash value to meet your financial needs. You do not have to pay any taxes on the loan or the withdrawal, as long as the amount does not exceed the total amount of premiums you paid into the policy.</li>
			</ul>
			<h3>Critical Illness Insurance</h3>

			<p>This is a policy which is designed to cover the expenses associated with your treatment and care, in case you are diagnosed with a critical illness. The policy is ideal for those who have a family history of serious illnesses.</p>

			<strong>The key features include:</strong>
			<ul>
				<li>It is a limited benefit policy, which pays you only if you are diagnosed with a critical illness, as defined by the company.</li>
				<li>The company has a list of critical illnesses which are covered under the policy. The list includes heart attack, stroke, renal failure, and many other diseases.</li>
				<li>If you are diagnosed with a critical illness covered under the policy, the company will pay you, irrespective of any other life or health insurance policies you have.</li>
				<li>The policy is designed to provide you with a lump sum payment, which can be used to cover your treatment costs as well as other expenses like rent, groceries, and utilities.</li>
			</ul>
			<h3>Accident Insurance</h3>

			<p>This one too is a limited benefit insurance policy which pays you if you are injured in an accident.</p>

			<strong>The key features include:</strong>
			<ul>
				<li>The policy pays you if you sustain injuries as a result of an accident. The list of injuries covered under the policy includes fractures, dislocations, concussions, lacerations, burns, and more.</li>
				<li>The policy also pays you for emergency room visits, ambulance charges, surgery, in-hospital treatment and care, and physical therapy.</li>
				<li>You are eligible to receive the payout irrespective of any other life or health insurance policy you have.</li>
			</ul>
			<h3>Disability Income Insurance</h3>

			<p>This is an income-replacement policy which pays you if you are partially or fully disabled due to an injury or illness and unable to work. The policy is meant for those who do not have any emergency savings and cannot afford to pay their bills in the absence of a weekly or monthly paycheck.</p>

			<strong>The key features include:</strong>
			<ul>
				<li>The policy pays you if you are disabled and not in a position to work on a part-time or full-time basis.</li>
				<li>The benefits paid by the insurer is meant to cover your day-to-day expenses like groceries as well as monthly commitments like rent, credit card bills, loan payments, and utilities.</li>
				<li>The insurance company offers rehabilitative assistance and physical training programs completely free of cost.</li>
			</ul>
			<h3>Hospital Confinement Indemnity Insurance</h3>

			<p>This is a uniquely designed plan which is designed to cover the out-of-pocket expenses associated with a hospital stay.</p>

			<strong>The key features include:</strong>
			<ul>
				<li>The insurance company pays you depending on the number of days you spend in a hospital, critical care unit, or an in-patient rehabilitation facility.</li>
				<li>The policy covers diagnostic procedures, emergency room visits, outpatient as well as inpatient surgery, rehabilitation assistance, and more.</li>
				<li>You are eligible to receive the benefits even if you already have health insurance.</li>
				<li>This is a good policy to add to your insurance package, since regular health insurance policies do not cover all the expenses associated with a hospital stay.</li>
			</ul>
			<p>Let us now discuss the pros and cons of ReliaStar as an insurance provider.</p>

			<h2 id="pros">Reliastar Pros</h2>
			<div class="company-box">
				<h3>Financial Strength</h3>

				<p>ReliaStar’s financial strength is evident from its ratings, which are very good. Moreover, it is backed by Voya Financial, which has assets worth hundreds of billions under its management and is one of the leading financial service providers in the country today.</p>

				<h3>Your Individual Insurability Does Not Matter</h3>

				<p>ReliaStar offers all its insurance products through employers. The application process does not involve any health questions or medical tests.</p>

				<p>Your individual insurability does not matter, since the policies are issued collectively to a group of employees.</p>

				<p>You need to, however, meet your employer’s eligibility criteria. These criteria, however, are not as stringent as that of an insurance company. So, it is easier to qualify for a workplace insurance policy than an individual policy. </p>

				<h3>Easy to Pay</h3>

				<p>The premiums are deducted directly from your monthly paycheck. It is not only convenient, but also eliminates the risk of delayed payments or non-payments.</p>

				<h3>Coverage Retention</h3>

				<p>ReliaStar allows you to retain your insurance coverage even if you quit your job. This is, however, an expensive option as there is a significant increase in premiums.</p>

				<h3>Varied Product Range</h3>

				<p>Apart from traditional term life and whole life policies, ReliaStar offers critical illness insurance, accident insurance, disability income insurance, and hospital confinement indemnity insurance products.</p>

				<p>These policies can be an excellent addition to your existing health insurance plan, as they cover a wide range of expenses which are usually not covered by health insurance policies.</p>

				<h3>Retirement Solutions</h3>

				<p>ReliaStar is a very good choice for those who are looking for retirement planning solutions. From IRA to 401k plans, general investment plans, and mutual funds, the company offers a number of products that can help you build a retirement corpus.</p>
			</div>
			<h2 id="cons">Reliastar Cons</h2>
			<div class="company-box">
				<h3>No Individual Policies</h3>

				<p>The biggest downside of choosing ReliaStar as your insurance provider is that you cannot apply for any policy individually. The company only offers its policies through employers.</p>

				<p>ReliaStar used to offer a number of individual universal life policies until the end of 2018. In 2019, it decided to discontinue its entire range of individual life insurance policies and focus only on employee benefits (policies provided through employers) and retirement solutions.</p>

				<p>The problem with the insurance policies provided through employers is that they are not tailed to meet your individual financial needs.</p>

				<p>The policies have a broad range of features, since they are meant to cover a large group of employees. You cannot, however, customize the policy according to your budget or needs.</p>

				<p>Depending on your financial obligations and the size of your family, you could be under-insured or over-insured. So, you might have to buy an additional, individual life insurance policy to cover your needs.</p>

				<p>Another problem with these types of life insurance policies is that your coverage typically ends when you quit your job. Until you find another job, which offers similar employee benefits, you could be left uninsured.</p>

				<p>You have the option to continue your coverage even after you quit your job, but the insurance company tends to increase the premiums significantly. It is a waste of money, as you can easily buy an individual term life or whole life policy at a fraction of the cost.</p>

				<p>This is something you need to consider before choosing ReliaStar as your insurer.</p>

				<h3>Lack of Universal Life Policies</h3>

				<p>ReliaStar only offers term life and whole life policies. There are no universal life policies (regular, indexed, or variable) available.</p>

				<p>This again is a major downside, since many people prefer a universal life policy over a whole life policy, as the former is more flexible in terms of death benefit and premium payments and typically has higher growth potential.</p>
			</div>
			<h2>Final Thoughts on ReliaStar</h2>

			<p>ReliaStar is a good choice for employers who are looking to provide affordable life insurance, critical illness insurance, accident insurance, and disability income insurance policies for their employees. The policies are reasonably priced and offer a wide range of benefits.</p>

			<p>If you are an individual who is in need of a life insurance policy, ReliaStar is not the right choice for you. The positive news is that you can find a list of the top insurance providers in the country right here on noexam.com. You can then pick an insurance provider whose products match your needs.</p>

		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
