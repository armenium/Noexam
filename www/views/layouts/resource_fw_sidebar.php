<?php

use yii\widgets\ActiveForm;
use app\models\ResourcesCats;
use app\models\Resources;
use yii\helpers\VarDumper;

$resource_model = new Resources();
$current_res = Yii::$app->controller->getCurrentResource();
$current_url = $current_res['url'];
$current_cat = $current_res['cat'];
$categories = Yii::$app->controller->getCatsTree();
$categories = Yii::$app->controller->buildCatsTree($categories, $current_cat);

$cats = $categories['cats'];
$dropdown_cats = $categories['dropdown_cats'];
#VarDumper::dump($categories, 10, 1);
?>
<div class="row trans_all">
	<div class="f-col-left">
		<div class="logo"></div>
		<div class="sa_stars"></div>
		<div class="contacts">
			<a href="tel:+18884070714"><i class="icon-phone-circled"></i>888.407.0714</a>
			<a href="mailto:support@noexam.com"><i class="icon-mail"></i>support@noexam.com</a>
		</div>
	</div>
	<div class="f-col-right with-left-border">
		<?php if(!empty($cats)):?>
			<ul class="row main-cats <?=$categories['class'];?>">
				<?php if(!empty($cats['first_cat'])):?>
					<?php foreach($cats['first_cat'] as $cat):?>
						<?=$this->render('/layouts/partials/resource_fw_sidebar_part', ['cat' => $cat, 'current_cat' => $current_cat, 'type' => 'first_cat', 'col_class' => 'col-sm-4 first_cat full-height opened']);?>
					<?php endforeach;?>
				<?php endif;?>
				<?php if(!empty($cats['next_cat'])):?>
					<?php foreach($cats['next_cat'] as $cat):?>
						<?=$this->render('/layouts/partials/resource_fw_sidebar_part', ['cat' => $cat, 'current_cat' => $current_cat, 'type' => 'next_cat', 'col_class' => 'col-sm-4 next_cat closed']);?>
					<?php endforeach;?>
				<?php endif;?>
				<?php if(!empty($cats['last_cat'])):?>
					<?php foreach($cats['last_cat'] as $cat):?>
						<?=$this->render('/layouts/partials/resource_fw_sidebar_part', ['cat' => $cat, 'current_cat' => $current_cat, 'type' => 'last_cat', 'col_class' => 'col-sm-12 last_cat opened']);?>
					<?php endforeach;?>
				<?php endif;?>
			</ul>
		<?php endif;?>
	</div>
</div>
