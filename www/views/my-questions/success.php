<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Success';
?>
<div class="success-block center-block">
	<div class="heart">
		<?= Html::img('@web/img/q-heart.png', ['alt'=>'Success']);?>
	</div>
	<div class="message-top">Congratulations! Your application has been submitted.</div>
	<div class="refinements">
		<div class="refinement center-block">
			<div class="text">One of our agents will be reaching out to you shortly if any additional information is required.</div>
		</div>
		<div class="refinement center-block">
			<div class="text">If you have any questions, our friendly friendly agents are always happy to help. They can be reached at 888-407-0714.</div>
		</div>
	</div>
	<div class="gray-line center-block"></div>
	<?php /*<div><a href="<?=$report_data->url;?>" target="_blank">Download PDF-report</a></div>*/?>
	<div class="message-bottom center-block">Thank you for your business, we look forward to serving you!</div>
</div>
