<?php
use yii\helpers\VarDumper;

$plans = $result['plans'];
$message = $result['message'];
?>
<?php //VarDumper::dump($plans, 10, 1);?>
<?php if(isset($plans['sagicor']) && count($plans['sagicor']) > 0): $i=0;?>
	<?php $cols = floor(12 / count($plans['sagicor']));?>
	<?php foreach($plans['sagicor'] as $term => $data): $i++;?>
		<div class="col-md-<?=$cols;?> wrap">
			<div class="plan">
				<div class="offer"><?=$data['label'];?></div>
				<div class="term"><?=$term;?> Years</div>
				<div class="price">$<?=$data['month'];?>/month</div>
				<div class="price-monthly hidden"><?=$data['month'];?></div>
				<div class="price-annual hidden"><?=$data['annual'];?></div>
				<div class="rate-class hidden"><?=$data['rate'];?></div>
				<div class="button">
					<button id="applynow_<?=$i;?>" type="button" class="btn btn-default btn-lg btn-apply">Apply Now</button>
				</div>
			</div>
		</div>
	<?php endforeach;?>
<?php else:?>
	<div class="alert alert-danger">
		<strong>
			<?php if(!empty($message)):?>
				<?=$message;?>
			<?php else:?>
				Sorry, but we could not find the appropriate plan for you.
			<?php endif;?>
		</strong>
	</div>
<?php endif;?>

