<?php
use yii\bootstrap\Nav;

$nav_items = [
	['label' => 'Home', 'url' => ['/']],
	['label' => 'About', 'url' => ['/about/']],
	['label' => 'Resources', 'url' => ['/life-insurance/']],
];
?>
<nav class="footer-nav hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<?=Nav::widget(['options' => ['class' => 'navbar-nav'], 'items' => $nav_items]);?>
			</div>
			<div class="col-md-5 text-right">
				<div class="phone">888.407.0714</div>
			</div>
		</div>
	</div>
</nav>

