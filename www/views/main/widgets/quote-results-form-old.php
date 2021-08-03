<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use app\models\CustomerData;

$customer_data = new CustomerData();

VarDumper::dump($prices, 10 ,1);
?>
<section class="container second w1034 quote-results">
	<?php if(count($prices['plans']['sagicor'])):?>
		<?php $i=0; foreach($prices['plans']['sagicor'] as $term => $data): $i++;?>
			<?php $form = ActiveForm::begin(['id' => 'quote-result-form-'.$term, 'action' => '/post/', 'options' => ['class' => 'quote-result-form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
			<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'quote-result', 'id' => ''])->label(false);?>
			<?=$form->field($customer_data, 'term')->hiddenInput(['value' => $term, 'id' => ''])->label(false);?>
			<?=$form->field($customer_data, 'rate_class')->hiddenInput(['value' => $data['rate'], 'id' => ''])->label(false);?>
			<?=$form->field($customer_data, 'monthly_premium')->hiddenInput(['value' => $data['month'], 'id' => ''])->label(false);?>
			<?=$form->field($customer_data, 'premium_amount')->hiddenInput(['value' => $data['annual'], 'id' => ''])->label(false);?>
			<div class="row">
				<div class="col-md-12">
					<div class="plan">
						<div class="logo-block text-center">
							<div class="sagicor-logo"><img src="/img/sagicor-logo.png"></div>
							<div><img src="/img/stars_4_8.gif"> (975)</div>
							<div class="t hidden-sm hidden-md hidden-lg"><?=$term;?> Year Plan Term Length</div>
						</div>
						<div class="price">
							<div class="right-border">
								<div class="t">$<?=$data['month'];?></div>
								<div class="d">Monthly Payment</div>
							</div>
						</div>
						<div class="offer">
							<div class="right-border">
								<div class="t">A- <small>(Excellent)</small></div>
								<div class="d">Financial Rating</div>
							</div>
						</div>
						<div class="term hidden-xs">
							<div class="t"><?=$term;?> Year Plan</div>
							<div class="d">Term Length</div>
						</div>
						<div class="action">
							<button id="applynow_<?=$i;?>" type="submit" class="btn btn-info-o btn-lg btn-apply">Apply Now</button>
						</div>
					</div>
				</div>
			</div>
			<?php ActiveForm::end();?>
		<?php endforeach;?>
	<?php else:?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger">
					<strong>
						<?php if(!empty($prices['message'])):?>
							<?=$prices['message'];?>
						<?php else:?>
							Sorry, but we could not find the appropriate plan for you.
						<?php endif;?>
					</strong>
				</div>
			</div>
		</div>
	<?php endif;?>
</section>
