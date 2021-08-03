<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Success';
?>
<div class="success-block center-block">
	<div class="heart">
		<?= Html::img('@web/img/q-heart.png', ['alt'=>'Success']);?>
	</div>
	<div class="message-top">Congratulations! Your policy has been approved.</div>
	<div class="refinements">
		<div class="refinement center-block">
			<div class="text">You will receive a copy of your policy by email within 24 hours of receiving this approval.</div>
		</div>
		<div class="refinement center-block">
			<div class="text">Our friendly customer service representatives are always happy to help if you have any questions.</div>
		</div>
	</div>
	<div class="gray-line center-block"></div>
	<div><a href="<?=$report_data->url;?>">Download PDF-report</a></div>
	<div class="message-bottom center-block">Thank you for your buisness, we look forward to serving you!</div>
</div>
