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
					<li><a herf="#history">History</a></li>
					<li><a href="#ratings">Financial Ratings</a></li>
					<li><a href="#products">Products Offered</a></li>
					<li><a href="#advantages">Advantages</a></li>
					<li><a href="#disadvantages">Disadvantages</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Aetna Life Insurance Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/aetna.png" width="150" height="50"/></div>
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
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
							</ul>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>Phone </h6>
							<p>1-800-523-5065</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>1853</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Term, Final Expense</p>
						</div>

					</div>
					<a href="https://www.noexam.com/apply-now/">Get A Quote</a>
				</div>
			</div>
			<p>Aetna is an insurance provider based in Hartford, Connecticut. Established in 1853, it is one of the oldest and most
				well-known names in the insurance industry.</p>

			<p>The company offers life insurance, health insurance plans, dental insurance, vision insurance, and supplemental
				insurance products.</p>

			<p>In this in-depth review of Aetna Inc, we cover the company’s history and background, its financial ratings, the
				products it offers, and its strengths and weaknesses.</p>

			<h2 id="ourtake">Our Take on Aetna</h2>

			<blockquote class="green">In terms of financial stability and reliability, Aetna is as good as many other insurance companies in the US
				today. It’s a good choice for those who are in need of a group life insurance policy or a final expense policy.If you need an individual life insurance policy – whether it is a term life, whole life, or universal life policy – you have to consider other options. The good news is that there are a number of other <a href="https://www.noexam.com/life-insurance/companies/">top life insurance companies</a> that offer excellent term as well as permanent life policies at cheaper rates, especially if you are younger and in good health.
			</blockquote>

			<h2 id="history">History and Background</h2>

			<p>Aetna Life Insurance Company was founded in 1853. The company was named after Mt. Etna, a volcano located in Sicily,
				Italy.</p>

			<p>The company started its operations by offering participating life insurance products and shared its profits with its
				policyholders by paying dividends. In just over a decade, the company’s income reached $1 million.</p>

			<p><strong>In 1891</strong>, Aetna started offering accident insurance policies. In 1899, it started offering health insurance policies.
				In 1907, it started offering automobile insurance policies.</p>

			<p><strong>In 1913</strong>, it started offering group life insurance policies. It holds the distinction of being one of the first
				companies to offer a variety of different insurance policies under the same brand name.</p>

			<p><strong>In 1917</strong>, during the course of World War I, Aetna contributed to the war efforts of the US by purchasing Liberty Bonds
				worth millions of dollars and by providing insurance to the contractors who were involved in government construction
				activities.</p>

			<p>In the following decades, Aetna contributed to several historical projects like the construction of US Navy aircraft
				carriers, the Manhattan Project, the construction of the UN headquarters, and more.</p>

			<p><strong>In 1968</strong>, Aetna was listed on the NYSE. In 1990, the company ended a 91-year old practice by deciding to discontinue
				individual health insurance policies and continue only with group policies. In 1996, the company further diversified
				and set up its retirement services division.</p>

			<p><strong>In 1999</strong>, Aetna became the largest health insurance provider in the country by acquiring Prudential Healthcare in a
				billion dollar deal.</p>

			<p><strong>In 2017</strong>, after 164 years of operation, Aetna was <a href="https://www.nytimes.com/2018/10/10/health/cvs-aetna-merger.html">acquired by CVS Health Corporation for $69 billion</a>. Today, it
				operates as a wholly-owned subsidiary of CVS Health.</p>

			<p>Let us now discuss Aetna’s financial strength and the ratings it has received from various agencies.</p>

			<h2 id="ratings">Financial Strength and Ratings</h2>
			<ul>
				<li><strong>A.M. Best:</strong> A</li>
				<li><strong>Moody’s:</strong> A2</li>
				<li><strong>Standard & Poor’s:</strong> A–</li>
				<li><strong>Fitch:</strong> A</li>
				<li><strong>Comdex:</strong> 86</li>
				<li><a href="http://news.ambest.com/newscontent.aspx?altsrc=108&refnum=213521">Source</a></li>
			</ul>
			<p>The ratings clearly indicate that Aetna is financially stable and is capable of honoring all its financial
				commitments.</p>

			<p>It should also be noted that this is a company which managed to survive the Great Depression and come out unscathed,
				which means its fundamentals are solid. So, it is safe to assume that Aetna is financially as strong and stable as
				any of its competitors.</p>

			<h2 id="products">Insurance Products Offered by Aetna</h2>

			<h3>Basic and Supplemental Group Life Insurance Policies from Aetna</h3>
			<div class="company-box">
				<p>Aetna offers life insurance policies only through employers, not on an individual basis. These types of group
					policies have their own advantages and disadvantages.</p>

				<p>The biggest advantage is that the underwriting process is not as rigorous as it is in the case of an individual
					application. Insurance providers are quite lenient when it comes to issuing life insurance policies for a whole
					group of people, as opposed to an individual.</p>

				<p>As an individual, your insurability could be affected by a wide range of factors like your family’s health history,
					your current health status, the medications you take, your lifestyle and hobbies, and many more. As a result,
					qualifying for a policy might prove to be difficult for you.</p>

				<p>Even if you qualify, you are likely to be charged a higher rate by the company compared to someone who is young, in
					good health, and does not have a family history of hereditary diseases.</p>

				<p>When you are part of a group, on the other hand, your individual insurability is not taken into account by the
					underwriter.</p>

				<p>Your group is evaluated as a whole and the policy costs are determined based on the number of employees in your
					group, the size of your company, and a number of other factors. What this means is that you are likely to get
					excellent coverage through group insurance policies at very low costs.</p>

				<p>On the other hand, group insurance is not designed to meet your individual financial needs. In some cases, you might
					be underinsured and in some other cases, you might be over-insured.</p>

				<p>So, a group life insurance policy can never be a replacement for an individual life policy. It can, however,
					complement your existing coverage and offer you enhanced protection.</p>
			</div>
			<h3>Accidental Injury and Death Coverage</h3>

			<p>If you get injured in an accident, you will get paid by the company. If you die in an accident, your beneficiary will
				be paid by the company. The amount paid by the company depends on the nature of the injury, the extent of damage you
				suffer, your policy’s overall coverage amount, and other such factors.</p>

			<h2>Riders Offered by Aetna</h2>
			<div class="company-box">
				<h3>Accelerated Death Benefit Rider</h3>

				<p>This is a living benefits rider which you can choose to add to your insurance policy. If you become terminally ill
					during the course of your policy, the company will pay you a portion of the coverage amount – either as a lump sum
					or as a series of payments.</p>

				<p>You can use the money to pay for your treatment. After your death, the remaining amount will be paid to your loved
					ones.</p>

				<h3>Child Benefits</h3>

				<p>If you have young children, you can get supplemental coverage which covers the costs of childcare and education after
					your death.</p>

				<h3>Portability </h3>

				<p>This provision allows you to retain your insurance coverage even if you leave your job. The premium payments,
					however, will increase considerably.</p>

				<h3>Convertibility </h3>

				<p>This provision allows you to extend your coverage for a lifetime. Again, you can expect a substantial increase in
					premiums after the conversion.</p>
			</div>

			<h2>Aetna Final Expense Insurance</h2>

			<blockquote class="blue">In addition to basic life and supplemental insurance policies, Aetna also offers an excellent final expense whole
				life policy. It is meant to cover the expenses associated with your funeral. This type of life insurance plan is offered through independent insurance agents. This is not life insurance that is purchased in a group.
			</blockquote>

			<p>The key features of Aetna's final expense policy include:</p>
			<ul>
				<li>You can qualify for the policy without taking a medical test.</li>
				<li>The policy is designed to provide you with life insurance coverage until the age of 121.</li>
				<li>The death benefit amount does not get reduced for any reason.</li>
				<li>The company will not cancel the policy even if your health deteriorates considerably during the course of the
					policy.
				</li>
				<li>The premium is determined by the company right at the start of the coverage period and remains unchanged until
					your death.
				</li>
				<li>The death benefit can range from $3,000 to $35,000.</li>
				<li>You have the option to cancel the policy within 30 days for any reason and get a 100% refund.</li>
			</ul>
			<p>Aetna offers three types of final expenses insurance – level benefit, graded benefit, and modified benefit.</p>

			<h3>Level Benefit Final Expense</h3>

			The policy is meant for people between the ages of 45 and 89. Your beneficiary is eligible to receive the full death
			benefit amount right from the first day of the coverage period.

			<h3>Graded Benefit Final Expense</h3>

			<p>The policy is meant for people between the ages of 45 and 80. If you pass away during the first year of the coverage
				period, your beneficiary will receive 40% of the death benefit.</p>

			<p>If you pass away during the second year of the coverage period, your beneficiary will receive 75% of the death
				benefit. If you pass away during the third year of the coverage period or any time thereafter, your beneficiary will
				receive the full death benefit amount.</p>

			<h3>Modified Benefit Final Expense</h3>

			<p>The policy is meant for people between the ages of 45 and 75. If you pass away during the first or second year of the
				coverage period, your beneficiary will receive 110% of the premiums paid until that point.</p>

			<p>If you pass away during the third year of the coverage period or any time thereafter, your beneficiary will receive
				the full death benefit amount.</p>

			<p>The important thing to be noted here is that the graded and modified death benefit provisions are only meant for
				non-accidental deaths.</p>

			<p>If you pass away in an accident, your beneficiary will receive the entire death benefit amount, irrespective of what
				<a href="https://www.noexam.com/life-insurance/types/">type of policy</a> you own or how far you are into the coverage period.</p>

			<h3>Final Expenses Insurance – Disqualification Criteria</h3>

			<p>Even though there is no medical exam involved in the application process, there are other factors that could prevent
				you from qualifying for the policy.</p>
			<ul>
				<li>Are you currently institutionalized – either at a hospital or at a long-term care facility?</li>
				<li>Are you suffering from any respiratory disorder and can only breathe with the help of supplemental oxygen?</li>
				<li>Do you have an aneurysm?</li>
				<li>Are you suffering from a kidney disease and currently on dialysis?</li>
			</ul>
			<p>If you answer ‘yes’ to any one of these questions, you are unlikely to qualify for Aetna’s final expenses policy.</p>

			<p>Similarly, the company also prevents people with the following medical conditions from qualifying for the policy.</p>
			<ul>
				<li>AIDS and AIDS Related Complex (ARC)</li>
				<li>Amyotrophic Lateral Sclerosis (ALS)</li>
				<li>Alzheimer’s, dementia, or any other disease which results in mental incapacity</li>
				<li>Any disease which requires a transplant (stem cell, bone marrow, or an organ)</li>
			</ul>

			<h2>Strengths and Weaknesses of Aetna Life Insurance Company</h2>

			<h3 id="advantages">Aetna's Strengths</h3>

			<ul>
				<li>Aetna is rated highly by top credit rating agencies like A.M. Best, Fitch, Moody’s, and S&P’s. The company has
					been around for well over a century and has survived the civil war, the great depression, two world wars, and a
					number of downturns over the years, which is a testament to its strong fundamentals.
				</li>

				<li>The group life insurance policies offered by Aetna are affordable and have lenient underwriting guidelines. It
					is much easier for you to qualify for a group policy compared to an individual life insurance policy.
				</li>

				<li>It can be particularly beneficial to those who find it difficult to qualify for a traditional life insurance
					policy due to their health condition or family medical history.
				</li>

				<li>Aetna offers an excellent final expenses policy which can help your family cover your funeral costs.</li>
				<li>There is no need for any medical exam and the death benefit does not change irrespective of the changes in your
					health condition during the coverage period. You can opt for a level benefit, graded benefit, or a modified
					benefit policy, depending on your preference.
				</li>

				<li>The company does not have any height and weight restrictions for people who apply for their final expenses
					policy. Nor does it access the Medical Information Bureau data of the applicants.
				</li>

				<li>The company’s final expenses policy is available for people between the ages of 45 and 89, which is very
					generous. Not many insurance companies issue life insurance policies for people over the age of 80.
				</li>
			</ul>

			<h3 id="disadvantages">Aetna's Weaknesses </h3>
			<ul>
				<li>Aetna only offers group life insurance policies, which means you cannot pick and choose a policy which suits
					your individual needs.
				</li>

				<li>Needless to say, this is a major disadvantage, as a group policy might not sufficiently cover your family’s
					financial needs in most cases. So, you might have to buy an individual life policy anyway.
				</li>

				<li>The company does not offer traditional whole life policies or universal life policies, which again is a
					disadvantage. A term life policy can never match the living benefits offered by a whole life or universal life
					policy.
				</li>

				<li>Moreover, indexed and variable universal life policies have high growth potential and allow you to get better
					returns on your investment.
				</li>
			</ul>


		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
