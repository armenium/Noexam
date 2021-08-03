<?php

use yii\helpers\VarDumper;

$source_data = Yii::$app->controller->getStatisticGuessedPrices();

#VarDumper::dump($source_data, 10, 1);

$count = count($source_data['generations']);
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
		$md_cols = 6;
		$sm_cols = 6;
		$xs_cols = 12;
		break;
}

$backgroundcolors = json_encode(["#9ad69a", "#a4d2dd", "#FF5CA0"]);
?>
<div class="guessed-prices-statistic widget">
	<div class="text-center title">
		<?=sprintf('After <span class="mt">%1$s</span> guesses <span class="gt">%2$s%%</span> guessed too high, <span class="bt">%3$s%%</span> guessed too low, and <span class="rt">%4$d%%</span> guessed correctly.', number_format($source_data['main']['counts']['total'], 0, '.', ','), $source_data['main']['percents']['high'], $source_data['main']['percents']['low'], $source_data['main']['percents']['correct']);?>
	</div>
	<canvas id="sgpPieChart" class="inner pie-chart"
	        data-backgroundcolors='<?=$backgroundcolors;?>'
	        data-labels='<?=json_encode([$source_data['main']['percents']['high']."% of participants that guessed too high", $source_data['main']['percents']['low']."% of participants that guessed too low", $source_data['main']['percents']['correct']."% of participants that guessed too correct"]);?>'
	        data-data='<?=json_encode([$source_data['main']['percents']['high'], $source_data['main']['percents']['low'], $source_data['main']['percents']['correct']]);?>'>
	</canvas>
	<?php /*?>
	<div class="charts-content">
		<div class="row">
			<?php if(!empty($source_data['generations'])):?>
				<?php foreach($source_data['generations'] as $generation => $generation_data):?>
					<?php $id = str_replace(' ', '', $generation);?>
					<div class="col-md-<?=$md_cols;?> col-sm-<?=$sm_cols;?> col-xs-<?=$xs_cols;?> doughnut-chart">
						<canvas id="generationChart_<?=$id;?>" height="200" class="pie-charts"
						        data-title='<?=$generation;?>'
						        data-backgroundcolors='<?=$backgroundcolors;?>'
						        data-labels='<?=json_encode([$generation_data['high']."% of participants that guessed too high", $generation_data['low']."% of participants that guessed too low", $generation_data['correct']."% of participants that guessed too correct"]);?>'
						        data-data='<?=json_encode([$generation_data['high'], $generation_data['low'], $generation_data['correct']]);?>'>
						</canvas>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
	</div>
	<?php */?>
</div>
