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
					<li><a href="#ratings">Ratings</a></li>
					<li><a href="#products">Products</a></li>
					<li><a href="#pros">Pros</a></li>
					<li><a href="#cons">Cons</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Genworth Life Insurance Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/genworth.jpg" width="250" height="138" alt="genworth"/></div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>AM Best Rating</h6>
							<h5>B</h5>
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
							<p>1-888-436-9678</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>1871</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Long Term Care, Mortgage Insurance</p>
						</div>

					</div>
					<a href="https://www.noexam.com/apply-now/">Get A Quote</a>
				</div>
			</div>
			<p>Genworth is a Virginia based insurance company which offers mortgage insurance and long-term care plans.</p>

			<p>It has been in the insurance business for more than 140 years and has a large customer base which is spread across the country.</p>

			<p>In this review, we take a look at Genworth’s journey in the insurance industry so far, discuss its product range, and highlight its strengths and weaknesses as an insurer.</p>

			<h2 id="ourtake">Our Take</h2>
			<blockquote class="blue">Genworth was once the most competitive term <a href="https://www.noexam.com/life-insurance/companies/">life insurance companies</a> price wise. Perhaps incorrect pricing led to them seizing all of their life insurance selling operations effective March 7th, 2016. Now Genworth focuses on <a href="https://www.noexam.com/life-insurance/mortgage/">mortgage life insurance</a> and long term care.</blockquote>

			<h2 id="about">History and Background</h2>

			<p>Genworth’s journey as an insurance provider started in 1871, when a group of Petersburg based investors established the Life Insurance Company of Virginia.</p>

			<p>The company offered life insurance policies to the local population and quickly earned a reputation as a reliable insurance provider. Soon after, the company’s headquarters was moved to Richmond in order to cater to the needs of a rapidly growing customer base.</p>

			<p>In the following years, Life Insurance Company of Virginia offered a diverse range of products including <a href="https://www.noexam.com/life-insurance/term/">term life</a> policies, endowment policies, long term care policies, limited payment policies, mortgage insurance, and lifestyle protection products.</p>

			<p>In 1986, the company was acquired by Combined Insurance in a massive $557 million deal. Shortly after the acquisition, Combined Insurance changed its name to AON Corporation.</p>

			<p>In 1995, the life insurance division of AON Corporation, which included the Life Insurance Company of Virginia, was acquired by GE Capital. In 2003, the company was incorporated as Genworth Financial. It went public in the very next year.</p>

			<p>In 2016, China Oceanwide Holdings Group, a Beijing based investment company, stated that it has planned to acquire Genworth Financial for $2.7 billion.</p>

			<h2 id="ratings">Genworth Financial Ratings</h2>

			<p>Given below are the current financial ratings of Genworth Life Insurance Company.</p>
			<ul>
				<li>A.M. Best: B–</li>
				<li><a href="https://www.moodys.com/research/Moodys-takes-action-on-Genworth-debt-affirmed-at-B2-with--PR_1000000789">Moody’s:</a> B3</li>
				<li>Standard & Poor’s: B–</li>
			</ul>
			<p>Given below are the current financial ratings of Genworth Mortgage Insurance Corporation.</p>
			<ul>
				<li>Standard & Poor’s: BB+</li>
				<li>Moody’s: Ba1</li>
			</ul>
			<p>Like we have mentioned many times before in our reviews, a ‘B’ rating is certainly not the worst rating an insurance company can receive from a credit rating agency. <a href="https://www.genworth.com/about-us/leading-the-industry/ratings.html">Confirm financial ratings here</a>.</p>

			<p>It is a middle-of-the-pack rating, which means the company’s financial position is not strong enough to warrant an ‘A’ rating. At the same time, it is not bad enough to warrant a ‘C’ rating or below.</p>

			<p>Moreover, while determining the overall financial stability and reliability of an insurance company, you need to take into account a few other factors apart from its financial ratings.</p>

			<p>For instance, Genworth has been in the insurance business for over a 100 years, which is indicative of its ability to survive tough times and its cautious, conservative approach towards investing.</p>

			<p>Genworth Financial has paid more than $16.4 billion in long-term care benefits since 1974. A Fortune 500 company with a global presence, Genworth operates in more than 25 countries across the globe.</p>

			<h2 id="products">Products Offered by Genworth</h2>

			<h3>Long-Term Care Insurance</h3>

			<p>Genworth’s long term care plan is designed to provide for the costs associated with your long term care and support services.</p>

			<p>The company defines ‘long term care’ as the support or care you might require if you are not in a position to perform your day-to-day activities (bathing, dressing, eating, using the bathroom and so on) on your own – due to an accident, stroke, chronic illness, or advanced aging.</p>

			<p>One of the biggest selling points of Genworth’s long-term care plan is that it pays for the costs associated with assisted living as well as in-home care. Some insurers do not cover in-home care in their long-term care plans and require you to get admitted to a nursing home.</p>

			<p>It is not the case with Genworth, so you can rest assured that your costs are covered, irrespective of where you receive your care – at a facility or in your own residence.</p>

			<h3>Group Long-Term Care Insurance</h3>

			<p>Genworth offers comprehensive group long-term care plans for employees as well. It offers employer-paid programs for companies with 150 employees or more and voluntary programs for companies with 500 employees or more.</p>

			<p>These plans can be personalized to accommodate the specific needs of employers. The underwriting guidelines and the premium payments can be tailored to meet the unique needs of different demographics and age groups among the employees.</p>

			<p>In addition to providing group long-term care plans, Genworth also helps employers with the enrollment, account management, and implementation processes.</p>

			<h3>Care Services</h3>

			<p>Genworth offers care services through its subsidiary – CareScout – for individual customers as well as employees. It assesses your needs, provides you with personalized solutions, and connects you with caregivers who are ideally suited for your needs.</p>

			<h3>Mortgage Insurance</h3>

			<p>Genworth offers mortgage insurance, not to be confused with <a href="https://www.noexam.com/life-insurance/mortgage/">mortgage life insurance</a>, with lenient terms and conditions for people who are aspiring to buy a home. The key features of Genworth mortgage insurance include:</p>

			<p>It is very affordable. Traditional FHA (Federal Housing Administration) loans often require you to make a 20% down payment, which many people might not be able to afford. With Genworth mortgage insurance, the down payment can be as low as 3%.</p>
			<p>It requires less paperwork compared to a typical FHA loan and is much quicker to close.</p>
			<p>It is much easier to qualify for compared to an FHA loan. As long as your credit score is above 620, you can get approved for the loan. If your credit score is below 620 we recommend <a href="https://www.creditknocks.com/increase-credit-score/">this resource</a> for improving your score.</p>
			<p>Once you have built 20% equity in your home, you can cancel your mortgage insurance.</p>
			<p>Apart from this, Genworth also offers a number of programs for prospective homebuyers and mortgage insurance policyholders.</p>

			<h3>Homebuyer Education</h3>

			<p>This is an online educational course designed for people who are thinking of buying their first home. The course explains the process of buying a house in great detail – right from choosing the right type of loan to saving money on mortgage payments, home maintenance, and many more.</p>

			<h3>Homeowner Assistance Program</h3>

			<p>This is a program which is designed to help people who are not able to pay their mortgage due to extenuating circumstances.</p>

			<p>It offers a number of options – from affordable repayment plans to loan modifications, short sale, and deed-in-lieu of foreclosure – to help you pay your mortgage and avoid foreclosure.</p>

			<h3>Homebuyer Privileges Program</h3>

			<p>This is a program which is designed to help you buy household essentials at discounted rates. You can get special offers, rebates, and discounts on a wide range of items – from electronics to garden supplies – and save up to $7,500.</p>

			<h2>Strengths and Weaknesses of Genworth</h2>

			<h3 id="pros">Strengths</h3>

			<h4>Comprehensive Long-Term Care Insurance</h4>

			<p>Genworth offers comprehensive individual as well as group long-term care plans, which are designed to cover the expenses associated with assisted living care as well as in-home care.</p>

			<p>The company is one of the largest, most well-known long-term care providers in the country today. On average, it pays out $6 million in claims every day. Over the past four decades, it has paid out nearly $17 billion in claims.</p>

			<p>Long-term care insurance has become a necessity for a large section of the US population today. Data from the US Department of Health and Human Services says that approximately 70% of people over the age of 65 require long-term care. </p>

			<p>The average cost of long-term care at an assisted living facility is approximately $48,000 per year. Nursing homes with private rooms can cost as much as $100,000 per year. The average cost of hiring a home health aide is roughly $50,000.</p>

			<p>Now, unless you are financially well off, these numbers should concern you. Not many people can afford to pay for these expenses out of their own pocket and a regular health insurance plan does not cover all the costs associated with long-term care in many cases.</p>

			<p>A comprehensive long-term care insurance policy, like the one offered by Genworth, becomes very useful in such cases.</p>

			<h4>Affordable Mortgage Insurance</h4>

			<p>Just like its long-term care insurance, Genworth’s mortgage insurance is also designed to benefit people from middle and lower-middle class backgrounds.</p>

			<p>The insurance plan has several impressive features like simplified application process, low down payments, affordable monthly payments, and cancellation option.</p>

			<p>Genworth also offers a number of programs specially designed for potential homebuyers as well as homeowners – from helping you with the home loan application process to offering you discounts and special deals on essential household appliances, helping you repay your mortgage and avoid foreclosure during times of financial hardship, and many more.</p>

			<h4>Trust and Reliability </h4>

			<p>As mentioned above, Genworth’s financial ratings are not very impressive, considering the fact that almost all the top-rated companies in the industry have an ‘A’ rating or above. At the same time, Genworth has been in the industry for well over a century, which is no small feat.</p>

			<p>Genworth has managed to survive the Great Depression which was during the high taxation and New Deal of the 1930s, during which period countless number of businesses in the country went bankrupt.</p>

			<p>It has managed to perform well under adverse market conditions and maintain a steady growth rate, which is one of the reasons why it has been acquired by so many multinational conglomerates over the years.</p>

			<p>The company also has a global presence, which indicates that it is being led by a far-sighted management team which is focused on long-term growth and stability. So, the average ratings notwithstanding, Genworth is a reliable insurance provider.</p>

			<h3 id="cons">Weaknesses</h3>

			<h4>No Life Insurance</h4>

			<p>Genworth does not currently sell life insurance. Genworth competed closely with <a href="https://www.noexam.com/life-insurance/companies/banner/">Banner</a> for the most inexpensive term life insurance coverage until their market exit in 2016. Today, it only offers mortgage insurance and long-term care plans.</p>

			<p>If you are a young person, you do not need a long-term care plan at all. Since you are likely to have considerable financial obligations, a term or whole life policy is more likely to suit your needs better.</p>

			<p>Even if you are old, a long-term care plan alone is not sufficient to cover all your financial needs. It is specifically designed to cover the costs of your long-term care, in case you become disabled or if you are unable to perform your everyday activities on your own due to any other reason.</p>

			<p>There are several reasons why you might need a term or whole life policy even if you are in your 60’s or 70’s.</p>

			<p>You may use life insurance to provide a lump-sum payment for your loved ones to replace your income in your absence, to provide for the needs of a child with special needs, to provide a sum of money to cover the local and federal taxes on your estate after your death, to provide your family with a means to pay off the debt burden, to leave a legacy for your family, to cover your funeral expenses, and many more.</p>

			<p>There is no scenario where you can buy a long-term care plan and feel very safe and secure about your financial future, irrespective of your age. In a vast majority of cases, a term life policy or a whole life policy might be necessary.</p>

			<p>In other words, a long-term care plan can be a nice addition to your existing insurance plan, but cannot be a replacement for it.</p>

			<h2>Final Thoughts on Genworth</h2>

			<p>Genworth has been in the insurance business for a really long time and has rightly earned a reputation as a reliable company.</p>

			<p>If you are in need of mortgage insurance or a comprehensive long-term care policy, Genworth might be the right choice for you. The policies are reasonably priced and offer a wide range of benefits that can help you save a lot of money in the long run.</p>

			<p>However, if you are young and require a term or permanent life policy, Genworth may not be the right insurance company for you.</p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
