<?php if($found):?>
	<div class="reviews">
		<h2 class="reviews__title heading-2"><?=$title;?></h2>
	
		<div class="reviews__body" data-equal-height="0" data-equal-height-breakpoint="1024" data-equal-height-element=".reviews__content">
			<?php foreach($reviews as $review):?>
				<div class="reviews__item">
					<div class="reviews__content">
						<div class="reviews__stars">
							<img src="/v2/common/images/stars/<?=$review->review_stars;?>.svg" alt="*">
						</div>
						<h3 class="reviews__subtitle tags"><?=$review->review_title;?></h3>
						<p class="reviews__text fontBodyS"><?=$review->review_content;?></p>
					</div>
					<div class="reviews__author">
						<?=$review->FormatedAvatar;?>
						<div class="reviews__author-info">
							<span class="reviews__name tags"><?=$review->customer_name;?></span>
							<span class="reviews__date fontBodyS"><?=$review->FormatedDate;?></span>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
<?php endif;?>

