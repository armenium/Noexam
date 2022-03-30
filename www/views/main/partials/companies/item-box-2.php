<?php
use yii\helpers\Html;
use yii\helpers\VarDumper;

$display_price = !empty($model->prices);
$props_part_1 = array_slice($model->props, 0, 4);
$props_part_2 = array_slice($model->props, 4, 4);
#VarDumper::dump($model->props, 10, 1);
#VarDumper::dump($props_part_1, 10, 1);
#VarDumper::dump($props_part_2, 10, 1);

$id_attr = ($insert_id_attributs) ? 'id="'.$model->slug.'"' : '';
?>

<div <?=$id_attr;?> class="companies__item company" data-id="<?=$model->id;?>" data-company="<?=$model->slug;?>">
	<div class="company__header">
		<div class="company__header-column">
			<div class="company__logo-box">
				<?php if(!is_null($model->logo)):?>
					<?=Yii::$app->Helpers->getImage(['class' => 'company__logo', 'src' => $model->logo, 'alt' => $model->title, 'from_cdn' => !YII_DEBUG, 'lazyload' => true]);?>
				<?php endif;?>
			</div>
		</div>
		<div class="company__header-column">
			<span class="company__name heading-5"><?=$model->title;?></span>
			<span class="company__rating-label fontBodyS">Our Rating</span>
			<div class="company__rating-stars">
				<img class="star" src="/v2/common/images/stars/<?=$model->our_rating;?>.svg" alt="Rating: <?=$model->our_rating;?>">
			</div>
		</div>
		<div class="company__header-column">
			<a href="<?=$model->website;?>" class="company__link main-btn button-small" target="_blank" rel="noopener nofollow">apply now</a>
			<a href="#" class="company__link main-btn button-small" data-trigger="js_action_click" data-action="display_rate_modal">Get your rate</a>
		</div>
	</div>

	<div class="company__decor-line"></div>

	<div class="company__row">
		<?php foreach($props_part_1 as $k => $prop):?>
			<?php if($prop['display_in_card']):?>
				<div class="company__col">
					<span class="company__label fontBodyS"><?=$prop['title'];?></span>
					<span class="company__value fontBodyM"><?=$prop['value'];?></span>
				</div>
			<?php endif;?>
		<?php endforeach;?>
	</div>
	
	<div class="company__decor-line company__decor-line--between-rows"></div>

	<div class="company__row">
		<?php foreach($props_part_2 as $k => $prop):?>
			<?php if($prop['display_in_card']):?>
				<div class="company__col">
					<span class="company__label fontBodyS"><?=$prop['title'];?></span>
					<span class="company__value fontBodyM"><?=$prop['value'];?></span>
				</div>
			<?php endif;?>
		<?php endforeach;?>
		<div class="company__col">
		<?php if($display_price):?>
				<div class="company__label fontBodyS">Price</div>
				<div class="company__value fontBodyM">
					<div class="price"><?=$model->prices->price;?></div>
					<div class="params"><?=number_format($model->prices->amount, 0, '.', ',');?> / <?=$model->prices->term;?>-years</div>
				</div>
		<?php endif;?>
		</div>
	</div>

	<div class="company__decor-line"></div>
	
	<?php if(!empty($model->content)):?>
	<div class="company__footer">
		<div class="company__footer-title main-title">About <?=$model->title;?></div>
		<p class="company__content fontBodyM"><?=$model->content;?></p>
	</div>
	<div class="company__footer-btn btn-read-more">read more</div>
	<div class="company__footer-btn company__footer-btn--active btn-hide">hide</div>
	<div id="shadow"></div>
	<?php endif;?>
	
	<div class="company__decor-line company__decor-line--adaptive"></div>
	<div class="company__footer-btns-box">
		<a href="#" class="company__footer-link main-btn button-small" data-trigger="js_action_click" data-action="display_rate_modal">Get your rate</a>
		<a href="<?=$model->website;?>" class="company__footer-link main-btn button-small" target="_blank" rel="noopener nofollow">apply now</a>
	</div>
</div>
