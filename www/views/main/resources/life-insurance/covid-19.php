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
					<li><a href="#exam">Skip the Exam</a></li>
					<li><a href="#statement">Statement of Good Health Required</a></li>
				</ul>
			</div>
		</aside> -->

		<article class="content">
			<h1>Life Insurance and Covid-19</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<p>With health uncertainty on everyone’s mind, the life insurance industry is surging. Here is what you need to know about applying for life insurance during a pandemic. </p>

           <p> Life insurance companies offer a form coverage referred to as accelerated underwriting. This form of policy allows individuals to apply for life insurance coverage without having to take a medical exam. There are a few companies that are popular for offering this type of coverage:</p>
            <ul>
                <li>Sagicor</li>
                <li>SBLI </li>
                <li>Mutual of Omaha </li>
                <li>Haven Life</li>
            </ul>
            <h2 id="exam">Skip the exam</h2>

            <p>Due to recent health concerns of highly contagious COVID-19, it is advised you seek out a policy that does not require a medical exam. However, even an accelerated form of coverage will still require underwriting. By providing consent to an insurance company to validate medical records electronically, life insurance applicants can practice safe social distancing when applying for coverage. </p> 
            
            <blockquote class="blue">Taking a trip to the doctor’s office for a medical exam during a pandemic has a higher risk than it previously did. For this reason, applicants should ask the insurance company they are seeking coverage from if the company offers accelerated or simplified forms of coverage.</blockquote>

            <p><strong>If you have recently traveled outside the country, wait 30 days to apply.</strong></p>
            <ul>
                <li><a href="https://www.noexam.com/life-insurance/companies/">Life insurance companies</a> are placing a 30-day moratorium for applicants returning from traveling outside of the country within the last 30 days. Note that for applicants who have already applied, the insurance company will still underwrite those policies, but the provider will require a statement of good health in order to proceed through the underwriting process.</li>

                <li>Insurers are placing a 30-day moratorium on policies for candidates who have come into contact with an individual who tested positive for COVID-19. </li>

                <li>For applicants who have tested positive for COVID-19 and are interested in applying for life insurance, a 90-waiting period is being put on those policies.</li>
            </ul>
            <h2 id="statement">Statement of Good Health Now Required</h2>

            <strong>Life insurers are now requiring a statement of good health amidst COVID-19 concerns.</strong>

            <p>A statement of good health is a questionnaire life insurance companies require in order to obtain coverage. The document is used to determine the state of the applicant’s physical health at the time of applying for life insurance. Many life insurance companies no longer require physical medical examinations, but rather what is more common is a requirement for the applicant to provide a statement of good health. </p>

            <p>In the past, statements of health were only required for employer-based life insurance plans, also known as group life insurance. However, due to COVID-19, many life insurance companies are requiring individual life insurance applicants to submit statements of good health at the time of application. These statements consist of a series of questions relating to the applicant’s health at the time of application. A typical form will ask fewer than 10 questions and will request that applicants answer questions honestly. These forms ask questions similar to the ones below. </p>
            <ul>
                <li>Are you currently in a hospital or do you require assistance with activities of daily living? </li>
                <li>Are you awaiting test results, or have you tested positive for a disease or virus?</li>
               
            </ul>
            <h3>What is a statement of good health used for?</h3>

            <p>A life insurance company uses a statement of good health to confirm if an applicant is in good health at the time of application. If you are asked to answer a statement of good health, it is important to answer all the questions honestly, correctly,  and to the best of your knowledge, as it is a legal document that will be a part of the life insurance policy. Thus, If the insurance company does find misrepresentation at any time, it could void the life insurance policy all together. </p>

            <h3>When do I complete the statement of good health? </h3>

            <p>The applicant for insurance will complete the statement of good health at the time he or she submits the application. At this point, the insurer will ask the applicant to answer a series of questions regarding his or her current physical condition, which become the applicant’s “statement of good health.”</p>

            <h3>If I answer yes, will it automatically disqualify me? </h3>

            <p>No. Answering yes to a question on a statement of good health does not disqualify the applicant from receiving coverage. If you do answer yes though, be as descriptive as possible about your circumstance. The more accurate and complete the information, the less time the application will spend in underwriting. </p>


		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>

</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
