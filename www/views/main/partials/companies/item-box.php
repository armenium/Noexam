<?php
use yii\helpers\Html;
use yii\helpers\VarDumper;

$display_price = !empty($model->prices);
#VarDumper::dump($model->prices, 10, 1);

$id_attr = ($insert_id_attributs) ? 'id="'.$model->slug.'"' : '';
?>

<div <?=$id_attr;?> class="box" data-id="<?=$model->id;?>" data-company="<?=$model->slug;?>">
	<div class="col-1">
		<a role="button" class="btn-website hidden-sm hidden-md hidden-lg pull-right" href="<?=$model->website;?>" target="_blank" rel="noopener nofollow">Apply Now</a>
		<?php if(!is_null($model->logo)):?>
			<?=Yii::$app->Helpers->getImage(['class' => 'logo hidden-xs', 'src' => $model->logo, 'alt' => $model->title, 'from_cdn' => !YII_DEBUG, 'lazyload' => true]);?>
		<?php endif;?>
		<div class="our-rating <?php if($display_price):?>with-price<?php endif;?>">
			<div class="lbl hidden-xs">Our Rating</div>
			<h2 class="company-name hidden-sm hidden-md hidden-lg"><?=$model->title;?></h2>
			<div class="stars"><img class="star" src="/img/stars/<?=$model->our_rating;?>.svg"></div>
		</div>
		<?php if($display_price):?>
			<div class="customer-price">
				<div class="lbl">Price</div>
				<div class="price"><?=$model->prices->price;?></div>
				<div class="params"><?=number_format($model->prices->amount, 0, '.', ',');?> / <?=$model->prices->term;?>-years</div>
				<a role="button" class="get-your-rate" href="#">Change coverage</a>
			</div>
		<?php else:?>
			<a role="button" class="get-your-rate" href="#">Get your rate</a>
		<?php endif;?>
		<div class="compare-checkbox">
			<?=Html::checkbox($id_prefix.'add_to_compare', false, ['id' => $id_prefix.'compare_'.$model->id, 'data-id' => $model->id, 'data-company' => $model->slug]);?>
			<label for="<?=$id_prefix;?>compare_<?=$model->id;?>">Add to compare</label>
		</div>

	</div>
	<div class="col-2">
		<a role="button" class="btn-website hidden-xs" href="<?=$model->website;?>" target="_blank" rel="noopener nofollow">Apply Now</a>
		<h2 class="company-name hidden-xs"><?=$model->title;?></h2>
		<ul class="props c<?=count($model->props);?>">
			<?php foreach($model->props as $prop):?>
				<?php if($prop['display_in_card']):?>
				<li>
					<div class="title"><?=$prop['title'];?></div>
					<div class="value"><?=$prop['value'];?></div>
				</li>
				<?php endif;?>
			<?php endforeach;?>
		</ul>
		<?php if(!empty($model->content)):?>
			<h3 class="content-title">About <?=$model->title;?></h3>
			<div class="company-desc"><?=$model->content;?></div>
			<a role="button" class="read-more">Read more</a>
		<?php endif;?>
	</div>
</div>

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
				<img class="star" src="/v2/common/images/stars/<?=$model->our_rating;?>.svg">
			</div>
		</div>
		<div class="company__header-column">
			<a href="#" class="company__link main-btn button-small">apply now</a>
			<a href="#" class="company__link main-btn button-small">Get your rate</a>
		</div>
	</div>

	<div class="company__decor-line"></div>

	<div class="company__row">
		<div class="company__col">
			<span class="company__label fontBodyS">Type of coverage</span>
			<span class="company__value fontBodyM">Term, Universal</span>
		</div>
		<div class="company__col">
			<span class="company__label fontBodyS">Financial strenght</span>
			<span class="company__value fontBodyM">A+</span>
		</div>
		<div class="company__col">
			<span class="company__label fontBodyS">Underwriting time</span>
			<span class="company__value fontBodyM">2-4 Weeks</span>
		</div>
		<div class="company__col">
			<span class="company__label fontBodyS">Company size</span>
			<span class="company__value fontBodyM">10,000+</span>
		</div>
	</div>

	<div class="company__decor-line company__decor-line--between-rows"></div>

	<div class="company__row">
		<div class="company__col">
			<span class="company__label fontBodyS">Average Complaints</span>
			<span class="company__value fontBodyM">Above Average</span>
		</div>
		<div class="company__col">
			<span class="company__label fontBodyS">BBB Rating</span>
			<span class="company__value fontBodyM">A+</span>
		</div>
		<div class="company__col">
			<span class="company__label fontBodyS">Company Age</span>
			<span class="company__value fontBodyM">112 Years</span>
		</div>
		<div class="company__col">
		</div>
	</div>

	<div class="company__decor-line"></div>

	<div class="company__footer">
		<h3 class="company__footer-title main-title">About Mutual of Omaha</h3>
		<p class="company__content fontBodyM">Mutual of Omaha is a Fortune 500 company based in Omaha, Nebraska. They began selling insurance in 1909, making them over 100 years old. Mutual of Omaha offers a wide array of life insurance products. They offer term, whole, universal,
			and long term care products. They even produced a popular television show in 1963 called “Wild Kingdom.” They are in our top 10 list for the best life insurance companies due to their strong financial rating, below average
			complaints, and wide selection of products.</p>
		<p class="company__content fontBodyM">Mutual of Omaha is financially stable and offers some of the most competitive pricing available. They have over eight billion dollars in assets with a <b>three-billion-dollar surplus.</b> They hold ratings from AM Best (A+ Superior),
			Moody's (A1 Good), and S&P (AA- Very Strong). See our full <b>Mutual of Omaha review.</b></p>
	</div>
	<div class="company__footer-btn btn-read-more">read more</div>
	<div class="company__footer-btn company__footer-btn--active btn-hide">hide</div>
	<div id="shadow"></div>

	<div class="company__decor-line company__decor-line--adaptive"></div>
	<div class="company__footer-btns-box">
		<a href="#" class="company__footer-link main-btn button-small">Get your rate</a>
		<a href="#" class="company__footer-link main-btn button-small">apply now</a>
	</div>
</div>
