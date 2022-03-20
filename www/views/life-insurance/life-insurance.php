<?php

use app\assets\AppAsset;
use app\components\BreadcrumbsNew;
use app\models\ResourcesCats;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Url;
use app\widgets\Author;
use app\widgets\GetQuote;
use yii\web\JqueryAsset;

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

$this->registerCssFile('@web/v2/life-insurance/css/life-insurance.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/main-first-screen.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/life-insurance/js/life-insurance.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

#$this->params['breadcrumbs'][] = ['label' => $this->context->current_cat->title, 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];
#$this->params['breadcrumbs'][] = ['label' => $this->context->current_cat->title, 'url' => Url::toRoute('life-insurance/'), 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];
#$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>

<div class="main-wrapp bg1">
	<div class="wrapp">
		<section class="life-insurance">
			<div class="life-insurance__nav breadcrumbs">
				<?=BreadcrumbsNew::widget(['links_by_url' => ['url' => $this->context->current_cat->url, 'model' => ResourcesCats::class]]);?>
				<?php #=BreadcrumbsNew::widget(['links' => $this->params['breadcrumbs']]);?>
			</div>
			<div class="life-insurance__first-screen main-first-screen">
				<h1 class="main-first-screen__title heading-0">Life Insurance</h1>
				<div class="main-first-screen__advice">
					<?=Author::widget(['db_time' => $this->context->current_cat->updated, 'file_time' => filemtime(__FILE__)]);?>
					<div class="fs-advice__body">
						<p class="fs-advice__text fontBodyM">The <b>2019 Insurance Barometer</b> published by LIMRA describes the current market as the best environment to purchase life insurance since the history of the study. However, most consumers are already worried enough about
							having money for retirement, let alone making room in their budget for life insurance. Still, considering their options to have financial protection in place for their families should they pass away, gives many people a
							sense of comfort. Though the study presents life insurance as one of the lesser-weighted priorities in the minds of Americans when it comes to financial planning, consumers who do seek out final expense options typically
							find an affordable and adequate policy after all.</p>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<div class="main-wrapp bg1">
	<div class="wrapp">
		<?=GetQuote::widget();?>
	</div>
</div>

<div class="main-wrapp bg1">
	<div class="wrapp">
		<article class="article">
			<div class="article__box">
				<h1 class="article__title heading-5">Life Insurance</h1>
				<p class="article__paragraph fontBodyM">The following guide is designed to be an informative breakdown of life insurance, presenting a better understanding of the types of policies and coverage options available. Once you read this guide, you should feel confident in making
					decisions regarding coverage options, and policy choices in general, according to you and your family’s unique needs. As you read, look for TIPS (“Tricky Insurance Principles Simplified”) throughout the guide that offer helpful
					summaries and suggestions.</p>
			</div>
			<h2 class="article__chapter-title heading-5">I. A Layman’s Guide to Deciphering Life Insurance</h2>
			<div class="article__box">
				<h3 class="article__subtitle heading-6">Should I Get Life Insurance?</h3>
				<p class="article__paragraph fontBodyM">If you are reading this guide, you have already thought about this question. The answer is yes; most adults need some type of policy. There are, however, a few exceptions to the rule. People who do not need life insurance coverage
					are those with no financial dependents.</p>
				<p class="article__paragraph fontBodyM">TIPS – Remember, if you have anyone depending on your income (your spouse, children, siblings, aging parents, etc.), and you are not independently wealthy, you need some form of coverage.</p>
			</div>
			<h3 class="article__subtitle heading-6">What is the Best Type of Life Insurance?</h3>
                        <p class="article__paragraph fontBodyM">
                            Just as the circumstances for financial planning change from one life stage to the next, the same is true when planning life insurance. There are 
                            <a href="../life-insurance/term-vs-whole/">different types of policies</a>
                             to serve different needs depending on a person’s
                            age and unique situation. There are two main types of life insurance: 
                            <a href="https://www.noexam.com/life-insurance/term/">term life</a>
                             and 
                            <a href="https://www.noexam.com/life-insurance/whole/">whole life</a>
                            . Below is a breakdown of each type of coverage.
                        </p>
                        <h3 class="article__subtitle heading-6">Term</h3>
                        <p class="article__paragraph fontBodyM">
                            Term life is designed to meet temporary needs because it provides protection during a specific time period or “term.” It is the most affordable option and serves the purpose of providing more short-term coverage, for instance, while the kids are in college or until the 
                            <a href="https://www.noexam.com/life-insurance/mortgage/">mortgage is paid off</a>
                            . It is important to note the term is not typically very long, a 30-year term being the longest available.
                        </p>
                        <p class="article__paragraph fontBodyM">Some people choose term when in their 20s or 30s before they are financially stable enough to afford a more costly policy. Consider the following example:</p>
                        <div class="article__card card card-green quote-s ">Sara is a 28-year-old stay-at-home mom to a three-year-old. Her husband has a policy through work, but they worry about the financial strain on the family should Sara pass away while their daughter is still young. Sara decides to take out a
                        20-year term life policy that will provide coverage until her daughter graduates college. Thus, her family will only receive money from her policy if she dies before age 48.
							</div>
                        <p class="article__paragraph fontBodyM">
                            <b>TIPS</b>
                             – Although term life is not a permanent solution, it meets an immediate need with guaranteed premiums and flexible coverage options that allow you to increase your coverage amount when necessary. Extending coverage, however, is expensive once the term is up, and you will
                            face limited conversion options for changing to a different type of policy. It is recommended to get enough coverage when you are young to last until you no longer need any. 
                        </p>
                        <h3 class="article__subtitle heading-6">Whole/Permanent</h3>
                        <p class="article__paragraph fontBodyM">A permanent policy is crucial to retirement planning. It offers lifelong protection that never expires as long as the premium payments are made and no loans or withdrawals are taken out against the value policy. This type of coverage is a more expensive
                        option early on because the policyholder is basically “overpaying” to ensure a set premium during older, higher-risk years—but that overpayment is set aside and considered to be the policy’s cash value. This is the unique benefit of whole life coverage. It allows the
                        policyholder, at any time during his or her lifetime, to borrow against the policy’s cash value, tax-free. An example of whole or permanent life insurance coverage follows.</p>
                        <div class="article__card card card-red quote-s ">Gene and Lisa are empty nesters and finally have the time to devote to a much-needed remodel of their house. Gene has a $500,000 whole life policy he purchased over 18 years ago. It has accumulated enough cash value to more than cover the couple’s remodeling
                        project, which they consider to be a good investment in their retirement, as well as their kids’ future, once after they are gone.
							</div>
                        <p class="article__paragraph fontBodyM">During the first 10 to 15 years of a whole life policy, the insurer will stipulate “surrender charges,” which are fees designed to recoup the company’s costs in the event the policyholder cancels, or surrenders, the policy. The borrowable amount of the policy is the accumulated cash
                        value minus the surrender charges. The cash value is also referred to as the “loan value.” </p>
                        <p class="article__paragraph fontBodyM">
                            <b>TIPS</b>
                             – Any amount of money borrowed from your whole life policy (that you do not otherwise pay back) reduces the amount paid out upon your death. This means the more you borrow now, the less your beneficiaries will receive.
                        </p>
                        <p class="article__paragraph fontBodyM">
                            <a href="#toc">Back to top</a>
                        </p>
                        <h2 class="article__chapter-title heading-5" id="II">II. Variations on Traditional Policies</h2>
                        <p class="article__paragraph fontBodyM">Now that you understand the basic differences between term life and whole, it is important to recognize the variations of these policies. Below are explanations of the different types of variations you will find when shopping around. </p>
                        <h3 class="article__subtitle heading-6">Convertible Term Life</h3>
                        <p class="article__paragraph fontBodyM">For consumers who are torn between term life and whole, consider a convertible term life policy. This is a hybrid of sorts between temporary and permanent insurance in that it allows a term life policy to easily convert into a permanent policy of equal value. It does
                        tend to cost more than a basic term life option, and some insurers stipulate that the policyholder can only convert the term policy to a permanent policy up until the age of 65.</p>
                        <p class="article__paragraph fontBodyM">
                            <b>TIPS</b>
                             – A convertible policy may cover you past the age of 65, but you must take action prior to the cut-off age to convert it or risk losing the option to switch to permanent life insurance altogether.
                        </p>
                        <h3 class="article__subtitle heading-6">Universal</h3>
                        <p class="article__paragraph fontBodyM">For individuals who like the security of whole life but want a little more flexibility with payments, a universal life policy may be the right choice of policies. There is a trade-off for the guaranteed certainty of whole life, however, for the flexibility found in universal
                        life.</p>
                        <p class="article__paragraph fontBodyM">The number one thing to remember about universal life is that the rate of return is not guaranteed because it is determined by the market. This is because the policy adds money market investments to the death benefit. You can pay your premiums whenever you want and in any amount you
                        choose within the given minimum and maximum payment amounts.. The example below illuminates this type of coverage.</p>
                        <div class="article__card card card-green quote-s ">Becky is a professional artist who works on commission for those bigger paychecks, but she sells most of her other pieces through a local gallery. She wants a life insurance policy, but her income fluctuates too much to make regular premium payments. With a
                        universal life policy, she can pay the annual minimum when money is tight and put in extra cash after earning a big commission.
                            </div>
                        <p class="article__paragraph fontBodyM">
                            <b>TIPS</b>
                             – The premium amounts you choose when buying universal life will affect your death benefit. The more money you pay in, the bigger the benefit.
                        </p>
                        <h3 class="article__subtitle heading-6">Variable</h3>
                        <p class="article__paragraph fontBodyM">Managing a universal life policy may not be everyone’s cup of tea. Variable life policies, though, are even more complex and require the insured to remain vigilant.</p>
                        <p class="article__paragraph fontBodyM">This type of coverage allows you to choose your own investment strategy and manage it as you would any investment portfolio. It is very similar to a universal life policy, but, rather than the insurer managing the investment, you get to take the reins.</p>
                        <p class="article__paragraph fontBodyM">Not the best at investing? No worries. Most variable policies are designed with a minimum benefit that still pays out to your beneficiaries, so they receive the benefit, even if you make poor investment decisions.</p>
                        <p class="article__paragraph fontBodyM">
                            <b>TIPS</b>
                             – Even though variable life comes with greater risks, you may be able to achieve greater returns if you understand investing and do not mind managing the policy.
                        </p>
                        <h3 class="article__subtitle heading-6">No Exam</h3>
                        <p class="article__paragraph fontBodyM">
                            While not exactly a particular 
                            <a href="https://www.noexam.com/life-insurance/types/">type of life insurance</a>
                            , no exam policies earn a place here. Most life insurance products require medical exams as part of their application process. The purpose of a health exam is to
                            determine not only an applicants’ eligibility for the policy but also to determine the cost of premiums. The whole idea of this often discourages many applicants, especially those who are not in the best shape physically.
                        </p>
                        <p class="article__paragraph fontBodyM">Also known as simplified issue, no exam life insurance is seeing an increase in demand among busy families who do not want to jump through hoops to obtain coverage. It does usually cost more than a traditional policy because the insurer is taking a bigger risk by not
                        evaluating the applicant’s health status, but this can work in the insured’s favor if he or she:</p>
                        <ul>
                            <li>Has not seen a physician in more than two years and do not know if lab work would look good enough on a traditional insurance application</li>
                            <li>Needs coverage fast and cannot wait four to eight weeks for the average underwriting process</li>
                            <li>Does not like needles or feel that any medical exam is a deal-breaker</li>
                        </ul>
                        <p class="article__paragraph fontBodyM">
                            <b>TIPS</b>
                             – Not everyone qualifies for 
                            <a href="https://www.noexam.com/life-insurance/companies/">no exam life insurance</a>
                            . You will have to answer a series of health questions, and the insurer may check your pharmacy records, motor vehicle report, and any data collected by the
                            Medical Information Bureau.
                        </p>
                        <p class="article__paragraph fontBodyM">
                            <a href="#toc">Back to top</a>
                        </p>
                        <h2 class="article__chapter-title heading-5" id="III">III. Things to Keep in Mind When Buying a Policy</h2>
                        <p class="article__paragraph fontBodyM">Now that you know why you need insurance and what options are available, you may be leaning towards a particular type of coverage. Before purchasing a policy, though, keep these important facts in mind:</p>
                        <h3 class="article__subtitle heading-6">It is a Contract</h3>
                        <p class="article__paragraph fontBodyM">While there are certain requirements applicants must meet, there are also things the insurer must make good on. Life insurance is not just a product that is bought and discarded on a whim. It is an important life decision—so savvy shoppers should read the fine print and
                        ask questions until they understand the policy they plan to purchase thoroughly—before they finalize the decision.</p>
                        <h3 class="article__subtitle heading-6">Circumstances Change</h3>
                        <p class="article__paragraph fontBodyM">Life never stays constant. You may have started looking into buying insurance or even purchased a policy when you got married (or divorced), when you had kids, when you were laid off from your job, when you closed on your first home, or when you turned 50. Major life events tend to
                        define the biggest life decisions we make, but it is important to step back and reconsider how life has changed when purchasing or renewing a policy. Ask yourself if the coverage you intend to have is enough if circumstances change.</p>
                        <h3 class="article__subtitle heading-6">It is a Commodity</h3>
                        <p class="article__paragraph fontBodyM">Since insurance is a product sold by professional salespeople, you need to be as informed as possible when shopping for it. This does not mean insurance agents are out to take advantage of you, but they are not the best judge of your personal needs—you are. Do not let anyone talk you
                        into buying something you know is not the best solution for you and your family.</p>
                        <h3 class="article__subtitle heading-6">Loss is Difficult</h3>
                        <p class="article__paragraph fontBodyM">
                            It is not easy to imagine what life will be like for your loved ones after you are gone, and they probably do not want to think about it either. Nonetheless, planning ahead is for their benefit, so consider all the possible “what ifs.” Even if you decide to purchase a term life
                            insurance policy and 
                            <a href="https://www.noexam.com/life-insurance/term/outlive-policy/">outlive your term</a>
                            , think of it like this: you will still be with your family to love and support them, a much better alternative than not outliving your term. Make your choice carefully, but be confident in your decision, knowing you have thoughtfully made the
                            best choice possible to provide support to your family.
                        </p>
                        <p class="article__paragraph fontBodyM">
                            <a href="#toc">Back to top</a>
                        </p>
                        <h2 class="article__chapter-title heading-5" id="IV">IV. The Do’s and Don’ts of Buying Life Insurance</h2>
                        <p class="article__paragraph fontBodyM">If you still need some basic rules of thumb before taking the plunge and buying a life insurance policy, here is a handy list of do's and don’ts:</p>
                        <p class="article__paragraph fontBodyM">
                            <strong>DO</strong>
                        </p>
                        <ul>
                            <li>Do purchase a policy that will cover six to eight times the amount of your annual salary, in other words, provide for six to eight years of income.</li>
                            <li>Do review your policy regularly and increase or reduce your coverage based on lifestyle changes.</li>
                            <li>Do shop lower premiums on your current life insurance policy if your health has improved. For example, if you have quit smoking since you purchased your policy, your coverage may be less expensive as a non-smoker.</li>
                            <li>Do consider automatically renewable coverage that renews regardless of any changes in health status.</li>
                            <li>Do consider meeting with a financial planner to get a better idea of the amount of coverage you need.</li>
                        </ul>
                        <p class="article__paragraph fontBodyM">
                            <b>DON’T</b>
                        </p>
                        <ul>
                            <li>
                                Don’t make the mistake of getting several small policies thinking you will save money. It is usually more affordable to buy one major life insurance policy for your immediate coverage needs. The only situation where it makes sense to 
                                <a href="https://www.noexam.com/life-insurance/how-many-policies/">buy multiple policies</a>
                                 is when laddering life
                                insurance policies to account for lower insurance needs as you age.
                            </li>
                            <li>Don’t ignore uninsured spouses. Stay-at-home parents and spouses who work part-time may not contribute much to the family in the way of income, but think of the housekeeping, daycare, and other services and needs that would need to be met should that spouse die.</li>
                            <li>Don’t buy a whole life policy thinking it will be a high return investment. Protecting your loved ones financially for a few years after your death should be the main reason behind your purchase. Most policies have a very low return on the investment.</li>
                            <li>Don’t buy a policy from the first agent you find. Shop around and do your homework until you understand your needs and know how to find the best rate for the coverage that best fits your needs.</li>
                        </ul>
			<div class="top__btn button-small">Back to top</div>
		</article>
	</div>
</div>

<div class="main-wrapp bg2 states-wrapp">
	<div class="decorate-title d-flex flex-row flex-nowrap">
		<div class="states__title__left_decor"></div>
		<h1 class="states__title heading-2">Life Insurance in Your State</h1>
		<div class="states__title__right_decor"></div>
	</div>
	<div class="wrapp">
		<section class="states">

			<div class="states__body">
				<a href="/life-insurance/california/" class="states__item"><span>California</span></a>
				<a href="/life-insurance/georgia/" class="states__item"><span>Georgia</span></a>
				<a href="/life-insurance/new-jersey/" class="states__item"><span>New Jersey</span></a>
				<a href="/life-insurance/north-carolina/" class="states__item"><span>North Carolina</span></a>
				<a href="/life-insurance/ohio/" class="states__item"><span>Ohio</span></a>
				<a href="/life-insurance/texas/" class="states__item"><span>Texas</span></a>
			</div>
		</section>
	</div>
</div>

<div class="main-wrapp bg1">
	<div class="wrapp">
		<article class="article">
			<div class="article__box">
				<h1 class="article__title heading-2 article__title--center">Frequently Asked Questions</h1>
				<div class="article__links">
					<div class="article__links-column">
						<a href="/life-insurance/types/" class="article__link fontBodyS">What are the different types of life insurance?</a>
						<a href="/life-insurance/how-much-coverage/" class="article__link fontBodyS">How much coverage should I buy?</a>
                        <a href="/life-insurance/approval-time/" class="article__link fontBodyS">How long does it take to get a policy?</a>
                        <a href="/life-insurance/parents/" class="article__link fontBodyS">Can you buy life insurance on your parents?</a>
                        <a href="/life-insurance/felons/" class="article__link fontBodyS">Can a felon get life insurance?</a>
                        <a href="/life-insurance/how-many-policies/" class="article__link fontBodyS">How many life insurance policies can you have?</a>
                        <a href="/life-insurance/drug-testing/" class="article__link fontBodyS">Do life insurance companies test for drugs?</a>
                        <a href="/life-insurance/suicide/" class="article__link fontBodyS">Does life insurance pay out in the event of a suicide?</a>
                        <a href="/life-insurance/questions/" class="article__link fontBodyS">What questions should I ask when buying a policy?</a>
                        <a href="/life-insurance/health-exam/" class="article__link fontBodyS">What does the health exam consist of?</a>
                        <a href="/life-insurance/seniors/" class="article__link fontBodyS">What life insurance is best for seniors?</a>
                        <a href="/life-insurance/whole/face-value-vs-cash-value/" class="article__link fontBodyS">What is the difference between face and cash value</a>
                        <a href="/life-insurance/sba-loans/" class="article__link fontBodyS">How do I get life insurance for an SBA loan?</a>
                        <a href="/life-insurance/one-million/" class="article__link fontBodyS">How much does $1,000,000 of life insurance cost?</a>
                        <a href="/life-insurance/using-an-agent/" class="article__link fontBodyS">Should I use a life insurance agent when buying a policy?</a>
					</div> 
					<div class="article__links-column">
                        <a href="/life-insurance/term-vs-whole/" class="article__link fontBodyS">Should I buy term or whole life?</a>
                        <a href="/life-insurance/is-it-worth-it/" class="article__link fontBodyS">Is life insurance worth it?</a>
                        <a href="/life-insurance/cheap/" class="article__link fontBodyS">How can I find a cheap policy?</a>
                        <a href="/life-insurance/lapses/" class="article__link fontBodyS">What can I do if my life insurance policy lapsed?</a>
                        <a href="/life-insurance/locating-a-policy/" class="article__link fontBodyS">How can I find out if someone had a life insurance policy?</a>
                        <a href="/life-insurance/deductible/" class="article__link fontBodyS">Is life insurance tax deductible?</a>
                        <a href="/life-insurance/estate/" class="article__link fontBodyS">Is life insurance part of your estate?</a>
                        <a href="/life-insurance/runners/" class="article__link fontBodyS">Do runners get better rates?</a>
                        <a href="/life-insurance/divorce/" class="article__link fontBodyS">How can I buy a policy for my divorce?</a>
                        <a href="/life-insurance/family/" class="article__link fontBodyS">What is the best policy for a family?</a>
                        <a href="/life-insurance/seniors/" class="article__link fontBodyS">What life insurance is best for seniors?</a>
                        <a href="/life-insurance/whole/best-rates/" class="article__link fontBodyS">How much is whole life insurance?</a>
                        <a href="/life-insurance/term/outlive-policy/" class="article__link fontBodyS">What Happens If I Outlive My Term Life Insurance?</a>
                        <a href="/life-insurance/diabetics/" class="article__link fontBodyS">Can I Get No Exam Life Insurance if I Have Diabetes?</a>
                        <a href="/life-insurance/10-million/" class="article__link fontBodyS">How Much Does a $10,000,000 Life Insurance Policy Cost?</a>
                        <a href="/life-insurance/instant/" class="article__link fontBodyS">Can You Really Get Instant Life Insurance?</a>
					</div>
				</div>
			</div>

			<div class="article__box">
				<h3 class="article__subtitle">Life Insurance Glossary</h3>
				<div class="article__glossary">
					<div class="article__glossary-column">
                        <a href="/life-insurance/1035-exchange/" class="article__glossary-item fontBodyS">1035 Exchange</a>
                        <a href="/life-insurance/accidental-death/" class="article__glossary-item fontBodyS">Accidental Death</a>
                        <a href="/life-insurance/aps/" class="article__glossary-item fontBodyS">Attending Physician Statement</a>
                        <a href="/life-insurance/burial-insurance/" class="article__glossary-item fontBodyS">Burial Insurance</a>
                        <a href="/life-insurance/whole/cash-value/" class="article__glossary-item fontBodyS">Cash Value</a>
                        <a href="/life-insurance/collateral-assignment/" class="article__glossary-item fontBodyS">Collateral Assignment</a>
                        <a href="/life-insurance/contestability/" class="article__glossary-item fontBodyS">Contestability Period</a>
                        <a href="/life-insurance/contingent-beneficiary/" class="article__glossary-item fontBodyS">Contingent Beneficiary</a>
                        <a href="/life-insurance/disability-insurance/" class="article__glossary-item fontBodyS">Disability Insurance</a>
                        <a href="/life-insurance/term/decreasing/" class="article__glossary-item fontBodyS">Decreasing Term</a>
					</div>
					<div class="article__glossary-column">
                    <a href="/life-insurance/first-to-die/" class="article__glossary-item fontBodyS">First to Die Insurance</a>
                        <a href="/life-insurance/guaranteed-insurability-rider/" class="article__glossary-item fontBodyS">Guaranteed Insurability Rider</a>
                        <a href="/life-insurance/guaranteed-issue/" class="article__glossary-item fontBodyS">Guaranteed Issue</a>
                        <a href="/life-insurance/jumping-juvenile/" class="article__glossary-item fontBodyS">Jumping Juvenile Policy</a>
                        <a href="/life-insurance/key-person/" class="article__glossary-item fontBodyS">Key Man Insurance</a>
                        <a href="/life-insurance/term/level/" class="article__glossary-item fontBodyS">Level Term Life Insurance</a>
                        <a href="/life-insurance/lexisnexis/" class="article__glossary-item fontBodyS">LexisNexis</a>
                        <a href="/life-insurance/fraud/" class="article__glossary-item fontBodyS">Life Insurance Fraud</a>
                        <a href="/life-insurance/statistics/" class="article__glossary-item fontBodyS">Life Insurance Statistics</a>
                        <a href="/life-insurance/living-benefits/" class="article__glossary-item fontBodyS">Living Benefits</a>
					</div>
					<div class="article__glossary-column">
                        <a href="/life-insurance/long-term-care-rider/" class="article__glossary-item fontBodyS">Long Term Care Rider</a>
                        <a href="/life-insurance/mortgage/" class="article__glossary-item fontBodyS">Mortgage Life Insurance</a>
                        <a href="/life-insurance/paid-up/" class="article__glossary-item fontBodyS">Paid Up Life Insurance</a>
                        <a href="/life-insurance/pre-need-vs-funeral/" class="article__glossary-item fontBodyS">Pre-Need vs Funeral Life Insurance</a>
                        <a href="/life-insurance/rate-class/" class="article__glossary-item fontBodyS">Rate Class</a>
                        <a href="/life-insurance/single-premium/" class="article__glossary-item fontBodyS">Single Premium</a>
                        <a href="/life-insurance/supplemental/" class="article__glossary-item fontBodyS">Supplemental Life Insurance</a>
                        <a href="/life-insurance/term/" class="article__glossary-item fontBodyS">Term Life Insurance</a>
                        <a href="/life-insurance/waiver-of-premium/" class="article__glossary-item fontBodyS">Waiver of Premium</a>
                        <a href="/life-insurance/whole/" class="article__glossary-item fontBodyS">Whole Life Insurance</a>
					</div>
				</div>
			</div>
			<div class="top__btn button-small">Back to top</div>
		</article>
	</div>
</div>

