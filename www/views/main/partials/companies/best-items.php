<?php
use yii\helpers\VarDumper;

?>
<?php if(!empty($dataProviderBest)):?>
	<?php foreach($dataProviderBest->getModels() as $model):?>
		<?php #VarDumper::dump($model, 10, 1);?>
		<?=$this->render('/main/partials/companies/item-box.php', ['model' => $model, 'insert_id_attributs' => true, 'id_prefix' => 'best_']);?>
	<?php endforeach;?>
<?php endif;?>
