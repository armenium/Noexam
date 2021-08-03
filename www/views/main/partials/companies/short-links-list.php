<?php
use yii\helpers\VarDumper;
?>
<?php if(!empty($dataProviderBest)):?>
	<ol>
	<?php foreach($dataProviderBest->getModels() as $model):?>
		<?php #VarDumper::dump($model, 10, 1);?>
		<li><a href="#<?=$model->slug;?>"><?=$model->title;?></a></li>
	<?php endforeach;?>
	</ol>
<?php endif;?>
