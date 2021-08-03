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
					<li><a href="#qualifies">What Qualifies for a 1035 Exchange?</a></li>
					<li><a href="#loan">What if there is an Outstanding Loan on the Original Contract?</a></li>
					<li><a href="#when">When is a 1035 Exchange appropriate?</a></li>
					<li><a href="#surrendering">Is Surrendering a Policy Better Than a 1035 Exchange?</a></li>
					<li><a href="#partial">Partial Exchanges</a></li>
				</ul>
			</div>
	</aside> -->
		<article class="content">
			<h1>What is a Section 1035 Exchange?</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
           
            <p>A Section 1035 exchange is an IRS provision that allows for a tax-free transfer of an existing annuity, endowment, long-term care product, or life insurance policy as long as specific criteria are met.</p>
            <blockquote class="blue">The primary purpose for entering into a 1035 exchange is to replace outdated contracts with new contracts that offer better benefits, lower fees, and other investment options.</blockquote>
            <p>For example, because the stock market is dynamic with rates and conditions continually changing, it's possible an annuity you entered into at one point is not performing as well as other investment options. <strong>Using a 1035 exchange, you can shop for a better interest rate, higher income guarantees, and better subaccount investment options.&nbsp;</strong></p>
            <p>You might also have concerns about the solvency of your current insurance provider or the level of service you receive from the agent who sold you the original policy.</p>
            <p>Another reason people enter into 1035 exchanges is that over time, there may be changes in the general population that result in improved health or mortality rates, producing the same or better coverage at a lower cost.</p>
            <h2 id="qualifies">What Qualifies for a 1035 Exchange?</h2>
            <p><strong>To qualify for the tax-free exchange, you must replace the old contract with a contract of like kind. For example, you can exchange:</strong></p>
            <ul>
            <li>Life insurance for life insurance</li>
            <li>Life insurance for a <a href="https://www.ameriprise.com/research-market-insights/financial-articles/investing/qualified-nonqualified-annuities/">non-qualified annuity</a></li>
            <li>Life insurance for endowment</li>
            <li>Endowment for non-qualified annuity</li>
            <li>Endowment for endowment (the maturity is not later than the original endowment)</li>
            <li>Non-qualified annuity for non-qualified annuity</li>
            </ul>
            <p>Multiple contracts can be exchanged for a single contract, but you can't exchange one contract for multiple contracts. Also, all exchanged contracts must keep the same owner and the same insured. If you add or remove insureds on a new contract, it will violate the provisions of the regulation.&nbsp;</p>
            <p>Also, the death benefit for the new contract can be less than the exchanged contract(s), as long as you meet all other requirements.</p>
            <blockquote class="green">You cannot cash out of a current contract and apply the proceeds to a new contract if you want to retain tax-free advantages. The 1035 exchange must take place directly between the two insurance companies for this benefit to remain in place.</blockquote>
            <p>Generally, insurance companies will not waive surrender charges in a 1035 exchange, but they are more likely to do so if the owner exchanges one product for another in the same company.</p>
            <p>Another consideration is that a new policy typically has a <a href="https://www.noexam.com/life-insurance/contestability/">contestability period</a> (two years in most cases). That means the insurer could challenge a death claim based on a misstatement on an application of the new policy.</p>
            <h2 id="loan">What if there is an Outstanding Loan on the Original Contract?</h2>
            <p>Aside from the fact that some insurers will not issue a new policy with an outstanding loan, there are several reasons why its advantageous to repay a life insurance policy loan before you enter into a 1035 exchange.</p>
            <p>When a loan is extinguished in a 1035 exchange, it is treated as a taxable distribution from the original policy. That negates some of the benefits of the exchange. Also, when the loan is extinguished, the surrender proceeds decrease by the loan amount.</p>
            <p>However, if you pay back the loan before the 1035 exchange, the new contract will <a href="https://www.noexam.com/life-insurance/whole/cash-value/">accumulate more cash value,</a> and this will increase the surrender proceeds.</p>
            <p>Your best strategy is to pay back the loan before you enter into a 1035 exchange. If that&rsquo;s not feasible, then consider reducing the original policy instead. If you decide to reduce the policy, make sure you do it in a reasonable time before you enter into an exchange, so you avoid a step transaction.</p>
            <p>The IRS defines <a href="https://www.irs.gov/pub/irs-wd/0826004.pdf">a step transaction</a> as, "a series of transactions designed and executed as parts of a unitary plan to achieve an intended result ... will be viewed as a whole regardless of whether the effect of so doing is the imposition of or relief from taxation."&nbsp;</p>
            <p>Also, be aware that if you do reduce the existing contract and you are denied a 1035 exchange, you may not be able to restore the old contract to coverage levels you had before the reduction.</p>
            <h2 id="when">When is a 1035 Exchange appropriate?</h2>
            <p>In consultation with an experienced and licensed agent, a policy owner should be able to justify a 1035 exchange based on economic or personal reasons that are strictly in their best interests.</p>
            <p>There are several factors to consider:</p>
            <ul>
            <li>Has the applicant&rsquo;s health changed since the old policy was issued? If so, the insured may have to pay a higher premium or be denied coverage under a new policy.</li>
            <li>The premium may be higher for new coverage because of issuance at a higher attained age.</li>
            <li>Are there surrender charges that may kick in if the existing policy is surrendered?</li>
            <li>What are the differences in policy provisions and guarantees?</li>
            <li>Are there any additional benefits offered by the new policy vs. the old policy?</li>
            <li>What are the changes, if any, of the contestable and suicide provisions of the new policy?</li>
            <li>Are there differences in the way interest is credited to the new policy?</li>
            </ul>
            <h2 id="surrendering">Are There Instances When Surrendering a Policy is Better?</h2>
            <p>At times, the answer is &ldquo;yes.&rdquo;</p>
            <p>If there are outstanding loans on the existing contract that represent a partial taxable gain, or if there is no gain on the existing contract, then a 1035 exchange would not offer you any advantages.</p>
            <p>You also need to consider that executing a 1035 exchange is a lot more time consuming and labor-intensive than simply surrendering a policy. The process can take months. In other words, depending on your situation and intentions, the effort may not be worth the reward.</p>
            <h2 id="partial">What About Partial Exchanges?</h2>
            <p>Full and partial 1035 exchanges are allowed. Be sure to check with the company you have a contract with since exact rules vary from insurer to insurer.</p>
            <p>In 2011, the IRS provided new guidance for partial exchanges in <a href="https://www.irs.gov/irb/2011-30_IRB#RP-2011-38">Revenue Procedure 2011-38</a>.&nbsp;</p>
            <p>With a partial exchange, the original contract cost basis is allocated proportionately between the old and the new contract. It is based on the percentage of the contract value left in the old contract and the percentage that is transferred to the new contract.</p>
            <p>If you transfer part of the value into a new contract and keep part of the proceeds or use those funds to retire a loan, those funds will be taxed as ordinary income.</p>

		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
