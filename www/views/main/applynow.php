<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 29.09.2018
 * Time: 15:32
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;

$this->title = 'No Exam Term Life Insurance - Apply Online';
//$c = count($prices['plans']['sagicor']);
?>

<div class="page-content page-wrapper">

	<section class="container first text-center <?php if(!$display_form):?>hidden<?php endif;?>">
		<h1 class="title">No Exam life insurance, fast and affordable coverage.</h1>
		<div class="desc hidden-xs">Compare Quotes To Get The Right Policy At The Right Price</div>
		<div class="trust-logos visible-xs"><img src="/img/trust_logos.jpg"></div>
	</section>

	<section class="container first text-center <?php if($display_form):?>hidden<?php endif;?>">
		<h1 class="title">No Medical Exam<span class="badge"><?=$total_terms_count;?></span></h1>
		<div class="desc">Our fast and simple questionnaire will get you coverage fast. No exam or waiting period.</div>
		<div class="trust-logos visible-xs mt20"><img src="/img/trust_logos.jpg"></div>
	</section>

	<?php if($display_form):?>
		<?=$this->render('/main/widgets/apply-now-main-form.php');?>
	<?php endif;?>

	<?php if(!$display_form):?>
		<?=$this->render('/main/widgets/quote-results-form.php', ['prices' => $prices, 'total_plans_count' => $total_plans_count, 'total_terms_count' => $total_terms_count]);?>
	<?php endif;?>

	<?php if($display_form):?>
		<section class="container third">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="testimonial">
						<div style="min-height: 100px; overflow: hidden;" class="shopperapproved_widget sa_rotate sa_count4 sa_horizontal sa_count4 sa_bgWhite sa_colorBlack sa_borderGray sa_rounded sa_jMy sa_fixed sa_showlinks sa_large sa_showdate "></div><script type="text/javascript">var sa_interval = 5000;function saLoadScript(src) { var js = window.document.createElement('script'); js.src = src; js.type = 'text/javascript'; document.getElementsByTagName("head")[0].appendChild(js); } if (typeof(shopper_first) == 'undefined') saLoadScript('//www.shopperapproved.com/widgets/testimonial/3.0/12271.js'); shopper_first = true; </script><div style="text-align:right;"><a class="sa_footer" href="https://www.shopperapproved.com/reviews/noexam.com/" target="_blank" rel="nofollow"><img class="sa_widget_footer" style="border: 0;" alt="" src=https://www.shopperapproved.com/widgets/widgetfooter-darklogo.png></a></div>
						<!--<span class="logo"></span>
						<span class="text">“Buying life insurane online from noexam.com was as easy as 1-2-3!”</span>
						<span class="author">- Brittany Anderson</span>-->
					</div>
				</div>
			</div>
		</section>
	<?php endif;?>

	<section class="container-fluid fourth">
		<div class="container w1130">
			<div class="row">
				<div class="col-sm-4 pgrid">
					<div class="tile">
						<div class="gray-title">
							Top Rated Companies
							<img src="/img/ab_logo.gif">
						</div>
						<div class="title">Compare Quotes from the Top Companies</div>
						<div class="description">Shop A Rated Carriers with Proven Track Records.</div>
					</div>
				</div>

				<div class="col-sm-4 pgrid">
					<div class="tile">
						<div class="gray-title">
							Coverage Amounts
							<img src="/img/umbrella.png">
						</div>
						<div class="title">Up to $1,000,000 of Coverage</div>
						<div class="description">Coverage without an exam available for ages 18-65.</div>
					</div>
				</div>

				<div class="col-sm-4 pgrid">
					<div class="tile">
						<div class="gray-title">
							Our Track Record
							<img src="/img/sa_logo.gif">
						</div>
						<div class="title">NoExam.com</div>
						<div class="description">BBB A+ Rated<br>4.8/5 Reviews (975 Ratings)<br><img src="/img/stars_4_8.gif"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container fifth w854">
		<div class="row">
			<div class="col-md-12">
				<h2>NoExam's.com Security Promise</h2>
				<p>NoExam.com is committed to helping our customers shop for life insurance coverage online securely.As a company that sells life insurance, we understand just how important it is to safeguard your information.</p>

				<p>NoExam.com utilizes a strict privacy policy that governs data security and collection procedures. This policy includes that NoExam.com:</p>

				<p>Does not share your personal contact information with third parties unrelated to your application. </p>
				<p>Encrypts sensitive data and does not store it.</p>
				<p>Does not sell, rent or share your personal information to any third parties.</p>
				<p>In addition to these measures, NoExam.com partners with Comodo Security, Trust Guard, The Better Business Bureau, and Shopper Approved to verify that we are upholding the highest security and customer satisfaction standards.</p>
			</div>
		</div>
	</section>
</div>
