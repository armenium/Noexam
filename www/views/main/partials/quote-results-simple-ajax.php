<?php

$avg_amount = number_format($request['avg_amount'], 0, '', ',');
$health     = str_replace('-', ' ', $request['health']);
if($health == 'none'){
	$health = 'fair';
}
$gender = $request['sex'] == 'm' ? 'man' : 'woman';

$plans = [
	'haven_life'       => ['logo_url' => '/img/company_logos/logo_haven_life.png', 'company_name' => 'HavenLife', 'link' => '/out/haven.php'],
	'ladder'           => ['logo_url' => '/img/company_logos/logo_ladder.png', 'company_name' => 'Ladder', 'link' => '/out/ladder.php'],
	'american_general' => ['logo_url' => '/img/company_logos/logo_aig.png', 'company_name' => 'American General Life Insurance', 'link' => '/out/aig.php'],
	'health_iq'        => ['logo_url' => '/img/company_logos/logo_health_iq.png', 'company_name' => 'Health IQ', 'link' => '/out/quotes.php'],
	'legal_general'    => ['logo_url' => '/img/company_logos/logo_legal_general.png', 'company_name' => 'Legal & General America', 'link' => '/out/quotes.php'],
	'prudential'       => ['logo_url' => '/img/company_logos/logo_prudential.png', 'company_name' => 'Prudential Financial', 'link' => '/out/quotes.php'],
	'mutual_omaha'     => ['logo_url' => '/img/company_logos/logo_mutual_omaha.png', 'company_name' => 'Mutual Of Omaha Insurance Company', 'link' => '/out/quotes.php'],
	'transamerica'     => ['logo_url' => '/img/company_logos/logo_transamerica.png', 'company_name' => 'Transamerica Life Insurance', 'link' => '/out/quotes.php'],
];

if($request['answer'] == 'yes'){
	$a = $plans['health_iq'];
	unset($plans['health_iq']);
	array_unshift($plans, $a);
}

?>
<?php /*
<div class="rate-calc-desc text-center inner">
	The following rates are for a <span class="gt"><?=$request['age'];?> year old</span> <span class="gt"><?=$gender;?></span> in <span class="gt"><?=$health;?> health</span> looking for a <span class="gt"><?=$request['term_length'];?></span> year <span class="gt">$<?=$avg_amount;?></span> term life policy.
</div>
*/?>
<section class="quote-results-float inner">

	<div class="plans">
		<div class="row header-row">
			<div class="item">
				<div class="col-sm-9 col-xs-7 text-left">Company</div>
				<div class="col-sm-3 col-xs-5 text-center">Price</div>
			</div>
		</div>
		<?php foreach($plans as $company => $data): ?>
			<div class="row">
				<div class="item">
					<div class="col-sm-9 col-xs-7 text-left">
						<div class="company-logo"><img src="<?=$data['logo_url'];?>" alt="<?=$data['company_name'];?>"></div>
					</div>
					<div class="col-sm-3 col-xs-5 text-center">
						<a href="<?=$data['link'];?>" target="_blank" role="button" class="btn btn-info-o btn-lg btn-apply">View Rates</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

</section>

