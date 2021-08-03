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
					<li><a href="#who">Who needs an attending physician statement?</a></li>
					<li><a href="#what">What questions does the APS ask?</a></li>
					<li><a href="#howlong">How long will it take the insurance company to come to a decision after requesting an APS?</a></li>
					<li><a href="#declined">What do I do if I am denied coverage?</a></li>
					<li><a href="#contestability">Contestability clause</a></li>
				</ul>
			</div>
	</aside> -->
		<article class="content">
			<h1>What is an Attending Physician Statement?</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
            <p>When you apply for life insurance, the insurance company wants to estimate their level of risk. Underwriting does a lot of number crunching to figure out how long you are likely to live. Part of this process may include getting an attending physician statement. <strong>This is a report from a doctor summarizing your medical history.</strong></p>
            <blockquote class="green">
            <ul>
                <li>An Attending Physician Statement is a report your doctor submits to a life insurance company</li>
                <li>An attending physician statement may be required if you are applying for a large policy or have a chronic medical condition</li>
                <li>If you are denied life insurance, there are alternatives such as Guaranteed-issue life insurance</li>
            </ul>
            </blockquote>
            <p>Not everyone who applies for insurance will have to submit an attending physician statement. Insurance companies only request it if they are concerned about something.</p>
            <h2 id="who">Who needs an attending physician statement?</h2>
            <p>The attending physician statement, or APS, is requested by the insurance company for a few reasons, such as large insurance policies or if you&rsquo;re an older applicant. There are certain medical conditions that frequently result in an APS request. They are:</p>
            <ul>
            <li>Abnormal cardiac tests</li>
            <li>High blood pressure</li>
            <li>Lupus</li>
            <li>Cancer</li>
            <li>Diabetes</li>
            <li>Hepatitis</li>
            <li>Rheumatoid arthritis</li>
            <li>Stroke</li>
            <li>Mental illness</li>
            </ul>
            <p>Any one of these conditions will cause the life insurance underwriter to rethink your life insurance application. They could decide to raise your premiums or deny the application altogether.</p>
            <h2 id="what">What questions does the APS ask?</h2>
            <p>It varies from company to company, as each insurance company has their own form. But usually they want the following information:</p>
            <ul>
            <li>Diagnosis: when did the condition in question first develop?</li>
            <li>Prognosis: What is the likely outcome of this condition?</li>
            <li>Treatment: How are you being treated for this condition (medication, surgery, etc)</li>
            <li>Progress: Is this treatment working? And are you following it?</li>
            </ul>
            <h2 id="howlong">How long will it take the insurance company to come to a decision after requesting an APS?</h2>
            <p>If your insurance company requires an APS before they consider your application, it can delay the process for several weeks to months. It can take anywhere from three weeks to three months just to get the physician to return the information. Doctors are busy and would rather be treating patients than filling out forms.</p>
            <p>Once the doctor returns the APS, an underwriter has to read it. If your medical history is particularly complex, an attending physician statement can be multiple pages long. This is a lot for an underwriter to go through and summarize.</p>
            <p>Now that most health information is digitized, the process should be faster. However, some underwriters are leery of electronic health records because they use a lot of diagnostic codes for medical conditions and are hard to interpret correctly. However, they are exploring options to use <a href="https://theactuarymagazine.org/ehrs-for-individual-life-insurance-underwriting/">EMR data</a> in the underwriting process.</p>
            <h2 id="declined">What do I do if I am denied coverage?</h2>
            <p>If the life insurance company denies you a policy on the basis of the APS, you have several options.</p>
            <ul>
            <li>Apply with a different company</li>
            <li>Get a simplified-issue life insurance policy</li>
            <li>Get a guaranteed-issue life insurance policy</li>
            <li>Get a group life insurance policy through your employer</li>
            </ul>
            <p><strong>Apply with a different company: </strong>Some medical issues that result in rejection from one company will be approved at another.</p>
            <p><strong>Get a simplified-issue life insurance policy: </strong>You won&rsquo;t need a medical exam for <a href="https://www.noexam.com/life-insurance/types/#simplifiedissue">simplified-issue</a> life insurance however, you&rsquo;ll still have to answer questions about your health. Premiums are higher than traditional life insurance policies.</p>
            <p><strong>Get a guaranteed-issue life insurance policy:</strong> <a href="https://www.noexam.com/life-insurance/guaranteed-issue/">Guaranteed-issue</a> doesn&rsquo;t have any medical exam, and everyone is approved. It&rsquo;s usually available in policies between $10,000 and $50,000. Because everyone is accepted, the premiums tend to be much higher.</p>
            <p><strong>Get a group life insurance policy through your employer: </strong>Even if you have a chronic medical condition, some employers offer life insurance as part of their benefits packages. The downside here is that if you take another job that doesn&rsquo;t offer life insurance, you&rsquo;ll lose coverage.</p>
            <h2 id="contestability">Contestability clause</h2>
            <p>In most life insurance policies, there is a <a href="https://www.noexam.com/life-insurance/contestability/">contestability clause</a>. While it&rsquo;s tempting to lie about your health to your life insurance company because it might lead to better rates, it&rsquo;s not a good idea.</p>
            <p>The first two years of a life insurance policy are subject to something called the contestability clause. The contestability clause means that the insurance company has a right to investigate any claims if you die within the first two years of the policy. Instead of a death benefit, you&rsquo;ll be leaving your loved ones with a legal battle.</p>
            <p>If you think you can hide your medical issues for just two years, insurance companies can still deny claims if they think you gave them false information. For example, if you tell your insurance company you&rsquo;re a non-smoker and you actually smoke a pack a day. If someday you die of lung cancer, your life insurance company might not pay the death benefit.</p>
            <p><strong>An APS makes it very difficult for an insurance company to deny a claim. They knew of your health issues; it&rsquo;s all there in the APS.</strong></p>
            <h2>Conclusion</h2>
            <p>If you apply for life insurance and the company wants an attending physician statement, don&rsquo;t panic. It does delay the process, but odds are the company will insure you. It also makes it difficult for the insurance company to deny any future claims.&nbsp;</p>


		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
