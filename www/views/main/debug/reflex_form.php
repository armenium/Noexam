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
		['Mother', 'mother[living]', 'mother[cdeath]', 'mother[adeath]'],
		['Father', 'father[living]', 'father[cdeath]', 'father[adeath]'],
		['Sister(s)', 'sisters[living]', 'sisters[cdeath]', 'sisters[adeath]'],
		['Brother(s)', 'brothers[living]', 'brothers[cdeath]', 'brothers[adeath]'],
	]
];


?>
<form action="" method="get">
	<table class="avia sub-question" data-parent-id="212" data-question-number="7" data-type="table" data-question-id="288" data-answer="">
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
								echo Html::radioList($item, 'no', ['yes' => 'Yes', 'no' => 'No']);
								break;
							case 2:
							case 3:
								echo Html::textInput($item, $i+$k*$k+$i);
								break;
						endswitch;?>
					</td>
				<?php endforeach;?>
			</tr>
		<?php endforeach;?>
		</tbody>
		<tfoot>
		<tr>
			<td colspan="4"><button class="btn btn-success btn-confirm">Confirm</button></td>
		</tr>
		</tfoot>
	</table>
</form>