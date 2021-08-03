<section id="havenlife" class="company-card">
	<header>
		<?=Yii::$app->Helpers->getImage(['class' => 'logo', 'src' => '/img/company_logos/logo_haven_life2.png', 'alt' => 'haven life logo', 'from_cdn' => $assets_from_cdn, 'lazyload' => $assets_lazyload]);?>
		<div class="info">
			<h2 class="title">Haven Life</h2>
		</div>
	</header>
	<div>
		<p>Mass Mutual, who owns Haven Life, is one of the most reputable life insurance providers in business today. They have been around for 160 years, and are one of the envied few that hold a "Superior" financial rating from AM Best(<a href="#1">1</a>). This rating is only for companies with the strongest finances.</p>
		<p>Mass Mutual introduced Haven Life in 2013 to meet the needs of modern consumers. Haven Life insurance leverages modern technology to bring consumers competitive pricing. Their technology combined with Mass Mutual's financial strength create a superior buying experience.</p>
		<p>There is no need to invite an agent into your home. Haven Life allows customers to buy life insurance online. If you are in good health you are even able to skip the medical exam.</p>
	</div>
	<div class="rates">
		<div>
			<?php //=Yii::$app->Helpers->getImage(['class' => 'logo-s', 'src' => '/img/company_logos/logo_am_best.png', 'alt' => 'am best', 'from_cdn' => $assets_from_cdn, 'lazyload' => $assets_lazyload]);?>
			<span>AM Best: A++</span>
		</div>
		<div>
			<?php //=Yii::$app->Helpers->getImage(['class' => 'logo-s', 'src' => '/img/company_logos/logo_standard_poor.png', 'alt' => 'standard & poor', 'from_cdn' => $assets_from_cdn, 'lazyload' => $assets_lazyload]);?>
			<span>Standard & Poor’s: AA+</span>
		</div>
		<div>
			<?php //=Yii::$app->Helpers->getImage(['class' => 'logo-s', 'src' => '/img/company_logos/logo_moodys.png', 'alt' => 'moodys', 'from_cdn' => $assets_from_cdn, 'lazyload' => $assets_lazyload]);?>
			<span>Moody’s: Aa3</span>
		</div>
		<div>
			<?php //=Yii::$app->Helpers->getImage(['class' => 'logo-s', 'src' => '/img/company_logos/logo_fitch.png', 'alt' => 'fitch', 'from_cdn' => $assets_from_cdn, 'lazyload' => $assets_lazyload]);?>
			<span>Fitch Ratings: AA+</span>
		</div>
	</div>
	<footer>
		<div class="row">
			<div class="col-lg-2 col-md-1 col-sm-12 col-xs-12"></div>
			<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 pros">
				<div class="sub-title">Pros</div>
				<ul class="list">
					<li>Competitive Prices</li>
					<li>Online Application</li>
					<li>Fast Decision</li>
					<li>Strong Financial Ratings</li>
					<li>Can Bypass Exam if in Good Health</li>
				</ul>
			</div>
			<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 cons">
				<div class="sub-title">Cons</div>
				<ul class="list">
					<li>Only Offers Term Products</li>

				</ul>
			</div>
			<div class="col-lg-2 col-md-1 col-sm-12 col-xs-12"></div>
		</div>
		<a role="button" class="btn btn-quote" href="/out/haven.php">Get a Quote</a>
	</footer>
</section>
