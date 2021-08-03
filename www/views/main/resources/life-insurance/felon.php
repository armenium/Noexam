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
					<li><a href="#why">Why Criminal Records Matters to Life Insurance Companies</a></li>
					<li><a href="#how">How Different Criminal Charges Are Viewed by Life Insurance Companies</a></li>
					<li><a href="#applying">Applying for Life Insurance with a Felony Record</a></li>
					<li><a href="#process">The Life Insurance Approval Process for Felony Convictions</a></li>
					<li><a href="#improving">Improving Your Chances to Get Approved for Life Insurance</a></li>
                    <li><a href="#whatif">What If I Had Life Insurance Prior to a Felony Charge?</a></li>
                    <li><a href="#impact">Criminal Records Impact More Americans Than You Might Realize</a></li>
				</ul>
			</div>
	</aside> -->
		<article class="content">
			<h1>Can a Felon Get Life Insurance?</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
            <p>If you're looking into investing in your future, you might be surprised to find that your background can impact your chances of getting <a href="https://www.noexam.com/life-insurance/">life insurance</a> &mdash; particularly if you have a felony. In fact, if you have a felony record, it can feel nearly impossible to get approved for a life insurance policy.</p>
            <blockquote class="green">Yes, it is possible to get life insurance as a felon. If you are one year removed from probation, you can begin applying with most companies. However, each company treats criminal history differently.</blockquote>
            <p>For example:</p>
            <ul>
            <li><strong>Banner</strong> will not consider those with multiple or major felonies (murder, rape, organized crime, terrorism) for life insurance.</li>
            <li><strong>AIG</strong> will consider those with single non major felonies only if they are off probation for a minimum of 5 years. Those with multiple or major felonies are declined.</li>
            <li><strong>Pacific Life</strong> will decline any applicants with a major felony or multiple felonies.</li>
            <li><strong>Mutual of Omaha</strong> requires no felony convictions in the past 10 years.</li>
            </ul>
            <p>Let's take a closer look at why criminal background checks impact your life insurance application and find out what you can do if you have a felony conviction on your criminal record.</p>
            
            <h2 id="why">Why Criminal Records Matters to Life Insurance Companies</h2>
            <p><a href="https://www.noexam.com/life-insurance/companies/">Life insurance companies</a> aren't in the business of granting insurance policies based on an individual's character or choices, so why should a criminal record matter? It's actually a pretty simple reason &mdash; insurance findings show that individuals with a criminal record (particularly those with a felony charge) <a href="https://www.prisonpolicy.org/blog/2017/06/26/life_expectancy/">tend to live shorter lives</a>.</p>
            <p>So, for life insurance companies, the risk of anyone with a criminal record dying during their policy term appears to be much higher than an individual without a record. Of course, not all criminal charges carry the same weight, which is why the type of criminal record you hold is important.</p>
            
            <h2 id="how">How Different Criminal Charges Are Viewed by Life Insurance Companies</h2>
            <p>Criminal charges are grouped into <a href="https://www.justia.com/criminal/offenses/">five categories</a> &mdash; personal, property, inchoate, statutory, and financial crimes. These offenses could range from possessing alcohol while underage or driving on a suspended license to felonies like manslaughter and homicide.</p>
            <p>The type of charge on your criminal record and whether or not it is a felony will play a large role in determining the type of policy you're offered, the cost of the policy, and even whether or not you're eligible at all.</p>
            <p>If you don't have a felony, you'll be much more likely to <a href="https://www.noexam.com/life-insurance/cheap/">obtain a life insurance policy at a more affordable rate</a> than current and former individuals with felony charges. If you do have a felony, the process is a little more complicated.</p>

            <h2 id="applying">Applying for Life Insurance with a Felony Record</h2>
            <p>If you have a felony charge on your record, it's important that you don't omit this information when applying for a life insurance policy. Your insurance company will do a background check and have access to your criminal records. Lying will automatically lead to declining to offer you insurance coverage. It could also prevent other insurance companies from approving you, as well.</p>
            <p>Your life insurance application will ask if you are currently charged with a felony and if you received a felony conviction. If you're currently being charged with a felony, in jail, or on probation, you won't be able to apply for life insurance.</p>
            <p><strong>In order for life insurance companies to review an application with a felony conviction, you'll need to be off of probation for at least one year.</strong></p>

            <h2 id="process">The Life Insurance Approval Process for Felony Convictions</h2>
            <p>If you are outside of your probation period, you'll need to supply information on your felony to the life insurance company you're applying for coverage with. Companies will take all of the details of your felony into account &mdash; what the type of crime was, additional criminal offenses on your record, how long ago it occurred, etc.</p>
            <p>For instance, if you have a felony on your record from five years ago for not paying child support but have an otherwise clean record and have since caught up on payments, your chances of getting approved for life insurance are relatively high.</p>
            <p>However, if you're just outside of your probation period, have one or more violent felony charges and a history of arrests, your chances of approval are much lower, but not impossible. Since you'll be viewed as a high-risk applicant, some life insurance companies may offer you a policy at a high rate, to protect their investment.</p>

            <h2 id="improving">Improving Your Chances to Get Approved for Life Insurance</h2>
            <p>Since each application with a felony record is reviewed on a case-by-case basis, there are some ways you can improve your chances of getting approved for life insurance.</p>
            <p><strong>Here are some positive factors that life insurance companies will also look at when reviewing felony applications:</strong></p>
            <ul>
            <li>You have a steady job.</li>
            <li>You're married.</li>
            <li>You have a good driving record.</li>
            <li>You do not have any alcohol or drug abuse issues.</li>
            <li>You do not have any other misdemeanors or criminal charges on your record.</li>
            </ul>

            <h2 id="whatif">What If I Had Life Insurance Prior to a Felony Charge?</h2>
            <p>Some individuals may have life insurance before being charged with a criminal charge or felony. Would the policy remain intact even if they were convicted and/or incarcerated?</p>
            <p>The short answer is yes. Unless you have a clause written into your policy that terminates your coverage upon incarceration (which is rare), if you had life insurance prior to being charged with a felony, you're able to keep your policy, as long as the premium payments are still made on time.</p>
            <p>You may need to ensure payments are auto-drafted or paid by a family member on time. Since it's difficult to enroll in a new policy after your probation period, you'll want to make sure you don't miss a single payment during this period.</p>

            <h2 id="impact">Criminal Records Impact More Americans Than You Might Realize</h2>
            <p>You might think this problem is limited to a select few in the country, but nearly 77 million Americans &mdash; that's 1 in 3 citizens &mdash; have some type of <a href="https://www.ncsl.org/research/labor-and-employment/barriers-to-work-individuals-with-criminal-records.aspx">criminal record</a>. The Bureau of Justice Statistics reported that in 2017 there were over <a href="https://www.bjs.gov/index.cfm?ty=pbdetail&amp;iid=6546">1.4 million Americans</a> serving time in state or federal correctional institutions.</p>
            <p>On top of that, the <a href="https://www.everycrsreport.com/reports/RL34287.html">National Reentry Resource </a><a href="https://csgjusticecenter.org/nrrc/facts-and-trends/">Center</a> found that of the 404,638 individuals released from prison in 2005, over 67% were arrested within 3 years of release and over 76% within 5 years of release.</p>
            <p>With roughly 30% of Americans living with some sort of criminal record, it's important to be aware of how having any sort of criminal background can affect your life insurance policy &mdash; or make it more difficult for you to obtain one.</p>

            <h2>Getting Life Insurance with a Felony is Hard, But Not Impossible</h2>
            <p>It's not easy to get life insurance if you have a felony record, but it's not impossible. To boost your chances of approval, make sure you have a clean record going forward and maintain a steady work history. These factors will decrease your risk factor, making it easier for insurance companies to approve you.</p>
            <p>If you do get approved for life insurance, you should be prepared to pay slightly higher than <a href="https://www.noexam.com/life-insurance/term/rates/">average rates</a>, since you're still a <a href="https://www.noexam.com/life-insurance/high-risk/">high-risk applicant</a>. However, if you're buying life insurance to protect your spouse or children, it's a small price to pay for peace of mind.</p>


		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
