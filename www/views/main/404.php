<?php

use yii\widgets\Breadcrumbs;

$this->title = '404';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-content page-wrapper trans_all">

	<!-- START PAGE-CONTENT -->
	<section class="page">
		<h1><?=$this->title;?></h1>
		<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>

		<div class="content">
			<div class="text-center">
				404<br>Oops! Page not found!
			</div>
		</div>

	</section>
	<!-- END PAGE-CONTENT -->

</div>
