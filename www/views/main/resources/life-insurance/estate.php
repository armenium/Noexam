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
					<li><a href="#ownership">Incidents of Ownership</a></li>
					<li><a href="#threeyear">Three Year Rule</a></li>
                    <li><a href="#grossestate">The Gross Estate</a></li>
                    <li><a href="#community">Community Property States</a></li>
				</ul>
			</div>
	</aside> -->
		<article class="content">
			<h1>Is Life Insurance Part of an Estate?</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
            
            <p>Life insurance can be an inexpensive way to replace lost income, provide cash to repay debts and pay for funeral expenses when a person passes away. By naming a beneficiary of the life insurance policy, the value of the life insurance policy passes to another person, entity or company when the policyowner passes away. There are many ways to use life insurance as a tool in a financial plan.</p>
            <blockquote class="green">If the beneficiary is alive and over the age of 18, the life insurance payout goes directly to the beneficiary and does not go through probate. The <a href="https://www.noexam.com/life-insurance/payouts-and-taxes/">payout is not subject to income tax</a>, but the amount may be considered to be part of the taxable estate if the beneficiary is <a href="https://www.marketwatch.com/story/how-to-collect-life-insurance-proceeds-without-paying-any-federal-estate-tax-2017-07-19">someone other than your surviving spouse</a>.
            </blockquote>
            <h2>What Happens When the Insured Dies?</h2>
            <p>When a person passes away, life insurance on the deceased person&rsquo;s life or policies where the deceased had incidents of ownership (see below) are included in the gross estate.</p>
            <p><strong>The gross estate is the total value of all assets the person owned at the time of death. </strong></p>
            <p>Some additional considerations:</p>
            <ul>
            <li>Any policy that names the executor or estate as the beneficiary will be included in the gross estate.</li>
            <li>If the deceased owned a life insurance on the life of another person, that policy amount would <strong>not</strong> be included in the gross estate.</li>
            </ul>
            <p>After determining all of the assets owned by the deceased, a formula exists to determine which assets are taxable and how much tax is owed. <strong>Typically, life insurance is not taxed but is included in the gross estate because it is an asset.</strong></p>
            <h2 id="ownership">What Causes Incidents of Ownership?</h2>
            <p>A person has incidents of ownership if able to make certain changes to a policy while still alive.</p>
            <p>The following create incidents of ownership according to <a href="https://www.irs.gov/pub/irs-wd/0947006.pdf">Internal Revenue Code, section 2042</a>:</p>
            <ul>
            <li><strong>The right to name or change the beneficiary </strong></li>
            </ul>
            <p>A beneficiary is the person or entity named on the life insurance policy who receives the money at the time of death.</p>
            <ul>
            <li><strong>The right to surrender the policy for <a href="https://www.noexam.com/life-insurance/whole/cash-value/">cash value</a></strong></li>
            </ul>
            <p>This applies to whole life, universal life and variable life policies. <a href="https://www.noexam.com/life-insurance/term/">Term life insurance</a> policies do not have any cash value so they are not subject to this rule.</p>
            <ul>
            <li><strong>The right to borrow against the policy cash value</strong>
            <ul>
            <li>Cash value policies (<a href="https://www.noexam.com/life-insurance/whole/">whole life</a>, universal life and variable life) give the insured the option to borrow money from the cash portion and pay it back (similar to a 401k loan.) If a person has this right, they are considered by estate purposes to own the policy.</li>
            </ul>
            </li>
            <li><strong>The right to <a href="https://www.noexam.com/life-insurance/collateral-assignment/">pledge the policy as collateral for a loan</a></strong></li>
            <li><strong>The right to assign the policy </strong>
            <ul>
            <li>Did the person have the right to give the policy to a person, entity, or company? Assignment also applies when someone transfers the policy in a trust or sells to a viatical settlement company. If this is the case, the person has incidents of ownership.</li>
            </ul>
            </li>
            <li><strong>The right to revoke any assignment of the policy </strong>
            <ul>
            <li>Policies that allow it to be assigned to someone else may also have a provision to revoke that assignment. If the owner has the right to cancel the assignment and take possession of the policy again, the deceased has incidents of ownership. Policies typically can only be revoked under specific circumstances which have to be outlined in the provision.</li>
            </ul>
            </li>
            </ul>
            <h2 id="threeyear">How Does the Three-Year Rule Apply?</h2>
            <p>After determining incidents of ownership, the person settling the estate sees if any of the policies have been transferred to another person or entity in the past three years. If the person who died signed over a life insurance policy within three years of death, it would be included in the gross estate. If it had been longer than three years, it would not be subject to the three-year rule and so not be included in the gross estate.</p>
            <p><strong>Transferred within 3 years of death = Policy is included in the gross estate</strong></p>
            <p><strong> Transferred more than 3 years before death = Policy is not included in the gross estate</strong></p>
            <p>The idea behind the three-year rule is to disincentivize people from giving away their assets when death is imminent to avoid paying estate taxes.</p>
            <p><strong>How much is included in the gross estate?</strong></p>
            <p>The amount included the gross estate usually is the same as the amount the beneficiary will receive.</p>
            <ul>
            <li>Policies that have cash value &ndash; <strong>whole life, universal life and variable life</strong> - the beneficiary would receive the death benefit plus any cash value that has accumulated in the policy minus any loans taken out by the insured while alive.</li>
            <li>With<strong> term</strong> policies, the death benefit is the face amount paid upon the death of the insured. The value from <strong>group life insurance, </strong>typically term policies provided by employers for their employees, are also included in the deceased&rsquo;s gross estate.</li>
            <li>For community property states, discussed below, the amount included might be less.</li>
            </ul>
            <h2 id="community">What About Community Property States?</h2>
            <p>Ten states are community property or quasi-community property states and treat life insurance differently from separate property states. In separate property states, each person&rsquo;s assets are added to the gross estate upon death. Generally, in community property states, <a href="https://www.law.cornell.edu/cfr/text/26/20.2042-1">one half of the life insurance is added to the gross estate</a>. The other half is owned by the decedent&rsquo;s spouse.</p>
            <p>The following states are community property or quasi-community property states.</p>
            <p><strong>Alaska, Arizona, California, Idaho, Louisiana, Nevada, </strong></p>
            <p><strong>New Mexico, Texas, Washington and Wisconsin</strong></p>
            <p>But even among this group of state, different rules apply when it comes to how life insurance is added to a gross estate. It does not impact how much the beneficiary receives. The beneficiary receives the death benefit and any cash value accumulated, if applicable.&nbsp;</p>
            <p><strong>California and Washington follow the appointment rule. </strong></p>
            <ul>
            <li>The amount of community property money spent on the life insurance premium is added to the gross estate, not the face value of the policy.</li>
            </ul>
            <p><strong>Texas, Louisiana, and New Mexico follow a rule called the inception of title.</strong></p>
            <ul>
            <li>The purchaser continues to own the life insurance property and it is counted as separate property so the entire value of the policy is added to the gross estate.</li>
            <li>The spouse receives a refund of premium.</li>
            </ul>
            <p><strong>Alaska, Arizona, Idaho, Nevada &amp; Wisconsin</strong></p>
            <p>The remaining community or quasi-community property states divide the amount in half and the half owned by the person who died is included the gross estate.</p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
