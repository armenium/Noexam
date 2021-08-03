<?php
use yii\helpers\VarDumper;

$source_data = Yii::$app->controller->getSummarizingStatistics($age_diapasons, $variant);
#VarDumper::dump($source_data, 10, 1);
?>
<div class="statistic-summarizing widget trans_all text-left">
	<ul>
	<?php foreach($source_data as $diapason => $data):?>
		<li class="item">The average cost of life insurance increases by <span class="rt"><?=$data['percent'];?>%</span> <span class="nowrap">from age <span class="gt"><?=$data['min'];?></span> to age <span class="bt"><?=$data['max'];?></span></span></li>
	<?php endforeach;?>
	</ul>
</div>
