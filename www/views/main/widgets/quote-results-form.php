<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use app\models\CustomerData;

$customer_data = new CustomerData();

//VarDumper::dump($prices, 10 ,1); exit;
?>
<section class="container second w1034 quote-results">
	<?php if($total_plans_count > 0):?>
		<?php if(count($prices['plans']['exam_no'])):?>
			<div class="exam_no">
				<h2>No Medical Exam Policies</h2>
				<?php foreach($prices['plans']['exam_no'] as $company => $company_data):?>
					<?php if(!empty($company_data)): $i=0;?>
						<?php foreach($company_data as $term => $data):
							#VarDumper::dump($data, 10, 1);
							$i++;
							$btn_link = (isset($data['link'])) ? 'data-trigger="js_action_click" data-action="quote-result-link" data-url="'.$data['link'].'"' : '';
						?>
							<?php $form = ActiveForm::begin(['id' => 'quote-result-form-'.$company.'-'.$term, 'action' => '/post/', 'options' => ['class' => 'quote-result-form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
							<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'quote-result', 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'term')->hiddenInput(['value' => $term, 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'rate_class')->hiddenInput(['value' => $data['rate_class_name'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'monthly_premium')->hiddenInput(['value' => $data['premium_monthly'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'premium_amount')->hiddenInput(['value' => $data['premium_annual'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'company_code')->hiddenInput(['value' => $data['company_code'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'company_name')->hiddenInput(['value' => $data['company_name'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'product_code')->hiddenInput(['value' => $data['product_code'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'product_name')->hiddenInput(['value' => $data['product_name'], 'id' => ''])->label(false);?>
							<div class="row">
								<div class="col-md-12">
									<div class="plan">
										<div class="logo-block text-center">
											<div class="company-logo"><img src="<?=$data['logo_url'];?>"></div>
											<div><img src="/img/stars_4_8.gif"></div>
											<div class="t hidden-sm hidden-md hidden-lg"><?=$term;?> Year Plan Term Length</div>
										</div>
										<div class="price">
											<div class="right-border">
												<div class="t">$<?=number_format($data['premium_monthly'], 2);?></div>
												<div class="d">Monthly Payment</div>
											</div>
										</div>
										<div class="offer">
											<div class="right-border">
												<div class="t"><?=$data['rating'];?> <small>(Excellent)</small></div>
												<div class="d">Financial Rating</div>
											</div>
										</div>
										<div class="term hidden-xs">
											<div class="t"><?=$term;?> Year Plan</div>
											<div class="d">Term Length</div>
										</div>
										<div class="action">
											<?php if(isset($data['link'])):?>
												<a id="applynow_<?=$i;?>" <?=$btn_link;?> class="btn btn-info-o btn-lg btn-apply">Apply Now</a>
											<?php else:?>
												<button id="applynow_<?=$i;?>" <?=$btn_link;?> type="submit" class="btn btn-info-o btn-lg btn-apply">Apply Now</button>
											<?php endif;?>
										</div>
									</div>
								</div>
							</div>
							<?php ActiveForm::end();?>
						<?php endforeach;?>
					<?php endif;?>
				<?php endforeach;?>
			</div>
		<?php endif;?>

		<?php if(count($prices['plans']['exam_yes'])):?>
			<div class="exam_yes">
				<h2>Policies that Offer Accelerated Underwriting</h2>
				<?php foreach($prices['plans']['exam_yes'] as $company => $company_data):?>
					<?php if(!empty($company_data)): $i=0;?>
						<?php foreach($company_data as $term => $data):
							$i++;
							$btn_link = (isset($data['link'])) ? 'data-trigger="js_action_click" data-action="quote-result-link" data-url="'.$data['link'].'"' : '';
						?>
							<?php $form = ActiveForm::begin(['id' => 'quote-result-form-'.$company.'-'.$term, 'action' => '/post/', 'options' => ['class' => 'quote-result-form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
							<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'quote-result', 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'term')->hiddenInput(['value' => $term, 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'rate_class')->hiddenInput(['value' => $data['rate_class_name'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'monthly_premium')->hiddenInput(['value' => $data['premium_monthly'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'premium_amount')->hiddenInput(['value' => $data['premium_annual'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'company_code')->hiddenInput(['value' => $data['company_code'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'company_name')->hiddenInput(['value' => $data['company_name'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'product_code')->hiddenInput(['value' => $data['product_code'], 'id' => ''])->label(false);?>
							<?=$form->field($customer_data, 'product_name')->hiddenInput(['value' => $data['product_name'], 'id' => ''])->label(false);?>
							<div class="row">
								<div class="col-md-12">
									<div class="plan">
										<div class="logo-block text-center">
											<div class="company-logo"><img src="<?=$data['logo_url'];?>"></div>
											<div><img src="/img/stars_4_8.gif"></div>
											<div class="t hidden-sm hidden-md hidden-lg"><?=$term;?> Year Plan Term Length</div>
										</div>
										<div class="price">
											<div class="right-border">
												<div class="t">$<?=number_format($data['premium_monthly'], 2);?></div>
												<div class="d">Monthly Payment</div>
											</div>
										</div>
										<div class="offer">
											<div class="right-border">
												<div class="t"><?=$data['rating'];?> <small>(Excellent)</small></div>
												<div class="d">Financial Rating</div>
											</div>
										</div>
										<div class="term hidden-xs">
											<div class="t"><?=$term;?> Year Plan</div>
											<div class="d">Term Length</div>
										</div>
										<div class="action">
											<?php if(isset($data['link'])):?>
												<a id="applynow_<?=$i;?>" <?=$btn_link;?> class="btn btn-info-o btn-lg btn-apply">Apply Now</a>
											<?php else:?>
												<button id="applynow_<?=$i;?>" <?=$btn_link;?> type="submit" class="btn btn-info-o btn-lg btn-apply">Apply Now</button>
											<?php endif;?>
										</div>
									</div>
								</div>
							</div>
							<?php ActiveForm::end();?>
						<?php endforeach;?>
					<?php endif;?>
				<?php endforeach;?>
			</div>
		<?php endif;?>
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
