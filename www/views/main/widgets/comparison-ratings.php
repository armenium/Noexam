<?php
use app\models\ResourcesCompanies;
use yii\helpers\Html;

$cc = new ResourcesCompanies();
$comparison_companies = $cc->getCompaniesWithSlug();
$compare_data = Yii::$app->controller->getComparisonCompaniesData2($company_1_id, $company_2_id);

if(empty($compare_data['companies'])){
	return '';
}

$ratings_ordering = [];
$compant_getauote_link = [];
foreach($compare_data['companies'] as $k => $company){
	switch($company['slug']){
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
		'am_best'       => ['title' => 'AM Best', 'rating' => $company['am_best'], 'logo' => '/img/company_logos/logo_%s.png'],
		'bbb'           => ['title' => 'Better Business Bureau', 'rating' => $company['bbb'], 'logo' => '/img/company_logos/logo_%s.png'],
		'jd_power'      => ['title' => 'J.D. Power', 'rating' => $company['jd_power'], 'logo' => '/img/company_logos/logo_%s.png'],
		'moodys'        => ['title' => "Moody's", 'rating' => $company['moodys'], 'logo' => '/img/company_logos/logo_%s.png'],
		'fitch'         => ['title' => 'FitchRatings', 'rating' => $company['fitch'], 'logo' => '/img/company_logos/logo_%s.png'],
		'standard_poor' => ['title' => "Standard & Poor's", 'rating' => $company['standard_poor'], 'logo' => '/img/company_logos/logo_%s.png'],
		'comdex_score'  => ['title' => 'Comdex', 'rating' => $company['comdex_score'], 'logo' => '/img/company_logos/logo_%s.png'],
	];
}

?>
<section class="comparison-result single">


	<main id="at-a-glance">
		<div class="row bom">

			<?php foreach($compare_data['companies'] as $k => $company):?>
				<input type="hidden" value="<?=$company['slug'];?>" class="comparison-company slug-<?=$k?>" data-num="<?=$k?>">
				<?php $col_class = $k == 1 ? 'col-left' : 'col-right';?>
				<div id="company_<?=$k;?>" class="col-xs-6 <?=$col_class;?>">
					<ul class="inner">
						<li class="top logo">
							<img class="main" src="<?=$company['logo'];?>" alt="<?=$company['title'];?>">
							<?php if(empty($company['logo'])):?>
							<div class="tmp-title"><?=$company['title'];?></div>
							<?php endif;?>
						</li>
						<li class="control text-center">
							<?php
							$ddl_options = ['class' => 'selectpicker', 'id' => 'insurance_company'.$k, 'data-style' => 'btn-info', 'data-title' => 'Select a company', 'data-col' => $k];
							if(!empty($company['slug'])){
								$ddl_options['disabled'] = 'disabled';
							}
							?>
							<?=Html::dropDownList('insurance_company'.$k, $company['slug'], $comparison_companies, $ddl_options);?>
						</li>
						<?php foreach($ratings_ordering[$k] as $i => $rating_data):?>
						<li class="top">
							<div class="company-title hidden-sm hidden-md hidden-lg"><?=$rating_data['title'];?></div>
							<div class="df">
							<div class="fl fx">
								<img class="company-brand" src="<?=sprintf($rating_data['logo'], $i);?>" alt="<?=$rating_data['title'];?>">
							</div>
							<div class="<?=$i;?> fr fx no-bold text-right">
								<div class="company-rating">&nbsp;<?=$rating_data['rating'];?></div>
								<div class="company-title hidden-xs"><?=$rating_data['title'];?></div>
							</div>
							</div>
						</li>
						<?php endforeach;?>
					</ul>
				</div>
				<?php if($k == 1):?>
					<div class="vs"></div>
				<?php endif;?>
			<?php endforeach;?>

		</div>
		<div class="row nom">
			<div class="col-md-12 text-center full-comp">
				<?=$compare_data['compare_link']->link;?>
			</div>
		</div>
	</main>

</section>
