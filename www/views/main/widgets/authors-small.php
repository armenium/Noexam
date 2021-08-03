<?php
use yii\helpers\VarDumper;

if(!isset($updated_date)){
	$db_time      = strtotime($this->context->current_cat->updated);
	$file_time    = strtotime($updated);
	$updated_date = ($db_time > $file_time) ? $db_time : $file_time;
}
?>
<section class="bio3 trans_all">
	<div class="image">
		<div class="avatar p2"></div>
		<!--<div class="avatar p1"></div>-->
	</div>
	<div class="about">
		<div class="updated"><?=date('F j, Y', $updated_date);?></div>
		<div class="names"><a href="https://www.noexam.com/about/jon-fritz/">Jonathan Fritz<br></a>B.A. Risk Management <br>Life Insurance Agent</div>
	</div>
</section>
