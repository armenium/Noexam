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
		 ['Mother', 'living[fm]', 'cdeath[fm]', 'adeath[fm]'],
		 ['Father', 'living[ff]', 'cdeath[ff]', 'adeath[ff]'],
		 ['Sister(s)', 'living[fs]', 'cdeath[fs]', 'adeath[fs]'],
		 ['Brother(s)', 'living[fb]', 'cdeath[fb]', 'adeath[fb]'],
	]
];

#VarDumper::dump($this, 10, 1);

?>
<table class="avia">
	<thead>
		<tr>
			<?php foreach($table_data['titles'] as $title):?>
				<th scope="col"><?=$title;?></th>
			<?php endforeach;?>
			<!--
			<th scope="col">Family member</th>
			<th scope="col">Living</th>
			<th scope="col">Cause of death</th>
			<th scope="col">Age of death</th>
			-->
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
</table>
