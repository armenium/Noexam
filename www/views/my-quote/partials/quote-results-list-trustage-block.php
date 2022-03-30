<?php

use yii\widgets\ActiveForm;

?>
<div class="quotes-result__container results-table">
	<div class="quotes-result__containerHeader">
		<h2 class="quotes-result__containerTitle heading-5">TruStage® Term Insurance</h2>
		<div class="heading-6">Total: <span><?=$no_plans_count;?></span></div>
	</div>
	<div class="quotes-result__tableHeader tableHeader">
		<div class="tableHeader__col fontBodyS">Insurance Company</div>
		<div class="tableHeader__col fontBodyS">Monthly Payment</div>
		<div class="tableHeader__col fontBodyS">Financial Rating</div>
		<div class="tableHeader__col fontBodyS">Coverage Amount</div>
	</div>
	<hr>
	
	<?php foreach($prices['plans']['exam_no'] as $company => $company_data):?>
		<?php if(!empty($company_data)):?>
			<?php foreach($company_data as $coverage_amount => $data):
				$btn_link = (isset($data['link'])) ? 'data-trigger="js_action_click" data-action="quote-result-link" data-url="'.$data['link'].'"' : '';
				?>
				<?php $form = ActiveForm::begin(['id' => 'quote-result-form-'.$company.'-'.$coverage_amount, 'action' => '/my-quote/post/', 'options' => ['class' => 'quote-result-form'], 'fieldConfig' => ['options' => ['tag' => false]]]);?>
				<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'quote-result'])->label(false)->error(false);?>
				<?=$form->field($customer_data, 'term')->hiddenInput(['value' => $coverage_amount])->label(false)->error(false);?>
				<?=$form->field($customer_data, 'rate_class')->hiddenInput(['value' => $data['rate_class_name']])->label(false)->error(false);?>
				<?=$form->field($customer_data, 'monthly_premium')->hiddenInput(['value' => $data['premium_monthly']])->label(false)->error(false);?>
				<?=$form->field($customer_data, 'premium_amount')->hiddenInput(['value' => $data['premium_annual']])->label(false)->error(false);?>
				<?=$form->field($customer_data, 'company_code')->hiddenInput(['value' => $data['company_code']])->label(false)->error(false);?>
				<?=$form->field($customer_data, 'company_name')->hiddenInput(['value' => $data['company_name']])->label(false)->error(false);?>
				<?=$form->field($customer_data, 'product_code')->hiddenInput(['value' => $data['product_code']])->label(false)->error(false);?>
				<?=$form->field($customer_data, 'product_name')->hiddenInput(['value' => $data['product_name']])->label(false)->error(false);?>
				<div class="quotes-result__tableRow tableRow">
					<div class="tableRow__col">
						<div class="tableRow__imgWrapp">
							<img src="<?=$data['logo_url'];?>" alt="logo" class="tableRow__img">
							<div class="tableRow__starsWrapp">
								<img src="/v2/common/images/star.png" alt="*">
								<img src="/v2/common/images/star.png" alt="*">
								<img src="/v2/common/images/star.png" alt="*">
								<img src="/v2/common/images/star.png" alt="*">
								<img src="/v2/common/images/star.png" alt="*">
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__price fontBodyM">$<?=number_format($data['premium_monthly'], 2);?></div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__rating fontBodyM"><?=$data['rating'];?> <span>(Excellent)*</span></div>
					</div>
					<div class="tableRow__col">
						<div class="tableRow__term fontBodyM">$<?=number_format($coverage_amount, 0);?></div>
					</div>
					<div class="tableRow__col tableRow__col--hiden">
						<div class="tableRow__box">
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Monthly Payment</span>
								<span class="fontBodyM">$<?=number_format($data['premium_monthly'], 2);?></span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Financial Rating</span>
								<span class="fontBodyM"><?=$data['rating'];?> <span>(Excellent)*</span></span>
							</div>
							<div class="tableRow__boxRow">
								<span class="fontBodyS">Term Length</span>
								<span class="fontBodyM">$<?=number_format($coverage_amount, 0);?></span>
							</div>
						</div>
					</div>
					<div class="tableRow__col">
						<?php if(isset($data['link'])):?>
							<a id="applynow_<?=$data['company_code'];?>_<?=$term;?>" <?=$btn_link;?> class="tableRow__btn main-btn button-big">Apply Now</a>
						<?php else:?>
							<button id="applynow_<?=$data['company_code'];?>_<?=$term;?>" <?=$btn_link;?> type="submit" class="tableRow__btn main-btn button-big">Apply Now</button>
						<?php endif;?>
					</div>
				</div>
				<?php ActiveForm::end();?>
				<hr>
			<?php endforeach;?>
		<?php endif;?>
	<?php endforeach;?>
</div>
