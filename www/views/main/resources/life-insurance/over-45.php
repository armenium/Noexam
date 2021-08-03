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
$this->params['breadcrumbs'][] = ['label' => 'Life Insurance for Seniors', 'url' => '/life-insurance/seniors/'];
$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>
<div class="page-content page-wrapper trans_all">

	<!-- START PAGE-CONTENT -->
	<section class="page">

		<article class="content">
			<h1>Life Insurance Over Age 45</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<p>
				<img style="float:right;" src="../../img/old-couple-300x199.jpg" alt="life insurance elderly" width="300" height="199"/>Are you a senior already? If you have an <a href="https://www.noexam.com/life-insurance/companies/aarp/">AARP</a> subscription, then I think it is safe to say
				maybe! I believe some people prefer the phrase aged to perfection. By age 45 and beyond, you are likely looking at your life insurance portfolio.</p>
			<p>All those fun, youthful years behind you may have brought about a few health issues. Rest assured there is affordable life insurance for you. At noexam.com we help people of all ages! <a href="https://www.noexam.com/life-insurance/seniors/">Seniors life insurance</a> is one of our
				specialties.</p>
			<p>Often our clients ask us if it’s possible to get life insurance at their age. While not all life insurance is the same, you can secure this type of policy. For a summary of the best <a href="https://www.noexam.com/life-insurance/companies/no-exam/">no exam life insurance</a> for
				seniors, you can read<a href="https://www.noexam.com/life-insurance/no-exam/options-seniors/"> this post</a>. We have also reviewed the <a href="https://www.noexam.com/life-insurance/companies/">best life insurance companies for 2018</a>.<span id="more-735"></span></p>
			<h2>Possibilities of Coverage</h2>
			<p>Seniors have different insurance needs. Depending on where they are in life and what they want to have covered when they die. Some are looking for only burial life insurance with no waiting period. If your lifestyle requires you to secure more coverage, then you can buy up to $500,000
				with without an exam. Give us a call to discuss your life insurance needs 888-407-0714.</p>
			<p>Let&#8217;s go over the options for those over age 45. We will review the process for applying and show you some sample rates. You will be surprised to see how simple and affordable this <a href="https://www.noexam.com/life-insurance/types/">type of life insurance</a> can be.</p>
			<h2>Application Process</h2>
			<p>1) Speak with a licensed agent who can shop rates for you</p>
			<p>2) Provide date of birth, height, weight and medication history</p>
			<p>3) Answer a few medical and lifestyle questions</p>
			<p>There you have it! These three steps summarize how easy it is to get life insurance age 45 and up! The approval can be made the same day. In most cases, you will need to allow about 24-72hrs for policy. This is an excellent turnaround time.</p>
			<h2>How much does a term policy without an exam cost?</h2>
			<p>Below are various sample rates for term life insurance coverage that will not require an exam.</p>
			<h2>Sample Rates for a Male Age 45 $250k of Coverage Non Smoker Preferred</h2>

			<table id="tablepress-62" class="tablepress tablepress-id-62">
				<tbody class="row-hover">
				<tr class="row-1 odd">
					<td class="column-1">SBLI</td>
					<td class="column-2">10 Year $23.01</td>
					<td class="column-3">20 Year $38.12</td>
					<td class="column-4">30 Year $60.42</td>
				</tr>
				<tr class="row-2 even">
					<td class="column-1">North American</td>
					<td class="column-2">15 Year $38.72</td>
					<td class="column-3">20 Year $45.76</td>
					<td class="column-4">30 Year $67.32</td>
				</tr>
				<tr class="row-3 odd">
					<td class="column-1">Sagicor</td>
					<td class="column-2">10 Year $38.60</td>
					<td class="column-3">15 Year $50.85</td>
					<td class="column-4">20 Year $63.08</td>
				</tr>
				</tbody>
			</table>

			<h2>Sample Rates for a Female Age 45 $250k of Coverage Non Smoker Preferred</h2>

			<table id="tablepress-63" class="tablepress tablepress-id-63">
				<tbody class="row-hover">
				<tr class="row-1 odd">
					<td class="column-1">SBLI</td>
					<td class="column-2">10 Year $20.59</td>
					<td class="column-3">20 Year $29.17</td>
					<td class="column-4">30 Year $46.62</td>
				</tr>
				<tr class="row-2 even">
					<td class="column-1">North American</td>
					<td class="column-2">15 Year $38.72</td>
					<td class="column-3">20 Year $45.76</td>
					<td class="column-4">30 Year $67.32</td>
				</tr>
				<tr class="row-3 odd">
					<td class="column-1">Sagicor</td>
					<td class="column-2">10 Year $38.60</td>
					<td class="column-3">15 Year $50.85</td>
					<td class="column-4">20 Year $63.08</td>
				</tr>
				</tbody>
			</table>

			<h2>Sample Rates for a Male Age 55 $250k of Coverage Non Smoker Preferred</h2>

			<table id="tablepress-64" class="tablepress tablepress-id-64">
				<tbody class="row-hover">
				<tr class="row-1 odd">
					<td class="column-1">SBLI</td>
					<td class="column-2">10 Year $50.50</td>
					<td class="column-3">15 Year $68.00</td>
					<td class="column-4">20 Year $95.42</td>
				</tr>
				<tr class="row-2 even">
					<td class="column-1">Sagicor</td>
					<td class="column-2">10 Year $83.67</td>
					<td class="column-3">15 Year $112.48</td>
					<td class="column-4">20 Year $142.92</td>
				</tr>
				<tr class="row-3 odd">
					<td class="column-1">Mutual of Omaha</td>
					<td class="column-2">15 Year $218.50</td>
					<td class="column-3">20 Year $260.77</td>
					<td class="column-4">NA</td>
				</tr>
				<tr class="row-4 even">
					<td class="column-1">Phoenix</td>
					<td class="column-2">10 Year $185.57</td>
					<td class="column-3">20 Year $265.55</td>
					<td class="column-4">30 Year $360.04</td>
				</tr>
				</tbody>
			</table>

			<h2>Sample Rates for a Female Age 55 $250k of Coverage Non Smoker Preferred</h2>

			<table id="tablepress-65" class="tablepress tablepress-id-65">
				<tbody class="row-hover">
				<tr class="row-1 odd">
					<td class="column-1">SBLI</td>
					<td class="column-2">10 Year $37.94</td>
					<td class="column-3">15 Year $47.99</td>
					<td class="column-4">20 Year $60.78</td>
				</tr>
				<tr class="row-2 even">
					<td class="column-1">Sagicor</td>
					<td class="column-2">10 Year $60.79</td>
					<td class="column-3">15 Year $72.06</td>
					<td class="column-4">20 Year $108.66</td>
				</tr>
				<tr class="row-3 odd">
					<td class="column-1">Mutual of Omaha</td>
					<td class="column-2">15 Year $206.26</td>
					<td class="column-3">20 Year $244.97</td>
					<td class="column-4">NA</td>
				</tr>
				<tr class="row-4 even">
					<td class="column-1">Phoenix</td>
					<td class="column-2">10 Year $140.41</td>
					<td class="column-3">20 Year $165.65</td>
					<td class="column-4">30 Year $203.62</td>
				</tr>
				</tbody>
			</table>

			<p>We have conversations daily with older consumers looking for <a href="https://www.noexam.com">online life insurance</a>. Their most common concern is about a waiting period. When you buy no exam life insurance plans, they are effective upon approval and payment. That is because your
				eligibility is based on your prescription history and<a href="https://www.mib.com/facts_about_mib.html"> medical information bureau report</a>.</p>
			<h2>Would it be better to take an exam?</h2>
			<p>As you can see above non-med term life insurance is priced affordably. Professionally, I would not suggest for anyone in the senior age range to take an exam.</p>
			<p>For comparison sake, here are a few preferred rates with an exam for a male age 55 $250k non smoker.</p>

			<table id="tablepress-66" class="tablepress tablepress-id-66">
				<tbody class="row-hover">
				<tr class="row-1 odd">
					<td class="column-1">Banner</td>
					<td class="column-2">10 Year $48.12</td>
					<td class="column-3">20 Year $79.05</td>
					<td class="column-4">30 Year $155.44</td>
				</tr>
				<tr class="row-2 even">
					<td class="column-1">AIG</td>
					<td class="column-2">10 Year $51.81</td>
					<td class="column-3">20 Year $79.28</td>
					<td class="column-4">30 Year $153.45</td>
				</tr>
				<tr class="row-3 odd">
					<td class="column-1">Prudential</td>
					<td class="column-2">10 Year $54.00</td>
					<td class="column-3">20 Year $88.88</td>
					<td class="column-4">30 Year $169.65</td>
				</tr>
				<tr class="row-4 even">
					<td class="column-1">Mutual of Omaha</td>
					<td class="column-2">10 Year $52.89</td>
					<td class="column-3">20 Year $88.77</td>
					<td class="column-4">30 Year $166.86</td>
				</tr>
				</tbody>
			</table>

			<p>Before you take an exam be aware of the <a href="https://www.noexam.com/life-insurance/approval-time/">approval process</a> and a potential rate increase.</p>
			<h2>With an Exam</h2>
			<p>If you decide that taking an exam is the direction you would like to go, here is what you need to know:</p>
			<p>Typically the review time frame will run 30-60 days. The insurance company will look through your medical files from the doctors you have visited in the past 5-10 years. The final price is calculated after taking into consideration your lab results and records. If needles or doctor&#8217;s
				visits make you uncomfortable, then an exam can make your rate higher. Here is an article covering what life insurance companies look for in a health exam.</p>
			<p>Most of the time after the company reviews your medical records, it can set the stage for additional questions. Now, if you are a senior that has not kept up with routine doctor visits, this will likely cause the company not to offer you a policy.</p>
			<p>Both exam and no exam options will base their offers on your age, build, tobacco use, family history and medications. The no exam plans are simplified and do not require as much detail in turn making the process easier on you to apply for coverage.</p>
			<h2>Conclusion</h2>
			<p>The best thing you can do to get coverage is to work with a licensed agent who has experience with this type of life insurance.</p>
			<p>At noexam.com, we have a seasoned team of life insurance professionals ready to help you review the best life insurance options for seniors. That is if you are inclined to call yourself a senior!</p>
			<p>There&#8217;s no shame in getting older. In fact, it is a perfect time to organize your life insurance plans. You can get started with your policy today by heading over to<a href="https://www.noexam.com/apply-now/"> noexam.com/apply-now</a>.</p>
		</article>
	</section>
	<!-- END PAGE-CONTENT -->

	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
