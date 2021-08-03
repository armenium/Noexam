<?php

use app\models\CompaniesFilter;
use yii\helpers\Html;

$display_price = !empty($model->prices);
?>

<div class="cbox" data-id="<?=$model->id;?>" data-company="<?=$model->slug;?>">
	<a role="button" class="btn-remove-citem"><span>Remove</span></a>
	<div class="flex-row">
		<?php if(!is_null($model->logo)):?>
		<img class="logo hidden-xs" src="<?=$model->logo;?>">
		<?php endif;?>
		<h3 class="company-title"><?=$model->title;?></h3>
		<a role="button" class="btn-website hidden-sm hidden-md hidden-lg" href="<?=$model->website;?>" target="_blank" rel="noopener nofollow">Apply Now</a>
	</div>
	<a role="button" class="btn-website hidden-xs" href="<?=$model->website;?>" target="_blank" rel="noopener nofollow">Apply Now</a>
	<div class="clearfix"></div>
	<ul class="props">
		<?php if($display_price):?>
		<li>
		<?php if($model->prices->price != 'N/A'):?>
			<a role="button" href="#" class="title">Price</a>
			<div class="value price"><?=$model->prices->price;?><br><?=$model->prices->amount;?> / <?=$model->prices->term;?>-years</div>
		<?php else:?>
			<div class="title hidden-sm hidden-md hidden-lg">Rate not available</div>
			<div class="value hidden-sm hidden-md hidden-lg disclosure">
				<a role="button" tabindex="-1" data-content="Some companies do not give independent agents access to their rates. Please contact the company directly to receive a quote.">
					Why not?
				</a>
			</div>
			<div class="price hidden-xs">Rate not available<br>
				<div class="disclosure">
					<a role="button" tabindex="-1" data-content="Some companies do not give independent agents access to their rates. Please contact the company directly to receive a quote.">
						Why don’t we have a rate?
					</a>
				</div>
			</div>
		<?php endif;?>
		</li>
		<?php endif;?>
		<li class="our-rating">
			<a role="button" href="#our-rating-methodology" class="title" aria-controls="howtochoose" aria-relevant="tabcontent">Our Rating</a>
			<div class="value stars"><img class="star" src="/img/stars/<?=$model->our_rating;?>.svg"></div>
		</li>
		<?php foreach($model->props as $prop):?>
		<?php $link_url = CompaniesFilter::$filter_links[$prop['link_id']]['link_url'];?>
		<li>
			<a role="button" href="<?=$link_url;?>" class="title" aria-controls="howtochoose" aria-relevant="tabcontent"><?=$prop['title'];?></a>
			<div class="value"><?=$prop['value'];?></div>
		</li>
		<?php endforeach;?>
	</ul>
</div>

