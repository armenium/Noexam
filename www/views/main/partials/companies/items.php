<?php
use yii\helpers\VarDumper;

?>
<?php if(!empty($dataProvider)):?>
	<?php foreach($dataProvider->getModels() as $model):?>
		<?php #VarDumper::dump($model, 10, 1);?>
		<?=$this->render('/main/partials/companies/item-box.php', ['model' => $model, 'insert_id_attributs' => false, 'id_prefix' => '']);?>
	<?php endforeach;?>
<?php endif;?>
