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
					<li><a href="#ratings">Financial Ratings</a></li>
					<li><a href="#strengths">Strengths</a></li>
					<li><a href="#products">Products</a></li>
					<li><a href="#alternatives">Alternatives</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Banner Life Insurance Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/banner-300x166.png" alt="banner life logo" width="150" height="auto"/></div>
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
							<h6>Phone </h6>
							<p>800-638-8428</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>1836</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Term, Permanent</p>
						</div>

					</div>
					<a href="https://www.noexam.com/out/quotes-2.php">Get A Quote</a>
				</div>
			</div>

			<p>Interested in protecting your family or business? That's what Banner Life Insurance does better than just about anyone else. </p>

			<p>Banners competitive pricing has led them to being one of the top five U.S. Life insurers after only 70 years in business. How did they make it into the list of our <a href="https://www.noexam.com/life-insurance/companies/">top 10 life insurance companies</a> two years in a row? </p>
			<h2>Banner at a Glance</h2>
			<ul>
				<li>1.3 Million U.S. Customers ($734 billion of coverage in force)</li>
				<li>600 dedicated employees</li>
				<li>$892.3 million of claims paid</li>
				<li>99.9% claims paid</li>
				<li><a href="https://www.lgamerica.com/forms/banforms/Marketing%20&%20Sales%20Material/Why-Pick-LGA.pdf">Source</a></li>
			</ul>

			<h2 id="ourtake">Our Take</h2>
			<blockquote class="blue">Banner Life is good choice for life insurance if they offer policies that meet your needs and fit your budget. They are known for their competitive pricing and superb financial strength. They offer competitive rates for those that use tobacco, have high blood pressure, or high cholesterol.</blockquote>
			<h2 id="ratings">Banner Life Financial Ratings</h2>
			<p>Banner is a wholly owned subsidiary of Legal & General Group, a multi national financial services organization located in the United Kingdom. Founded in 1836 Legal and General is one of the oldest life insurance providers in existence today. Legal and General Group is currently the 8th largest insurer in the world. </p>
			<p>Have you heard the term “age matters”? In life insurance age matters the most. Companies with longevity have the most actuarial experience which enables them to price products competitively. In Banner's case the most competitively in the United States. </p>
			<p>Banner Life Insurance is currently rated as:</p>
			<ul>
				<li>A.M. Best Rating “A+” (Superior)</li>
				<li>Standard and Poors “AA-”</li>
				<li>Fitch “AA-”</li>
				<li>Comdex Score 94</li>
				<li><a href="https://www.lgamerica.com/corporate/financials">Ratings Source</a></li>
			</ul>
			<p>They also hold an A+ rating with the BBB. There are no visible complaints against the company.</p>
			<h2 id="strengths">Banner's Strengths</h2>
			<p>Banner, like every life insurance company has its sweet spots. If you happen to fall into one of these categories you will likely find other life insurance companies are unable to compete for your business due to price alone. </p>
			<p><strong>Tobacco Users</strong> - Those who have quit over three years ago can be approved for Banners most competitive priced plan. </p>
			<p><strong>High Blood Pressure</strong> - When treated applicants will be considered to be approved for preferred best ratings. </p>
			<p><strong>High Cholesterol</strong> - If controlled you have a chance to qualify for their most competitive rate class. </p>
			<p><strong>Family History</strong> - Every life insurance company will have questions on the application regarding family history. The questions asked are specific to cancer and heart disease and age at which these were diagnosed to any of your immediate family members. With most insurers this is an immediate rate increase however, Banner will consider those with a family history of cancer to qualify for their best rate class. </p>

			<h2 id="products">Banner Life Insurance Products</h2>
			<h4>OPTerm</h4>
			<p>Banner’s OPTerm life insurance product offers term life insurance coverage for 10, 15, 20, 25, and 30 years. It is also renewable and convertible to permanent life insurance. Coverage amounts for Banner OPTerm range from $100,000 to $1,000,000+, and term lengths vary depending on the applicants age and rate class. Please see the chart below. The premiums are level for the term of the policy, and they will increase annually in the years after the term is up.</p>
			<h4>OPTerm Eligibility</h4>

			<table id="tablepress-81" class="tablepress tablepress-id-81">
				<thead>
				<tr class="row-1 odd">
					<th class="column-1">10 Year Term</th>
					<th class="column-2">15 Year Term</th>
					<th class="column-3">20 Year Term</th>
					<th class="column-4">25 Year Term</th>
					<th class="column-5">30 Year Term</th>
				</tr>
				</thead>
				<tbody class="row-hover">
				<tr class="row-2 even">
					<td class="column-1">Age 20-75</td>
					<td class="column-2">Age 20-75</td>
					<td class="column-3">Age 20-70 Non Tobacco<br/>
						Age 20-65 Tobacco
					</td>
					<td class="column-4">Age 20-60 Non Tobacco<br/>
						Age 20-55 Tobacco
					</td>
					<td class="column-5">Age 20-55 Non Tobacco<br/>
						Age 20-50 Tobacco
					</td>
				</tr>
				</tbody>
			</table>

			<h4>OPTerm Riders</h4>
			<p>The accelerated death benefit is payable in the event of a qualifying terminal illness. The max amount payable is the lesser of $500,000 or 75% of the policy’s death benefit. Additional riders are available depending on the resident state of the insured.</p>
			<p><strong>Note: Most insurance companies limit the accelerated death benefit rider to 50% while Banner allows for 75% making them that much harder to compete with.</strong></p>
			<h3>APPcelerate</h3>
			<p>In addition to the great OPTerm product that is offered, Banner now offers accelerated underwriting to qualified applicants. <strong>This means that applicants can get <a href="https://www.noexam.com/life-insurance/companies/no-exam/">life insurance without the exam</a> and labs</strong>, which greatly reduces the time to get coverage in force. With APPcelerate, applicants can be <a href="https://www.noexam.com/life-insurance/approval-time/">approved</a> as soon as the next business day. Refer to the chart below for eligibility and coverage amounts. The rates will be the same as OPTerm listed in the <a href="https://www.noexam.com/life-insurance/term/rates/">sample rates</a> section.</p>
			<p>For those strictly looking for a policy with no medical exam, also consider <a href="https://www.noexam.com/life-insurance/companies/sagicor/">Sagicor Life Insurance</a>.</p>
			<h4>APPcelerate Eligibility</h4>

			<table id="tablepress-82" class="tablepress tablepress-id-82">
				<thead>
				<tr class="row-1 odd">
					<th class="column-1">OPTerm 10</th>
					<th class="column-2">OPTerm 15, 20, 25, and 30</th>
				</tr>
				</thead>
				<tbody class="row-hover">
				<tr class="row-2 even">
					<td class="column-1">$100,000-$500,000, Ages 20-50<br/>
					</td>
					<td class="column-2">$100,000 - $1,000,000, Ages 20-40<br/>
						$100,000 - $750,000 Ages, 41-45<br/>
						$100,000 - $500,000, Ages 46-50
					</td>
				</tr>
				</tbody>
			</table>
			<!-- #tablepress-82 from cache -->
			<h3>Universal Life Insurance</h3>
			<p>Banner Life Insurance also offers a universal life insurance product called Life Step UL. It is a flexible premium universal life plan. Life Step UL offers guaranteed coverage to maturity at age 121. This product was designed to be converted from term coverage or new policies with face amounts as low as $50,000. The guaranteed interest crediting rate for Life Step UL is 2% per annum. The issue ages are 20-80 and are based on your age nearest birthday. The premium will not exceed the guaranteed premium.</p>

			<h2 id="alternatives">Alternatives to Banner</h2>
			<p>If you find that Banner Life Insurance is a good fit for you but are looking for something relatively similar to compare it to, try getting quotes from <a href="https://www.noexam.com/life-insurance/companies/aig/">AIG</a> and <a href="https://www.noexam.com/life-insurance/companies/protective/">Protective</a>. The names Banner and Protective go hand in hand in that their coverage, underwriting process, and pricing are nearly identical.</p>

			<p><strong>Starting to see a pattern? It is no coincidence that companies focusing on term and universal life insurance sales with over a century in experience have the most competitive rates in the business. Use our <a href="https://www.noexam.com/apply-now/">quote tool</a> to compare these options apples to apples.</strong></p>

			<h2>Conclusion</h2>
			<p>We hope this Banner Life Insurance review has helped guide you on your decision to <a href="https://www.noexam.com/">purchase a life insurance policy</a>. It is no wonder that Banner Life Insurance is one of the top 10 life insurance companies in business today. Their strong financial rating combined with <a href="https://www.noexam.com/life-insurance/cheap/">cheap rates</a> and fast underwriting make them a strong contender when choosing a company for your life insurance needs. If you need assistance in purchasing life insurance, you can reach out to one of our licensed agents at 888-407-0714 or <a href="https://www.noexam.com/apply-now/">request a quote here</a> and we will be in touch.</p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
