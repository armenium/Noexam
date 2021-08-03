<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\ResourcesCats */

$this->title = 'DB tables comparison';
$this->params['breadcrumbs'][] = ['label' => 'Resources Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

#VarDumper::dump($src_model, 10, 1);
#VarDumper::dump($dst_model, 10, 1);

$exclude_ceckboxes = ['id'];

switch($db_server){
	case "dev":
		$btn_export['to']['label'] = 'Export to Live';
		$btn_export['to']['name'] = 'export_to_live';
		$btn_export['to']['confirm'] = 'Are you sure you want to export this item to live server?';
		$btn_export['to']['class'] = 'btn btn-danger';
		if(!$display_export_btn){
			$btn_export['to']['class'] .= ' hidden';
		}

		$btn_import['from']['label'] = 'Import from Live';
		$btn_import['from']['name'] = 'import_from_live';
		$btn_import['from']['confirm'] = 'Are you sure you want to import this item from live server?';
		$btn_import['from']['class'] = 'btn btn-success';
		if(!$display_import_btn){
			$btn_import['from']['class'] .= ' hidden';
		}

		$table_col[2]['label'] = 'Staging table';
		$table_col[2]['color'] = '#fff5fa';
		$table_col[4]['label'] = 'Live table';
		$table_col[4]['color'] = '#eefff6';

		$server_label_color = '#c00';
		break;
	case "live":
		$btn_export['to']['label'] = 'Export to Staging';
		$btn_export['to']['name'] = 'export_to_dev';
		$btn_export['to']['confirm'] = 'Are you sure you want to export this item to staging server?';
		$btn_export['to']['class'] = 'btn btn-success';
		if(!$display_export_btn){
			$btn_export['to']['class'] .= ' hidden';
		}

		$btn_import['from']['label'] = 'Import from Staging';
		$btn_import['from']['name'] = 'import_from_dev';
		$btn_import['from']['confirm'] = 'Are you sure you want to import this item from staging server?';
		$btn_import['from']['class'] = 'btn btn-danger';
		if(!$display_import_btn){
			$btn_import['from']['class'] .= ' hidden';
		}

		$table_col[2]['label'] = 'Live table';
		$table_col[2]['color'] = '#eefff6';
		$table_col[4]['label'] = 'Staging table';
		$table_col[4]['color'] = '#fff5fa';

		$server_label_color = '#0c0';
		break;
}
?>
<div class="resources-grid-view">

	<h3 class="float-right">Current server: <span style="color: <?=$server_label_color;?>;"><?=$db_server;?></span></h3>
    <h1><?=Html::encode($this->title);?></h1>

	<?php $form = ActiveForm::begin(['id' => 'resource-cats-compare-form', 'action' => '/resource-cats/post/']); ?>
	<table class="table table-striped table-bordered">
		<colgroup>
			<col width="15%">
			<col width="37%" style="background-color: <?=$table_col[2]['color'];?>;">
			<col width="11%">
			<col width="37%" style="background-color: <?=$table_col[4]['color'];?>;">
		</colgroup>
		<thead>
			<tr>
				<th>Fields</th>
				<th><?=$table_col[2]['label'];?></th>
				<th class="text-center">Select to export&nbsp;/&nbsp;import</th>
				<th><?=$table_col[4]['label'];?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($src_data as $col => $data):?>
			<tr>
				<th><?=$data['label'];?></th>
				<td><?=$data['value'];?></td>
				<td align="center">
					<input type="checkbox" name="fields[]" value="<?=$col;?>" checked="checked" <?php if(in_array($col, $exclude_ceckboxes)):?>disabled="disabled"<?php endif;?>>
				</td>
				<td><?=$dst_data[$col]['value'];?></td>
			</tr>
			<?php endforeach;?>
		</tbody>
		<tfoot>
			<tr>
				<th>
					<?=Html::hiddenInput('src_id', $src_data['id']['value']);?>
					<?=Html::hiddenInput('dst_id', $dst_data['id']['value']);?>
				</th>
				<th class="text-right"><?=Html::submitButton($btn_export['to']['label'], ['name' => $btn_export['to']['name'], 'class' => $btn_export['to']['class'], 'data' => ['confirm' => $btn_export['to']['confirm'], 'method' => 'post']]);?></th>
				<th class="text-center"><labeL>Select all <input type="checkbox" checked="checked" id="js_fields_toggle"></labeL></th>
				<th class="text-left"><?=Html::submitButton($btn_import['from']['label'], ['name' => $btn_import['from']['name'], 'class' => $btn_import['from']['class'], 'data' => ['confirm' => $btn_import['from']['confirm'], 'method' => 'post']]);?></th>
			</tr>
		</tfoot>
	</table>
	<?php ActiveForm::end(); ?>

</div>
