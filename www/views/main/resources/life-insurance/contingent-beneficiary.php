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
					<li><a href="#vs">Primary vs Contingent Beneficiary</a></li>
					<li><a href="#importance">Importance of Contingent Beneficiaries</a></li>
					<li><a href="#problems">Potential Problems</a></li>
					<li><a href="#scenarios">Scenarios</a></li>
					<li><a href="#tips">Tips for Naming Contingent Beneficiaries</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>What Is a Contingent Beneficiary?</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<blockquote class="green">A contingent beneficiary – also known as a secondary beneficiary – is a person, entity, or trust which is legally entitled to receive the proceeds from a life insurance policy, if something were to happen to the primary beneficiary before a claim is made.</blockquote>

			<h2 id="vs">Primary Beneficiary vs Contingent Beneficiary</h2>
			<p>The primary beneficiary on a life insurance policy is the person who receives the death benefit if the insured passes away. In the event that the primary beneficiary is deceased, the contingent beneficiary will receive the payout.</p>

			<h2 id="importance">Importance of Naming a Contingent Beneficiary</h2>
			<p>The primary reason to have a contingent beneficiary is so that the life insurance settlement does not end up going to the insured's estate in the event that the primary beneficiary is deceased. If this happens, the payout could be subject to estate taxes and could be absorbed by any outstanding debts.</p>

			<h2 id="problems">Potential Problems with Not Naming a Contingent Beneficiary</h2>
			<blockquote class="blue">If the insured names their spouse or partner as the only beneficiary, and if he or she passes away before the insured, the proceeds from the life insurance policy usually go to the insured's estate in the event of their death. This can be problematic in estate planning for several reasons.</blockquote>

			<h3>Probate</h3>

			<p>First, the insured's estate goes through the probate process, wherein a court-appointed executor settles outstanding bills and debts (if any) and distributes the rest of the assets to your beneficiaries, as deemed by the probate court.</p>

			<p>It is a complicated process which can take months, especially if they have left behind a large estate, which brings us to our second point.</p>

			<h3>Estate Taxes</h3>

			<p>People with large estates buy life insurance policies – <a href="https://www.noexam.com/life-insurance/whole/">whole life policies</a> in particular – to pass on a large sum of <a href="https://www.irs.gov/faqs/interest-dividends-other-types-of-income/life-insurance-disability-insurance-proceeds/life-insurance-disability-insurance-proceeds">tax-free money</a> to their heirs.</p>

			<p>The money can be used to pay estate taxes – both at the federal and state level. In the absence of such a payout, the family of the deceased might have to liquidate some of their assets in order to pay the tax.</p>

			<p>As we mentioned above, in the absence of a contingent beneficiary, the death benefit paid out by the <a href="https://www.noexam.com/life-insurance/companies/">life insurance company</a> is added to the insured's estate and is taxable.</p>

			<p>If they have a significant amount of debt, most of what they leave behind (their estate as well as the payout from their insurance policy) might be used to pay off creditors, leaving next to nothing for the intended beneficiaries.</p>

			<h3>Potential for Infighting</h3>

			<p>If you fail to designate a contingent beneficiary, the decision to who gets the money may be left up to the executor of the will. Family members and relatives might try to claim the payout for themselves, leading to ugly and unnecessary infighting in the family.</p>

			<h3>No Control over Your Own Money</h3>

			<p>The whole point of buying a life insurance policy is to make sure that the people who matter to you are taken care of in your absence. If you pass away without naming a contingent beneficiary, the payout from your insurance policy might not reach the person whom you intended to leave the money for.</p>

			<p>An executor appointed by a will or probate court will distribute assets to settle the estate. As a result, the person whom you intended to leave the money for might only get a fraction of it.</p>

			<h2 id="scenarios">When Does a Contingent Beneficiary Become Eligible to Receive Your Life Insurance Payout? </h2>

			<p>Contrary to what many people think, a contingent beneficiary does not automatically become eligible to receive the payout in the event of the primary beneficiary’s death.</p>

			<p>There are several possibilities, wherein the death benefit could be paid out to your estate, your primary beneficiary’s estate, or your contingent beneficiary.</p>

			<h3>Scenario One</h3>

			<p>Your primary beneficiary passes away and you pass away shortly after without naming another beneficiary. In this scenario, the proceeds from your policy go to your estate.</p>

			<h3>Scenario Two</h3>

			<p>You pass away and your primary beneficiary files a claim with the insurer. The insurer processes and approves the claim.</p>

			<p>However, before the death benefit is paid out, your primary beneficiary passes away. In this scenario, the proceeds from your policy go to the primary beneficiary’s estate, even if you named a contingent beneficiary.</p>

			<h3>Scenario Three</h3>

			<p>You and your primary beneficiary pass away in an accident at the same time. This is a tricky scenario, as the decision as to who receives the death benefit can only be made based on who died first.</p>

			<p>If your primary beneficiary passed away a few minutes after you did, the proceeds from the policy will go to his or her estate, even if you had named a contingent beneficiary.</p>

			<p>If your primary beneficiary passed away a few minutes before you did, the proceeds from the policy will go to your contingent beneficiary, if you had named one. In the absence of a contingent beneficiary, the proceeds will go to your estate.</p>

			<p>If it is impossible to decide who died first, the insurance company will simply assume that you outlived your primary beneficiary, in which case the proceeds will go to your contingent beneficiary (if you had named one) or to your estate.</p>

			<h3>Scenario Four</h3>

			<p>If you designate multiple people as your primary beneficiaries and one of them passes away shortly after you do, the death benefit payout will be evenly divided among the rest of them.</p>

			<p>For instance, let us say you buy a $300,000 policy and name your wife and three children as your beneficiaries. In the event of your death, all four of your beneficiaries will receive $75,000 each. If your wife passes away shortly after you do, your children will receive $100,000 each.</p>

			<p>If your children are minors at the time of your death, their share of the death benefit will be managed by a legal guardian until they reach the adult age of 18 or 21, depending on the state you live in.</p>

			<h2 id="tips">Three Tips for Designating Contingent Beneficiaries</h2>

			<h3>Review the List of Beneficiaries </h3>

			<p>It is advisable to review your list of beneficiaries as and when needed – when you get married, when you have children, when you get divorced, and so on.</p>

			<h3>Percentage, Not Dollar Amount</h3>

			<p>If you have a permanent life policy, it is a good idea to specify a percentage in terms of how much each of your beneficiaries should receive, rather than a dollar amount.</p>

			<p>This is because the cash value component can grow at a faster rate than expected, in which case the death benefit payout might also be higher than expected.</p>

			<p>Let us say you buy a $300,000 universal life policy and name your wife and two children as the beneficiaries, with each set to receive $100,000 in the event of your death. If the policy is worth $350,000 at the time of your death, your beneficiaries might not be sure as to how the extra $50,000 should be divided.</p>

			<p>To avoid such a scenario, you can specify that you want each of your beneficiaries to get 33% of the death benefit and the remaining 1% should be divided evenly among them.</p>

			<h3>Keep Everyone in the Loop</h3>

			<p>Above all, keep all your beneficiaries – primary as well as contingent – in the loop. Let them know that you have named them as your beneficiary and how much they stand to receive in the event of your death.</p>

			<p>Also, explain to them the process of filing a claim with the insurance company so that they know what to do when the time comes.</p>

		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
