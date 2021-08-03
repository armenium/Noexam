<?php
use yii\helpers\VarDumper;

$db_time = 0;
if(isset($this->context->current_cat)){
	$db_time = strtotime($this->context->current_cat->updated);
}
$file_time = strtotime($updated);
$updated_date = ($db_time > $file_time) ? $db_time : $file_time;
?>
<section class="bio4">
	<div class="image">
		<div class="avatar p2"></div>
	</div>
	<div class="about">
		<div class="updated"><?=date('F j, Y', $updated_date);?></div>
		<div class="names"><a href="/about/jon-fritz/">Jon Fritz </a></div>
		<div class="desc hidden-sm hidden-md hidden-lg">(B.A) Risk Management & Insurance<br>Licensed Life Insurance Agent</div>
	</div>
</section>
