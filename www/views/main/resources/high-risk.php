<?php

use yii\widgets\Breadcrumbs;

//VarDumper::dump($this->context->current_cat, 10, 1);

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
$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>
<div class="page-content page-wrapper trans_all">


	<!-- START PAGE-CONTENT -->
	<section class="page">
		<aside>
			<div class="sticky-block">
				<h2>Jump to a section</h2>
				<ul>
					<li><a href="#what">What is High Risk Life Insurance</a></li>
					<li><a href="#best-companies">Best Companies for High Risk</a></li>
					<li><a href="#highrisk">What is Considered High Risk?</a></li>
					<li><a href="#rates">High Risk Life Insurance Rates</a></li>
					<li><a href="#type">Best Type of Life Insurance for High Risk</a></li>
					<li><a href="#buying">What You Need to Know Before Buying</a></li>
					<li><a href="#guidelines">Underwriting Guidelines</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>High Risk Life Insurance</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<p>Anyone who applies for a life insurance policy hopes to qualify for the lowest risk class. It is understandable, as it means you get the cheapest rate for your life insurance coverage.</p>

			<p>However, a lot of people fall into the high risk category for life insurance. In fact, less than 3% of Americans live a healthy lifestyle <a href="https://www.mayoclinicproceedings.org/article/S0025-6196(16)00043-4/abstract">according to this study</a>. </p>

			<p>Unsure if you are considered high risk? Continue reading to learn what <a href="https://www.noexam.com/life-insurance/companies/">life insurance companies</a> consider to be high risk.</p>

			<h2 id="what">What is High Risk Life Insurance?</h2>

			<blockquote class="blue">High risk life insurance, as the term indicates, is a class of life insurance which is meant for people with a high mortality risk. It is also referred to as impaired risk life insurance.</blockquote>

			<p>The most important factor which determines the cost of your life insurance coverage is your mortality risk. Insurance companies use a wide range of health and lifestyle data to determine your mortality risk and charge you accordingly.</p>

			<p>A low risk of mortality means that you are unlikely to die while the policy is in force, which in turn means that the insurance company is unlikely to pay a claim. So, you will be classified as a low-risk applicant and charged the <a
						href="https://www.noexam.com/life-insurance/cheap/">lowest rates possible</a>.</p>

			<p>A high risk of mortality, on the other hand, means that you are more likely to die while the policy is in force, which in turn means that the insurance company is more likely to pay a claim. So, you will be classified as a high risk applicant and charged a higher rate.</p>

			<h2 id="best-companies">Best Insurance Companies for High Risk Life Insurance</h2>
			<div class="company-box">
				<h3>Prudential</h3>

				<p><strong>Best For:</strong> People with cardiovascular disease, hepatitis C, and type II diabetes as well as people who chew tobacco, vape, and smoke e-cigarettes.</p>

			</div>
			<div class="company-box">
				<h3>Transamerica</h3>

				<p>Best For: People with PTSD, bipolar disorder, and liver disease as well as breast cancer survivors.</p>
				<p><a href="https://www.noexam.com/life-insurance/companies/transamerica/">Read Full Review</a></p>
			</div>
			<div class="company-box">
				<h3>Banner Life</h3>

				<p>Best For: Diabetics and people with a family history of cancer. Cigar smokers in excellent health might be able to qualify for non-smoker rates.</p>
				<p><a href="https://www.noexam.com/life-insurance/companies/banner/">Read Full Review</a></p>
			</div>
			<div class="company-box">
				<h3>AIG</h3>

				<p>Best For: People with anxiety, auto immune disorders, and brain lesions. It is one of the very few companies which have lenient underwriting guidelines for ex-felons.</p>
				<p><a href="https://www.noexam.com/life-insurance/companies/aig/">Read Full Review</a></p>
			</div>
			<div class="company-box">
				<h3>Principal Life</h3>

				<p>Best For: Diabetics (type I and type II), cancer survivors, and people with epilepsy.</p>
				<p><a href="https://www.noexam.com/life-insurance/companies/principal/">Read Full Review</a></p>
			</div>
			<h2 id="highrisk">What is Considered High Risk in Life Insurance? </h2>

			<blockquote class="green">You can be designated as a high risk applicant due to a variety of different reasons – the diseases or disorders that you are suffering from, the nature of your work, your hobbies, your lifestyle, and many more.</blockquote>

			<p>Given below is a list of factors based on which you could be classified as a high risk life insurance applicant.</p>

			<h3>High Risk Diseases</h3>
			<ul>
				<li>Cardiovascular Disease</li>
				<li>Aneurysm</li>
				<li>Heart Palpitations</li>
				<li>Pulmonary Embolism</li>
				<li>Epilepsy</li>
				<li>Kidney Disease</li>
				<li>Chronic Obstructive Pulmonary Disease</li>
				<li>Cancer</li>
				<li>AIDS</li>
				<li>Colon Polyps</li>
				<li>Crohn’s Disease</li>
				<li>Pancreatic Disease</li>
				<li>Liver Disease</li>
			</ul>

			<p>Apart from this, if you have undergone organ transplant, you are likely to be classified as a high risk applicant by most insurance providers.</p>

			<h3>High Risk Mental Disorders</h3>
			<ul>
				<li>Post-Traumatic Stress Disorder</li>
				<li>Bipolar Disorder</li>
				<li>Clinical Depression</li>
				<li>Obsessive Compulsive Disorder</li>
			</ul>
			<h3>High Risk Occupations</h3>
			<ul>
				<li>Mining</li>
				<li>Farming</li>
				<li>Logging</li>
				<li>Commercial Fishing</li>
				<li>Construction</li>
				<li>Roofing</li>
				<li>Firefighting</li>
				<li>Aviation</li>
			</ul>
			<h3>High Risk Hobbies</h3>
			<ul>
				<li>Scuba Diving</li>
				<li>Skydiving</li>
				<li>Parachuting</li>
				<li>Mountain Climbing</li>
				<li>Back-Country Skiing</li>
				<li>Racing</li>
				<li>Bungee Jumping</li>
				<li>Hang Gliding</li>
			</ul>
			<h3>High Risk Habits</h3>
			<ul>
				<li>Smoking</li>
				<li>Chewing Tobacco or Consuming it by Any Other Means</li>
				<li>Alcohol Abuse</li>
				<li>Drug Use</li>
			</ul>
			<p>In addition to this, there are other factors based on which you could be classified as a high risk applicant. They are listed below.</p>
			<ul>
				<li>Obesity</li>
				<li>DUI Convictions</li>
				<li>Drug Abuse</li>
				<li>Bankruptcy</li>
				<li>Criminal Record</li>
			</ul>
			<h2 id="rates">High Risk Life Insurance Rates</h2>

			<blockquote class="blue">If you are classified as a high risk applicant, you will have to pay a higher rate compared to someone who is classified in a lower risk health class for the same amount of coverage. The exact amount that you have to pay is calculated based on the risk class that
				you qualify for.
			</blockquote>

			<p>Life insurance risk classes can be generally divided into six categories. Health classes can vary from company to company.</p>
			<ul>
				<li>Preferred Plus – This is the lowest risk class you can possibly qualify for. If you are in excellent health and have no family history of heritable conditions, you can qualify for this risk class.</li>
				<li>Preferred – If you are in great health but have a minor condition which is unlikely to increase your mortality risk, you can qualify for this risk class.</li>
				<li>Standard Plus – If you are in solid health but have a couple of minor conditions which are unlikely to increase your mortality risk, you can qualify for this risk class.</li>
				<li>Standard – This is the risk class that the average person is most likely to fall into. If you have a few minor health issues and a family history of medical conditions, you are likely to fall into this risk class.</li>
				<li>Preferred Tobacco – If you are a smoker who is in excellent health, you can qualify for this risk class.</li>
				<li>Standard Tobacco– If you are a smoker who is in average health, you can qualify for this risk class.</li>
			</ul>
			<p>Among these risk classes, the ‘Standard’ risk class is considered the base rate class, against which all the other risk classes can be compared.</p>
			<p>These percentages are not exact and are only being used to illustrate how pricing can work.</p>

			<p>For example, if you qualify for the ‘Preferred Best’ rate class, you will only have to pay 50% of the ‘Standard’ rate. If you qualify for the ‘Preferred’ rate class, you will have to pay 65% of the ‘Standard’ rate. </p>

			<p>If you qualify for the ‘Standard Plus’ rate class, you will have to pay 85% of the ‘Standard’ rate. If you qualify for the ‘Standard’ rate class itself, you have to pay 100% of the base rate.</p>

			<p>Apart from these regular risk classes, insurance companies have a table rating system to assign an appropriate rate class for high risk applicants. The table rating system has eight different ratings – 1 to 8 or A to H. Some insurance companies have 16 different ratings – 1 to 16 or A
				to P. These table ratings are commonly referred to as substandard rate classes.</p>

			<p>As is the case with regular rate classes, table rate classes are also expressed as a percentage of the ‘Standard’ rate class.</p>

			<p>For example, if you qualify for Table 1/A, you have to pay 25% above the standard rate. If you qualify for Table 2/B, you have to pay 50% above the standard rate. If you qualify for Table 3/C, you have to pay 75% above the standard rate, and so on. The further you slip down the table
				rating system, the higher your policy premium tends to be.</p>

			<p>The difference between low-risk and high risk life insurance – in terms of policy costs – is illustrated in the table below.</p>

			<p>In the illustration given below, we have assumed that the base rate for the ‘Standard’ risk class is $100.</p>

			<style type="text/css">
				.tg {border-collapse: collapse;border-spacing: 0;border-color: #bbb;}

				.tg td {font-family: Arial, sans-serif;font-size: 14px;padding: 10px 5px;border-style: solid;border-width: 0px;overflow: hidden;word-break: normal;border-color: #bbb;color: #594F4F;background-color: #E0FFEB;}

				.tg th {font-family: Arial, sans-serif;font-size: 14px;font-weight: normal;padding: 10px 5px;border-style: solid;border-width: 0px;overflow: hidden;word-break: normal;border-color: #bbb;color: #493F3F;background-color: #9DE0AD;}

				.tg .tg-lboi {border-color: inherit;text-align: left;vertical-align: middle}

				.tg .tg-mylt {background-color: #bbbbbb;border-color: inherit;text-align: left;vertical-align: middle}

				.tg .tg-0pky {border-color: inherit;text-align: left;vertical-align: top}
			</style>
			<table class="tg">
				<tr>
					<th class="tg-mylt">Rate Class</th>
					<th class="tg-mylt">Percentage of Price</th>
					<th class="tg-mylt">Price</th>
				</tr>
				<tr>
					<td class="tg-lboi">Preferred Plus</td>
					<td class="tg-lboi">50% of Standard Rate</td>
					<td class="tg-lboi">$50</td>
				</tr>
				<tr>
					<td class="tg-lboi">Preferred</td>
					<td class="tg-lboi">65% of Standard Rate</td>
					<td class="tg-lboi">$65</td>
				</tr>
				<tr>
					<td class="tg-lboi">Standard Plus</td>
					<td class="tg-lboi">85% of Standard Rate</td>
					<td class="tg-lboi">$85</td>
				</tr>
				<tr>
					<td class="tg-0pky">Standard</td>
					<td class="tg-0pky">100% of Standard Rate</td>
					<td class="tg-0pky">$100</td>
				</tr>
			</table>


			<p>Now, let us take a look at the cost of table ratings. Again, we have assumed that the base rate is $100.</p>

			<style type="text/css">
				.tg {border-collapse: collapse;border-spacing: 0;}

				.tg td {font-family: Arial, sans-serif;font-size: 14px;padding: 10px 5px;border-style: solid;border-width: 1px;overflow: hidden;word-break: normal;border-color: black;}

				.tg th {font-family: Arial, sans-serif;font-size: 14px;font-weight: normal;padding: 10px 5px;border-style: solid;border-width: 1px;overflow: hidden;word-break: normal;border-color: black;}

				.tg .tg-jz10 {background-color: #e0ffeb;text-align: left;vertical-align: middle}

				.tg .tg-1slo {background-color: #e0ffeb;text-align: left;vertical-align: top}

				.tg .tg-ujsz {font-weight: bold;background-color: #bbbbbb;text-align: left;vertical-align: middle}
			</style>
			<table class="tg">
				<tr>
					<th class="tg-ujsz">Table Rating</th>
					<th class="tg-ujsz">Pricing in Terms of Percentage</th>
					<th class="tg-ujsz">Pricing in Dollars</th>
				</tr>
				<tr>
					<td class="tg-jz10">Table 1/A</td>
					<td class="tg-jz10">25% Over the Standard Rate</td>
					<td class="tg-jz10">$125</td>
				</tr>
				<tr>
					<td class="tg-jz10">Table 2/B</td>
					<td class="tg-jz10">50% Over the Standard Rate</td>
					<td class="tg-jz10">$150</td>
				</tr>
				<tr>
					<td class="tg-jz10">Table 3/C</td>
					<td class="tg-jz10">75% Over the Standard Rate</td>
					<td class="tg-jz10">$175</td>
				</tr>
				<tr>
					<td class="tg-jz10">Table 4/D</td>
					<td class="tg-jz10">100% Over the Standard Rate</td>
					<td class="tg-jz10">$200</td>
				</tr>
				<tr>
					<td class="tg-1slo">Table 5/E</td>
					<td class="tg-1slo">125% Over the Standard Rate</td>
					<td class="tg-1slo">$225</td>
				</tr>
				<tr>
					<td class="tg-1slo">Table 6/F</td>
					<td class="tg-1slo">150% Over the Standard Rate</td>
					<td class="tg-1slo">$250</td>
				</tr>
				<tr>
					<td class="tg-1slo">Table 7/G</td>
					<td class="tg-1slo">175% Over the Standard Rate</td>
					<td class="tg-1slo">$275</td>
				</tr>
				<tr>
					<td class="tg-1slo">Table 8/H</td>
					<td class="tg-1slo">200% Over the Standard Rate</td>
					<td class="tg-1slo">$300</td>
				</tr>
			</table>

			<p>The cost of life insurance coverage can differ significantly – depending on whether you are classified as a low risk applicant or a high risk applicant.</p>

			<h3>Flat Extra</h3>

			<p>In some cases, in addition to being charged a higher rate, you could also be charged an additional fee, which is commonly referred to as a ‘flat extra’. Insurance companies tend to charge flat extra fees in order to compensate for the added risk that they take on by providing coverage
				to high risk applicants.</p>

			<p>For example, if you are a cancer survivor, your insurance company might charge you a flat extra for five years – in order to compensate for the risk of recurrence. If you remain cancer-free for five years, the company will drop the flat extra from the sixth year of your coverage
				period and allow you to pay the normal rate associated with your risk class.</p>

			<p>Generally, insurance providers tend to charge flat extra only for a limited period of time. It could be as short as a couple of years or as long as a decade – depending on the extent of the risks associated with providing life insurance coverage to the policyholder.</p>

			<p>In some cases, insurance providers might charge flat extra fees for an indefinite period of time. For example, if you are an avid skydiver or a race car driver, your insurance provider might charge you a flat extra for the entire length of the coverage period. In other words, as long
				as you are engaged in a high risk activity, you have to pay a flat extra in addition to your base premium.</p>

			<p>Flat extra is typically charged on a per-thousand-of-coverage basis. For example, let us assume that your insurance provider charges you a $5 flat extra per $1,000 of life insurance coverage. If you have a policy with a death benefit of $200,000, you have to pay a flat extra of $1,000
				($5 x 200) in addition to your base premium.</p>

			<h2 id="type">What Type of Life Insurance is Best for High Risk People?</h2>

			<p>Depending on your life insurance needs, budget, and the risk class you qualify for, you can buy a term life policy, permanent life policy, final expense policy, or a guaranteed issue policy.</p>

			<h3>Term Life Insurance</h3>

			<p>If you need coverage for a specific length of time – typically between 10 and 30 years – a <a href="https://www.noexam.com/life-insurance/term/">term life insurance</a> policy is the right choice for you. Even if you are classified as a high risk applicant and assigned a table rating,
				a term life policy is still the best choice for you, as it is likely to be considerably cheaper than any other type of policy.</p>

			<h3>Permanent Life Insurance</h3>

			<p>If you need life insurance protection until your death, a <a href="https://www.noexam.com/life-insurance/whole/">permanent life insurance</a> policy might be the right choice for you. Table rated permanent life policies, however, can be prohibitively expensive. So, you should apply
				for a policy only if you can afford the premium payments.</p>

			<p>Otherwise, you can buy a convertible term life policy, which can be converted into a whole life or universal life policy at the end of the term.</p>

			<h3>Final Expense Policy</h3>

			<p>If you are suffering from serious illnesses and expected to live less than 10 years, you are unlikely to qualify for a fully underwritten term life policy or a permanent life policy. In such cases, a final expense, or <a href="https://www.noexam.com/life-insurance/burial-insurance/">burial
					insurance</a>, policy – which covers you until your death and provides your family with a payout which is sufficient to cover your burial expenses – might be the best choice for you.</p>

			<h3>Guaranteed Issue Life Insurance </h3>

			<p>If you are unable to qualify for any other type of life insurance policy – owing to your health condition – you can buy a <a href="https://www.noexam.com/life-insurance/guaranteed-issue/">guaranteed issue life insurance</a> policy. It is generally meant for people who are terminally
				ill and expected to live less than five years.</p>

			<p>Final expense and guaranteed issue life insurance policies have a graded death benefit system, which means your beneficiaries have to wait for a certain period of time – typically two years – before they can become eligible to receive the full death benefit amount.</p>

			<p>If you die within the waiting period, your family will only receive the premiums amounts you paid. This is something you need to keep in mind before applying for a final expense or guaranteed acceptance policy.</p>

			<h2 id="buying">Buying Life Insurance as a High Risk Applicant – What You Need to Know</h2>

			<p>The first and perhaps the most important thing you need to know as a potential high risk applicant is that you might not be as high a risk as you think you are in the first place. Many people mistakenly assume that they might be classified as high risk because they are overweight,
				diabetic, have high blood pressure, have high cholesterol levels, or have a family history of heart disease. It is not true at all.</p>

			<p>You should remember that life insurance companies tend to categorize you as a high risk applicant only if your mortality risk is significantly higher than the average person. Otherwise, you can easily qualify for the best rate classes, even if you have health problems.</p>

			<p>For example, let us assume that you have type II diabetes. If you lead a healthy and active lifestyle and if your blood sugar levels are well under control (less than 7.0), you can qualify for a ‘Standard Plus’ rating with many insurance providers – assuming you do not have any other
				health issues. If, on the other hand, your blood sugar levels are out of control (10.0 or above), you are likely to be categorized as a high risk applicant.</p>

			<p>Similarly, if you have osteoarthritis, you can easily qualify for a ‘Preferred’ rate class, assuming you do not have any other health issues. If you, on the other hand, have rheumatoid arthritis, you might only be eligible for a table rated policy.</p>

			<p>The same can be said about elevated cholesterol levels, high blood pressure, asthma, and a number of other health problems. If you are taking your medications regularly, following your doctor’s instructions carefully, and have it under control, you can easily qualify for ‘Standard’,
				‘Standard Plus’, or even ‘Preferred’ rates in some cases. </p>

			<h2 id="guidelines">The Difference in Underwriting Guidelines Among Life Insurance Companies</h2>

			<p>Another important thing you need to know about buying life insurance coverage as a high risk applicant is that the very concept of ‘high risk’ tends to differ from one insurance provider to another. Insurance companies have a set of criteria – commonly referred to as underwriting
				guidelines – based on which they categorize applicants as low-risk or high risk. These guidelines tend to differ greatly from one company to another.</p>

			<p>Some insurance providers, for example, have lenient underwriting guidelines for diabetics. Some have lenient underwriting guidelines for people with heart disease. Some others are known to approve felons.</p>

			<p>On the other hand, a company which approves type I diabetics might only offer a table rated policy for people with cardiovascular disease. A company which approves people with cardiovascular disease might outright deny coverage to people with a criminal record. It all depends on their
				guidelines and their definition of ‘high risk’.</p>

			<p>This is why it is important for you to be aware of the factors which make you a high risk applicant. Once you know it, you can apply for a policy with a company which is most likely to approve you. This is also a reason to work with an agent that has experience with high risk
				applicants. An experienced agent will know right away what some of the best options are.</p>


		</article>

	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
