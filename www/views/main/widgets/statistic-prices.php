<?php

use yii\helpers\VarDumper;
use app\models\CustomerData;

$source_data = Yii::$app->controller->getStatisticPrices(['data_type' => $data_type, 'by' => $by, 'for' => $for, 'age' => $age]);
#VarDumper::dump($source_data, 10, 1);
$chart_type_class = Yii::$app->controller->getChartTypeClass($data_type, $by);
$price_sign = "$";
$year_sign = "";
$tooltip_label_prefix = $tooltip_label_suffix = "";
$labelString = [];
$yAxis_labels = [];
if($data_type == 'best'){
	$number_rounding = 5;
	$price_gap = 5;
	$labelString['xAxes'] = "Insurance companies";
	$labelString['yAxes'] = "Value score";
	$price_sign = "";
}elseif($data_type == 'lowest'){
	$number_rounding = 10;
	$price_gap = 10;
	$labelString['xAxes'] = "Insurance companies";
	$labelString['yAxes'] = "Monthly rates";
}elseif($data_type == 'overall'){
	if($by == 'age_price'){
		$number_rounding = 10;
		$price_gap       = 10;
		$tooltip_label_prefix = "Avg price: ";
		$labelString['xAxes'] = "Age";
		$labelString['yAxes'] = "Price";
	}elseif($by == 'age_coverage'){
		$number_rounding = 0;
		$price_gap       = 0;
		$tooltip_label_prefix = "Avg amount: ";
		$labelString['xAxes'] = "Age";
		$labelString['yAxes'] = "Coverage amount";
	}elseif($by == 'age_term'){
		$number_rounding = 10;
		$price_gap       = 5;
		$price_sign = "";
		$year_sign = " yr";
		$tooltip_label_prefix = "Avg Term length: ";
		$tooltip_label_suffix = " years";
		$labelString['xAxes'] = "Age";
		$labelString['yAxes'] = "Term length";
	}elseif($by == 'age_health'){
		$yAxis_labels = [5 => 'Excellent', 4 => 'Very Good', 3 => 'Good', 2 => 'Fair', 1 => 'Fair'];
		$number_rounding = 0;
		$price_gap       = 1;
		$price_sign = "";
		$year_sign = "";
		$tooltip_label_prefix = "Health rating: ";
		$tooltip_label_suffix = "";
		$labelString['xAxes'] = "Age";
		$labelString['yAxes'] = "Health rating";
	}elseif($by == 'generation'){
		$number_rounding = 10;
		$price_gap       = 10;
		$labelString['xAxes'] = "Age";
		$labelString['yAxes'] = "Price";
		$tooltip_label_prefix = "Avg price: ";
	}
}elseif($data_type == 'counts'){
	$number_rounding = 500;
	$price_gap       = 500;
	$labelString['xAxes'] = "Age range";
	$labelString['yAxes'] = "People counter";
	$tooltip_label_prefix = "";
	$price_sign = "";
}
if($data_type == 'best' && $by == 'score'){
	$price_gap = 0.5;
	$number_rounding = 0;
}
$parsed_chart_data = Yii::$app->controller->parse_chart_data($data_type, $by, $source_data, 15, 'multi', $price_gap, $number_rounding);
$chart_data = Yii::$app->controller->generate_charts_pie_colors($parsed_chart_data['chart_data']);
if($data_type == 'counts'){
	#VarDumper::dump($chart_data, 10, 1);
}
$min = $parsed_chart_data['min'];
$max = $parsed_chart_data['max'];
$display_twice = false;
$single_title = "";
if(isset($for)){
	$for_arr = Yii::$app->controller->generate_for_labels($for);
	$display_twice = count($for_arr) == 1 ? false : true;
}else{
	if($data_type == 'overall'){
		$single_title = "Price";
	}
}
if($display_twice){
	if($data_type != 'overall' && $by != 'generation'){
		$mm = Yii::$app->controller->min_max_stabilization($min, $max);
		$min = $mm['min'];
		$max = $mm['max'];
	}
}
?>
<div class="statistic-prices widget trans_all text-center">
	<?php if(isset($for)):?>
		<?php foreach($for_arr as $g => $n):?>
			<?php $title = "";?>
			<?php if($display_twice):?>
				<?php $title = $n;?>
				<div class="col-sm-6 mb-5">
			<?php endif;?>
			<div class="chart-wrap">
				<canvas id="barChart_<?=$g;?>" class="<?=$chart_type_class;?>"
				        data-title="<?=$title;?>"
				        data-label=""
				        data-price-sign="<?=$price_sign;?>"
				        data-year-sign="<?=$year_sign;?>"
				        data-tooltip-label-prefix="<?=$tooltip_label_prefix;?>"
				        data-tooltip-label-suffix="<?=$tooltip_label_suffix;?>"
				        data-yaxis-labels='<?=json_encode($yAxis_labels);?>'
				        data-min="<?=$min[$g];?>"
				        data-max="<?=$max[$g];?>"
				        data-backgroundcolors='<?=json_encode($chart_data['backgroundColor']);?>'
				        data-bordercolors='<?=json_encode($chart_data['borderColor']);?>'
				        data-labels='<?=json_encode($chart_data[$g]['labels']);?>'
				        data-axeslabels='<?=json_encode($labelString);?>'
				        data-data='<?=json_encode($chart_data[$g]['data']);?>'>
				</canvas>
			</div>
			<?php if($display_twice):?>
				</div>
			<?php endif;?>
		<?php endforeach;?>
	<?php else:?>
		<div class="chart-wrap">
			<canvas id="barChart_age" class="<?=$chart_type_class;?>"
			        data-title="<?=$single_title;?>"
			        data-label=""
			        data-price-sign="<?=$price_sign;?>"
			        data-year-sign="<?=$year_sign;?>"
			        data-tooltip-label-prefix="<?=$tooltip_label_prefix;?>"
			        data-tooltip-label-suffix="<?=$tooltip_label_suffix;?>"
			        data-yaxis-labels='<?=json_encode($yAxis_labels);?>'
			        data-min="<?=$min;?>"
			        data-max="<?=$max;?>"
			        data-backgroundcolors='<?=json_encode($chart_data['backgroundColor']);?>'
			        data-bordercolors='<?=json_encode($chart_data['borderColor']);?>'
			        data-labels='<?=json_encode($chart_data['labels']);?>'
			        data-axeslabels='<?=json_encode($labelString);?>'
			        data-data='<?=json_encode($chart_data['data']);?>'>
			</canvas>
		</div>
	<?php endif;?>
</div>
