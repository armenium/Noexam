<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\components\BreadcrumbsNew;

?>
<div class="main-wrapp bg1">
	<div class="wrapp">
		<section class="life-insurance">
			<div class="life-insurance__nav breadcrumbs">
				<?=BreadcrumbsNew::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]);?>
			</div>
			<div class="life-insurance__first-screen main-first-screen">
				<h1 class="main-first-screen__title heading-0">Life Insurance Quotes</h1>
				<div class="main-first-screen__subtitle">Compare quotes to get the right policy at the right price</div>
			</div>
		</section>
	</div>
</div>
