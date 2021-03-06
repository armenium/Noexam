<?php

use yii\widgets\Breadcrumbs;

//VarDumper::dump($this->context->current_cat, 10, 1);

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
$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>
<div class="page-content page-wrapper trans_all">


	<!-- START PAGE-CONTENT -->
	<section class="page">
		<!-- <aside>
			<div class="sticky-block">
				<h2>Jump to a section</h2>
				<ul>
					<li><a href="#I">I. A Layman’s Guide to Life Insurance</a></li>
					<li><a href="#II">II. Variations on Traditional Policies</a></li>
					<li><a href="#III">III. Things to Keep in Mind When Shopping</a></li>
					<li><a href="#IV">IV. The Do’s and Don’ts of Buying Life Insurance</a></li>
					<li><a href="#V">V. Answers to the Most Common Questions</a></li>
					<li><a href="#glossary">Glossary</a></li>
				</ul>
			</div>
		</aside> -->

		<article class="content">
			<h1 id="toc">Life Insurance</h1>
			<!-- <?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?> -->
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<p>The <a href="https://lifehappens.org/press-releases/2019-insurance-barometer-study-nearly-half-of-americans-more-likely-to-buy-simplified-underwritten-life-insurance/">2019 Insurance Barometer</a> published by LIMRA describes the current market as the best environment to purchase life insurance since the history of the study. However, most
				consumers are already worried enough about having money for retirement, let alone making room in their budget for life insurance. Still, considering their options to have financial protection in place for their families should they pass away, gives many people a sense of comfort.
				Though the study presents life insurance as one of the lesser-weighted priorities in the minds of Americans when it comes to financial planning, consumers who do seek out final expense options typically find an affordable and adequate policy after all. </p>
			<div class="container__banner--middle">
				<div class="banner1">
					<img class="" src="../../img/icon_01.svg" alt="Getting the best rate"/>
					<div class="banner__body">
						<h4>Get a Quote</h4>
						<p>No phone calls or emails. Quickly compare prices with our free comparison tool.</p>
					</div>
					<a href="https://www.noexam.com/life-insurance/term/rates/" class="banner__button">Get a Quote</a>
				</div>
			</div>
			<h2>Life Insurance</h2>
			<p>The following guide is designed to be an informative breakdown of life insurance, presenting a better understanding of the types of policies and coverage options available. Once you read this guide, you should feel confident in making decisions regarding coverage
				options, and policy choices in general, according to you and your family’s unique needs. As you read, look for <strong>TIPS</strong> (“<strong>T</strong>ricky <strong>I</strong>nsurance <strong>P</strong>rinciples <strong>S</strong>implified”) throughout the guide that offer helpful
				summaries and suggestions.</p>
			<h2 id="I">I. A Layman’s Guide to Deciphering Life Insurance</h2>

			<p>Insurance in general can be puzzling, thanks to the complicated jargon and number crunching it entails. But simplified definitions and straightforward answers to commonly asked questions can help solve the mystery for most consumers. </p>

			<h3>Should I Get Life Insurance?</h3>

			<p>If you are reading this guide, you have already thought about this question. The answer is yes; most adults need some type of policy. There are, however, a few exceptions to the rule. People who do not need life insurance coverage are those with no
				financial dependents.</p>

			<p><b>TIPS –</b> Remember, if you have anyone depending on your income (your spouse, children, siblings, aging parents, etc.), and you are not independently wealthy, you need some form of coverage.</p>

			<h3>What is the Best Type of Life Insurance?</h3>
			<p>Just as the circumstances for financial planning change from one life stage to the next, the same is true when planning life insurance. There are <a href="../life-insurance/term-vs-whole/">different types of policies</a> to serve different needs depending on a person’s
				age and unique situation. There are two main types of life insurance: <a href="https://www.noexam.com/life-insurance/term/">term life</a> and <a href="https://www.noexam.com/life-insurance/whole/">whole life</a>. Below is a breakdown of each type of coverage.</p>

			<h3>Term</h3>

			<p>Term life is designed to meet temporary needs because it provides protection during a specific time period or “term.” It is the most affordable option and serves the purpose of providing more short-term coverage, for instance, while the kids are in college or until the <a
						href="https://www.noexam.com/life-insurance/mortgage/">mortgage is paid off</a>. It is important to note the term is not typically very long, a 30-year term being the longest available.</p>

			<p>Some people choose term when in their 20s or 30s before they are financially stable enough to afford a more costly policy. Consider the following example:</p>

			<blockquote class="green">Sara is a 28-year-old stay-at-home mom to a three-year-old. Her husband has a policy through work, but they worry about the financial strain on the family should Sara pass away while their daughter is still young. Sara decides to take out a
				20-year term life policy that will provide coverage until her daughter graduates college. Thus, her family will only receive money from her policy if she dies before age 48.
			</blockquote>

			<p><b>TIPS</b> – Although term life is not a permanent solution, it meets an immediate need with guaranteed premiums and flexible coverage options that allow you to increase your coverage amount when necessary. Extending coverage, however, is expensive once the term is up, and you will
				face limited conversion options for changing to a different type of policy. It is recommended to get enough coverage when you are young to last until you no longer need any. </p>

			<h3>Whole/Permanent</h3>

			<p>A permanent policy is crucial to retirement planning. It offers lifelong protection that never expires as long as the premium payments are made and no loans or withdrawals are taken out against the value policy. This type of coverage is a more expensive
				option early on because the policyholder is basically “overpaying” to ensure a set premium during older, higher-risk years—but that overpayment is set aside and considered to be the policy’s cash value. This is the unique benefit of whole life coverage. It allows the
				policyholder, at any time during his or her lifetime, to borrow against the policy’s cash value, tax-free. An example of whole or permanent life insurance coverage follows.</p>

			<blockquote class="blue">Gene and Lisa are empty nesters and finally have the time to devote to a much-needed remodel of their house. Gene has a $500,000 whole life policy he purchased over 18 years ago. It has accumulated enough cash value to more than cover the couple’s remodeling
				project, which they consider to be a good investment in their retirement, as well as their kids’ future, once after they are gone.
			</blockquote>

			<p>During the first 10 to 15 years of a whole life policy, the insurer will stipulate “surrender charges,” which are fees designed to recoup the company’s costs in the event the policyholder cancels, or surrenders, the policy. The borrowable amount of the policy is the accumulated cash
				value minus the surrender charges. The cash value is also referred to as the “loan value.” </p>

			<p><b>TIPS</b> – Any amount of money borrowed from your whole life policy (that you do not otherwise pay back) reduces the amount paid out upon your death. This means the more you borrow now, the less your beneficiaries will receive.</p>
			<p><a href="#toc">Back to top</a></p>

			<h2 id="II">II. Variations on Traditional Policies</h2>

			<p>Now that you understand the basic differences between term life and whole, it is important to recognize the variations of these policies. Below are explanations of the different types of variations you will find when shopping around. </p>

			<h3>Convertible Term Life</h3>

			<p>For consumers who are torn between term life and whole, consider a convertible term life policy. This is a hybrid of sorts between temporary and permanent insurance in that it allows a term life policy to easily convert into a permanent policy of equal value. It does
				tend to cost more than a basic term life option, and some insurers stipulate that the policyholder can only convert the term policy to a permanent policy up until the age of 65.</p>

			<p><b>TIPS</b> – A convertible policy may cover you past the age of 65, but you must take action prior to the cut-off age to convert it or risk losing the option to switch to permanent life insurance altogether.</p>

			<h3>Universal</h3>

			<p>For individuals who like the security of whole life but want a little more flexibility with payments, a universal life policy may be the right choice of policies. There is a trade-off for the guaranteed certainty of whole life, however, for the flexibility found in universal
				life.</p>

			<p>The number one thing to remember about universal life is that the rate of return is not guaranteed because it is determined by the market. This is because the policy adds money market investments to the death benefit. You can pay your premiums whenever you want and in any amount you
				choose within the given minimum and maximum payment amounts.. The example below illuminates this type of coverage.</p>

			<blockquote class="green">Becky is a professional artist who works on commission for those bigger paychecks, but she sells most of her other pieces through a local gallery. She wants a life insurance policy, but her income fluctuates too much to make regular premium payments. With a
				universal life policy, she can pay the annual minimum when money is tight and put in extra cash after earning a big commission.
			</blockquote>

			<p><b>TIPS</b> – The premium amounts you choose when buying universal life will affect your death benefit. The more money you pay in, the bigger the benefit.</p>

			<h3>Variable</h3>

			<p>Managing a universal life policy may not be everyone’s cup of tea. Variable life policies, though, are even more complex and require the insured to remain vigilant.</p>

			<p>This type of coverage allows you to choose your own investment strategy and manage it as you would any investment portfolio. It is very similar to a universal life policy, but, rather than the insurer managing the investment, you get to take the reins.</p>

			<p>Not the best at investing? No worries. Most variable policies are designed with a minimum benefit that still pays out to your beneficiaries, so they receive the benefit, even if you make poor investment decisions.</p>

			<p><b>TIPS</b> – Even though variable life comes with greater risks, you may be able to achieve greater returns if you understand investing and do not mind managing the policy.</p>

			<h3>No Exam</h3>

			<p>While not exactly a particular <a href="https://www.noexam.com/life-insurance/types/">type of life insurance</a>, no exam policies earn a place here. Most life insurance products require medical exams as part of their application process. The purpose of a health exam is to
				determine not only an applicants’ eligibility for the policy but also to determine the cost of premiums. The whole idea of this often discourages many applicants, especially those who are not in the best shape physically.</p>

			<p>Also known as simplified issue, no exam life insurance is seeing an increase in demand among busy families who do not want to jump through hoops to obtain coverage. It does usually cost more than a traditional policy because the insurer is taking a bigger risk by not
				evaluating the applicant’s health status, but this can work in the insured’s favor if he or she:</p>
			<ul>
				<li>Has not seen a physician in more than two years and do not know if lab work would look good enough on a traditional insurance application</li>
				<li>Needs coverage fast and cannot wait four to eight weeks for the average underwriting process</li>
				<li>Does not like needles or feel that any medical exam is a deal-breaker</li>
			</ul>

			<p><b>TIPS</b> – Not everyone qualifies for <a href="https://www.noexam.com/life-insurance/companies/">no exam life insurance</a>. You will have to answer a series of health questions, and the insurer may check your pharmacy records, motor vehicle report, and any data collected by the
				Medical Information Bureau.</p>
			<p><a href="#toc">Back to top</a></p>

			<h2 id="III">III. Things to Keep in Mind When Buying a Policy</h2>

			<p>Now that you know why you need insurance and what options are available, you may be leaning towards a particular type of coverage. Before purchasing a policy, though, keep these important facts in mind:</p>

			<h3>It is a Contract</h3>

			<p>While there are certain requirements applicants must meet, there are also things the insurer must make good on. Life insurance is not just a product that is bought and discarded on a whim. It is an important life decision—so savvy shoppers should read the fine print and
				ask questions until they understand the policy they plan to purchase thoroughly—before they finalize the decision.</p>

			<h3>Circumstances Change</h3>

			<p>Life never stays constant. You may have started looking into buying insurance or even purchased a policy when you got married (or divorced), when you had kids, when you were laid off from your job, when you closed on your first home, or when you turned 50. Major life events tend to
				define the biggest life decisions we make, but it is important to step back and reconsider how life has changed when purchasing or renewing a policy. Ask yourself if the coverage you intend to have is enough if circumstances change.</p>

			<h3>It is a Commodity</h3>

			<p>Since insurance is a product sold by professional salespeople, you need to be as informed as possible when shopping for it. This does not mean insurance agents are out to take advantage of you, but they are not the best judge of your personal needs—you are. Do not let anyone talk you
				into buying something you know is not the best solution for you and your family.</p>

			<h3>Loss is Difficult</h3>

			<p>It is not easy to imagine what life will be like for your loved ones after you are gone, and they probably do not want to think about it either. Nonetheless, planning ahead is for their benefit, so consider all the possible “what ifs.” Even if you decide to purchase a term life
				insurance policy and <a href="https://www.noexam.com/life-insurance/term/outlive-policy/">outlive your term</a>, think of it like this: you will still be with your family to love and support them, a much better alternative than not outliving your term. Make your choice carefully, but be confident in your decision, knowing you have thoughtfully made the
				best choice possible to provide support to your family.</p>
			<p><a href="#toc">Back to top</a></p>

			<h2 id="IV">IV. The Do’s and Don’ts of Buying Life Insurance</h2>

			<p>If you still need some basic rules of thumb before taking the plunge and buying a life insurance policy, here is a handy list of do's and don’ts:</p>

			<p><strong>DO</strong></p>
			<ul>
				<li>Do purchase a policy that will cover six to eight times the amount of your annual salary, in other words, provide for six to eight years of income.</li>
				<li>Do review your policy regularly and increase or reduce your coverage based on lifestyle changes.</li>
				<li>Do shop lower premiums on your current life insurance policy if your health has improved. For example, if you have quit smoking since you purchased your policy, your coverage may be less expensive as a non-smoker.</li>
				<li>Do consider automatically renewable coverage that renews regardless of any changes in health status.</li>
				<li>Do consider meeting with a financial planner to get a better idea of the amount of coverage you need.</li>
			</ul>
			<p><b>DON’T</b></p>
			<ul>
				<li>Don’t make the mistake of getting several small policies thinking you will save money. It is usually more affordable to buy one major life insurance policy for your immediate coverage needs. The only situation where it makes sense to <a href="https://www.noexam.com/life-insurance/how-many-policies/">buy multiple policies</a> is when laddering life
					insurance policies to account for lower insurance needs as you age.
				</li>
				<li>Don’t ignore uninsured spouses. Stay-at-home parents and spouses who work part-time may not contribute much to the family in the way of income, but think of the housekeeping, daycare, and other services and needs that would need to be met should that spouse die.</li>
				<li>Don’t buy a whole life policy thinking it will be a high return investment. Protecting your loved ones financially for a few years after your death should be the main reason behind your purchase. Most policies have a very low return on the investment.</li>
				<li>Don’t buy a policy from the first agent you find. Shop around and do your homework until you understand your needs and know how to find the best rate for the coverage that best fits your needs.</li>
			</ul>
			<p><a href="#toc">Back to top</a></p>
				<h2 id="state">Life Insurance in Your State</h2>
			<ul class="row gallery">
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/california/">California</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/georgia/">Georgia</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/new-jersey/">New Jersey</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/north-carolina/">North Carolina</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/ohio/">Ohio</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/texas/">Texas</a></li>

			</ul>

			<h2 id="V">V. Answers to the Most Common Questions</h2>
			<h2>Frequently Asked Questions</h2>
			<ul class="row gallery">
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/types/">What are the different types of life insurance?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/term-vs-whole/">Should I buy term or whole life?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/how-much-coverage/">How much coverage should I buy?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/is-it-worth-it/">Is life insurance worth it?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/approval-time/">How long does it take to get a policy?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/cheap/">How can I find a cheap policy?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/parents/">Can you buy life insurance on your parents?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/lapses/">What can I do if my life insurance policy lapsed?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/felons/">Can a felon get life insurance?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/locating-a-policy/">How can I find out if someone had a life insurance policy?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/how-many-policies/">How many life insurance policies can you have?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/deductible/">Is life insurance tax deductible?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/drug-testing/">Do life insurance companies test for drugs?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/estate/">Is life insurance part of your estate?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/suicide/">Does life insurance pay out in the event of a suicide?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/runners/">Do runners get better rates?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/questions/">What questions should I ask when buying a policy?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/divorce/">How can I buy a policy for my divorce?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/health-exam/">What does the health exam consist of?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/family/">What is the best policy for a family?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/seniors/">What life insurance is best for seniors?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/whole/best-rates/">How much is whole life insurance?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/whole/face-value-vs-cash-value/">What's the difference between face and cash value?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/term/outlive-policy/">What Happens If I Outlive My Term Life Insurance?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/sba-loans/">How Do I Get Life Insurance for my SBA Loan?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/diabetics/">Can I Get No Exam Life Insurance if I Have Diabetes?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/one-million/">How Much Does a $1,000,000 Life Insurance Policy Cost?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/10-million/">How Much Does a $10,000,000 Life Insurance Policy Cost?</a></li>

				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/using-an-agent/">Should I Use a Life Insurance Agent When Buying a Policy?</a></li>
				<li class="col-md-6 col-xs-12"><a href="https://www.noexam.com/life-insurance/instant/">Can You Really Get Instant Life Insurance?</a></li>
				
				


				

			</ul>

			<p>If you have read this guide and taken the information to heart, you are already on the right track toward obtaining the coverage you need, but you may have lingering questions. Consider these FAQs:</p>

			<h3>Who should I name as my beneficiaries?</h3>

			<p>A beneficiary can be a spouse, child, sibling, niece/nephew, or even the estate of the insured. You can have more than one beneficiary. A policy should also always specify a contingent beneficiary in case the policyholder should outlive the primary beneficiary. A contingent
				beneficiary is who the death benefit goes to should your primary beneficiary be deceased. Care should be taken with the choice of beneficiaries and beneficiaries should be changed promptly when necessary.</p>

			<h3>What happens if you miss a premium payment?</h3>

			<p>Most insurers give policyholders a grace period of about 30 days to make up a missed payment with no interest added. If the insured fails to make up the payment before the grace period is up, the policy will be canceled, especially term life insurance policies. Permanent
				policies come with the option to make the payment with the policy’s cash value, but this is a pre-authorized option. Consumers should ask about this feature when shopping around if it is something of concern.</p>

			<h3>What should I consider when determining how much coverage I need?</h3>
			<p>We already mentioned it is a good idea to buy a policy that will <a href="https://www.noexam.com/life-insurance/how-much-coverage/">cover 6 to 8
					year's worth of income</a>, but this is a very general rule of thumb. When planning, shoppers should sit down and list any current and future financial obligations (debts, taxes, housing costs, funeral costs, clothing, education, etc.) and see how much of those needs could be met
				by surviving family members (such as a spouse’s income, retirement money, savings, etc.). Calculating the difference between the recommended need and the actual need will provide a better idea of how much life insurance coverage is needed.</p>

			<p>Planning for something as devastating as your own death can be a depressing, confusing prospect, but it is something we all have to face. Whether you end up choosing permanent coverage, a term policy, or a combination of the two, the best solution depends on your own financial goals
				and unique circumstances. Having a better idea of your family’s needs, as well as a basic understanding of your life insurance options will give you the power to secure your family’s future, so you can continue taking care of them even after you are gone.</p>
			<p><a href="#toc">Back to top</a></p>
			<h2 id="glossary">Life Insurance Glossary</h2>
			<ul class="row gallery">
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/1035-exchange/">1035 Exchange</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/accidental-death/">Accidental Death</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/aps/">Attending Physician Statement</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/burial-insurance/">Burial Insurance</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/whole/cash-value/">Cash Value</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/collateral-assignment/">Collateral Assignment</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/contestability/">Contestability Period</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/contingent-beneficiary/">Contingent Beneficiary</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/disability-insurance/">Disability Insurance</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/term/decreasing/">Decreasing Term</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/first-to-die/">First to Die Insurance</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/guaranteed-insurability-rider/">Guaranteed Insurability Rider</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/guaranteed-issue/">Guaranteed Issue</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/jumping-juvenile/">Jumping Juvenile Policy</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/key-person/">Key Man Insurance</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/term/level/">Level Term Life Insurance</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/lexisnexis/">LexisNexis</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/fraud/">Life Insurance Fraud</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/statistics/">Life Insurance Statistics</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/living-benefits/">Living Benefits</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/long-term-care-rider/">Long Term Care Rider</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/mortgage/">Mortgage Life Insurance</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/paid-up/">Paid Up Life Insurance</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/pre-need-vs-funeral/">Pre-Need vs Funeral Life Insurance</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/rate-class/">Rate Class</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/single-premium/">Single Premium</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/supplemental/">Supplemental Life Insurance</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/term/">Term Life Insurance</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/waiver-of-premium/">Waiver of Premium</a></li>
				<li class="col-md-4 col-xs-6"><a href="https://www.noexam.com/life-insurance/whole/">Whole Life Insurance</a></li>
			</ul>

		</article>

	</section>
	<!-- END PAGE-CONTENT -->


</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
