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
$this->params['breadcrumbs'][] = ['label' => 'Health Conditions', 'url' => '/life-insurance/health-conditions/'];
$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>
<div class="page-content page-wrapper trans_all">

	<!-- START PAGE-CONTENT -->
	<section class="page">
		<article class="content">
			<h1>Life Insurance With Anxiety</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<p><img style="float:right;" src="../../../img/anxiety-300x139.jpg" alt="anxiety" width="300" height="139"/></a>Life insurance companies screen for physical health conditions before giving an applicant the green light on a policy but that’s not the only thing they look for. Insurers also consider whether you have any mood disorders that might affect your mortality risk.</p>
			<p><strong>Anxiety</strong> is a common condition that can impact your ability to get approved for coverage. If you’ve been diagnosed with an anxiety disorder, you need to know what to expect when applying for life insurance.<br/>
			</p>
			<h2>How Life Insurance Companies View Anxiety</h2>
			<p>As a general rule, insurance companies view any type of physical or emotional condition that could potentially shorten your lifespan as a red flag. Even though anxiety doesn’t have a physical orientation the way diabetes or high blood pressure does, having this kind of disorder still puts you into the high risk category.</p>
			<p>The reason? Anxiety has been linked to an increased risk of suicide and accidental death. Researchers have also suggested that anxiety sufferers may be more likely to develop respiratory illnesses, heart disease and abuse drugs or alcohol. The insurance company’s job is to determine to what degree your anxiety affects your life expectancy.</p>
			<h2>What the Insurance Company Looks For</h2>
			<p>Just like with any other health condition, the insurance company’s number one concern is whether you’ve got your anxiety under control. As you go through the health exam, you can expect to answer the following questions:</p>
			<ul>
				<li>When were you first diagnosed with anxiety?</li>
				<li>What type of anxiety disorder were you diagnosed with? (e.g. social anxiety, general anxiety, obsessive compulsive disorder, PTSD, etc.)</li>
				<li>How frequently do you have anxiety-related episodes, such as panic attacks?</li>
				<li>Have you ever been hospitalized because of anxiety?</li>
				<li>Are you currently seeing a therapist to treat your anxiety?</li>
				<li>Have you ever attempted suicide?</li>
				<li>Have you ever missed work because of your anxiety?</li>
				<li>Do you have a history of drug or alcohol abuse?</li>
			</ul>
			<p>The insurer’s also going to take a close look at what kind of medications you’re taking, if any, to treat your anxiety. Depending on what type of anxiety you’ve been diagnosed with your doctor may prescribe a selective serotonin reuptake inhibitor (SSRI) such as Zoloft or Paxil; a benzodiazepine like <strong>Xanax</strong> or Ativan; or a beta blocker.</p>
			<p>In cases where you’ve been diagnosed with both anxiety and depression, your doctor may add an antidepressant to the mix. Some of the most common antidepressant medications used to treat anxiety are Anafranil, Tofranil and Norpramin.</p>
			<p>If you’re taking these or any other medications for anxiety, be prepared to tell the insurance company when you first started taking them, how often you take them and in what dose and what, if any, side effects you’ve experienced.</p>
			<p>Finally, the insurance company also considers the bigger picture in terms of your health. If you’re overweight, a smoker or you’ve been diagnosed with another medical condition, all of that’s going to carry some weight when it comes to the final <a href="https://www.noexam.com/life-insurance/approval-time/">approval decision</a>.</p>
			<h2>Anxiety and Premium Ratings</h2>
			<p>Every insurance company sets premiums differently for applicants who’ve been diagnosed with anxiety. How your condition will affect what you pay for life insurance ultimately depends on the factors outlined earlier and whether the insurance company views your anxiety as mild, moderate or severe.</p>
			<p>Someone with mild anxiety, for example, may be taking low doses of medication to treat their condition and they typically don’t require counseling or therapy. If you’ve never missed work or had to be hospitalized because of your anxiety, you’d most likely fall into this class. Assuming you’re in good health overall, you should be able to get a preferred or standard rate for insurance.</p>
			<p>If you have moderate anxiety, the premium rate you’ll pay hinges on how well you’re managing it. If you’re going to therapy regularly, taking your medications as directed and you’re able to reasonably maintain your work schedule it’s possible to qualify for the standard rate.</p>
			<p>Anxiety has the most potential to impact your premium rating when it’s severe. If you’re not able to work because of your condition or you’ve been hospitalized multiple times you represent a bigger gamble for the insurance company. That would mean paying substandard rates or potentially even getting turned down for coverage.</p>
			<h2>Compare Insurers Carefully</h2>
			<p>Every insurer takes a different approach to calculating risk when it comes to anxiety. <a href="https://www.noexam.com/apply-now/">Comparing rate quotes</a> from multiple companies can guide you towards the right one.</p>
			<p>If you’re having trouble getting approved because of your anxiety, you might also consider a <a href="https://www.noexam.com/life-insurance/companies/no-exam/">no exam life insurance</a> policy from one of these <a href="https://www.noexam.com/life-insurance/companies/">top rated life insurance companies</a>. The premiums for these kinds of policies tend to be slightly higher but you don’t have to go through a <a href="https://www.noexam.com/life-insurance/health-exam/">medical exam</a>. You will have to answer questions about your anxiety and your overall health but your condition may be less of a barrier to getting insurance coverage.</p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
