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
					<li><a href="#about">About Health IQ</a></li>
					<li><a href="#ratings">Financial Strength</a></li>
					<li><a href="#model">The Health IQ Model</a></li>
					<li><a href="#pros">Pros</a></li>
					<li><a href="#cons">Cons</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Health IQ Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/health-iq.png"/></div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>Financial Rating</h6>
							<h5>N/A</h5>
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
							<p>800-549-1664</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>2014</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Term, Whole</p>
						</div>

					</div>
					<a href="https://www.noexam.com/out/health-iq.php">Get A Quote</a>
				</div>
			</div>
			<p>Health IQ is a life insurance agency based in Mountain View, California. The company offers lower insurance rates for health-conscious individuals and athletes.</p>

			<p>Below is a review of the unique services offered by Health IQ. Learn how people who lead a healthy and active lifestyle can benefit from buying a policy from this company.</p>

			<h2 id="ourtake">Our Take</h2>
			<blockquote class="blue">Those individuals who are not in the best shape health wise are unlikely to get the best rates from <a href="https://www.noexam.com/out/health-iq.php">Health IQ</a>. A traditional insurance company with lenient underwriting guidelines like <a href="https://www.noexam.com/life-insurance/companies/aig/">AIG</a> or <a href="https://www.noexam.com/life-insurance/companies/">Prudential</a> will typically better fit their needs. However, fit and healthy people shopping for life insurance will likely get great rates from this company.</blockquote>

			<h2 id="about">About Health IQ</h2>

			<p>The story of Health IQ is an interesting one. In 2010, Munjal Shah, an Indian American entrepreneur based in California sold his company to Google for $100 million. The very next day, <strong>he experienced intense chest pain and was admitted to the hospital</strong>. He was concerned he had suffered a heart attack, since he had a family history of heart disease. Fortunately, it turned out to be a case of lung inflammation. The incident, however, made Shah realize <strong>the importance of leading a healthy lifestyle.</strong></p>

			<p>Shah changed his diet, started exercising regularly, and shed 40 pounds over the next few years. While doing so, he realized it takes a great deal of discipline, patience, and effort to lead a healthy and active lifestyle. He decided <strong>the best way to improve the health of a society’s population was to reward health- conscious individuals.</strong> As a result, he founded Health IQ in 2013.</p>

			<p>Shah was able to secure $35 million in funding almost immediately. The investors sensed the company’s growth potential and the impact it was likely to have on the life insurance industry. They were right in doing so. Today, the Health IQ team has firmly established itself as a reputable brand and has successfully carved out a niche for itself. So far, the company has managed to issue life insurance coverage worth <a href="https://www.healthiq.com/life-insurance">$29 billion</a>.</p>

			<p>They are different from startups like <a href="https://www.noexam.com/life-insurance/companies/ladder/">Ladder</a>, <a href="https://www.noexam.com/life-insurance/companies/ethos/">Ethos</a>, and Bestow in that they are actually providing consumers with the ability to compare life insurance policies from various companies rather than one insurance company. </p>

			<h2 id="ratings">Financial Strength</h2>

			<p>Technically, <a href="https://www.noexam.com/out/health-iq.php">Health IQ</a> is an insurance broker and not an insurance provider. It connects consumers with <a href="https://www.noexam.com/life-insurance/companies/">life insurance companies</a> offering special rates for health conscious individuals. Thus, Health IQ’s financial strength or stability is not of concern for policy holders. However, individuals shopping for insurance should still check the company providing coverage for financial stability and reliability.</p>

			<p>Health IQ itself is backed by prominent investors and operated by a sound businessman who has an excellent track record as both a CEO and an entrepreneur. Moreover, the company only associates itself with top-rated insurance providers like Prudential, <a href="https://www.noexam.com/life-insurance/companies/lincoln-national/">Lincoln Financial Group</a>, and John Hancock. Consequently, those who do qualify for Health IQ services and purchase coverage through the company can be confident in knowing they are getting the best deals for life insurance coverage available.</p>


			<h2>The Link between Lifestyle and Mortality Risk</h2>

			<p><a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC1402378/">Numerous studies show </a>people who are health conscious and lead active lifestyles are at a lower risk of developing type-2 diabetes, heart disease, high blood pressure, and many other diseases, and thus, they have a significantly lower risk of early death. With this being the case, it only makes sense for insurance carriers to reserve their lowest rate classes and rates for healthy people, right?</p>

			<p>Unfortunately, the underwriting methods life insurance providers use do not allow them to differentiate between an active person who has a high “health IQ” and an average person who is in good health.</p>

			<p>For example, if two 35-year-old individuals who earn the same amount of money and have the same job apply for a life insurance policy with a traditional company, they may not necessarily receive the same quote. </p>
			<ul>
				<li>Person A is fit, eats a balanced diet, exercises regularly, and keeps his stress levels in check with the help of yoga and meditation.</li>

				<li>Person B is in good health and does not have any pre-existing conditions. However, he consumes sugary snacks and soda regularly and leads a sedentary lifestyle.</li>
			</ul>
			<p>Person A is in good health and does not have any pre-existing conditions. However, he consumes sugary snacks and soda regularly and leads a sedentary lifestyle. Between the two individuals, Person B is far more likely to develop health problems in the future and has a higher mortality risk compared to Person A, due to his eating habits and lifestyle.</p>

			<p><strong>The life insurance company, however, has no way of differentiating between these two people</strong>, since it is only concerned with the current health status of the applicants, which they establish with the help of a few lab tests and a questionnaire. Therefore, Person A and Person B will likely end up in the same category, assigned the same risk class, and charged the same rate for their policies. This is not particularly fair to Person A, who puts in extra effort to lead a healthy lifestyle. This is precisely where Health IQ enters the picture.</p>

			<h2 id="model">The Health IQ Model</h2>

			<p>To buy a policy through Health IQ, applicants need to undergo a three-step process. These steps are listed below.</p>
			<ol>
				<li>Get a medical exam and take the Health IQ quiz, which is designed to evaluate applicants as an individual and find out if they do in fact live a health-conscious lifestyle.</li>
				<li>Tell the company what type of physical activity he or she participates in. The company offers several activities as options including weightlifting, HIIT, long distance-running, cycling, swimming, triathlon, hiking, yoga, and many more.</li>
				<li>Provide e-proof (data from fitness tracking apps) regarding lifestyle habits.</li>
			</ol>

			<h2>How Health IQ Rewards Applicants</h2>
			<ul>
				<li>If the applicant passes the Health IQ quiz and gets an “Elite” score, a four percent discount on life insurance coverage is awarded.</li>
				<li>If the applicant verifies physical activity and lifestyle with data, another four percent discount is granted.</li>
				<li>In addition to this, the insurance companies that have partnered with Health IQ have special underwriting guidelines for health-conscious people and can offer you an additional 25 percent discount on coverage.</li>
			</ul>
			<p>This means life insurance rates can be 33 percent lower than what the average person is likely to pay for the same amount of coverage. These better rates translate into thousands of dollars in savings over a period of 30 years.</p>

			<h2 id="products">Policies Offered</h2>

			<p>Both term life and whole life insurance are offered through Health IQ.</p>

			<h3>Term Life Insurance</h3>

			<p>For healthy and active individuals needing life insurance coverage at an affordable rate for a specific period of time (10 to 30 years), a <a href="https://www.noexam.com/life-insurance/term/">term life policy</a> is the perfect choice. Individuals in their 20s or 30s who are in good health can buy a substantial amount of coverage at a <a href="https://www.noexam.com/life-insurance/term/rates/">very reasonable price</a>.</p>

			<p>The rate is locked for the entirety of the policy’s term, meaning the amount of the premium for the first month of the coverage period stays the same through the very last month.</p>


			<h3>Whole Life Insurance</h3>

			<p>For individuals, on the other hand, needing coverage that lasts for their entire lifetime, a <a href="https://www.noexam.com/life-insurance/whole/">whole life</a> policy might be the better choice. Though the rates are higher when compared to term life policy rates, a whole life plan provides coverage for the life of the insured if premium payments are maintained.</p>

			<p>In addition, the built-in cash value component serves as an emergency fund, accessible through partial withdrawals and policy loans.</p>


			<h3>Life Insurance for Diabetics</h3>

			<p>Apart from traditional term life and whole life policies, Health IQ also offers a life insurance policy exclusively for people with type-2 diabetes.</p>

			<p>Apart from traditional term life and whole life policies, Health IQ also offers a life insurance policy exclusively for people with type-2 diabetes. The company has partnered with <a href="https://www.noexam.com/life-insurance/companies/protective/">Protective Life</a> to offer a policy specifically designed to meet the needs of people with well-managed type-2 diabetes. In order to qualify for the policy, applicants should meet the following criteria:</p>
			<ul>
				<li>Blood sugar levels should be under control</li>
				<li>Live an active lifestyle</li>
				<li>Receive an “Elite” score on the Health IQ Diabetic Quiz</li>
			</ul>
			<p>Those who qualify can buy life insurance coverage at a lower rate compared to what they are likely to pay with traditional insurance companies.</p>

			<p>Below are the pros and cons of buying life insurance coverage through Health IQ.</p>

			<h2 id="pros">Pros of Health IQ</h2>

			<h3>Low-Cost Coverage</h3>

			<p>For individuals who are in excellent health, Health IQ offers the opportunity to save up to 33 percent on life insurance coverage. This is substantial savings. The company states 76 percent of its clients are assigned the lowest risk class—Preferred Plus or Preferred Best—by insurance providers. Therefore, policyholders stand to save a lot of money over a period of 20 or 30 years.</p>

			<h3>Sophisticated Underwriting</h3>

			<p>Unlike traditional insurance providers, Health IQ does not determine insurability based on current health condition. It considers a wide range of factors from diet to health literacy, level of physical activity, and overall lifestyle to determine mortality risk. For example, traditional insurance companies usually consider high BMI as a risk factor. Health IQ, on the other hand, has a buffer zone for weightlifters and other people with above-average muscle mass, as they are known to have a higher BMI than the average person. Arnold Schwarzenegger, for instance, had a BMI of 33.9 when he won the Mr. Olympia title. Under normal circumstances, a BMI of 33.9 would be considered a sign of extreme obesity. It is not the case with weightlifters and bodybuilders, who naturally have a higher BMI than the average person but are in perfectly decent health.</p>

			<p>Similarly, most insurance companies tend to label people with a low heart rate as high-risk applicants. Health IQ, on the contrary, will take lifestyle into consideration before deciding if a low heart rate is a symptom of a health problem. Athletes generally tend to have a low resting heart rate, as their heart muscles are strong and can pump more blood with each beat. Therefore, if an applicant leads a very active lifestyle and has a low heart rate as a result of it, Health IQ will classify him or her as a low-risk applicant to ensure they get the lowest rates possible.</p>

			<h3>User-Friendly Website</h3>

			<p><a href="https://www.noexam.com/out/health-iq.php">Health IQ’s website</a> is very informative and easy to use. It provides a free, personalized quote within minutes with the completion of the health quiz making it easy to find out if an applicant qualifies or not.</p>

			<h2 id="cons">Cons of Health IQ</h2>

			<h3>Not an Insurance Provider </h3>

			<p>As mentioned above, Health IQ is a broker, not an insurance provider. The company does not offer policies of its own. It has a list of affiliated insurance companies from which qualified applicants can buy the amount of life insurance coverage they need.</p>

			<h3>Not the Right Choice for People with Health Problems</h3>

			<p>Health IQ was founded for the very purpose of rewarding health conscious people by providing them with low-cost insurance coverage. The company has devised a sophisticated mechanism to differentiate between those who are health conscious and those who are not. The former gets the best offers and the lowest rates, while the latter do not.</p>

			<p>Individuals who are not very health conscious and do not lead an active lifestyle are better suited going with a traditional insurance provider since Health IQ policy costs are based on current health status and family health history alone.</p>

			<h2>Final Thoughts on Health IQ</h2>

			<p>Health IQ is an excellent choice for those who are fit and healthy. The company has partnered with several top-rated insurers, all of whom are willing to offer considerable discounts to people who lead a healthy and active lifestyle.</p>

			<p>The coverage qualified applicants buy through Health IQ is likely to be <a href="https://www.noexam.com/life-insurance/cheap/">cheaper than the coverage they would buy from a traditional insurance company</a>, even with a medical exam. Athletic, active people who lift, swim, run marathons for fun, or participate in other activities on a regular basis should consider applying for a policy through Health IQ to ensure they get the lowest life insurance rates possible.</p>

		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
