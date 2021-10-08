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

