<section id="aig" class="company-card">
	<header>
		<?=Yii::$app->Helpers->getImage(['class' => 'logo', 'src' => '/img/company_logos/aig-big.png', 'alt' => 'aig logo', 'from_cdn' => $assets_from_cdn, 'lazyload' => $assets_lazyload]);?>
		<div class="info">
			<h2 class="title">AIG</h2>
		</div>
	</header>
	<div>
		<p>Operating since 1919, <a href="https://www.noexam.com/life-insurance/companies/aig/">AIG life insurance</a> is one of the largest life insurance companies today. Located in New York City, AIG is available in as many as 80 countries. The company offers a wide arrange of products from term to final expense. AIG has over $70 billion in assets(<a href="#2">2</a>) and is rated as A (Excellent) from AM Best(<a href="#3">3</a>). Like the other companies on this list, AIG's financial strength and competitive pricing earn them the second spot on our list.</p>
	</div>
	<div class="rates">
		<div>
			<?php //=Yii::$app->Helpers->getImage(['class' => 'logo-s', 'src' => '/img/company_logos/logo_am_best.png', 'alt' => 'am best', 'from_cdn' => true, 'lazyload' => true]);?>
			<span>AM Best: A</span>
		</div>
		<div>
			<?php //=Yii::$app->Helpers->getImage(['class' => 'logo-s', 'src' => '/img/company_logos/logo_standard_poor.png', 'alt' => 'standard & poor', 'from_cdn' => true, 'lazyload' => true]);?>
			<span>Standard & Poor’s: A+</span>
		</div>
		<div>
			<?php //=Yii::$app->Helpers->getImage(['class' => 'logo-s', 'src' => '/img/company_logos/logo_moodys.png', 'alt' => 'moodys', 'from_cdn' => true, 'lazyload' => true]);?>
			<span>Moody’s: A2</span>
		</div>
		<div>
			<?php //=Yii::$app->Helpers->getImage(['class' => 'logo-s', 'src' => '/img/company_logos/logo_fitch.png', 'alt' => 'fitch', 'from_cdn' => true, 'lazyload' => true]);?>
			<span>Fitch Ratings: A+</span>
		</div>
	</div>
	<footer>
		<div class="row">
			<div class="col-lg-2 col-md-1 col-sm-12 col-xs-12"></div>
			<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 pros">
				<div class="sub-title">Pros</div>
				<ul class="list">
					<li>Great Financials</li>
					<li>Online Application</li>
					<li>Wide Selection of Products</li>
					<li>Global Presence</li>
				</ul>
			</div>
			<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 cons">
				<div class="sub-title">Cons</div>
				<ul class="list">
					<li>None</li>

				</ul>
			</div>
			<div class="col-lg-2 col-md-1 col-sm-12 col-xs-12"></div>
		</div>
		<a role="button" class="btn btn-quote" href="/out/aig.php">Get a Quote</a>
	</footer>
</section>
