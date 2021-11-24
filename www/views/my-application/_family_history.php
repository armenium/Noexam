<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

$table_data = [
	'titles' => [
		'Family member',
		'Living',
		'Cause of death',
		'Age of death'
	],
	'items' =>[
		 ['Mother', 'mother_living', 'mother_cdeath', 'mother_adeath'],
		 ['Father', 'father_living', 'father_cdeath', 'father_adeath'],
		 ['Sister(s)', 'sisters_living', 'sisters_cdeath', 'sisters_adeath'],
		 ['Brother(s)', 'brothers_living', 'brothers_cdeath', 'brothers_adeath'],
	]
];

#VarDumper::dump($this, 10, 1);

?>
<table class="avia sub-question" data-parent-id="<?=$parentQustionId;?>" data-question-number="<?=($questionNumber ? $questionNumber : '0');?>" data-type="table" data-question-id="<?=$qustionId;?>" data-answer="">
	<thead>
		<tr>
			<?php foreach($table_data['titles'] as $title):?>
				<th scope="col"><?=$title;?></th>
			<?php endforeach;?>
		</tr>
	</thead>
	<tbody>
			<?php foreach($table_data['items'] as $k => $items):?>
			<tr>
				<?php foreach($items as $i => $item):?>
				<td aria-label="<?=$table_data['titles'][$i];?>">
					<?php switch($i):
						case 0:
							echo $item;
							break;
						case 1:
							echo Html::radioList($item, 'yes', ['yes' => 'Yes', 'no' => 'No']);
							break;
						case 2:
						case 3:
							echo Html::textInput($item, '', ['autocomplete' => 'off', 'disabled' => 'disabled']);
							break;
					endswitch;?>
				</td>
				<?php endforeach;?>
			</tr>
			<?php endforeach;?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4"><div class="btn btn-success btn-confirm">Confirm</div></td>
		</tr>
	</tfoot>
</table>
