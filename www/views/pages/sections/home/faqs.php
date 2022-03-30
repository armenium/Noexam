<div class="main-wrapp bg1">
	<div class="wrapp">
		<section class="questions">
			<h2 class="questions__title heading-2">Frequently Asked <span>Questions</span></h2>
			<div class="questions__container">
				<?php foreach($faq_items as $item):?>
					<div class="questions__item trans_all" id="question_<?=$item->id;?>">
						<div class="questions__card-title heading-6"><?=$item->question;?></div>
						<div class="questions__card-body">
							<div class="questions__card-text fontBodyM">
								<?php if(!empty($item->answer_tpl)):?>
									<?=$this->render(str_replace('views/', '', $item->answer_tpl));?>
								<?php else:?>
									<?=$item->answer;?>
								<?php endif;?>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</section>
	</div>
</div>
