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
					<li><a href="#proscons">Pros and Cons</a></li>
					<li><a href="#bottomline">The Bottom Line</a></li>
				</ul>
			</div>
	</aside> -->
		<article class="content">
			<h1>What is a Jumping Juvenile Life Insurance Policy?</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
           
            <p>A jumping juvenile policy is a life insurance policy issued to a child. When the child reaches the prescribed age, usually 21, the face value on the policy automatically increases, without either a medical exam or an increase in premiums.</p>
            <blockquote class="blue">
            <ul>
                <li><strong>A jumping juvenile policy is a type of whole life policy you can buy for a child</strong></li>
                <li><strong>Because there are so many alternatives to a jumping juvenile policy that make more sense financially, we don't usually recommend them.</strong></li>
            </ul>
            </blockquote>
            <p>Jumping juvenile policies usually:</p>
            <ul>
            <li>Have to be a whole life policy</li>
            <li>Can be purchased up until the child is 15</li>
            <li>Are sold in increments of $1,000</li>
            </ul>
            <p>A <a href="https://www.noexam.com/life-insurance/whole/">whole life policy</a> is one that builds cash value. For more information, see our article where we explain <a href="https://www.noexam.com/life-insurance/term-vs-whole/">whole life vs. term life insurance</a> and the benefits of each.</p>
            <p>Jumping juvenile policies are often used to:</p>
            <ul>
            <li>Help fund college education</li>
            <li>Provide insurance if the child eventually becomes uninsurable</li>
            <li>Provide access to money at age 21</li>
            </ul>
            <?=$this->render('/main/widgets/rates-banner.php');?>
            <h2 id="proscons">Pros and Cons of a jumping juvenile policy.</h2>
            <div class="col-sm-6 col-xs-12 float-right">
			<img src="https://www.noexam.com/img/juvenile.png" alt="child and father" class="img-fluid img-thumbnail" />
			</div>
            <p><strong>Pros:</strong> Note, while these are technically pros, there are usually more cost effective ways to save money and insure a child.</p>
            <ul>
            <li>Can help finance a college education</li>
            <li>Gets life insurance in force in case the child later becomes uninsurable</li>
            <li>They will have access to the cash value in the policy at 21</li>
            </ul>
            <p><strong>Cons:</strong></p>
            <ul>
            <li>Children have no income that needs to be replaced, which is one of the main reasons to get life insurance.</li>
            <li><strong>There&rsquo;s better ways to invest the money and save for college</strong></li>
            <li>Cost-per-benefit amount is high</li>
            </ul>
            <p><strong>Can finance a college education: </strong>Jumping juvenile policies are often marketed as an easy way to save for a college education. However, it takes years to earn cash value. Yes, the face value of a jumping juvenile policy does increase at age 21, but that doesn&rsquo;t mean you have access to an equal amount of cash. <a href="https://nces.ed.gov/fastfacts/display.asp?id=76">College costs are extremely high</a>, and unless you buy a very large policy, you wouldn&rsquo;t have enough to cover the cost of college. <a href="https://pocketsense.com/juvenile-life-insurance-regulations-8464696.html">Some states</a> limit the amount of life insurance you can purchase on a child. </p>
            <p><strong>Provides some life insurance if the child later becomes uninsurable: </strong>Another argument for purchasing a jumping juvenile policy is that the child will have some life insurance if they later develop some terrible diseases like Type 1diabetes. There is a chance, but it&rsquo;s a very small chance. Approximately .025 percent of children under 20 develop Type 1 diabetes, according to the American Diabetes Association <a href="https://www.diabetes.org/resources/statistics/statistics-about-diabetes">(ADA</a>).</p>
            <p>There is a genetic component to some diseases, increasing a child&rsquo;s risk of developing the disorder, but very few appear before 21 that would cause one to be uninsurable.</p>
            <p><strong>They will have access to the cash value at 21: </strong>They will have access to some cash as provided by the policy, even if they don&rsquo;t go to college. This is a good argument for a life insurance policy, as opposed to a 529 plan, which saves specifically for college.</p>
            <p><strong>Premiums are very low: </strong>Jumping juvenile policies are very low. For example, a plan might offer$50,000 worth of insurance for $33.65 a month. The face value of the policy doubles to $100,000 when the child turns 18.</p>
            <p>Now, let&rsquo;s look at the cons of jumping juvenile life insurance.</p>
            <p><strong>Children have no income that needs to be replaced: </strong>The main purpose of life insurance is to replace the income and cover final expenses if a person dies so that their dependents do not have to worry about finances. Children don&rsquo;t have any income and by the time they are ready to get their first job, they don&rsquo;t qualify for a juvenile policy (companies usually stop offering such policies to kids when they turn 15).</p>
            <p>The reason some states are starting to limit the amount of insurance you can purchase on a child is to avoid the unsettling notion that a child is worth more dead than alive. Children have even <a href="https://www.nytimes.com/2020/02/05/us/karl-karlsen-wife-insurance.html">been killed for the insurance money.</a></p>
            <p><strong>There are better ways to save money for expenses: </strong>Whole life insurance policies do earn cash value, but is <a href="https://blog.wealthfront.com/whole-vs-term-life-insurance-investment/">typically at a rate of between 2% and 6%</a>, depending on the company. There are fees associated with the policy as well, which eat into the profit.</p>
            <p><strong>Cost per benefit amount is high: </strong>The rate of return is low and the fees are high. Also, kids&rsquo; life insurance is typically sold up to $50,000, which is a very small amount of coverage for an adult. Even on a child, whole life insurance is up to ten times more expensive than term life.</p>
            <p><strong>Alternatives to a jumping juvenile policy</strong></p>
            <p>Wanting to save money for a college education or even to provide your child with a nest egg for future expenses are worthwhile goals. What can you do instead of a jumping juvenile policy?</p>
            <p><strong>Get more insurance for yourself</strong></p>
            <p>It probably makes more sense to add to a parent&rsquo;s life insurance policy than it does to get a life insurance policy for a child. That way, if the parent dies, the child has access to the death benefit. If the parent outlives the policy, the children are hopefully on their own and no longer dependent.</p>
            <p><strong>Get a small term life insurance policy</strong></p>
            <p>If you are really concerned about your child dying and not having enough to cover funeral costs, get a small term life insurance policy for fifteen years or so. That would cover the costs of a burial should a child die and it will be affordable.</p>
            <p><strong>Get a child rider on your policy</strong></p>
            <p>Another very affordable alternative is to get a child <a href="https://www.noexam.com/life-insurance/riders/">rider</a> on your own life insurance policy. A child rider pays out a small death benefit if the unthinkable happens and your child dies. It should be enough to cover funeral expenses.</p>
            <p><strong>529 plan</strong></p>
            <p>To save for college, consider a <a href="https://www.sec.gov/reportspubs/investor-publications/investorpubsintro529htm.html">529 plan</a>. These are tax-deferred accounts that accumulate money and, if the funds are used for college, they are not taxed when used for qualifying higher education costs. They usually come in one of two types:</p>
            <ul>
            <li>College savings plans. These work much like a Roth or an IRA account. They offer a number of investments you can choose from and the amount they earn depends on what the market earns.</li>
            <li>Prepaid tuition. These let you pre-pay some or all of the costs of tuition at an in-state school. They can sometimes be converted for use at a private college or an out-of-state school if your child has their heart set on somewhere out-of-state.</li>
            </ul>
            <h2>Bottom Line</h2>
            <p>Unless your child is supporting your family, you don&rsquo;t need a jumping juvenile life insurance policy. Life insurance is meant to replace lost income, and there are other ways of saving and investing money which may be more profitable.</p>


		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://www.noexam.com/life-insurance/jumping-juvenile/"
  },
  "headline": "What is a Jumping Juvenile Life Insurance Policy?",
  "description": "See how this type of children's life insurance works and if it is right for your child.",
  "image": "https://www.noexam.com/img/juvenile.png",  
  "author": {
    "@type": "Person",
    "name": "Jonathan Fritz"
  },  
  "publisher": {
    "@type": "Organization",
    "name": "NoExam.com",
    "logo": {
      "@type": "ImageObject",
      "url": "https://www.noexam.com/img/no-exam-logo.svg"
    }
  },
  "datePublished": "2020-06-04",
  "dateModified": "2020-09-17"
}
</script>
