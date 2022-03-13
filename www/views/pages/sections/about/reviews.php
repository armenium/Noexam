<?php use app\widgets\CustomerReviewsCarousel;?>
<div class="main-wrapp bg0 quote-bg">
	<div class="wrapp">
		<?=CustomerReviewsCarousel::widget(['title' => 'Customer Reviews', 'limit' => 3]);?>
	</div>
</div>
