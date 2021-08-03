<?php
use yii\widgets\ActiveForm;
use app\models\ResourcesCats;
use app\models\Resources;
use yii\helpers\VarDumper;

$resource_model = new Resources();
$cats = $cats2 = Yii::$app->controller->getCatsTree();
$current_res = Yii::$app->controller->getCurrentResource();
$current_url = $current_res['url'];
$current_cat = $current_res['cat'];

//VarDumper::dump($current_url, 10, 1);
$dropdon_cats = [];
?>
<div class="hidden-xs">
	<div class="caption">NoExam Resources</div>
	<?php if(!empty($cats)):?>
		<ul class="main-cats">
			<?php foreach($cats as $cat):?>
				<?php if($cat->parent_id == 0):?>
					<?php
					//$url = '/'.(($cat->url !== 'life-insurance') ? 'life-insurance/'.$cat->url : $cat->url).'/';
					$dropdon_cats[$cat->url] = $cat->title;
					?>
					<li id="item_<?=$cat->id;?>" class="item">
						<a href="<?=$cat->url;?>"><?=$cat->title?></a>
						<?php $display_subcats = ($current_cat->id == $cat->id || $current_cat->parent_id == $cat->id) ? true : false;?>
						<?php if($display_subcats):?>
						<ul parent_id="<?=$cat->id;?>" class="sub-cats <?php if($current_cat->id == $cat->id || $current_cat->parent_id == $cat->id):?>show<?php endif;?>">
							<?php foreach($cats2 as $cat2):?>
								<?php if($cat2->parent_id == $cat->id):?>
									<?php
									//$url = '/'.(($cat->url !== 'life-insurance') ? 'life-insurance/'.$cat->url.'/'.$cat2->url : $cat->url.'/'.$cat2->url).'/';
									$dropdon_cats[$cat2->url] = '- '.$cat2->title;
									?>
									<li id="item_<?=$cat2->id;?>" class="item"><a href="<?=$cat2->url;?>"><?=$cat2->title?></a></li>
								<?php endif;?>
							<?php endforeach;?>
						</ul>
						<?php endif;?>
					</li>
				<?php endif;?>
			<?php endforeach;?>
		</ul>
	<?php endif;?>
</div>

<div class="display-xs hidden-sm hidden-md hidden-lg">
	<?php $form = ActiveForm::begin([
		'enableAjaxValidation' => false,
		'enableClientValidation' => false,
		'validationUrl' => '',
		'id' => 'cats-form',
		'action' => 'get',
		'options' => ['class' => ''],
		//'fieldConfig' => ['options' => ['tag' => false,],],
	]);?>
	<div class="input select category_nav">
		<?=$form->field($resource_model, 'category_id')->dropDownList($dropdon_cats, ['prompt' => 'NoExam Resources', 'class' => 'selectpicker cats', 'id' => 'category_id', 'data-style' => '', 'data-size' => '10', 'options' => [], 'onchange' => ''])->label(false);?>
	</div>
	<?php ActiveForm::end();?>
</div>

