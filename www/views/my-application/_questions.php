<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Questions';
?>
<?php if(count($subquestions)):?>
	<h1 class="online-app-questions__title heading-5 question" data-type="<?=$question->type?>" data-question-id="<?=$question->id?>" data-num="<?=$question->num?>"><?=$question->text?></h1>
	<?=Html::hiddenInput($question->xml_num); ?>
<?php endif?>
<div class="sub-questions">
	<?php if(count($subquestions)):?>
		<?php foreach ($subquestions as $question_items):?>
			<div class="q-slide">
				<?php foreach ($question_items as $key => $question_item):?>
					<div class="online-app-questions__item trans_all sub-question <?=($key==0)?'active':'';?>" data-parent-id="<?=$question->id?>" data-question-id="<?=$question_item->id?>" data-type="<?=$question_item->type?>" data-question-id="<?=$question_item->id?>" data-answer="">
						<?=Html::hiddenInput($question_item->xml_num); ?>
						<div class="online-app-questions__item-header">
							<span class="online-app-questions__item-num q-num"><?=$question_item->num?></span>
							<p class="online-app-questions__text fontBodyM text"><?=$question_item->text?></p>
						</div>
						<div class="online-app-questions__btns buttons">
							<?php if(!empty($question_item->template_src)):?>
								<?=$this->render('templates/'.$question_item->template_src, ['question_item' => $question_item, 'qustionId' => $question_item->id, 'parentQustionId' => $question->id, 'questionNumber' => $question->num]);?>
							<?php else:?>
								<a role="button" class="online-app-questions__btn yes-button sub-button">Yes</a>
								<a role="button" class="online-app-questions__btn no-button sub-button">No</a>
							<?php endif;?>
						</div>
						<div class="reflex-questions"></div>
					</div>
				<?php endforeach?>
			</div>
		<?php endforeach?>
	<?php else:?>
		<div class="q-slide">
			<?=Html::hiddenInput($question_item->xml_num); ?>
			<div class="online-app-questions__item trans_all sub-question active" data-question-id="<?=$question->id?>" data-type="<?=$question->type?>" data-num="<?=$question->num?>" data-answer="">
				<div class="online-app-questions__item-header">
					<span class="online-app-questions__item-num q-num"><?=$question->num?></span>
					<p class="online-app-questions__text fontBodyM text"><?=$question->text?></p>
				</div>
				<div class="online-app-questions__btns buttons">
					<a role="button" class="online-app-questions__btn yes-button sub-button">Yes</a>
					<a role="button" class="online-app-questions__btn no-button sub-button">No</a>
				</div>
				<div class="reflex-questions"></div>
			</div>
		</div>
	<?php endif?>
</div>
