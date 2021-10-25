<div class="main-wrapp" style="background-color: #FFFFFF;">
	<div class="wrapp">
		<section class="questions">
			<h1 class="questions__title heading-2">Frequently Asked <span>Questions</span></h1>
			<div class="questions__container">
				<?php foreach($faq_items as $item):?>
				<div class="questions__item questions__item--life-insurance trans_all" id="question_<?=$item->id;?>">
					<h6 class="questions__card-title heading-6"><?=$item->question;?></h6>
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
