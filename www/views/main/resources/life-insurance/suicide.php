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
					<li><a href="#clause">The Suicide Clause</a></li>
					<li><a href="#contestability">The Contestability Period</a></li>
                    <li><a href="#health">Your Health History</a></li>
				</ul>
			</div>
	</aside> -->
		<article class="content">
			<h1>Does Life Insurance Cover Suicide?</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
            
            <strong>First things first!</strong>
            <p>If you&rsquo;re reading this article, there&rsquo;s a chance you landed here because you or someone you know may be experiencing thoughts of suicide.</p>
            <p>Most articles on suicide list resources at the end, but your health and well-being come first, and that&rsquo;s why we think it&rsquo;s more important to give you the information you or a loved one needs upfront.</p>
            <p>So, if you or someone you know is thinking about suicide, reach out for help to these organizations now.&nbsp;</p>
            <blockquote class="green">
            <p><a href="https://suicidepreventionlifeline.org/">The National Suicide Prevention Lifeline</a>&nbsp;offers 24/7 free, confidential support.</p>
            <p>Call 1-800-273-TALK (8255) or visit the website to chat online.</p>
            <p>The<a href="https://www.veteranscrisisline.net/">&nbsp;Veterans Crisis Line</a>&nbsp;provides confidential support for veterans and their families.</p>
            <p>Call 1-800-273-8255 and press 1. You can also text to 838255 or start an online chat.</p>
            <p><a href="https://www.crisistextline.org/">The Crisis Text Line</a>&nbsp;offers free 24/7 support for people in crisis.</p>
            <p>Text HOME to 741741.</p>
            </blockquote>
            <p>Suicide is a serious problem in the United States</p>
            <p>In fact, it is the 10th leading cause of death in the country.&nbsp;</p>
            <p>In 2018, more than <a href="https://afsp.org/about-suicide/suicide-statistics/">48,000 Americans committed suicide</a>, and there was an astonishing 1.4 million who attempted suicide.</p>
            <p>Also, men are 3-4 times more likely to die by suicide than women.</p>
            <p>So, questions about whether or not life insurance covers suicide are more common than you may think.</p>
            <blockquote class="blue">The basic answer to the question, &ldquo;does life insurance cover suicide?&rdquo; is yes, but only after the policy has been in force for two years.</blockquote>

            <h2 id="clause">The Suicide Clause</h2>
            <p>It sounds a bit ominous, but a suicide clause in a life insurance policy simply outlines situations when a death benefit won&rsquo;t be paid if suicide is involved. Insurers often add this clause as a way to deter people from only buying a policy because they want to commit suicide immediately and leave the death benefit to their loved ones.</p>
            <p><strong>Generally, a suicide clause states that suicide will not be covered for a specific term when the policy first goes into effect. In most cases, this period is two years (sometimes it&rsquo;s only one year).&nbsp;</strong></p>
            <p>When the suicide clause is in effect, the insurer can refuse to pay a benefit for any self-inflicted death.</p>
            <p>One of the gray areas of a suicide clause is determining whether a death was <a href="https://www.noexam.com/life-insurance/accidental-death/">accidental</a> or deliberate. For example, if someone dies from a drug overdose, was it intended or not? In these types of cases, the burden is on the insurer to prove the death was a suicide.</p>
            <p>Unless the suicide clause states otherwise or there are other exclusions or provisions, a life insurance policy will pay for death by suicide at the end of the clause period.</p>
            <p>Another gray area has to do with doctor-assisted suicides. In cases where people diagnosed with terminal illnesses choose to end their own lives, they also fall under the provisions of the suicide clause.</p>

            <h2 id="contestability">What is the contestability period?</h2>
            <p>In addition to a suicide clause, there is also a provision known as the <a href="https://www.noexam.com/life-insurance/contestability/">contestability period</a>. This is a two-year period when a life insurance policy first goes into effect.&nbsp;</p>
            <p>During the contestability period, an insurer can contest the death benefit payout. They can investigate a death a decide if a claim is legitimate or not under the terms of the policy. The main reason for this is to prevent fraud because sometimes people lie on their application.</p>
            <p>As part of the underwriting process, you are required to truthfully complete an application related to your health. That helps an insurer set the right premium based on your risk profile. If you&rsquo;re sick or have a chronic condition, you&rsquo;ll be charged more because the likelihood of you dying is greater.&nbsp;</p>
            <p><strong>An insurer can't simply refuse to pay a death benefit. They must investigate and find evidence of fraud, which they can do through an autopsy or using other means.</strong></p>
            <p>Once the contestability period ends, an insurer can&rsquo;t avoid paying a death benefit because they have uncovered fraud, except in rare cases such as when a person lies about their age.&nbsp;</p>
            <p>It&rsquo;s important to note that the suicide clause and the contestability period are different, even though they typically cover the same timeframe. The suicide clause specifically deals with self-harm while the contestability period is related to fraud.</p>

            <h2 id="health">Looking at your health history</h2>
            <p>As part of the underwriting process, you&rsquo;ll be asked about your health history so that the insurer can determine what your risk profile is. This includes your physical health and your mental health as well.&nbsp;</p>
            <p>You need to be truthful during this process, or your death benefit could be denied during the contestability period.&nbsp;</p>
            <p>You will be asked if you've suffered from depression, and if so, how long ago, how severe it was, and what kind of treatment you received for it.</p>
            <p><strong>If you have attempted suicide, you must disclose this as well. If you have attempted suicide more than one time or have attempted suicide within the past five years, an insurer will often decline the appilcation or add an extra amount to your premium.</strong></p>
            <p>There are several other risk factors that an insurer will want to know, including:</p>
            <ul>
            <li>Do you have any mental illness or a personality disorder?</li>
            <li>Do you have pre-existing physical illnesses that cause chronic or persistent pain?</li>
            <li>Have you ever suffered from drug or alcohol abuse</li>
            <li>What is the nature of your access to guns and drugs, or other means to take your own life?</li>
            <li>What is your family history for suicide or depression?</li>
            </ul>
            <p>Some states also allow for a death benefit to be paid if a person was diagnosed as insane at the time of their suicide. However, to protect their interests, many insurers have added an insanity provision to their suicide clauses that also generally lasts for two years from the date the policy was issued.</p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
