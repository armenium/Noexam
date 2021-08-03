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

$this->registerCss(".boxcontent{ max-width:382px; margin:0 auto; width:100%; float: right; margin: 0 0 10px 10px; -webkit-box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);-moz-box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);}
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
					<li><a href="#howmuch">How much can you get?</a></li>
					<li><a href="#howold">How old can you be?</a></li>
					<li><a href="#whatif">What if I have health issues?</a></li>
					<li><a href="#sampleamerican">Sample American National Rates</a></li>
					<li><a href="#whole-term">Is the plan whole life or term?</a></li>
					<li><a href="#isthere">Is there a waiting period?</a></li>
					<li><a href="#howlong">How long will the approval take?</a></li>
					<li><a href="#compare">Compare other options!</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>American National Life Insurance Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/anico.png" width="128" height="128"/></div>
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
							<p>800-899-6806</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>1905</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Term, Whole, Universal</p>
						</div>

					</div>
					<a href="https://www.noexam.com/apply-now/">Get A Quote</a>
				</div>
			</div>


			<p>Have you heard of ANICO for life insurance? <strong>American National Life Insurance</strong> is one of the leading providers for life insurance. The question is, <em>can you trust them</em>?</p>
			<p>Choosing a life insurance provider is crucial. You want to be sure that the premiums you pay will guarantee protection for your beneficiary. After all, the insurance company is making a promise to your loved ones.<span id="more-727"></span></p>
			<p><strong>ANICO is a stable, tried and true company.</strong> <a href="http://www.anico.com">American National Insurance Insurance Company(ANICO)</a> is publicly traded and founded in 1905. Headquartered in Galveston, TX American National maintains an A(Excellent) <a href="http://www3.ambest.com/ratings/entities/SearchResults.aspx?AltSrc=9">A.M. Best Rating</a> and has greater than $2 Billion dollars in assets.</p>
			<p>With over 11 million policyholders to date, selecting the American National Life Insurance plan is an excellent addition to your insurance portfolio.</p>
			<?=$this->render('/main/widgets/apply-now-form.php', ['position' => 'center', 'width' => '100%']);?>
			<p>As a full-service life insurance brokerage, it’s our job to stay up to speed on the options best fit for consumers. The rest of this post explains what else you need to know about considering ANICO Life Insurance.</p>

			<p>
				<iframe src="https://www.youtube.com/embed/1m1qzOUG9k4" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
			</p>
			<h2>How Much Can you Get with American National Life Insurance?</h2>
			<p>ANICO offers a <a href="https://www.noexam.com/life-insurance/companies/no-exam/">life insurance that does not require a medical exam</a>. You can purchase term coverage between $50,000 to $250,000. You can obtain whole life up to $150,000.</p>
			<p>If you need more than $250,000 in coverage, consider some of these <a href="https://www.noexam.com/life-insurance/companies/">top life insurance companies</a>.</p>

			<h2 id="howold">How old can you be for ANICO Life Insurance?</h2>
			<p>American National Life Insurance is available through age 65. For life insurance over 65 years old, please visit noexam.com.</p>

			<h2 id="whatif">What if I have health issues?</h2>
			<p>ANICO Life Insurance will consider your application even if you have health problems. They will have a set of medical questions on the application as well as run your prescription profile and MIB report.</p>
			<p>In some cases, they will request a copy of your medical records. American National Life Insurance is a good fit for people with controlled high blood pressure, type 2 diabetes, weight loss and sleep apnea.</p>

			<h2 id="sampleamerican">Sample American National Life Insurance Rates</h2>

			<table id="tablepress-60" class="tablepress tablepress-id-60">
				<thead>
				<tr class="row-1 odd">
					<th class="column-1">Gender</th>
					<th class="column-2">Age</th>
					<th class="column-3">Coverage Amount</th>
					<th class="column-4">Term Length</th>
					<th class="column-5">Monthly Premium</th>
				</tr>
				</thead>
				<tbody class="row-hover">
				<tr class="row-2 even">
					<td class="column-1">Male</td>
					<td class="column-2">30</td>
					<td class="column-3">$100,000</td>
					<td class="column-4">20 Year</td>
					<td class="column-5">$17.54</td>
				</tr>
				<tr class="row-3 odd">
					<td class="column-1">Female</td>
					<td class="column-2">30</td>
					<td class="column-3">$100,000</td>
					<td class="column-4">20 Year</td>
					<td class="column-5">$18.06</td>
				</tr>
				<tr class="row-4 even">
					<td class="column-1">Male</td>
					<td class="column-2">40</td>
					<td class="column-3">$100,000</td>
					<td class="column-4">20 Year</td>
					<td class="column-5">$29.81</td>
				</tr>
				<tr class="row-5 odd">
					<td class="column-1">Female</td>
					<td class="column-2">40</td>
					<td class="column-3">$100,000</td>
					<td class="column-4">20 Year</td>
					<td class="column-5">$25.40</td>
				</tr>
				<tr class="row-6 even">
					<td class="column-1">Male</td>
					<td class="column-2">49</td>
					<td class="column-3">$100,000</td>
					<td class="column-4">20 Year</td>
					<td class="column-5">$52.44</td>
				</tr>
				<tr class="row-7 odd">
					<td class="column-1">Female</td>
					<td class="column-2">49</td>
					<td class="column-3">$100,000</td>
					<td class="column-4">20 Year</td>
					<td class="column-5">$41.21</td>
				</tr>
				</tbody>
			</table>
			<!-- #tablepress-60 from cache -->
			<p><strong>Disclaimer:</strong> Rates are based on Standard, Non-Smoker as of 01/2017. Actual rates and availability may vary by state and health profile.</p>

			<h2 id="whole-term">Is ANICO’s Plan Whole Life Or Term?</h2>
			<p>American National Life Insurance is available in whole life and term. Their term lengths offered are 10,20 and 30 years.</p>

			<h2 id="isthere">Is There a Waiting Period?</h2>
			<p>If you apply for the plans that requires medical underwriting, you will not have a waiting period upon approval. American National also offers a guaranteed plan; however, a waiting period applies.</p>

			<h2 id="howlong">How Long Will the Approval Take?</h2>
			<p>ANICO life insurance plan is not the fastest one on the market. If you apply through them, expect a turnaround time anywhere between 48-72hrs and a few weeks.</p>
			<p>This company may request a copy of your medical records which is what creates a delayed approval. Doctor’s offices are notorious for taking about 4-6 weeks to release records.</p>
			<p>If you’d like coverage sooner and do not want any medical records ordered, consider choosing either <a href="https://www.noexam.com/life-insurance/companies/sagicor/">Sagicor Life Insurance</a> or North American. These two alternatives are reliable companies that offer competitive prices and a much faster turn around time. Your <a href="https://www.noexam.com/life-insurance/approval-time/">policy approval</a> is anywhere from 15 minutes to 24-72hrs!</p>

			<h2 id="compare">Comparisons Between These Three Life Insurance Options</h2>
			<p><strong>Disclaimer</strong>: Rates are comparing $100,000 20 year term life coverage priced at lowest rate class as a non-smoker. Actual rates and availability may vary by age, state and health profile.</p>

			<table id="tablepress-61" class="tablepress tablepress-id-61">
				<thead>
				<tr class="row-1 odd">
					<th class="column-1">Gender</th>
					<th class="column-2">Age</th>
					<th class="column-3">ANICO</th>
					<th class="column-4">North American</th>
					<th class="column-5">Sagicor</th>
				</tr>
				</thead>
				<tbody class="row-hover">
				<tr class="row-2 even">
					<td class="column-1">Male</td>
					<td class="column-2">30</td>
					<td class="column-3">$17.54</td>
					<td class="column-4">$14.87</td>
					<td class="column-5">$14.25</td>
				</tr>
				<tr class="row-3 odd">
					<td class="column-1">Female</td>
					<td class="column-2">30</td>
					<td class="column-3">$18.06</td>
					<td class="column-4">$13.38</td>
					<td class="column-5">$12.09</td>
				</tr>
				<tr class="row-4 even">
					<td class="column-1">Male</td>
					<td class="column-2">40</td>
					<td class="column-3">$29.81</td>
					<td class="column-4">$19.27</td>
					<td class="column-5">$21.64</td>
				</tr>
				<tr class="row-5 odd">
					<td class="column-1">Female</td>
					<td class="column-2">40</td>
					<td class="column-3">$25.40</td>
					<td class="column-4">$16.28</td>
					<td class="column-5">$18.28</td>
				</tr>
				<tr class="row-6 even">
					<td class="column-1">Male</td>
					<td class="column-2">49</td>
					<td class="column-3">$52.44</td>
					<td class="column-4">$31.06</td>
					<td class="column-5">$42.44</td>
				</tr>
				<tr class="row-7 odd">
					<td class="column-1">Female</td>
					<td class="column-2">49</td>
					<td class="column-3">$41.21</td>
					<td class="column-4">$24.64</td>
					<td class="column-5">$32.27</td>
				</tr>
				</tbody>
			</table>
			<!-- #tablepress-61 from cache -->
			<h2>Get In Touch</h2>
			<p>At <a href="https://www.noexam.com/">NoExam.com</a>, we value your time and promise to offer life insurance with no hassle! We want to help you get this taken care of so you can get back to spending time with the ones you love the most.Our licensed agents can help you find the best life insurance plan for your situation. <strong>Please call us at 888-407-0714.</strong></p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
