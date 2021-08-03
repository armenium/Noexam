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
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => '/life-insurance/companies/'];
$this->params['breadcrumbs'][] = $this->context->current_cat->title;

$this->registerCss(".boxcontent{ max-width:382px; float: right; margin:0 auto; width:100%; margin: 0 0 10px 10px; -webkit-box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);-moz-box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);}
@media only screen and (max-width:40.625em) {
.boxcontent{ margin:0 auto; width:100%; max-width: 100%; float: right; margin: 0 0 10px 10px; -webkit-box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);-moz-box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);box-shadow: 0px 0px 30px 0px rgba(235,235,235,1);}}
.boxcontentinner { width:90%; margin: 0 auto; overflow:hidden; padding:25px 0;}
.logocon{ text-align:center; margin:0 0 50px;}

.boxconinfull{ width:100%; clear:both; overflow:hidden; font-family: 'Open Sans', sans-serif; margin:0 0  30px;}
.boxconinfull h6{ font-size:14px; color:#4f8b9f; font-family: 'Open Sans', sans-serif; text-transform:uppercase; margin:0; padding:0;}
.boxconinfull h5{ font-size:26px; color:#3c3c3c; font-family: 'Open Sans', sans-serif; text-transform:uppercase; margin:0; padding:0;}
.boxconinfull p{ font-size:15px; color:#3c3c3c; margin:0; padding:0; font-family: 'Open Sans', sans-serif;}
.boxconinlt, .boxconinrt{ width:50%; float:left;}

.boxconinrt ul{ margin:10px 0 0 0; padding:0;}
.boxconinrt ul li{ display:block; float:left; list-style:none; margin:0 10px 0 0;}
.boxconinmid{ width:100%; clear:both; overflow:hidden; margin-bottom:25px;}
.boxcontentinner a {border: 1px solid #8ac58a;background: #99d199;height: auto;padding: 13px 00;text-align: center;font-size: 21px;color: #fff;font-weight: bold;text-transform: none;font-family: 'Open Sans', sans-serif;display: block;width: 100%;text-decoration: navajowhite;margin:0 auto 0;}
");
?>
<div class="page-content page-wrapper trans_all">


	<!-- START PAGE-CONTENT -->
	<section class="page">
		<aside>
			<div class="sticky-block">
				<h2>Jump to a section</h2>
				<ul>
					<li><a href="#ourtake">Our Take</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#ratings">Financial Ratings</a></li>
					<li><a href="#products">Products Offered</a></li>
					<li><a href="#proscons">Pros and Cons</a></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Colonial Penn Life Insurance Review</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<div class="boxcontent">
				<div class="boxcontentinner">
					<div class="logocon"><img src="../../../img/colonial-penn.png" width="150" height="150"/></div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>AM Best Rating</h6>
							<h5>A-</h5>
						</div>
						<div class="boxconinrt">
							<h6>Our Rating</h6>
							<ul>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/star.png" width="19" height="18"/></li>
								<li><img src="../../../img/grey-star.png" width="19" height="18"/></li>
							</ul>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinlt">
							<h6>Phone </h6>
							<p>1-877-877-8052</p>
						</div>
						<div class="boxconinrt">
							<h6> Founded </h6>
							<p>1968</p>
						</div>
					</div>
					<div class="boxconinfull">
						<div class="boxconinmid">
							<h6>Products sold</h6>
							<p>Term, Whole, Final Expense</p>
						</div>

					</div>
					<a href="https://www.noexam.com/apply-now/">Compare Quotes</a>
				</div>
			</div>

			<p>Age is the single biggest factor that determines your insurability. Fortunately, there are a few <a href="https://www.noexam.com/life-insurance/companies/">life insurance companies</a> that offer specialized policies for elderly people.</p>
			<p><strong>Colonial Penn</strong> is one such company, which is known for its guaranteed acceptance policies that do not require you to undergo medical exams.</p>
			<p>In this article, <strong>we take an in-depth look at Colonial Penn</strong>, its financial background, the products it offers, its strengths and weaknesses, and if it is indeed the right choice for you.</p>

			<h2 id="ourtake">Our Take</h2>
			<blockquote class="blue">Colonial Penn is a highly recognized name brand offering life insurance direct to consumers. They are a great choice of life insurance for seniors. <a href="https://www.noexam.com/life-insurance/companies/globe/">Globe Life insurance</a> is the closest comparable offering when considering a brand with as much recognition and a similar buying process. If you require a more in depth shopping experience and prefer to meet with an agent to discuss your needs, Colonial Penn's sister company <a href="https://www.noexam.com/life-insurance/companies/bankers/">Bankers Life </a>serves a nearly identical market.
			</blockquote>
			<?=$this->render('/main/widgets/apply-now-form.php', ['position' => 'center', 'width' => '100%']);?>
			<h2 id="about">About Colonial Penn</h2>
			<p>Colonial Penn was founded in 1968 and is based in Philadelphia. It is a fully-owned subsidiary of CNO Financial Group, an Indiana based financial services holding company.</p>
			<p>One of the first companies to offer guaranteed acceptance policies for older people, Colonial Penn accepts people who are generally seen as ‘high risk’ by most other companies.</p>
			<h2 id="ratings">Financial Ratings of Colonial Penn</h2>
			<ul>
				<li>A.M. Best: A– (Excellent)(<a href="#1">1</a>)</li>
				<li>Standard &amp; Poor’s: BBB+ (Adequate)</li>
				<li>Fitch: BBB+ (Satisfactory)</li>
				<li>Moody’s: Baa1 (High ability to repay short term debt)</li>
			</ul>
			<p>Colonial Penn is owned by CNO Financial Group, which is a Fortune 1000 company and has over $30 billion in assets and $4.3 billion in revenue(<a href="#2">2</a>). The group’s subsidiaries, including Colonial Penn and Globe Life, provide insurance policies to well over four million people in the country.</p>

			<h2 id="products">The Policies Offered by Colonial Penn</h2>
			<h3>Renewable Term Life Insurance</h3>
			<div class="company-box">
				<p>This is the only <a href="https://www.noexam.com/life-insurance/term/">term life</a> policy offered by Colonial Penn. This is an annual renewable policy, which means it is designed to provide coverage for a period of one year. Once it expires at the end of the year, it needs to be renewed again.
				</p>
				<h4>Age</h4>
				<p>The policy is available for everyone between the ages of 18 and 75 and can be renewed up to the age of 90.</p>
				<h4>No Medical Exams</h4>
				<p>The most important feature of the policy is that it <a href="https://www.noexam.com/life-insurance/companies/no-exam/">does not require you to undergo any sort of medical exam</a>. You only need to answer a few questions on your <a href="https://www.noexam.com/life-insurance/health-conditions/">health status</a>, based on which your insurability is determined by the underwriter.</p>
				<h4>Premium</h4>
				<p>At the start of your coverage period, your life insurance rate is determined based on two factors – age and gender. The premium increases every time you enter a new age band, which is usually every five years. You have the option of paying the premiums on a monthly basis or on a quarterly, semi-annual, or yearly basis.</p>
				<h4>Designate Up to Two Beneficiaries</h4>
				<p>The policy allows you to designate one or two beneficiaries. You can also determine the amount of death benefit each beneficiary should receive. It can be an even 50/50 divide, or you can allocate a larger portion of the death benefit to someone and a smaller portion to the other, depending on your preference.</p>
				<h4>Coverage</h4>
				<p>The death benefit could be anywhere from $10,000 to $50,000.</p>
			</div>
			<h3>Permanent Whole Life Insurance</h3>
			<div class="company-box">
				<p>If you are not exactly thrilled about the idea of renewing your term policy every year, you could opt for the <a href="https://www.noexam.com/life-insurance/whole/">permanent whole life policy</a> instead, which covers you for a lifetime. If you are on the fence on which <a href="https://www.noexam.com/life-insurance/types/">type of life insurance</a>, see this guide to <a href="https://www.noexam.com/life-insurance/term-vs-whole/">term vs whole life insurance</a>.</p>
				<h4>Age</h4>
				<p>You should be between the ages of 40 and 75 in order to be able to apply for a permanent life policy from Colonial Penn. Once you are insured, there is no need to extend or renew the policy, since it covers you until your death.</p>
				<h4>No Medical Exams</h4>
				<p>Just like its term policy, Colonial Penn’s whole life policy also does not involve any medical exams. You only need to fill out an application form, which contains questions about your health status. Based on your answers, your insurability is determined by the policy underwriter.</p>
				<h4>Premiums</h4>
				<p>Right at the start of your coverage period, your premium is determined by the insurer based on your age and gender. Once it is determined, it stays the same for the entire duration of the policy, until your death. In other words, the premium rate is locked in and does not change at any time for any reason. Premium payments can be made on a monthly, quarterly, semi-annual, and yearly basis.</p>
				<h4>Coverage</h4>
				<p>The death benefit offered by the policy could be anywhere from $10,000 to $50,000.</p>
				<h4>Designate Up to Two Beneficiaries</h4>
				<p>You can designate one or two beneficiaries, depending on your preference, and allocate a portion of the death benefit to both parties.</p>
				<h4>Cash Value</h4>
				<p>Since it is a permanent life policy, it has a cash value component, which starts building after the first year. It grows in value throughout the term length. The rate of growth is predetermined by the insurance company.</p>
				<p>Once it has sufficiently grown in value, you can borrow against it in case of an emergency, to meet your ongoing expenses, or for any other purpose.</p>
			</div>
			<h3>Guaranteed Acceptance Life Insurance</h3>
			<div class="company-box">
				<p>This type of insurance is primarily meant for elderly people who are looking for a policy to cover their <a href="https://www.noexam.com/life-insurance/burial-insurance/">funeral expenses</a>. Upon the policyholder’s death, the family receives a payout which is sufficient to cover the final expenses, thereby reducing their burden to a small extent.</p>
				<h4>Age</h4>
				<p>You should be between the ages of 50 and 85 in order to apply for the policy. Once the policy is in effect, you are covered until your death.</p>
				<h4>No Medical Exams</h4>
				<p>This is a defining feature of all the policies offered by Colonial Penn, as seen above. There are no medical exams and you do not have to worry about your health condition at all. Irrespective of your family history or your preexisting conditions, your acceptance is guaranteed under this policy.</p>
				<h4>Coverage and Premium</h4>
				<p>This is a unique policy, wherein there is no fixed coverage or premium. The coverage amount is divided into different units, which you can purchase for a fixed cost.</p>
				<p>Each unit of coverage costs $9.95. The maximum number of units you can buy is eight. The coverage amount offered per unit depends on a number of factors including your age, gender, and location.</p>
				<p>The minimum coverage amount offered per unit is approximately $400 and the maximum coverage amount offered per unit is approximately $2,100. The maximum amount of death benefit you could get by purchasing eight units of coverage is $16,664.</p>
				<p>For instance, if you are a 60-year old woman, you could get up to $1,600 of coverage per unit. If you need $10,000 for your final expenses, you could buy seven units, which should provide you with a death benefit of $11,200. You have to pay a monthly premium of $69.95 ($9.95 x 7).</p>
				<p>The premium, once determined at the start of the coverage period, remains unchanged for the entire duration of the policy.</p>
				<p>You can open the door for a monthly, quarterly, semi-annual, or yearly premium payment schedule. If you choose the yearly option, the company will waive one month’s premium off and you can get 12 months of coverage by paying only 11 months of premium.</p>
				<h4>Cash Value</h4>
				<p>The policy has a built-in cash value component, which accrues interest throughout the term. You can borrow against it for your needs, but you need to pay it back with 8% interest. If not, the insurance company will deduct the outstanding amount from the death benefit.</p>
				<h4>Waiting Period</h4>
				<p>The policy has a two-year waiting period, during which time the death benefit payout is restricted. If you pass away during this period, your family is not eligible to receive the entire death benefit amount.</p>
				<p>They will receive an amount equivalent to the total number of premiums you paid, along with 8% compounded annual interest.</p>
			</div>
			<h2 id="proscons">Pro&#8217;s and Con&#8217;s of Colonial Penn Life Insurance</h2>
			<p>Now, let us take a look at the pros and cons of choosing Colonial Penn as your life insurance company.</p>
			<h3>Pros</h3>
			<div class="company-box">
				<h4>No Medical Exams</h4>
				<p>This is the make-or-break factor for people who choose to buy their life insurance policies from Colonial Penn.</p>
				<p>It is no secret that if you are old, have a family history of heritable diseases, or have preexisting conditions, you are seen as a high risk consumer by most companies and you are likely to have a hard time qualifying for most policies. If you do qualify, you almost certainly have to pay through the roof to get a sufficient amount of coverage.</p>
				<p>With Colonial Penn, it is not an issue at all, since the company accepts even those who belong to the high risk category. Apart from answering a few questions, you do not have to do anything. There are no medical exams or tests and you are not likely to be rejected based on your age or health condition.</p>
				<p>This is a huge advantage for people who are considered ‘uninsurable’ and are in need of a policy to cover their needs during the twilight years of their life.</p>
				<h4>Cash Value</h4>
				<p>The permanent life policies of Colonial Penn have a cash value component built into them, which gives you the option of borrowing against it whenever you are in need of money.</p>
				<h4>Locked in Premium</h4>
				<p>The permanent life policies of Colonial Penn have the lock-in feature – once your policy’s premium is determined, it remains the same until your death. It makes your long-term financial planning process easier, since your insurance premium is always going to be the same.</p>
				<h4>Flexible Payment Options</h4>
				<p>You can choose to pay your premiums every month, every year, or on a quarterly or semi-annual basis. The company also waives off a month’s premium if you choose to pay on a yearly basis.</p>
				<h4>30-Day Return Policy</h4>
				<p>All of Colonial Penn’s policies come with a 30-day money back guarantee. If you change your mind suddenly after purchasing the policy and think that it is no longer the right choice for you, you can cancel it within 30 days and get your money back.</p>
			</div>

			<h3>Cons</h3>
			<div class="company-box">
				<h4>Low Coverage Amounts</h4>
				<p>Colonial Penn’s policies have a death benefit ranging from $10,000 to $50,000. If you only need a policy for your final expenses, it should be sufficient for you. If you need a policy to cover major financial commitments, it is certainly not sufficient for you.</p>
				<h4>Lack of Riders</h4>
				<p>Unlike most other insurance companies, Colonial Penn does not offer riders or additional benefits with their policies.</p>
				<h4>Consumer Complaints</h4>
				<p>Colonial Penn receives a larger number of complaints compared to some of its competitors. Its complaint ratio in 2017 was 2.49, which is much higher than the national average of 1.00.</p>
			</div>
			<h2>Is Colonial Penn the Right Choice for You?</h2>
			<p><strong>Colonial Penn is a good choice for elderly people who are typically in the high risk category.</strong> The policies do not require medical exams and the acceptance rate is very high. You can easily buy a policy whose death benefit payout is sufficient to take care of your final expenses and pay off a few outstanding bills, if there are any.</p>
			<p>If you are, on the other hand, looking for a policy to replace your income and secure the long-term financial needs of your dependents, Colonial Penn is certainly not the right choice for you.</p>
			<p>Moreover, if you are relatively young and healthy, there is no need for you to settle for a no-exam, no-questions-asked policy. Instead, you can undergo a medical exam or two, get classified as a low risk consumer, and get the <a href="https://www.noexam.com/life-insurance/term/rates/">best possible rates on term and whole life</a> policies.</p>
			<p>If you are still not sure if Colonial Penn is the right choice for you, or if you need any help in choosing the right type of policy for you, you can get in touch with the insurance experts at noexam.com. We can help you choose a policy that meets your needs and suits your budget perfectly.</p>
			<h2>About NoExam.com</h2>
			<p>NoExam.com is a place where you can find <a href="https://www.noexam.com/life-insurance/">everything you ever wanted to know about life insurance</a>. If you are looking to get insured, but not sure what kind of policy is right for you, we can help you.</p>
			<p>We provide you with a wide array of information on various insurance providers, the products they offer, and their strengths and weaknesses, so that you can compare the options that are available for you to make a prudent choice.</p>
			<h2>References</h2>
			<ol>
				<li id="1"><strong>AM Best Affirms CNO Credit Ratings</strong> - Available from: <a href="http://news.ambest.com/presscontent.aspx?altsrc=14&refnum=27534">http://news.ambest.com/presscontent.aspx?altsrc=14&refnum=27534</a></li>
				<li id="2"><strong>CNO Fact Sheet</strong> - Available from: <a href="http://cno.mediaroom.com/download/CNO_Fact_Sheet.pdf">http://cno.mediaroom.com/download/CNO_Fact_Sheet.pdf</a></li>
			</ol>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
