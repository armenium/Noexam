<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

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
?>
<div class="main-index landing-page -trans_all">

	<section class="section-first">
		<div class="info container">
			<div class="inner">
				<div class="date"><?=date('F j, Y');?></div>
				<h1>Top 8 Life Insurance Companies for 2019</h1>
				<h2>Our best life insurance companies based on research.</h2>
				<div class="label">As seen in</div>
				<div class="logos">
					<div><img src="/img/landing-pages/logo-huffpo-white.svg" alt="Huffpost"></div>
					<div><img src="/img/landing-pages/logo-ap-white.svg" alt="AP"></div>
					<div><img src="/img/landing-pages/logo-qb-white.svg" alt="Quickbooks"></div>
					<div><img src="/img/landing-pages/logo-bankrate-white.svg" alt="Bankrate"></div>
					<div><img src="/img/landing-pages/logo-simpledollar-white.svg" alt="The simple dollar"></div>
					<div><img src="/img/landing-pages/logo-cheapism-white.svg" alt="Cheapism"></div>
				</div>
			</div>
		</div>
		<div class="header-bg" style="background-image: url(/img/landing-pages/lp-header-bg-01.jpg);">
			<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
			     width="2560px" height="85px" viewBox="0 0 2560 85" enable-background="new 0 0 2560 85" xml:space="preserve">
				<polygon fill="#FFFFFF" points="2560,85 0,85 0,79.455 2560,0 "/>
			</svg>
		</div>
	</section>

	<section class="section-second">
		<div class="container">
			<div class="row">
				<div class="f-question col-lg-5 col-lg-push-7 col-md-6 col-md-push-6 col-sm-7 col-sm-push-5 col-xs-12">
					<div class="form-content">
						<div class="sub-lbl">Do you exercise at least 3 times per week?</div>
						<div class="btns-wrap" data-prefix="$">
							<?=Html::submitButton('Yes', ['value' => 'yes', 'class' => 'btn btn-quote inline trans yes submit_question', 'id' => 'submit_answer_yes']);?>
							<?=Html::submitButton('No', ['value' => 'no', 'class' => 'btn btn-quote inline trans no submit_question', 'id' => 'submit_answer_no']);?>
						</div>
					</div>
				</div>
				<div class="f-label col-lg-7 col-lg-pull-5 col-md-6 col-md-pull-6 col-sm-5 col-sm-pull-7 col-xs-12">
					<div class="form-label">Top 8 Life Insurance Companies - Get Multiple Quotes for the Best Price</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section-third">
		<div id="sorting_list" class="container items">

			<div class="item" data-weight="2" data-peoples-count="95" data-company-name="Legal & General">
				<div class="number">#1</div>
				<div class="inner">
					<div class="flex-col col-1 text-center">
						<a target="_blank" href="https://www.noexam.com/out/quotes-2.php"><img class="company-logo" src="/img/company_logos/logo_legal_general2.png" alt="Legal & General"></a>
					</div>
					<div class="flex-col col-2">
						<div class="modal-cont">
							<div class="title"><a target="_blank" href="https://www.noexam.com/out/quotes-2.php">Legal and General Life Insurance</a></div>
							<ul class="list">
								<li>Competitive Term Life Prices</li>
								<li>High Acceptance Rate</li>
								<li>5th Largest Term Life Provider</li>
							</ul>
						</div>
						<!--<a class="a-link read-review" href="#">Read full review</a>-->
					</div>
					<div class="flex-col col-3 text-center">
						<a target="_blank" href="https://www.noexam.com/out/quotes-2.php" role="button" class="view-rates btn btn-quote">More Info</a>
						<a href="#" class="a-link learn-more" data-toggle="modal" data-target="#lpModal">Learn more</a>
					</div>
				</div>
			</div>

			<div class="item" data-weight="2" data-peoples-count="87" data-company-name="Prudential">
				<div class="number">#2</div>
				<div class="inner">
					<div class="flex-col col-1 text-center">
						<a target="_blank" href="https://www.noexam.com/out/quotes-2.php"><img class="company-logo" src="/img/company_logos/logo_prudential2.png" alt="Prudential"></a>
					</div>
					<div class="flex-col col-2">
						<div class="modal-cont">
							<div class="title"><a target="_blank" href="https://www.noexam.com/out/quotes-2.php">Prudential Life Insurance</a></div>
							<ul class="list">
								<li>Lenient Underwriting</li>
								<li>Good for Seniors</li>
								<li>Competitive Tobacco Rates</li>
							</ul>
						</div>
						<!--<a class="a-link read-review" href="#">Read full review</a>-->
					</div>
					<div class="flex-col col-3 text-center">
						<a target="_blank" href="https://www.noexam.com/out/quotes-2.php" role="button" class="view-rates btn btn-quote">More Info</a>
						<a href="#" class="a-link learn-more" data-toggle="modal" data-target="#lpModal">Learn more</a>
					</div>
				</div>
			</div>

			<div class="item" data-weight="3" data-peoples-count="144" data-company-name="Mutual Omaha">
				<div class="number">#3</div>
				<div class="inner">
					<div class="flex-col col-1 text-center">
						<a target="_blank" href="https://www.noexam.com/out/quotes-2.php"><img class="company-logo" src="/img/company_logos/logo_mutual_omaha2.png" alt="Mutual Omaha"></a>
					</div>
					<div class="flex-col col-2">
						<div class="modal-cont">
							<div class="title"><a target="_blank" href="https://www.noexam.com/out/quotes-2.php">Mutual of Omaha Life Insurance</a></div>
							<ul class="list">
								<li>Best Product Selection</li>
								<li>Strong Financial Ratings</li>
								<li>Mutual Life Insurance Company</li>
							</ul>
						</div>
						<!--<a class="a-link read-review" href="#">Read full review</a>-->
					</div>
					<div class="flex-col col-3 text-center">
						<a target="_blank" href="https://www.noexam.com/out/quotes-2.php" role="button" class="view-rates btn btn-quote">More Info</a>
						<a href="#" class="a-link learn-more" data-toggle="modal" data-target="#lpModal">Learn more</a>
					</div>
				</div>
			</div>

			<div class="item" data-weight="4" data-peoples-count="203" data-company-name="AIG">
				<div class="number">#4</div>
				<div class="inner">
					<div class="flex-col col-1 text-center">
						<a target="_blank" href="https://www.noexam.com/out/aig.php"><img class="company-logo" src="/img/company_logos/logo_aig2.png" alt="AIG"></a>
					</div>
					<div class="flex-col col-2">
						<div class="modal-cont">
							<div class="title"><a target="_blank" href="https://www.noexam.com/out/aig.php">AIG Life Insurance</a></div>
							<ul class="list">
								<li>Strong Financial Ratings</li>
								<li>Wide Selection of Products</li>
								<li>Online Application</li>
							</ul>
						</div>
						<!--<a class="a-link read-review" href="#">Read full review</a>-->
					</div>
					<div class="flex-col col-3 text-center">
						<a target="_blank" href="https://www.noexam.com/out/aig.php" role="button" class="view-rates btn btn-quote">More Info</a>
						<a href="#" class="a-link learn-more" data-toggle="modal" data-target="#lpModal">Learn more</a>
					</div>
				</div>
			</div>

			<div class="item" data-weight="5" data-peoples-count="137" data-company-name="Bestow Life">
				<div class="number">#5</div>
				<div class="inner">
					<div class="flex-col col-1 text-center">
						<a href="https://www.noexam.com/out/bestow-2.php"><img class="company-logo" src="/img/bestow.svg" alt="Bestow Logo"></a>
					</div>
					<div class="flex-col col-2">
						<div class="modal-cont">
							<div class="title"><a href="https://www.noexam.com/out/bestow-2.php">Bestow Life Insurance</a></div>
							<ul class="list">
								<li>Age 21 to 55 Only</li>
								<li>Short Terms</li>
								<li>Quick Application and Decision</li>
							</ul>
						</div>
						<!--<a class="a-link read-review" href="#">Read full review</a>-->
					</div>
					<div class="flex-col col-3 text-center">
						<a target="_blank" href="https://www.noexam.com/out/bestow-2.php" role="button" class="view-rates btn btn-quote">More Info</a>
						<a href="#" class="a-link learn-more" data-toggle="modal" data-target="#lpModal">Learn more</a>
					</div>
				</div>
			</div>

			<div class="item" data-weight="6" data-peoples-count="112" data-company-name="Ladder Life">
				<div class="number">#6</div>
				<div class="inner">
					<div class="flex-col col-1 text-center">
						<a target="_blank" href="https://www.noexam.com/out/ladder-2.php"><img class="company-logo" src="/img/company_logos/logo_ladder.png" alt="Ladder Life Logo"></a>
					</div>
					<div class="flex-col col-2">
						<div class="modal-cont">
							<div class="title"><a target="_blank" href="https://www.noexam.com/out/ladder-2.php">Ladder Life Insurance</a></div>
							<ul class="list">
								<li>Adjustable Coverage Amount</li>
								<li>Low Prices</li>
								<li>Fast Online Application</li>
							</ul>
						</div>
						<!--<a class="a-link read-review" href="#">Read full review</a>-->
					</div>
					<div class="flex-col col-3 text-center">
						<a target="_blank" href="https://www.noexam.com/out/ladder-2.php" role="button" class="view-rates btn btn-quote">More Info</a>
						<a href="#" class="a-link learn-more" data-toggle="modal" data-target="#lpModal">Learn more</a>
					</div>
				</div>
			</div>

			<div class="item" data-weight="7" data-peoples-count="189" data-company-name="Haven Life">
				<div class="number">#7</div>
				<div class="inner">
					<div class="flex-col col-1 text-center">
						<a target="_blank" href="https://www.noexam.com/out/haven-2.php"><img class="company-logo" src="/img/company_logos/logo_haven_life3.png" alt="Haven Life"></a>
					</div>
					<div class="flex-col col-2">
						<div class="modal-cont">
							<div class="title"><a target="_blank" href="https://www.noexam.com/out/haven-2.php">Haven Life Insurance</a></div>
							<ul class="list">
								<li>Competitive Prices</li>
								<li>Online Application</li>
								<li>Fast Decision & No Exam</li>
							</ul>
						</div>
						<!--<a class="a-link read-review" href="#">Read full review</a>-->
					</div>
					<div class="flex-col col-3 text-center">
						<a target="_blank" href="https://www.noexam.com/out/haven-2.php" role="button" class="view-rates btn btn-quote">More Info</a>
						<a href="#" class="a-link learn-more" data-toggle="modal" data-target="#lpModal">Learn more</a>
					</div>
				</div>
			</div>

			<div class="item" data-weight="1" data-peoples-count="122" data-company-name="Health IQ">
				<div class="number">#8</div>
				<div class="inner">
					<div class="flex-col col-1 text-center">
						<a target="_blank" href="https://www.noexam.com/out/health-iq-2.php"><img class="company-logo" src="/img/company_logos/logo_health_iq2.png" alt="Health IQ"></a>
					</div>
					<div class="flex-col col-2">
						<div class="modal-cont">
							<div class="title"><a target="_blank" href="https://www.noexam.com/out/health-iq-2.php">Health IQ Life Insurance</a></div>
							<ul class="list">
								<li>Best for Active People</li>
								<li>Cheaper Rates if You Exercise Often</li>
								<li>Online Application</li>
							</ul>
						</div>
						<!--<a class="a-link read-review" href="#">Read full review</a>-->
					</div>
					<div class="flex-col col-3 text-center">
						<a target="_blank" href="https://www.noexam.com/out/health-iq-2.php" role="button" class="view-rates btn btn-quote">More Info</a>
						<a href="#" class="a-link learn-more" data-toggle="modal" data-target="#lpModal">Learn more</a>
					</div>
				</div>
			</div>

		</div>
	</section>

</div>
<!-- Modal -->
<div class="lpModal modal fade" id="lpModal" tabindex="-1" role="dialog" aria-labelledby="lpModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="lpModalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<a role="button" class="btn btn-quote btn-modal" data-dismiss="-modal" href="#">View Rates</a>
			</div>
		</div>
	</div>
</div>
<!-- Toster -->
<div class="toster hideme trans_me" data-template="<b>{peoples-count}</b> people selected <b>{company-name} Insurance</b> today">
	<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<img class="icon_cf" src="/img/icon_confetti.svg">
	<div class="text"></div>
</div>
