<?php

use app\models\CustomerData;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;

$customer_data = new CustomerData();

$avg_amount = number_format($request['avg_amount'], 0, '', ',');
$age = $request['age'];
$health = str_replace('-', ' ', $request['health']);
if($health == 'none'){
	$health = 'fair';
}
$term = $request['term_length'];
$gender = $request['sex'] == 'm' ? 'man' : 'woman';
$i=0;
?>
<?php if(isset($guessing_statistic_type)):?>
	<?php if(!empty($guessing_statistic)):?>
		<?php if($guessing_statistic_type == 'short'):?>
		<div class="rate-calc-desc text-center inner">
			<?=sprintf('You guessed <span class="bt">%1$s</span> than the actual average price. Out of <span class="bt">%2$d people</span> who guessed a price, <span class="bt">%3$d%%</span> guessed too high!', $guessing_statistic[0], $guessing_statistic[1], $guessing_statistic[2]);?>
		</div>
		<?php elseif($guessing_statistic_type == 'detail'):?>
			<?php
				$count = count($guessing_statistic['generations']);
				$md_cols = $sm_cols = $xs_cols = $count > 0 ? floor(12 / $count) : 12;
				switch($count){
					case 1:
						$md_cols = $sm_cols = $xs_cols = 12;
						break;
					case 2:
						$md_cols = $sm_cols = $xs_cols = 6;
						break;
					case 3:
						$md_cols = $sm_cols = $xs_cols = 12;
						break;
					case 4:
						$md_cols = 3;
						$sm_cols = 6;
						$xs_cols = 12;
						break;
				}
			?>
			<canvas id="mainChart" class="inner main-chart"></canvas>
			<script type="text/javascript">
				var ctx_data = {
					"labels": ["<?=$guessing_statistic['main']['high'];?>% of participants that guessed too high", "<?=$guessing_statistic['main']['low'];?>% of participants that guessed too low"],
					"datasets": [{
						"label": "",
						"data": <?=json_encode([$guessing_statistic['main']['high'], $guessing_statistic['main']['low']]);?>,
						"backgroundColor": ["#9ad69a", "#a4d2dd"],
						"hoverBorderColor": "#fff"
					}]
				};
				var ctx_options = {
					legend:{
						position: "bottom",
						fullWidth: true,
						labels: {padding: 10,fontColor: "#666",fontSize: 14, usePointStyle: true}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 0,
							bottom: 0
						},
					},
					tooltips: {
						callbacks: {
							label: function(item, data) {
								return getTootipValue(item, data);
							}
						}
					}
				};
				new Chart($('#mainChart'), {type: 'doughnut', data: ctx_data, options: ctx_options});
				var ctx_options2 = {
					legend:{
						position: "bottom",
						fullWidth: true,
						labels: {
							padding: 10,fontColor: "#666",fontSize: 12, usePointStyle: true,
							/*generateLabels: function(chart){
								console.log(chart.data.labels);
								var data = chart.data;
								if (data.labels.length && data.datasets.length) {
									return data.labels.map(function(label, i) {
										var meta = chart.getDatasetMeta(0);
										var ds = data.datasets[0];

										return {
											text: '<div>'+label+'</div>',
											hidden: isNaN(ds.data[i]) || meta.data[i].hidden,

											// Extra data used for toggling the correct item
											index: i
										};
									});
								}
								return [];

							}*/
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 0,
							bottom: 0
						},
					},
					legendCallback: function(legendItem) {
						console.log(legendItem);
					},
					tooltips: {
						mode: 'index',
						callbacks: {
							label: function(item, data) {
								return getTootipValue(item, data);
							}
						}
					},
					title: {display: true, text:''},
					maintainAspectRatio:false
				};
				function getTootipValue(item, data){
					return ' '+data.datasets[0].data[item.index] + '%';
				}
			</script>
			<div class="charts-content">
				<div class="row">
				<?php if(!empty($guessing_statistic['generations'])):?>
					<?php foreach($guessing_statistic['generations'] as $generation => $generation_data):?>
						<?php $id = str_replace(' ', '', $generation);?>
						<div class="col-md-<?=$md_cols;?> col-sm-<?=$sm_cols;?> col-xs-<?=$xs_cols;?> doughnut-chart">
							<canvas id="generationChart_<?=$id;?>" height="200"></canvas>
						</div>
						<script type="text/javascript">
							ctx_options2.title.text = "<?=$generation?>";
							var ctx_data = {
								labels: ["<?=$generation_data['high'];?>% guessed too high", "<?=$generation_data['low'];?>% guessed too low"],
								datasets: [{
									data: <?=json_encode([$generation_data['high'], $generation_data['low']]);?>,
									backgroundColor: ["#9ad69a", "#a4d2dd"],
									hoverBorderColor: "#fff"
								}]
							};
							new Chart($('#generationChart_<?=$id;?>'), {type: 'doughnut', data: ctx_data, options: ctx_options2});
						</script>
					<?php endforeach;?>
				<?php endif;?>
				</div>
			</div>
			<?php #VarDumper::dump($guessing_statistic, 10, 1);?>
		<?php endif;?>
	<?php endif;?>
<?php endif;?>
<div class="rate-calc-desc text-center inner">
	<?php if($display_default_desc):?>
		The following rates can be customized and this is instructional text for the user.
	<?php else:?>
		The following rates are for a <span class="gt"><?=$age;?> year old</span> <span class="gt"><?=$gender;?></span> in <span class="gt"><?=$health;?> health</span> looking for a <span class="gt"><?=$term;?></span> year <span class="gt">$<?=$avg_amount;?></span> term life policy.
	<?php endif;?>
</div>
<?php #VarDumper::dump($apis_data, 10, 1);?>
<section class="quote-results-float inner">
	<?php if($plans['total_plans_count'] > 0):?>

		<div class="plans">
			<div class="row header-row">
				<div class="item">
					<div class="col-xs-4">Company</div>
					<div class="col-xs-3">Price</div>
					<div class="col-xs-5"></div>
				</div>
			</div>
			<?php foreach($plans['plans'] as $company => $data): $i++?>
				<?php if(!empty($data)):?>
					<?php
						$term = $data['term_length'];
						$rate_class_name = $data['rate_class_name'];
					?>
					<?php $form = ActiveForm::begin(['id' => 'quote-result-form-'.$company.'-'.$term, 'action' => '/post/', 'options' => ['class' => 'quote-result-form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
					<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'quote-result', 'id' => ''])->label(false);?>
					<?=$form->field($customer_data, 'term_length')->hiddenInput(['value' => $term, 'id' => ''])->label(false);?>
					<?=$form->field($customer_data, 'rate_class')->hiddenInput(['value' => $rate_class_name, 'id' => ''])->label(false);?>
					<?=$form->field($customer_data, 'monthly_premium')->hiddenInput(['value' => $data['premium_monthly'], 'id' => ''])->label(false);?>
					<?=$form->field($customer_data, 'premium_amount')->hiddenInput(['value' => $data['premium_annual'], 'id' => ''])->label(false);?>
					<?=$form->field($customer_data, 'company_code')->hiddenInput(['value' => $data['company_code'], 'id' => ''])->label(false);?>
					<?=$form->field($customer_data, 'company_name')->hiddenInput(['value' => $data['company_name'], 'id' => ''])->label(false);?>
					<?=$form->field($customer_data, 'product_code')->hiddenInput(['value' => $data['product_code'], 'id' => ''])->label(false);?>
					<?=$form->field($customer_data, 'product_name')->hiddenInput(['value' => $data['product_name'], 'id' => ''])->label(false);?>
					<div class="row">
						<div class="item">
						<div class="col-xs-4 text-center">
							<div class="company-logo"><img src="<?=$data['logo_url'];?>" alt="<?=$data['company_name'];?>"></div>
						</div>
						<div class="col-xs-3">
							<div class="price">$<?=number_format($data['premium_monthly'], 2, '.', ',');?></div>
						</div>
						<div class="col-xs-5 text-right">
							<a href="<?=$data['ext_link'];?>" target="_blank" id="applynow_<?=$i;?>" type="submit" role="button" class="btn btn-info-o btn-lg btn-apply">More Info</a>
						</div>
						</div>
					</div>
					<?php ActiveForm::end();?>
				<?php endif;?>
			<?php endforeach;?>
		</div>

	<?php else:?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger">
					<strong>Sorry, but we could not find the appropriate plan for you.</strong>
				</div>
			</div>
		</div>
	<?php endif;?>
</section>

