<?php

use yii\helpers\VarDumper;

$source_data = Yii::$app->controller->getRateCalcEntries(['by' => 'generation', 'for' => $for]);
$for_arr = Yii::$app->controller->generate_for_arr($for);

$display_twice = count($for_arr) == 1 ? false : true;
$Axis_label_style = 'multi'; // single | multi
$wordwrap_limit = 15;
$chart_data = [];

foreach($source_data as $type => $type_data){
	$min_max_a = [];
	foreach($type_data as $k => $data){
		$data['ins_company_name'] = wordwrap($data['ins_company_name'], $wordwrap_limit);
		if($Axis_label_style == 'multi'){
			$data['ins_company_name'] = explode("\n", $data['ins_company_name']);
		}
		$chart_data[$type]['labels'][] = $data['ins_company_name'];
		$chart_data[$type]['data'][] = floatval($data['avg_monthly_price']);
		$min_max_a[$type][] = floatval($data['avg_monthly_price']);
	}
	$min[$type] = floor(round(min($min_max_a[$type])-10) / 10) * 10;
	$max[$type] = floor(round(max($min_max_a[$type])+10) / 10) * 10;
}
if($display_twice){
	$mm = Yii::$app->controller->min_max_stabilization($min, $max);
	$min = $mm['min'];
	$max = $mm['max'];
}

$chart_data = Yii::$app->controller->generate_charts_pie_colors($chart_data);
?>
<div class="lowest-prices-by-gender widget trans_all text-center">

	<?php foreach($for_arr as $g => $n):?>
		<?php $title = "";?>
		<?php if($display_twice):?>
			<?php $title = $n;?>
			<div class="col-sm-6">
		<?php endif;?>
		<div class="chart-wrap">
			<canvas id="barChart_<?=$g;?>" class="bar-chart"
			        data-title="<?=$title;?>"
			        data-label=""
			        data-min="<?=$min[$g];?>"
			        data-max="<?=$max[$g];?>"
			        data-backgroundcolors='<?=json_encode($chart_data['backgroundColor']);?>'
			        data-bordercolors='<?=json_encode($chart_data['borderColor']);?>'
			        data-labels='<?=json_encode($chart_data[$g]['labels']);?>'
			        data-data='<?=json_encode($chart_data[$g]['data']);?>'>
			</canvas>
		</div>
		<?php if($display_twice):?>
			</div>
		<?php endif;?>
	<?php endforeach;?>

</div>
