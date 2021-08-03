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
		<article class="content">
			<h1>Life Insurance For Divorce</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<p>Regardless of whether you are happy or sad about divorcing your spouse, settling your affairs legally can stir up a roller coaster of emotions. The good news is securing the required life insurance policy is simple if you know where to turn.</p>
			<p>I’d like to share with you 5 tips you should consider when shopping for the life insurance coverage your attorney has asked you to provide. You may be feeling overwhelmed with and unsure of how to take care of this properly. As a practicing life insurance agent, I’ve helped many clients satisfy their life insurance for divorce requirements in a simple and stress-free fashion. More often than not, a <a href="https://www.noexam.com/life-insurance/companies/no-exam/">no exam term life insurance</a> policy can be in place in under 72 hours. See our page on the <a href="https://www.noexam.com/life-insurance/companies/">best life insurance companies for 2019</a>.<span id="more-713"></span></p>
			<h2>5 Important Considerations When Buying Life Insurance for a Divorce Settlement</h2>
			<p><img src="../../img/life-insurance-divorce-1.png" alt="life-insurance-divorce" width="800" height="3162"/></p>
			<p>&nbsp;</p>
			<h3>Share this Image On Your Site</h3>
			<p><textarea style="width: 540px; height: 100px;">&lt;strong&gt;Originally posted at &lt;a href=&#8221;https://www.noexam.com&#8221;&gt;NoExam.com&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;<br/>
&lt;p&gt;&lt;a href=&#8221;https://www.noexam.com/life-insurance-divorce-infographic/&#8221;&gt;&lt;img src=&#8221;https://lfgok25vr8k38ia9z17sg8ga-wpengine.netdna-ssl.com/wp-content/uploads/2017/01/life-insurance-divorce-1.png&#8221; alt=&#8221;Life&#8221; width=&#8221;600px&#8221; border=&#8221;0&#8243; /&gt;&lt;/a&gt;</textarea></p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
