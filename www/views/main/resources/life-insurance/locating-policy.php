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
					<li><a href="#before">Before you search online</a></li>
					<li><a href="#resources">Helpful Resources</a></li>
				</ul>
			</div>
	</aside> -->
		<article class="content">
			<h1>How to Find Out if Someone Had a Life Insurance Policy</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
            <blockquote class="blue">If you are wondering if a relative had a life insurance policy, there are a few ways to conduct a search. Read on to learn how to locate a life insurance policy.</p>
            <ul>
                <li><a href="https://eapps.naic.org/life-policy-locator/#/welcome">The NAIC Policy Locator</a></li>
                <li><a href="https://www.mib.com/lost_life_insurance.html">The MIB Policy Locator</a></li>
                <li><a href="https://unclaimed.org/">The NAUPA</a></li>
            </ul>
            </blockquote>
            <p>Do you believe your loved one bought a life insurance policy and forgot about it? Apparently, that&rsquo;s what a lot of people have done. Of course, it&rsquo;s not intentional. </p>
            <p>But time has a way of losing track of things like this. In other cases, a life insurance company may not be aware that someone has passed away, or a person secretly made you a beneficiary without your knowledge.</p>
            <p><strong>A person does not need to tell you that they have named you as a beneficiary on a life insurance policy.</strong> That means you can be named as a beneficiary and not have any idea.</p>
            <p>There are a lot of ways a lack of communication can take place when it comes to life insurance policies.</p>
            <p>The bottom line is that if you&rsquo;re the executor of an estate or an immediate family member of someone who passes away, you owe it to the beneficiaries to make sure you uncover all the assets you and they may be entitled to receive.&nbsp;</p>
            <h2 id="before">Before you search online</h2>
            <p>Some people have their affairs in order&hellip;and some don&rsquo;t.</p>
            <p>If a trust has been set up, then chances are the paperwork related to a life insurance policy in the trust will be easy to find and process. But even with a trust or a will, don&rsquo;t always assume that&rsquo;s the case.</p>
            <p>As you go through a deceased person's papers, look for contracts, business cards, insurance agent contact information, canceled checks, and account statements. You might be very surprised (and somewhat mystified) by what you find.</p>
            <p><strong>Safe deposit boxes are also another treasure trove of old and sometimes forgotten paperwork.</strong> Look for a paper trail that indicates if there is evidence of a safe deposit box or not.</p>
            <p>If you do find evidence of a life insurance policy, you&rsquo;ll want to know if the policy was still valid, and also if the policy had any <a href="https://www.noexam.com/life-insurance/whole/cash-value/">cash value</a> or related investments as well.</p>
            <p><strong>Another source to check for hidden policies is through any member organizations the deceased belonged to.</strong> The Elks Club and other fraternal organizations, alumni groups, and professional networking associations will often offer life insurance policies for members only as a way of boosting value in the membership.</p>
            <p>If a life insurance company does not know a policyholder has passed away, sooner or later they may send correspondence in the form of a premium payment due, or an annual statement of some sort. These kinds of things can show up months after the fact. Aside from snail mail, also check all email accounts for any signs that the person was in contact with an insurance agent or an affinity group.&nbsp;</p>
            <p>Tax returns can also be another great source of information. Look for evidence of any dividends that have been paid by an insurer in recent years and reported as income.</p>
            <h2 id="resources">There are many resources to help you locate a policy</h2>
            <p>Forgotten or lost policies are not an uncommon problem.&nbsp;</p>
            <p>Here&rsquo;s one indicator of just how big this issue is. <strong>The National Association of Insurance Commissioners (NAIC) launched a <a href="https://eapps.naic.org/life-policy-locator/#/welcome">Life Insurance Policy Locator</a> tool in November of 2016.&nbsp;</strong></p>
            <p>Through mid-2019, the tool received more than 145,000 requests by people searching for lost or misplaced life insurance policies or annuities. The big surprise is that there were close to 47,000 matches, one out of every three inquiries, resulting in $650 million being reported by companies.</p>
            <p>Keep in mind, not everyone is aware of this tool, so the actual numbers are going to be a lot bigger than this. Knowing how the process works and what to do is critical if you suspect that you or a loved one may be connected to a hidden policy in some way.</p>
            <p>The <strong>NAIC tool</strong>, which is secure, free, and confidential to the public, reports matches found by participating insurers to state insurance agencies. In turn, the companies then make contact with the beneficiaries.&nbsp;</p>
            <p>A response can take 90 days or more, and you'll only be contacted if a match is found. You also won't hear back if you're not the beneficiary, or you don't have the legal authority to obtain information about the deceased person who is the subject of the inquiry.</p>
            <p>If there is a match, you&rsquo;ll need to submit a death certificate and a company claim form to receive a death benefit due to you.</p>
            <p>Another excellent resource is a free search tool offered by the <a href="https://unclaimed.org/">National Association of Unclaimed Property Administrators</a> (NAUPA). This tool is broader, allowing you to see if there are unclaimed bank accounts, stocks, uncashed dividends, and more, in addition to life insurance policies. The NAUPA cites that 1 in 10 people have unclaimed property in some form or another.&nbsp;</p>
            <p>You might also check into <a href="https://www.missingmoney.com/en/">missingmoney.com</a>. <strong>This site is the only site endorsed by the NAUPA.</strong></p>
            <p>Also, <a href="https://unclaimed.org/search-for-your-unclaimed-property-its-free/">every U.S. state has unclaimed property programs</a> that actively search for owners of lost and forgotten assets. You can use official state government websites to conduct a free search. It&rsquo;s estimated that more than $3 billion in assets are returned by states each year.</p>
            <p>Unclaimed property laws require businesses, financial institutions, and <a href="https://www.noexam.com/life-insurance/companies/">life insurance companies</a> to report unclaimed property information to the state after a certain period has elapsed. This is generally three years or more but will vary by state.</p>
            <p>There may be instances when someone purchased a life insurance policy out of the United States. If you think this might be the case, you&rsquo;ll need to expand your efforts. For example, you can search for policies purchased in Canada through the&nbsp;<a href="https://www.olhi.ca/insurance/search-for-lost-policy/">Ombudservice for Life and Health Insurance</a>.&nbsp;</p>
            <p>In addition to these resources, you can also contact <a href="https://www.thebalance.com/state-insurance-commissioners-quick-list-2645464">state insurance commissioner&rsquo;s offices</a> for assistance. These agencies regulate the insurance industry and can answer questions about insurance practices or help you if you're having trouble with your insurance company.</p>
            <h2>A few final thoughts</h2>
            <p>Privacy is still a significant concern even after someone passes away. In many cases, who has the right to inquire about sensitive information is restricted to some degree or another. You'll need to take this on a case by case basis. Providers deal with this type of situation daily and will be able to guide you through the process if you have a legitimate request and can verify that you are entitled to access.</p>
            <p>The other thing to be aware of is that you may be contacted by someone who is attempting to scam you by promising to help you collect a death benefit from a recently deceased person. As the world has migrated to a more online world, these types of activities have become common.</p>
            <p><strong>Use your good sense and never, ever agree to pay someone a fee to help you who reaches out to you first.</strong> If you suspect you&rsquo;re being scammed, contact your local law enforcement agency and let them know what&rsquo;s happening.</p>
            <p>That said, several legitimate companies can help you search for lost life insurance policies. A few of the more well-known companies are&nbsp;<a href="https://www.mib.com/lost_life_insurance.html">MIB&nbsp;</a>and&nbsp;<a href="https://www.policyinspector.com/">Policy Inspector</a>, among others.</p>


		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
