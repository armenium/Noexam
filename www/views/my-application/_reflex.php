<?php
use yii\helpers\Html;
?>			
<?php $counter = 1; foreach ($reflex as $key => $reflex_item2):?>
	<div class="online-app-questions__item trans_all sub-question <?=($key==0) ? 'active' : '';?>" data-parent-id="<?=$parentQustionId?>" data-question-number="<?=($questionNumber)? $questionNumber.'-'.$counter:$counter;?>" data-type="<?=$reflex_item2->type?>" data-question-id="<?=$reflex_item2->id?>" data-answer="">
		<?=Html::hiddenInput($reflex_item2->xml_num); ?>
		<div class="online-app-questions__item-header">
			<span class="online-app-questions__item-num q-num"><?=($questionNumber) ? '-' : $counter;?></span>
			<?php $counter++;?>
			<p class="online-app-questions__text fontBodyM text"><?=$reflex_item2->text?></p>
		</div>
		<?php if($answers = $reflex_item2->answer): $confirm_btn = false;?>
			<div class="online-app-questions__fields">
				<?php foreach ($answers as $key => $answer):?>
					<?php if($answer->type == 'text_field' || $answer->type == 'text_area' || $answer->type == 'table'): $confirm_btn = true;?>
						<?php if(!empty($answer->field_label)):?>
						<div class="lbl"><?=$answer->field_label;?></div>
						<?php endif;?>
						<?php if($answer->type == 'text_field'):?>
							<div class="input select reflex_input">
								<?=Html::textInput($answer->xml_num, '', ['autocomplete' => 'off', 'class' => 'online-app-step-2__input online-app-main-input']);?>
							</div>
						<?php elseif($answer->type == 'text_area'):?>
							<div class="input ta select reflex_input">
								<?=Html::textarea($answer->xml_num, '', ['autocomplete' => 'off', 'class' => 'online-app-step-2__input online-app-main-input']);?>
							</div>
						<?php elseif($answer->type == 'table'):?>
							<?php if(!empty($answer->template_src)):?>
								<?=$this->render('_'.$answer->template_src, ['answer' => $answer]);?>
							<?php endif;?>
						<?php endif?>
					<?php endif?>

					<?php if($answer->type == 'select'):
						$question_id = $answer->q_id;
						$select[$answer->value] = $answer->text;
					endif;?>
				<?php endforeach?>
			</div>
			<?php if($confirm_btn):?>
				<div class="online-app-questions__btns buttons">
					<a role="button" class="online-app-questions__btn active btn-confirm">Confirm</a>
				</div>
			<?php endif;?>
		<?php else:?>
			<div class="online-app-questions__btns buttons">
				<a role="button" class="online-app-questions__btn yes-button reflex-button">Yes</a>
				<a role="button" class="online-app-questions__btn no-button reflex-button">No</a>
			</div>
		<?php endif?>
		<?php if($select):?>
			<div class="input select">
				<?=Html::dropDownList('q_'.$question_id, '', $select, ["prompt" => "Please select", "class" => "js_selectpicker show-tick online-app-step-2__select", "data-size" => "5"]);?>
			</div>
			<div class="online-app-questions__btns buttons">
				<a role="button" class="online-app-questions__btn active btn-confirm">Confirm</a>
			</div>
			<?php unset($select);?>
		<?php endif?>
	</div>
<?php endforeach?>
