<?php

use yii\helpers\VarDumper;

$customers_count = Yii::$app->controller->get_customers_count();
#VarDumper::dump($customers_count, 10, 1);

?>
<div class="participants-count-statistic widget">
	<h2 class="text-center">At time of writing, there have been <?=$customers_count;?> participants in this study</h2>
</div>
