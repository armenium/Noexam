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
					<li><a href="#accelerated">What is an accelerated death benefit?</a></li>
					<li><a href="#works">How does a long-term care rider work?</a></li>
                    <li><a href="#types">Are there different types of long-term care riders?</a></li>
                    <li><a href="#alternatives">What are the alternatives?</a></li>
				</ul>
			</div>
	</aside> -->
		<article class="content">
			<h1>What is a Long-Term Care Rider?</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
            <p>A long-term care rider is an attachment to a life insurance policy that <strong>allows you to access part of the death benefit while you're still alive and in need of long-term care</strong>. It is a form of an accelerated death benefit. You can use the money for a temporary or a permanent condition, as long as they are recommended by a healthcare practitioner.&nbsp;</p>

            <h2>Quick Facts</h2>
            <blockquote class="blue">
            <ul>
                <li>Long-term care riders are an add-on feature to life insurance policies.</li>
                <li>It allows you to access a portion of the <strong>death benefit</strong> money before you die.</li>
                <li>It is considered a good alternative if you can't qualify for a traditional long term care policy.</li>
            </ul>
            </blockquote>
            <p><strong>A long-term care rider is an attachment to a life insurance policy that allows you to access part of the death benefit while you're still alive and in need of long-term care.</strong> It is a form of accelerated death benefit. You can use the money for a temporary or a permanent condition, as long as they are diagnosed by a healthcare practitioner.</p>
            <p>As you might guess, long-term care is expensive. The <a href="https://longtermcare.acl.gov/costs-how-to-pay/costs-of-care.html">average cost of a semi-private room</a> in a nursing home is $6,844, or $7698 if you want a private room. Also, your chances of needing such care are pretty good: someone turning 65 today has <a href="https://longtermcare.acl.gov/the-basics/how-much-care-will-you-need.html">an almost 70% chance </a>of needing some kind of long-term care.</p>

            <h2 id="accelerated">What is an accelerated death benefit?</h2>
            <p>A long-term care rider is a type of accelerated death benefit. There are three kinds of riders that fall under accelerated death benefits:</p>
            <ul>
            <li>Critical illness riders</li>
            <li>Chronic illness riders</li>
            <li>Long-term care riders</li>
            </ul>
            <p>All of these are add-on features to a life insurance policy.&nbsp;</p>
            <p>What's the difference between a critical illness rider and a chronic illness rider? A <strong>chronic illness rider</strong> pays out when you have an illness that is not life-threatening but lasts the rest of your life. A <strong>critical illness rider</strong> pays out for such life-threatening conditions such as cancer or a heart attack. There is also a terminal illness rider, which pays out when you have less than 12 or 24 months to live (it varies by the insurance company).&nbsp;</p>

            <h2 id="works">How does a long-term care rider work?</h2>
            <p>If you have a policy with a long-term care rider, you can access the death benefit while you are still alive. First, a doctor must diagnose you with a <a href="https://medlineplus.gov/ency/patientinstructions/000602.htm">chronic illness</a>. Such illnesses include:</p>
            <ul>
            <li>Alzheimer's disease or dementia</li>
            <li>COPD</li>
            <li>Cancer</li>
            <li>Heart disease</li>
            <li>Multiple sclerosis</li>
            <li>HIV/Aids</li>
            </ul>
            <p>You must also show that you've had this condition for at least 90 days (called the elimination period). Also, you must have difficulties taking care of yourself. You must be unable to do at least two of six activities of daily living (<a href="https://en.wikipedia.org/wiki/Activities_of_daily_living">ADL's</a>) which are things like:</p>
            <ul>
            <li>Feeding yourself</li>
            <li>Toileting</li>
            <li>Bathing</li>
            <li>Dressing yourself</li>
            <li>Walking</li>
            </ul>
            <p>Long-term health care could be as simple as having a visiting nurse in to see someone a few times a week, or it could be a stay in a nursing home, depending on what issues there are and how long they are expected to last.</p>
            <p>The way long term care riders work is they pay you either a lump-sum payment or monthly payments, and the insurance company subtracts them from the death benefit. </p>
            <h3>The advantages are:</h3>
            <ul>
            <li>You don't have to buy a separate policy.</li>
            <li>You have some protection against long-term care if you need it.</li>
            <li>Premium amounts are locked in.</li>
            </ul>
            <h3>There are also some disadvantages:</h3>
            <ul>
            <li>You have to choose the rider when you buy the policy to get the best rate. You can add it later, but your premiums will go up.</li>
            <li>You reduce the death benefit left to your heirs.</li>
            <li>In some cases, the cost of long-term care may be more than the life insurance policy, meaning your heirs get nothing.</li>
            </ul>

            <h2 id="types">Are there different types of long-term care riders?</h2>
            <p>Most long term care riders are either:</p>
            <ul>
            <li>Reimbursement</li>
            <li>Indemnity</li>
            </ul>
            <p>Reimbursement pays you for incurred health care costs, up to a limit. An indemnity rider pays the maximum daily benefit. You could use the money for health care costs, and if there's money left over you can use it however you like. <strong>Indemnity riders are more expensive than reimbursement riders.</strong></p>
            
            <h2 id="alternatives">What are the alternatives to a long-term care rider?</h2>
            <p>If you don't have a long-term care rider attached to your life insurance, but you want to prepare for the possibility that you'll need long-term care, what can you do?</p>
            <p><strong>Long-term care insurance: </strong>These policies tend to be quite expensive. The younger you are when you apply, the lower your premiums will be. You'll have to pay for the policy for many years before it does you any good. It's not a given that you'll need long-term care. Also, long-term care doesn't automatically mean nursing home care. You can get a home health care aid for $20-$30 an hour for a few hours a week to help out.&nbsp;</p>
            <p><strong>Accelerated death benefit riders: </strong>These only pay out if you have an illness <strong>that you are not going to recover from</strong>, and have been given somewhere between 12 and 24 months to live. However, many permanent life insurance policies include an accelerated death benefit.</p>
            <p><strong>A hybrid policy: </strong>This combines the benefits of long-term care with life insurance. If you don't need long-term care benefits, you won't have lost any money. If you do need long-term care, the money available can be more than the death benefit, sometimes substantially more. You can either pay a lump sum payment or pay for this type of insurance monthly.&nbsp;</p>
            <p>Whichever type of coverage you choose, buy it when you are as young and as healthy as possible. This will keep your premiums as affordable as possible. You don't want to buy a permanent life insurance policy, only to have it <a href="https://www.noexam.com/life-insurance/lapses/">lapse due to non-payment of the premiums</a>.&nbsp;</p>
            
            <h2>Last thoughts</h2>
            <p>Health insurance costs are going up every year. Aging baby boomers are planning for their retirement, but also for the possibility that they will need long-term care. A smart financial strategy should plan for the worst-case scenario. If you're married, the odds that at least one of you will need long-term care. Plan for the worst, expect the best.&nbsp;</p>
            <h3>Other Riders to Consider</h3>
            <ul>
                <li><a href="https://www.noexam.com/life-insurance/guaranteed-insurability-rider/">Guaranteed Insurability Rider</a></li>
                <li><a href="https://www.noexam.com/life-insurance/waiver-of-premium/">Waiver of Premium Rider</a></li>
            </ul>

		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
