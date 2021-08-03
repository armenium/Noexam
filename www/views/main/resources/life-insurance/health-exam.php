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
		<aside>
			<div class="sticky-block">
				<h2>Jump to a section</h2>
				<ul>
					<li><a href="#what">What the Exam Involves</a></li>
					<li><a href="#test">What They Test For</a></li>
					<li><a href="#prepare">How to Prepare</a></li>
					<li><a href="#bypass">Bypass the Exam</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>What Life Insurance Companies Test for in a Health Exam</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<p>If you’re planning on buying life insurance, one thing you need to be prepared for is the health exam. This is part of the underwriting process and the insurance company uses it to decide whether to issue you a policy and what premiums you’ll pay.</p>
			<p>As long as you’re in good health, the exam shouldn’t be a barrier to getting life insurance. If you’re concerned about whether you’ll qualify, read on to find out what you can expect. If you do not want to go though with a health exam, <strong><a href="https://www.noexam.com/apply-now/">click here for a quote on a policy that does not require an exam.</a></strong></p>
			<h2 id="what">What the Exam Involves</h2>
			<p><img style="float:right;" src="../../img/medical-exam-giving-blood.jpg" alt="medical-exam-giving-blood" width="200" height="300"/>The exam itself is fairly quick and usually takes less than an hour. The insurance company schedules it for you and it can be done in a doctor’s office or a health care technician may be sent to your home.</p>
			<p>If you haven’t already filled out a medical questionnaire, you’ll do this before the exam begins. The questionnaire asks about things like your family medical history, previous illnesses and injuries and tobacco use.</p>
			<p>From there, the person who’s conducting the exam will take some measurements, including your:</p>
			<ul>
				<li>Height</li>
				<li>Weight</li>
				<li>Blood pressure</li>
				<li>Pulse</li>
			</ul>
			<p>The next step is a blood sample. Some insurers also ask for a urine sample. If you’re older or you’re trying to get a larger policy, an electrocardiogram or EKG may also be required.</p>

			<h2 id="test">What you’re being tested for</h2>
			<blockquote class="green">The purpose of the exam is to make sure you’re healthy so that the life insurance company isn’t taking on too much risk to insure you. Here’s a rundown of the specific health issues they’re looking for.</blockquote>
			<p><strong>Heart disease</strong> – Your heart health is extremely important to the insurance company and one of the things they’ll try to gauge is your risk for a heart attack or stroke. The exam measures your cholesterol levels, your ratio of good vs. bad cholesterol and the amount of triglycerides or fat there is present in your blood.</p>
			<p>High cholesterol, high triglyceride levels and a high ratio of bad cholesterol or low density lipoproteins (LDL) are often precursors for heart disease. The better your numbers are, the better your chances of getting approved for life insurance.</p>
			<p>One thing to keep in mind is that if you’re taking medication for high blood pressure, this will show up in the urine test. High blood pressure by itself won’t disqualify you from getting covered but it may mean paying a higher premium.</p>
			<p><strong>Kidney and bladder issues</strong> – The insurance company also wants to make sure that your kidneys and bladder are functioning normally. They do that by looking for the presence of certain enzymes and proteins such as creatinine that could point to infections or kidney disease.</p>
			<p><strong>Liver disease</strong> – Your liver does the hard work of filtering your blood and you need the right balance of liver enzymes to stay healthy. A blood test can pick up on whether your enzyme levels are too high or too low, which can be a sign of liver disease, malnutrition or damage related to alcohol use.</p>
			<p><strong>Diabetes</strong> – The pancreas helps regulate your blood sugar so the insurance company will take a close look at your glucose levels. A high concentration of glucose in your urine could mean you’re diabetic or pre-diabetic.</p>
			<p><strong>Tobacco use</strong> – Smokers are more at risk for having a heart attack or stroke so the insurance company will check for nicotine levels in your blood. Cotinine, the key ingredient in nicotine, can also be detected through saliva or hair samples so be prepared to hand them over if the insurance company asks.</p>
			<p><strong>STD's</strong> - The blood test will look for sexually transmitted diseases as these are can be seen as a risk factor when determining the rate class of the applicant.</p>
			<p><strong>HIV</strong> – One last thing the health exam may test for is the presence of HIV.</p>


			<h2 id="prepare">How to prepare</h2>
			<p>When you’re gearing up for a life insurance health exam there are a few things you can do to make sure you get the best results possible. In the week leading up to the exam, you’d want to cut back on salty or fatty foods as much as possible. Limit how much sugar you’re eating and swap out a carb-heavy diet for things like lean proteins and leafy vegetables.</p>
			<p>You’d also want to hold off on the caffeine and alcohol and replace them with plenty of water instead. Skipping cigarettes and exercise for at least 12 hours before the exam is a smart idea if you’re concerned about your blood pressure being elevated. Finally, make sure you get a good night’s sleep the day before.</p>
			<h2 id="bypass">Consider a no-exam policy instead</h2>
			<p>If you don’t want to go through the stress of a health exam or you just can’t fit it into your busy schedule, a <a href="https://www.noexam.com/life-insurance/companies/no-exam/">no exam life insurance policy</a> from one of these <a href="https://www.noexam.com/life-insurance/companies/">top rated life insurance companies</a> may be the better choice. You can apply for a policy online and get approved the same day, depending on which company you use. Coverage may cost a little more but it’s a small price to pay to avoid the hassle of a health exam.</p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
