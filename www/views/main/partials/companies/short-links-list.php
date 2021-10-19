<?php
use yii\helpers\VarDumper;
?>
<?php if(!empty($dataProviderBest)):?>
	<ol class="best-companies__list">
	<?php
		$i=0;
		foreach($dataProviderBest->getModels() as $model):
		$i++;
		$n = strlen($i) == 1 ? '0'.$i : $i;
	?>
		<?php #VarDumper::dump($model, 10, 1);?>
		<li class="best-companies__item button-small button-small--arrow">
			<span><?=$n;?>.</span>
			<a href="#<?=$model->slug;?>" data-trigger="js_action_click" data-action="scroll_to"><?=$model->title;?></a>
		</li>
	<?php endforeach;?>
	</ol>
<?php endif;?>
