<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;
use yii\widgets\Breadcrumbs;

$enter = chr(13).chr(10);
//VarDumper::dump($compare_data['companies'], 10, 1);

$types_of_insurance_0 = explode($enter, $compare_data['companies'][0]['types_of_insurance']);
$types_of_insurance_1 = explode($enter, $compare_data['companies'][1]['products_offered']);
$c = count($types_of_insurance_0) > count($types_of_insurance_1) ? count($types_of_insurance_0) : count($types_of_insurance_1);
for($i = 0; $i < $c; $i++){
	$types_of_insurance[$i][0] = $types_of_insurance_0[$i];
	$types_of_insurance[$i][1] = $types_of_insurance_1[$i];
}

$products_offered_0 = explode($enter, $compare_data['companies'][0]['products_offered']);
$products_offered_1 = explode($enter, $compare_data['companies'][1]['products_offered']);
$c = count($products_offered_0) > count($products_offered_1) ? count($products_offered_0) : count($products_offered_1);
for($i = 0; $i < $c; $i++){
	$products_offered[$i][0] = $products_offered_0[$i];
	$products_offered[$i][1] = $products_offered_1[$i];
}

$riders_available_0 = explode($enter, $compare_data['companies'][0]['riders_available']);
$riders_available_1 = explode($enter, $compare_data['companies'][1]['riders_available']);
$c = count($riders_available_0) > count($riders_available_1) ? count($riders_available_0) : count($riders_available_1);
for($i = 0; $i < $c; $i++){
	$riders_available[$i][0] = $riders_available_0[$i];
	$riders_available[$i][1] = $riders_available_1[$i];
}
//VarDumper::dump($riders_available, 10, 1);

$robot_meta_vlues = [];
if($compare_data['compare_content']->no_index)
	$robot_meta_vlues[] = 'noindex';
if($compare_data['compare_content']->no_follow)
	$robot_meta_vlues[] = 'nofollow';
if(!empty($robot_meta_vlues)){
	$this->registerMetaTag(['name' => 'robots', 'content' => implode(',', $robot_meta_vlues)]);
}

$this->registerMetaTag(['name' => 'description', 'content' => $compare_data['compare_content']->content]);
if(!empty($compare_data['compare_content']->meta_keys)){
	$this->registerMetaTag(['name' => 'keywords', 'content' => $compare_data['compare_content']->meta_keys]);
}
$this->title = $compare_data['compare_content']->title;
$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/'];
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => '/life-insurance/companies/'];
$this->params['breadcrumbs'][] = $compare_data['compare_content']->title;

$content = !empty($compare_data['compare_content']->content) ? '<p>'.str_replace($enter, '</p><p>', $compare_data['compare_content']->content).'</p>' : '';
?>
	<section class="comparison-result">

		<header>
			<h1 class="title"><?=$compare_data['compare_content']->title;?></h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<div class="clearfix mb10"></div>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>
			<div class="desc uniqu"><?=$content;?></div>
			<ul class="short-links hidden visible-xs">
				<li><a href="#at-a-glance">At a glance</a></li>
				<li><a href="#financial-ratings">Financial Ratings</a></li>
				<li><a href="#financial-status">Financial Status</a></li>
				<li><a href="#types-of-insurance">Types of Insurance</a></li>
				<li><a href="#products-offered">Products Offered</a></li>
				<li><a href="#riders-available">Riders Available</a></li>
			</ul>
		</header>

		<main id="at-a-glance">
			<div class="row">

				<?php foreach($compare_data['companies'] as $k => $company):?>
					<?php $col_class = $k == 0 ? 'col-left' : 'col-right';?>
					<?php $phone_link = !empty($company->phone) ? 'tel:+'.str_replace(['-', '+', ' ', '(', ')'], '', $company->phone) : '';?>
					<div class="col-xs-6 <?=$col_class;?>">
						<ul class="inner">
							<li class="top logo"><img src="<?=$company->logo;?>" alt="<?=$company->title;?>"></li>
							<li class="top half l">
								<div class="icon_web"><a href="<?=$company->website;?>" target="_blank">Website</a></div>
							</li>
							<li class="top half r">
								<div class="fr icon_phone"><a href="<?=$phone_link;?>"><?=$company->phone;?></a></div>
							</li>
							<li class="top cell icon_flag">
								<div class="fl">YEAR FOUNDED</div>
								<div class="fr"><?=$company->year_founded;?></div>
							</li>
							<li class="top cell icon_user">
								<div class="fl">CURRENT CEO</div>
								<div class="fr"><?=$company->current_ceo;?></div>
							</li>
							<li class="top cell icon_check">
								<div class="fl">AVAILABLE</div>
								<div class="fr"><?=$company->available;?></div>
							</li>
							<li class="top cell icon_marker">
								<div class="fl">ADDRESS</div>
								<div class="fr"><?=$company->address;?></div>
							</li>
							<li class="top cell icon_award">
								<div class="fl">TOP AWARDS</div>
								<div class="fr">
									<?php if(!empty($company->top_awards)):?>
										<p><?=str_replace($enter, '</p><p>', trim($company->top_awards, $enter));?></p>
									<?php endif;?>
								</div>
							</li>
							<li class="top cell icon_pros">
								<div class="lb">PROS</div>
								<div>
									<ul>
										<?php if(!empty($company->pros)):?>
											<li><?=str_replace($enter, '</li><li>', trim($company->pros, $enter));?></li>
										<?php endif;?>
									</ul>
								</div>
							</li>
							<li class="top cell icon_cons">
								<div class="lb">CONS</div>
								<div>
									<ul>
										<?php if(!empty($company->cons)):?>
											<li><?=str_replace($enter, '</li><li>', trim($company->cons, $enter));?></li>
										<?php endif;?>
									</ul>
								</div>
							</li>
						</ul>
					</div>
					<?php if($k == 0):?>
						<div class="vs"></div>
					<?php endif;?>
				<?php endforeach;?>

			</div>
		</main>

		<footer>

			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

				<div id="financial-ratings" class="panel item">
					<div class="list-header" role="tab" id="heading_1">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_1" aria-expanded="false" aria-controls="collapse_1">Financial Ratings</a>
					</div>
					<div id="collapse_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_1">
						<div class="list-detail">
							<table class="table">
								<thead>
								<tr>
									<th width="100%">SOURCE</th>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<th><img src="<?=$company->logo;?>" alt="<?=$company->title;?>"></th>
									<?php endforeach;?>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>JD Power</td>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<td class="b g"><?=$company->jd_power;?></td>
									<?php endforeach;?>
								</tr>
								<tr>
									<td>BBB</td>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<td class="b g"><?=$company->bbb;?></td>
									<?php endforeach;?>
								</tr>
								<tr>
									<td>AM Best</td>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<td class="b g"><?=$company->am_best;?></td>
									<?php endforeach;?>
								</tr>
								<tr>
									<td>Moody's</td>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<td class="b g"><?=$company->moodys;?></td>
									<?php endforeach;?>
								</tr>
								<tr>
									<td>Fitch</td>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<td class="b g"><?=$company->fitch;?></td>
									<?php endforeach;?>
								</tr>
								<tr>
									<td>Standard & Poor</td>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<td class="b g"><?=$company->standard_poor;?></td>
									<?php endforeach;?>
								</tr>
								<tr>
									<td>Comdex Score</td>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<td class="b g"><?=$company->comdex_score;?></td>
									<?php endforeach;?>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div id="financial-status" class="panel item">
					<div class="list-header" role="tab" id="heading_2">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_2" aria-expanded="false" aria-controls="collapse_2">Financial Status</a>
					</div>
					<div id="collapse_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_2">
						<div class="list-detail">
							<table class="table">
								<thead>
								<tr>
									<th>SOURCE</th>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<th><img src="<?=$company->logo;?>" alt="<?=$company->title;?>"></th>
									<?php endforeach;?>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>Total Assets</td>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<td class="b"><?=$company->total_assets;?></td>
									<?php endforeach;?>
								</tr>
								<tr>
									<td>Life Insurance in Force</td>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<td class="b"><?=$company->life_insurance_in_force;?></td>
									<?php endforeach;?>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div id="types-of-insurance" class="panel item">
					<div class="list-header" role="tab" id="heading_3">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_3" aria-expanded="false" aria-controls="collapse_3">Types of Insurance</a>
					</div>
					<div id="collapse_3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_3">
						<div class="list-detail">
							<table class="table col2">
								<thead>
								<tr>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<th><img src="<?=$company->logo;?>" alt="<?=$company->title;?>"></th>
									<?php endforeach;?>
								</tr>
								</thead>
								<tbody>
								<?php foreach($types_of_insurance as $k => $v):?>
									<tr>
										<td class="b">
											<?=implode('</td><td class="b">', $v);?>
										</td>
									</tr>
								<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div id="products-offered" class="panel item">
					<div class="list-header" role="tab" id="heading_4">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_4" aria-expanded="false" aria-controls="collapse_4">Products Offered</a>
					</div>
					<div id="collapse_4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_4">
						<div class="list-detail">
							<table class="table col2">
								<thead>
								<tr>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<th><img src="<?=$company->logo;?>" alt="<?=$company->title;?>"></th>
									<?php endforeach;?>
								</tr>
								</thead>
								<tbody>
								<?php foreach($products_offered as $k => $v):?>
									<tr>
										<td class="b">
											<?=implode('</td><td class="b">', $v);?>
										</td>
									</tr>
								<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div id="riders-available" class="panel item">
					<div class="list-header" role="tab" id="heading_5">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_5" aria-expanded="false" aria-controls="collapse_5">Riders Available</a>
					</div>
					<div id="collapse_5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_5">
						<div class="list-detail">
							<table class="table col2">
								<thead>
								<tr>
									<?php foreach($compare_data['companies'] as $k => $company):?>
										<th><img src="<?=$company->logo;?>" alt="<?=$company->title;?>"></th>
									<?php endforeach;?>
								</tr>
								</thead>
								<tbody>
								<?php foreach($riders_available as $k => $v):?>
									<tr>
										<td class="b">
											<?=implode('</td><td class="b">', $v);?>
										</td>
									</tr>
								<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</footer>

	</section>
