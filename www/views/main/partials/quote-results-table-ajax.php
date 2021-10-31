<?php
use yii\helpers\VarDumper;

$age = $request['age'];
$health = str_replace('-', ' ', $request['health']);
$health = ($health == 'none') ? 'fair' : $health;
$term = $request['term_length'];
$gender = $request['sex'] == 'm' ? 'man' : 'woman';
?>
<div class="rate-calc-desc inner">
	<?php if($display_default_desc):?>
		The following rates can be customized and this is instructional text for the user.
	<?php else:?>
		The following rates are for a <span class="gt"><?=$age;?>-year-old</span> <span class="gt"><?=$gender;?></span> in <span class="gt"><?=$health;?> health</span> looking for a <span class="gt"><?=$term;?>-year</span> term life policy.
	<?php endif;?>
</div>
<?php #VarDumper::dump($apis_data, 10, 1);?>
<section class="quote-results-table">
	<?php if(count($companies) > 0):?>
		<div class="table-wrap">
			<table class="plans-table">
				<thead>
					<tr>
						<th class="sticky-col">Coverage Amount</th>
						<?php foreach($cols as $code => $name):?>
							<th class="<?=$code;?>"><?=$name;?></th>
						<?php endforeach;?>
					</tr>
				</thead>
				<tbody>
				<?php foreach($amounts as $amount):?>
					<tr>
						<td class="sticky-col" data-sign="$"><?=number_format($amount, 0, '.', ',');?></td>
						<?php foreach($companies as $code => $company_data):?>
						<td class="<?=$code;?>" data-sign="<?php if($company_data[$amount]['price'] != 'N/A'):?>$<?php endif;?>" style="background-color: <?=$company_data[$amount]['b_color']?>; color: <?=$company_data[$amount]['f_color']?>;">
							<?=$company_data[$amount]['price'];?>
						</td>
						<?php endforeach;?>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>

			<?php /*foreach($prices_range as $color_data):?>
			<div style="background-color: <?=$color_data['b_color']?>; color: <?=$color_data['f_color']?>;">
				<?=$color_data['price'];?> |
				<?=$color_data['b_color']?> |
				<?=$color_data['settings']['sum'];?> |
				<?=$color_data['settings']['count'];?> |
				<?=round($color_data['settings']['center']);?> |
				<?=$color_data['settings']['ratio'];?> |
				<?=implode(', ', $color_data['settings']['color_min']);?> |
				<?=implode(', ', $color_data['settings']['color_mid']);?> |
				<?=implode(', ', $color_data['settings']['color_max']);?> |
			</div>
			<?php endforeach;*/?>
		</div>
	<?php else:?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger">
					<strong>Sorry, but we could not find the appropriate plan for you.</strong>
				</div>
			</div>
		</div>
	<?php endif;?>
</section>

