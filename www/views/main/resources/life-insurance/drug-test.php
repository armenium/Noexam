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
$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>
<div class="page-content page-wrapper trans_all">

	<!-- START PAGE-CONTENT -->
	<section class="page">
    <!-- <aside>
			<div class="sticky-block">
				<h2>Jump to a section</h2>
				<ul>
					<li><a href="#exam">The Exam</a></li>
					<li><a href="#what">What They Test For</a></li>
                    <li><a href="#why">Why They Test</a></li>
                    <li><a href="#ifyoufail">If You Fail</a></li>
                    <li><a href="#otheroptions">Other Options</a></li>
                    <li><a href="#past">What if you used in the past?</a></li>
				</ul>
			</div>
	</aside> -->
		<article class="content">
			<h1>Do Life Insurance Companies Test for Drug Use?</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
            
            <p>Most life insurance policies will request a medical exam from you. They do this to determine how healthy you are, which means what level of risk you represent. This helps them determine how much to charge you in premiums, or sometimes deny you a policy altogether. <strong>Part of the medical exam includes a drug test</strong>.</p>
            <blockquote class="green">
            <ul>
            <li><strong>Life insurance companies test for legal and illegal drugs</strong></li>
            <li><strong>Your health determines your premiums</strong></li>
            <li><strong>If you are denied, there are still options for life insurance</strong></li>
            </ul>
            </blockquote>
            <h2 id="exam">What is the medical exam like?</h2>
            <p>When you apply for most life insurance policies, there is a <a href="https://www.noexam.com/life-insurance/health-exam/">medical exam</a>. The company should call and schedule the exam with you, usually within just a few days.</p>
            <p>Someone, usually a nurse, will show up at your house and ask you a series of questions regarding your habits (how often you exercise, do you drink alcohol, do you smoke, etc.) and family history. They may weigh you and take your blood pressure. Lastly, they will take a urine sample and a blood sample. They may do an EKG, but usually only if you&rsquo;re requesting a large death benefit or are an older applicant.</p>
            <p>The whole test takes less than thirty minutes.</p>
            <h2 id>What are they testing for?</h2>
            <p>The insurance company wants to know how much of a risk you pose. They want to know if you use tobacco because <a href="https://www.cdc.gov/tobacco/data_statistics/fact_sheets/health_effects/tobacco_related_mortality/index.htm">smokers live at least 10 years shorter than non-smokers</a>. They&rsquo;ll want to know about any prescription drugs you take because some prescription drugs are highly addictive and taking prescription drugs indicates you have some health issues they want to know about. They will also run a full <a href="https://www.healthline.com/health/10-panel-drug-test">drug panel</a>.</p>
            <p><strong>A full drug panel tests for many different drugs, both prescription and non-prescription. It might test for tobacco, nicotine, opiates, blood pressure medications, etc. It will also test for illegal drugs.</strong> If you test positive for illegal drugs, that will result in an automatic denial of life insurance.</p>
            <p>Nicotine use will get you classified as a smoker and raise your rates. Most life insurance companies allow you to smoke or consume some marijuana. Since marijuana is now legal in many states, testing positive for marijuana won&rsquo;t result in a denial. You might even qualify as a non-smoker, depending on how much marijuana you use. Companies differ in how they treat marijuana and how it affects premiums, so if this is your situation, be sure to shop around. For example, <a href="https://www.pbs.org/newshour/health/heres-how-smoking-marijuana-might-affect-your-life-insurance">Prudential considers you for non-smoker rates if you use marijuana less than 3 times per week.</a></p>
            <p>If you test positive for nicotine, you won&rsquo;t be denied coverage. You will be classified as a smoker, and that will raise your premiums considerably. <a href="https://www.webmd.com/smoking-cessation/taking-nicotine-test">Nicotine use can be detected in your system for as long as 10 days</a>, so if you try to quit right before the test, nicotine can still be detected.</p>
            <p>What if you quit smoking for good a few weeks after your life insurance application was accepted? Generally, you have to be nicotine free for twelve months, then the insurance company will re-test you and you can apply for non-smoking rates.</p>
            <p>If you're taking opiates that were prescribed by a doctor, you may be denied life insurance. Opiates are prescribed for serious medical issues, so at the very least, your premiums will be higher. But according to the <a href="https://www.cdc.gov/drugoverdose/epidemic/index.html">CDC,</a> 130 people die of an opiate overdose every day. Many of them were initially prescribed these drugs by their doctor. Life insurance companies are under no obligation to sell you a policy. If it seems less risky to deny you a policy, that&rsquo;s what they&rsquo;ll do.</p>
            <h2 id="why">Why are they testing for drug use?</h2>
            <p>Life insurance companies want to set your premiums at a fair (to them) rate. The fact of the matter is that <a href="https://americanaddictioncenters.org/learn/long-term-effects-drug-abuse/">people who do drugs or smoke tend to die sooner than people who don&rsquo;t</a>. It&rsquo;s not that they&rsquo;re judgmental, they simply have their eye on the bottom line.</p>
            <h2 id="ifyoufail">What if I fail the test?</h2>
            <p>If your application is denied, request a copy of the test results. If there is something in the results that&rsquo;s wrong, or seems off, you can request to be retested. Insurance companies make mistakes. If something was recorded incorrectly, you can either be retested or apply to a different company.</p>
            <p>Some people worry that if their test shows proof of illegal drug use, the examiner will drop off a copy of the results at the local police station on their way out of town. That&rsquo;s not going to happen. Drug tests are considered private, and life insurance companies will not be sharing your results with anyone. They will raise your premiums or possibly deny you coverage. Illegal drug use usually results in an automatic denial.</p>
            <h2 id="otheroptions">What are my options?</h2>
            <p>If you&rsquo;ve applied for life insurance and been turned down, you have a few options. If you were denied because of legal drug use, you can shop around. Some companies are more forgiving of tobacco and marijuana use than others. Some companies are more lenient regarding opiates (although your rates might be higher).</p>
            <ul>
            <li>You could apply for <a href="https://www.noexam.com/life-insurance/guaranteed-issue/">guaranteed issue life insurance</a>. Guaranteed issue means everyone who applies is accepted. The downside is that rates are very high, and the coverage amounts are low. But if you are in poor health or no one else will insure you, it&rsquo;s an option.</li>
            <li>You can also look into a life insurance policy through your employer. Group life insurance doesn&rsquo;t usually require a medical exam.</li>
            <li>You could buy a short-term insurance policy and address your health issues. <a href="https://www.noexam.com/life-insurance/term/outlive-policy/">When the term is up</a>, hopefully your health is under control and you can apply for a new policy.</li>
            </ul>
            <h2 id="past">I used to do drugs, but now I'm clean. Can I get life insurance?</h2>
            <p>Maybe, but be prepared to answer a lot of questions and prove you&rsquo;ve been clean for at least five years. This is another area that companies vary on--how long you must be clean before they&rsquo;ll reconsider an application for life insurance.</p>
            <p>Be prepared to be upfront about your drug use. If a life insurance company finds out you lied about something and you die during the first two years of the policy, they can <a href="https://www.mslawllp.com/blog/2018/07/opportunistic-rescission-when-do-insurers-waive-their-right-to-rescind-an-insurance-policy/">rescind the policy</a>. The <a href="https://www.noexam.com/life-insurance/contestability/">contestability clause allows them to investigate a claim if the insured passes away in the first 2 years</a>. If they find that you lied on your application, they can cancel the policy. Then your heirs will receive only the premiums you paid.</p>
            <p>If you are denied life insurance for any reason, there are options. You can apply with a different company, you can get a no medical exam policy, or you can address your health issues and apply in a few years. You don&rsquo;t have to go without life insurance if you want it.</p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>

