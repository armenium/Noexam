<?php

use app\assets\AppAsset;
use app\components\BreadcrumbsNew;
use app\widgets\Author;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$this->registerCssFile('@web/v2/common/css/get-started.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/pages/css/article.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerMetaTag(['name' => 'description', 'content' => 'See if selling life insurance is a possible career for you. Learn how much agents can make in this detailed guide to getting started.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->title = 'How Much Money Can You Make Selling Life Insurance?';
$this->params['breadcrumbs'][] = ['label' => 'Careers', 'url' => Url::toRoute('careers/'), 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];

?>
<article class="main-wrapp">
	<div class="wrapp mb-4">
		<?=BreadcrumbsNew::widget(['links' => $this->params['breadcrumbs']]);?>
	</div>

	<section>
		<h1 class="heading-0">Selling Life Insurance as an Agent</h1>
		<?=Author::widget(['db_time' => '2021-12-03', 'file_time' => filemtime(__FILE__)]);?>
		<p>It’s no surprise that selling life insurance is such a popular profession. With over 1 million insurance agents, brokers, and service employees in the united states in 2020, it remains one of the largest industries. One of the benefits of selling life insurance are the flexible hours. You can do it on the side at first and earn a great living if you are willing to put in the work.</p>
		<h2>Who is it for?</h2>
		<p>Are you a people person? If so, then you should not have any problem selling insurance products. It involves making phone calls, setting appointments, following up, and getting told NO. If this doesn’t sound like nails on a chalkboard to you, then chances are you have the right personality for selling life insurance.</p>
		<h2>How much money can you make?</h2>
		<p>Like any profession, it takes time to gain experience and build up your income. With that said, the top <a href="https://www.noexam.com/life-insurance/using-an-agent/">life insurance agents</a> earn over $100,000 per year. Many make a lot more than that! You can expect to earn $2,000-5,000 per month starting out. This will depend on the products you sell, the commissions, and how hard you are willing to work. Many agents these days opt to sell products from the <a href="https://www.noexam.com/life-insurance/companies/">best life insurance companies</a>. See this page to learn about <a href="https://www.noexam.com/life-insurance/companies/no-exam/">no exam life insurance</a>.</p>
		<h2>Can I do it on the side?</h2>
		<p>Yes. Many agents get started in insurance as a “side hustle”. They often spend time in the evenings networking to make sales. Once you get a license and contract, begin reaching out. Friends, close relatives, and members of their community are a great way to get sales. Soon you will see the opportunity for what it is and may choose to commit to selling insurance full time.</p>
		<h2>How much does it cost to get started?</h2>
		<p>The first step to getting started will be to take the pre-licensing course required by your state. I recommend ExamFX, and their self-study course is $149.95 in the state of Georgia. You will have 60 days to complete the course and pass the simulated exam. Once completed, you will receive your certificate. To take the state exam, you will need the certificate.</p>
		<p>The state exam in Georgia is $63. You will need to schedule your exam at a certified testing facility. Look to your state department of insurance’s website for instructions on submitting your license application. There is usually a fee for the application.</p>
		<p>All in all, you can expect to spend $300-400 on getting licensed. You will also need an Errors and Omissions (E&amp;O) insurance policy. This covers you against claims made by clients for inadequate work or negligent actions on your part. The average cost of this is roughly $63 per month.</p>
		<h2>How the Industry Works and Getting Contracts</h2>
		<p>The insurance industry is insurance agents offering products on behalf of insurance companies. Agents get paid a commission by the insurance company to sell their products. Some agents work as brokers, others work in a group setting or are captive (loyal to one insurance company).</p>
		<p>To sell insurance of any kind there are generally two requirements. As mentioned above, you must first get your insurance license in your state. You will also need a contract with the insurance company to offer their products to the public. Some insurance companies offer contracts directly and you can find a place online to get one. Others require that you visit a Managing General Agency who has permission to disburse contracts on behalf of the insurance company.</p>
		<p>Depending on how you plan on building your business you will want to consider which products to sell. It’s important to remember different products pay differently. For example, home and auto pay a nominal commission that is recurring or residual . Other products, such as life insurance, may pay a one time or first year commission.</p>
		<h2>Getting Sales</h2>
		<p>So you are licensed and contracted with a few products to sell, now what? If you are new to sales, I recommend reading a few books to start. Rather than list them here, Sales Hacker has put together an amazing <a href="https://www.saleshacker.com/best-sales-books-complete-list/">list of sales books here</a>. Generally a life insurance sales call involves determining the clients coverage needs, providing <a href="https://www.noexam.com/life-insurance/term/rates/">sample life insurance rates</a>, and taking the application.</p>
		<p>You will also need some prospects to call on. This is where things get hard, and where most agents hit a road block in their career. Getting leads is the biggest challenge new life insurance agents face. Here are a few methods listed in order of difficulty.</p>
		<p><strong>Friends and Family</strong> &#8211; Everyone has a network. Start by reaching out and letting them know about your services. This is a great way to get some initial sales.<br />
			<strong>Work someone else&#8217;s leads</strong> &#8211; Some agencies buy leads in bulk and will allow you to call on their leads for a split of the commission.<br />
			<strong>Buy Leads</strong> &#8211; This can be challenging as a newcomer. Most lead sellers are reselling the leads 5-10 times. Right away you will be competing with several other agents to close the sale. The price of each lead can be hard for new agents to afford.<br />
			<strong>Cold Call</strong> &#8211; Smile and dial. This is a very hard way to generate sales. It is best done with a targeted list of prospects who will be receptive to your offer.<br />
			<strong>Generate Your Own Leads</strong> &#8211; This can be done by having your own website that shows up on search engines when people are searching for life insurance related information. This is a deep topic that requires much learning. With enough motivation, you can use tools available to set up your own website and begin marketing yourself to generate leads.</p>
		<h2>Sales Tools</h2>
		<p>As you start reaching out to prospects, you will surely need a CRM to help manage who you are communicating with. As a new agent, I recommend using something free like <a href="https://www.hubspot.com/products/crm">Hubspot CRM</a>. It has a ton of great features, and best of all, it&#8217;s free. It will be your place to track all communications, set follow ups, send emails, log calls, and everything else you need to be successful as an agent.</p>
		<h2>Conclusion</h2>
		<p>While the above seems like a lot of information, the process is simple.</p>
		<ul>
			<li>Step 1: Take the pre-license course.</li>
			<li>Step 2: Take the state exam.</li>
			<li>Step 3: Get a contract with an insurance company.</li>
			<li>Step 4: Begin contacting prospects</li>
		</ul>
		<p>Like all good things in life, it will take hard work to achieve results. If you have the bold personality that insurance sales demands, you are sure to enjoy this rewarding profession for many years.</p>
	</section>

	<section>
		<h1>Job Openings <span class="badge badge-success">0</span></h1>
		<ul class="jobs-list">
			<li class="item">
				<div class="clearfix collapsed" role="button" data-toggle="collapse" href="#job_1" aria-expanded="false">
					<div class="title">Life Insurance Sales Agent</div>
					<div class="company">
						<div class="name">NoExam HQ</div>
						<div class="location">Atlanta, GA</div>
					</div>
				</div>
				<div class="collapse" id="job_1" aria-expanded="false" style="height: 0px;">
					<div class="desc">
						We are looking for an independent life insurance agent to assist our company in offering the highest quality service in the industry. Our business is different from most other life insurance agencies in that our customers are coming to our website looking to buy life insurance. There is no cold calling as you will be handling only leads from our website or inbound phone calls. There are no lead costs to you. Please send resume to support@noexam.com
					</div>
				</div>
			</li>
		</ul>
	</section>

</article>

<section class="main-wrapp">
	<div class="wrapp">
		<div class="content">
			<div class="title">Work Remotely</div>
			<div class="desc">Send your resume to support@noexam.com to apply. Please include what states you are licensed in. Make the right career choice in 2019!</div>
		</div>
		<div class="hidden-xs bg-image"></div>
	</div>
</section>


<?=$this->render('sections/home/get-started.php');?>
