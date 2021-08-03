<?php
use yii\helpers\VarDumper;

$CompaniesRatingsTableData = Yii::$app->controller->getCompaniesRatingsTableData();
#VarDumper::dump($CompaniesRatingsTableData, 10, 1);
?>
<div id="<?=$id;?>" class="companies-ratings-tabs">
	<ul class="nav nav-tabs" role="tablist">
		<?php $i=0; foreach($CompaniesRatingsTableData as $k => $v):?>
		<?php $active = ($i == 0) ? 'active' : '';?>
		<li role="presentation" class="nav-item <?=$active;?>"><a id="<?=$k;?>-tab" class="nav-link" href="#<?=$k;?>" aria-controls="<?=$k;?>" role="tab" data-toggle="tab" aria-selected="true"><?=$v['title'];?></a></li>
		<?php $i++; endforeach;?>
	</ul>
	<div class="tab-content">
		<?php $i=0; foreach($CompaniesRatingsTableData as $k => $v):?>
		<?php $active = ($i == 0) ? 'active' : '';?>
		<div role="tabpanel" class="tab-pane <?=$active;?>" id="<?=$k;?>" role="tabpanel" aria-labelledby="<?=$k;?>-tab">
			<table class="tablepress tablesorter <?=$id;?>">
				<thead>
					<tr class="row-head">
						<th class="column-half">Company</th>
						<th class="column-half"><?=$v['title'];?></th>
					</tr>
				</thead>
				<tbody class="row-hover">
				<?php foreach($v['ratings'] as $r => $rating):?>
					<tr class="row-<?=$r;?>">
						<td class="column-half"><?=$rating['title'];?></td>
						<td class="column-half" data-value="<?=$rating['value'];?>"><?=$rating['rate'];?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>
		<?php $i++; endforeach;?>
	</div>
</div>

