<?php
use yii\helpers\VarDumper;
?>
<?php if(!empty($dataProviderBest)):?>
	<ol class="best-companies__list">
	<?php foreach($dataProviderBest->getModels() as $model):?>
		<?php #VarDumper::dump($model, 10, 1);?>
		<li class="best-companies__item button-small button-small--arrow">
			<a href="#<?=$model->slug;?>" data-trigger="js_action_click" data-action="scroll_to"><?=$model->title;?></a>
		</li>
	<?php endforeach;?>
	</ol>
<?php endif;?>
