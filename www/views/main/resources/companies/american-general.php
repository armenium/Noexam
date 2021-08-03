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
?>
<div class="page-content page-wrapper trans_all">

	<!-- START PAGE-CONTENT -->
	<section class="page">
		<article class="content">
			<h1>American Geneal Life Insurance Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<p><img style="float:right;" src="../../../img/american-general-e1540768378133.jpg" alt="american general life insurance" width="302" height="62"/>When it comes to life insurance, buying from the right insurer is just as important as buying the right policy.</p>
			<p>If you unknowingly choose an unreliable and financially unstable insurer, your family might be left in the lurch after your demise. So, it is very important to pay attention to the company’s background before you buy a policy.</p>
			<p>In this review, we take a look at American General, its financial ratings, its policies, and the advantages and disadvantages of buying a policy from the company.</p>
			<?=$this->render('/main/widgets/apply-now-form.php', ['position' => 'center', 'width' => '100%']);?>
			<h2>About American General</h2>
			<p>American General was founded in 1960 in Houston, Texas. Within a short period of time, the company managed to carve a niche for itself in the market and went on to become one of the most well-known insurers in the industry. In 2001, it was acquired by the American International Group (<a href="https://www.noexam.com/life-insurance/companies/aig/">AIG</a>).</p>
			<p>The company is now a fully-owned subsidiary of AIG. It is currently one of the largest insurance providers in the world, with its presence stretching across more than 80 countries. The company has paid out nearly $40 billion in insurance claims over the years and remains one of the most reliable names in the industry.</p>
			<h2>Financial Ratings of American General</h2>
			<p>Given here is a list of ratings given by insurer rating agencies to American General.</p>
			<p>A.M. Best: A</p>
			<p>Standard &amp; Poor’s: A+</p>
			<p>Moody’s: A2</p>
			<p>Fitch: A+</p>
			<p>Comdex: 83</p>
			<p>As you can see, American General is rated highly by all the agencies, which is a very good indication of its financial strength and its ability to settle claims in the long term.</p>
			<p>Let us now take a look at the policies offered by American General.</p>
			<h2>Policies Offered by American General</h2>
			<h4>Term Life Insurance</h4>
			<p><strong>Select-a-Term Policy</strong></p>
			<p>This is a unique product offered by American General. It gives you the option of choosing the duration of your policy. With other companies, your only options are 10, 15, 20, and 30-year policies. American General, on the other hand, gives you 18 different term lengths to choose from – starting from 10 years to 35 years.</p>
			<p>The flexible nature of the policy means you only pay for coverage that you need. If you have 17 years to retire, you can buy a 17-year term policy, instead of a 20-year policy and paying for three years of coverage that you do not require.</p>
			<p>Similarly, if you have 23 years left on your <a href="https://www.noexam.com/life-insurance/mortgage/">mortgage</a>, you can buy a 23-year policy, instead of a 30-year one.</p>
			<p>The best part about the Select-a-Term policy is that it can also be converted into a permanent life policy. You can choose to convert your policy into a permanent life policy when the level-premium period ends or when you turn 70, whichever comes earlier.</p>
			<p>There is no additional underwriting involved and you do not have to undergo any tests either. So, it is an excellent way to stay insured for as long as you want.</p>
			<h4>Quality of Life Insurance Policies</h4>
			<p><strong>QoL Flex Term </strong></p>
			<p>The QoL Flex Term policy is similar to the Select-a-Term policy, wherein you get to choose your policy’s term length from 18 different options – 10 to 35 years. It can also be converted into a permanent life policy. The only difference is that it comes with a built-in accelerated benefit rider.</p>
			<p>In the unfortunate event that you are diagnosed with a critical, chronic, or terminal illness, you can get an advance on the death benefit to take care of your medical expenses and to cope with the loss of income caused by your condition. The best part is that the rider is built into the policy at no extra cost.</p>
			<p>The policy also offers a number of other riders like accidental death benefit, child rider, and <a href="https://www.noexam.com/life-insurance/waiver-of-premium/">waiver of premium riders</a>, which you can add to your policy at an additional cost.</p>
			<p><strong>QoL Guarantee Plus GUL II</strong></p>
			<p>It is a permanent life policy which comes with a guaranteed death benefit, a built-in cash value component, an accelerated benefit rider, and a lifestyle income solution.</p>
			<p>The accelerated benefit rider gives you access to the death benefit in case you develop a chronic, critical, or terminal illness. You can receive monthly payments from the insurer to take care of your treatment costs. The payments will continue until you pass away, at which point the remaining amount will be paid out to your beneficiary.</p>
			<p>The lifestyle income solution offers you a source of supplemental income in case you live past the age of 85. Starting at the age of 85, you can receive a small portion of your death benefit in the form of tax-free payments to meet your expenses.</p>
			<p>The payments will continue until you pass away, at which point your beneficiary will receive the remaining amount.</p>
			<p><strong>QoL Value+ Protector</strong></p>
			<p>It is an index universal life policy which allows you to choose the insurance amount (the coverage you need), the premium amount (you can increase or decrease premiums depending on your income level), and premium payment schedule (you can pay on a monthly, quarterly, or yearly basis).</p>
			<p>You can choose to allocate a portion of your premium payments to one or more of four investment accounts – three index interest accounts and one fixed interest account.</p>
			<p>The cash value keeps building in these accounts depending on the performance of the market. Once it has built up, you can use it for your financial needs while saving the insurance benefit for your family.</p>
			<p>The QoL Value+ Protector too comes with an accelerated benefit rider, just like the other QoL policies.</p>
			<p><strong>QoL Max Accumulator+</strong></p>
			<p>It is an index universal life policy, similar to QoL Value+ Protector. There are five index interest accounts, from which you can choose one, two, or all five of them to allocate a portion of your premiums into. The growth of the cash value component is dependent on the performance of the market.</p>
			<p>The biggest difference, however, is that your cash value component is protected against declines in market conditions. When the market goes up, your cash value increases. When it goes down, however, your cash value does not decrease. It remains the same even during turbulent market conditions and does not lose its value.</p>
			<p>What this means is that your cash value could grow at a faster rate compared to the cash value component of a regular whole life policy. Once it builds up, you can withdraw or borrow money for any purpose.</p>
			<h2>Universal Life Policies</h2>
			<p><strong>Secure Lifetime GUL 3</strong></p>
			<p>It provides a guaranteed death benefit and a cash value component, along with an accelerated benefits rider (gives access to death benefit in case of critical, chronic, or terminal illness) and a lifestyle income rider (provides supplementary income starting at the age of 85).</p>
			<p>You have the option of surrendering your policy in the 20<sup>th</sup> year, at which point you will be paid 50% of the premiums, or in the 25<sup>th</sup> year, at which point you will be paid 100% of the premiums or 40% of the policy’s face value, whichever amount is smaller.</p>
			<p><strong>AG Secure Survivor GUL II</strong></p>
			<p>It has a minimum guaranteed death benefit as well as a cash value component, which grows throughout the policy’s term at a guaranteed rate. It allows you to decide the rate of allocation of your premium – how much is contributed towards the death benefit and how much is contributed towards the cash value component.</p>
			<p>You also have the option of surrendering the policy in the 15<sup>th</sup> year, at which point you will be paid 100% of the premiums.</p>
			<h2>Variable Universal Life Insurance</h2>
			<p><strong>AG Platinum Choice VUL 2</strong></p>
			<p>It has a guaranteed death benefit component in addition to a cash value component, whose growth rate is variable and dependent on market conditions. You can choose to pay the premiums on a monthly, quarterly, or yearly basis. You can allocate a portion of your premiums to the fixed and variable interest accounts.</p>
			<p>Depending on your appetite for risk, you can choose to allocate a higher portion of your premium to the variable interest accounts or play it safe by allocating a larger share to the fixed account.</p>
			<p>Once you have a sufficient amount of money in the cash value component, you can withdraw a portion of it or take a loan against it for any purpose.</p>
			<p><strong>Accidental Death and Dismemberment Insurance</strong></p>
			<p>It includes a guaranteed death benefit, which your designated beneficiary will receive in case you are killed in an accident. If you die of a natural cause, your beneficiary will not receive the death benefit.</p>
			<p>Similarly, it contains a dismemberment benefit, which you can receive if you suffer a stroke, lose your eyesight, lose one of your limbs, develop certain conditions or sustain certain types of injuries, as specified in the policy.</p>
			<p><strong>Guaranteed Issue Whole Life Insurance</strong></p>
			<p>It is a very simple, uncomplicated policy which is designed to pay for the final expenses of elderly people. If you are in the 50 to 85 age group, you can qualify for the policy automatically <a href="https://www.noexam.com/life-insurance/companies/no-exam/">without any medical tests</a>.</p>
			<p>The death benefit could be anywhere from $5,000 to $25,000, which is meant to cover your funeral expenses and to pay off any medical bills or small debts that you might have.</p>
			<p>In the next section, we take a look at the advantages and disadvantages of choosing American General as your insurer.</p>
			<h2>Advantages</h2>
			<ol>
				<li>American General has liberal underwriting policies for individuals who are generally classified as ‘high risk’ by most other companies.</li>
				<li>Individuals with diabetes, heart disease, and sleep apnea.</li>
				<li>Individuals who smoke cigars and use marijuana for medical as well as recreational purposes.</li>
				<li>Airline pilots and people who travel a lot.</li>
				<li>Its term life policies have very flexible term lengths. You can choose from 18 different term lengths – an option which is not available with any other insurance company.</li>
				<li>Its term policies are extremely affordable. The rates are among the lowest in the industry.</li>
			</ol>
			<h2>Disadvantages</h2>
			<p>American General might not be a good option for you under the following conditions.</p>
			<ol>
				<li>If you were treated for drug and/or alcohol use in the recent past.</li>
				<li>If you have multiple DUI’s in your record.</li>
				<li>If you are a smoker.</li>
				<li>If you filed for bankruptcy at any point in the past two years.</li>
				<li>If you are in the military and deployed in certain high-risk regions.</li>
				<li>Almost all of American General’s policies – with the exception of Accidental Death and Dismemberment and Guaranteed Issue Whole Life – involve a medical exam. So, if you have a family history of diseases or have any existing conditions, your rates could go up. This can be a problem, particularly when it comes to whole life policies, since you have to keep making premium payments for a much longer period compared to term life policies.</li>
			</ol>
			<h2>Is American General the Right Choice for You?</h2>
			<p><strong>American General is financially stable, reliable, and has a positive record of settling claims without any hassles. These are three qualities that you should look for in any insurance company.</strong></p>
			<p>It offers a wide array of policies, which are extremely flexible with respect to the term length, premium allocation, and premium payment schedule. It allows you to customize a policy to suit your needs better.</p>
			<p>If you are relatively young and do not have any health problems, you could get a policy that covers your needs at extremely competitive rates.</p>
			<p>The only downside is the compulsory medical exam feature, which could be a problem for people with preexisting conditions and a family history of health problems. In which case, you can get in touch with us at noexam.com to find out how you can find a policy that suits your needs and budget.</p>
			<h2>How NoExam.Com Can Help You</h2>
			<p>NoExam.Com is a place where you can a wide range of relevant and updated information on life insurance. We provide you with all the data you need so that you can make a poignant choice – both in terms of choosing a policy as well as choosing the insurance company to buy it from.</p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
