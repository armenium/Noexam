<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\VarDumper;


if($total_terms_count > 0):?>

	<?php if(!$display_trustage_blocks):?>
		
		<?php if($no_plans_count):?>
			<?=$this->render('quote-results-list-no-plans-block', ['customer_data' => $customer_data, 'prices' => $prices, 'no_plans_count' => $no_plans_count]);?>
		<?php endif;?>
		
		<?php if($yes_plans_count):?>
			<?=$this->render('quote-results-list-yes-plans-block', ['customer_data' => $customer_data, 'prices' => $prices, 'yes_plans_count' => $yes_plans_count]);?>
		<?php endif;?>
	
	<?php else:?>
		<?php if($no_plans_count):?>
			<?=$this->render('quote-results-list-trustage-block', ['customer_data' => $customer_data, 'prices' => $prices, 'no_plans_count' => $no_plans_count]);?>
		<?php endif;?>
	
		<div class="quotes-result__container results-table info-content">
			<div class="d-flex flex-row-reverse flex-sm-row flex-nowrap justify-content-between align-items-center mb-4">
				<div>
					<h2 class="heading-4">TruStage</h2>
					<div class="d-none d-sm-block">Our Rating</div>
					<div class="tableRow__starsWrapp">
						<img src="/v2/common/images/star.png" alt="*">
						<img src="/v2/common/images/star.png" alt="*">
						<img src="/v2/common/images/star.png" alt="*">
						<img src="/v2/common/images/star.png" alt="*">
						<img src="/v2/common/images/star.png" alt="*">
					</div>
				</div>
				<div class="img-bg">
					<img src="/img/company_logos/logo_trustage.png" alt="logo" class="">
				</div>
			</div>
			<hr>
			<div class="row ts-d-table">
				<div class="col-12 col-md-3 d-flex d-md-block justify-content-between mb-3 mb-md-0">
					<div class="desc">Type of coverage</div>
					<div class="title text-right text-md-left pl-4 pl-md-0">Term</div>
				</div>
				<div class="col-12 col-md-3 d-flex d-md-block justify-content-between mb-3 mb-md-0">
					<div class="desc">Financial strength</div>
					<div class="title text-right text-md-left pl-4 pl-md-0">A (Excellent)*</div>
				</div>
				<div class="col-12 col-md-3 d-flex d-md-block justify-content-between mb-3 mb-md-0">
					<div class="desc">Underwriting time</div>
					<div class="title text-right text-md-left pl-4 pl-md-0">A few minutes</div>
				</div>
				<div class="col-12 col-md-3 d-flex d-md-block justify-content-between">
					<div class="desc">Underwritten by</div>
					<div class="title text-right text-md-left pl-4 pl-md-0">CMFG Life Insurance Company</div>
				</div>
			</div>
			<hr>
			<h2 class="quotes-result__containerTitle heading-7 mb-3">About TruStage</h2>
			<p class="gray-text">For more than 80 years, the companies behind TruStage® have strived to carry on the vision of their founders: To offer straightforward insurance backed by a strong company, that is designed to be affordable. TruStage proudly offers products from CMFG Life Insurance Company and have earned the trust of more than 20 million people. Helping families get the most value out of their financial services is at the heart of everything they do.</p>
			<p class="gray-text">*A.M. Best ratings apply to CMFG Life Insurance Company. Rated “A” (Excellent) as of March 2021 by A.M. Best for its financial stability and operating performance. An “A” rating is the third highest of 16 ratings awarded by A.M. Best.”</p>
		</div>
	
		<div class="quotes-result__container results-table">
			<h2 class="quotes-result__containerTitle heading-5 mb-4">Legal Disclosures</h2>
			<p class="gray-text">Life insurance is issued by CMFG Life Insurance Company. The insurance offered is not a deposit, and is not federally insured, sold or guaranteed by any depository institution. This is a term policy to age 80 that has premiums that increase when entering each five-year band: 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, and 75. Base Policy Numbers with a face amount of 100,000 or below: ICC16-A10a-39, A10a-039-2016. Base Policy Numbers with a face amount of 101,000 or above: ICC17-SIT-2, 2017-SIT 2.</p>
			<p class="gray-text">Products and features may vary by state. The insurance offered is not a deposit, and is not federally insured, sold or guaranteed by any financial institution. Corporate Headquarters, Madison, WI</p>
			<p class="gray-text">SIT1,SIT2-3908774.2-0122-0224</p>
		</div>
	<?php endif;?>

<?php else:?>
	<div class="quotes-result__container">
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
	</div>
<?php endif;?>
