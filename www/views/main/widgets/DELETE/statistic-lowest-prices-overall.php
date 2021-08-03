<?php

use yii\helpers\VarDumper;

$source_data = Yii::$app->controller->getRateCalcEntries(['by' => 'age']);
$Axis_label_style = 'multi'; // single | multi
$wordwrap_limit = 20;
$chart_data = [];
$min_max_a = [];
foreach($source_data as $k => $data){
	$data['ins_company_name'] = wordwrap($data['ins_company_name'], $wordwrap_limit);
	if($Axis_label_style == 'multi'){
		$data['ins_company_name'] = explode("\n", $data['ins_company_name']);
	}
	$chart_data['labels'][] = $data['ins_company_name'];
	$chart_data['data'][] = floatval($data['avg_monthly_price']);
	$min_max_a[] = floatval($data['avg_monthly_price']);
}
$min = floor(round(min($min_max_a)-10) / 10) * 10;
$max = floor(round(max($min_max_a)+10) / 10) * 10;
$chart_data = Yii::$app->controller->generate_charts_pie_colors($chart_data);
?>
<div class="lowest-prices-overall widget trans_all">
	<div class="chart-wrap">
		<canvas id="barChart_age" class="bar-chart"
		        data-title=""
		        data-label=""
		        data-min="<?=$min;?>"
		        data-max="<?=$max;?>"
		        data-backgroundcolors='<?=json_encode($chart_data['backgroundColor']);?>'
		        data-bordercolors='<?=json_encode($chart_data['borderColor']);?>'
		        data-labels='<?=json_encode($chart_data['labels']);?>'
		        data-data='<?=json_encode($chart_data['data']);?>'>
		</canvas>
	</div>
</div>
