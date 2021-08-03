<?php

use yii\helpers\VarDumper;

$max_date = Yii::$app->controller->get_bio_updated_date();
//VarDumper::dump($max_date, 10, 1);
?>
<section class="bio trans_all">
	<div class="avatar"></div>
	<div class="about">
		<div class="name">Jonathan Holloway</div>
		<div class="date"><?=$max_date;?></div>
		<div class="cont">John Holloway is a licensed life insurance agent and co-founder at <a href="/">NoExam.com</a></div>
		<div class="ps">Disclaimer: We make every attempt to make sure our information is up to date, but since things change often it is best to double check the data. This review is an opinion. Clicking on links may result in NoExam.com being compensated.</div>
	</div>
</section>
