<?php

use app\widgets\ApplyNowForm;

?>
<div class="main-wrapp" style="background-color: #FCF9F3;">
	<div class="wrapp">
		<div class="d-flex justify-content-between flex-column-reverse align-items-center flex-lg-row align-items-lg-start">
			<?=ApplyNowForm::widget(['form' => 'apply-now-form-v', 'title' => 'General Information']);?>
			
			<div class="rates-form__info rates-form-info">
				<div class="rates-form-info__item">
					<h3 class="rates-form-info__title tags">Low monthy payment</h3>
					<p class="rates-form-info__text fontBodyS">Fixed monthly rates that will never change during the level term period of your policy.</p>
				</div>
				<div class="rates-form-info__item">
					<h3 class="rates-form-info__title tags">No hassle</h3>
					<p class="rates-form-info__text fontBodyS">Our fast and simple questionnaire will get you coverage fast.</p>
				</div>
				<div class="rates-form-info__item">
					<h3 class="rates-form-info__title tags">Easy to qualify</h3>
					<p class="rates-form-info__text fontBodyS">Answer our short medical health application to see if you qualify for immediate coverage.</p>
				</div>
			</div>
		</div>
	</div>
</div>
