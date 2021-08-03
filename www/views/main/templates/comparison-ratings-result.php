<?php
$ratings_ordering = [];
$compant_getauote_link = [];
foreach($compare_data['companies'] as $k => $company){
	switch($company->slug){
		/*case "banner":
			$compant_getauote_link[$k] = "http://partners.noexam.com/lga";
			break;*/
		case "haven":
			$compant_getauote_link[$k] = "/out/haven.php";
			break;
		case "ladder":
			$compant_getauote_link[$k] = "/out/ladder.php";
			break;
		case "ethos":
			$compant_getauote_link[$k] = "/out/ethos.php";
			break;
		default:
			$compant_getauote_link[$k] = "/out/quotes.php";
			break;
	}
	$ratings_ordering[$k] = [
		'am_best'       => ['title' => 'AM Best', 'rating' => $company->am_best, 'logo' => '/img/company_logos/logo_%s.png'],
		'bbb'           => ['title' => 'Better Business Bureau', 'rating' => $company->bbb, 'logo' => '/img/company_logos/logo_%s.png'],
		'jd_power'      => ['title' => 'J.D. Power', 'rating' => $company->jd_power, 'logo' => '/img/company_logos/logo_%s.png'],
		'moodys'        => ['title' => "Moody's", 'rating' => $company->moodys, 'logo' => '/img/company_logos/logo_%s.png'],
		'fitch'         => ['title' => 'FitchRatings', 'rating' => $company->fitch, 'logo' => '/img/company_logos/logo_%s.png'],
		'standard_poor' => ['title' => "Standard & Poor's", 'rating' => $company->standard_poor, 'logo' => '/img/company_logos/logo_%s.png'],
		'comdex_score'  => ['title' => 'Comdex', 'rating' => $company->comdex_score, 'logo' => '/img/company_logos/logo_%s.png'],
	];
}

?>
<section class="comparison-result">


	<main id="at-a-glance">
		<div class="row bom">

			<?php foreach($compare_data['companies'] as $k => $company):?>
				<?php $col_class = $k == 0 ? 'col-left' : 'col-right';?>
				<div class="col-xs-6 <?=$col_class;?>">
					<ul class="inner">
						<li class="top logo"><img src="<?=$company->logo;?>" alt="<?=$company->title;?>"></li>
						<?php foreach($ratings_ordering[$k] as $i => $rating_data):?>
						<li class="top">
							<div class="company-title hidden-sm hidden-md hidden-lg"><?=$rating_data['title'];?></div>
							<div class="df">
							<div class="fl fx">
								<img class="company-brand" src="<?=sprintf($rating_data['logo'], $i);?>" alt="<?=$rating_data['title'];?>">
							</div>
							<div class="fr fx no-bold text-right">
								<div class="company-rating"><?=$rating_data['rating'];?></div>
								<div class="company-title hidden-xs"><?=$rating_data['title'];?></div>
							</div>
							</div>
						</li>
						<?php endforeach;?>
						<!--<li class="button-row">
							<a role="button" class="btn btn-quote" href="<?=$compant_getauote_link[$k];?>">Get a Quote</a>
						</li>-->
					</ul>
				</div>
				<?php if($k == 0):?>
					<div class="vs"></div>
				<?php endif;?>
			<?php endforeach;?>

		</div>
		<div class="row nom">
			<div class="col-md-12 text-center full-comp">
				<a href="/life-insurance/companies/<?=$compare_data['companies'][0]->slug;?>-vs-<?=$compare_data['companies'][1]->slug;?>/">See Full Comparison of <?=$compare_data['companies'][0]->title;?> vs <?=$compare_data['companies'][1]->title;?></a>
			</div>
		</div>
	</main>
	<footer class="so">
		<div class="row">
			<div class="col-md-12">
				<a role="button" class="btn btn-quote start-over" href="#compare-form">Start Over</a>
			</div>
		</div>
	</footer>

</section>
