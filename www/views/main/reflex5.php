<?php
use yii\helpers\Html;
?>			
<?php $counter = 1; foreach ($reflex as $key => $reflex_item2):?>
	<div class="sub-question <?=($key==0)?'active':'';?>" data-parent-id="<?=$parentQustionId?>" data-question-number="<?=($questionNumber)? $questionNumber.'-'.$counter:$counter;?>" data-type="<?=$reflex_item2->type?>" data-question-id="<?=$reflex_item2->id?>" data-answer="">
		<?php echo Html::hiddenInput($reflex_item2->xml_num); ?>
		<div class="q-num"><?=($questionNumber) ? '-' : $counter;?></div>
		<?php $counter++;?>
		<div class="text"><?=$reflex_item2->text?></div>
		<div class="buttons">
			<?php if($answers = $reflex_item2->answer):?>
				<?php #\yii\helpers\VarDumper::dump($answers, 10, 1);?>
				<?php $confirm_btn = false;
				foreach ($answers as $key => $answer):?>
					<?php if($answer->type == 'text_field' || $answer->type == 'text_area' || $answer->type == 'table'): $confirm_btn = true;?>
						<?php if(!empty($answer->field_label)):?>
						<div class="lbl"><?=$answer->field_label;?></div>
						<?php endif;?>
						<?php if($answer->type == 'text_field'):?>
							<div class="input select reflex_input">
								<?=Html::textInput($answer->xml_num,'',['autocomplete'=>'off']); ?>
							</div>
						<?php elseif($answer->type == 'text_area'):?>
							<div class="input ta select reflex_input">
								<?=Html::textarea($answer->xml_num, '', ['autocomplete' => 'off']);?>
							</div>
						<?php elseif($answer->type == 'table'):?>
							<?php if(!empty($answer->template_src)):?>
								<?=$this->render('templates/'.$answer->template_src, ['answer' => $answer]);?>
							<?php endif;?>
						<?php endif?>
					<?php endif?>

					<?php if($answer->type == 'select'):
						$question_id = $answer->q_id;
						$select[$answer->value] = $answer->text;
					endif;?>
				<?php endforeach?>
				<?php if($confirm_btn):?>
				<div class="btn btn-success btn-confirm">Confirm</div>
				<div class="clearfix"></div>
				<?php endif;?>
			<?php else:?>
				<div class="yes-button reflex-button">Yes</div>
				<div class="no-button reflex-button">No</div>
			<?php endif?>
			<?php if($select):?>
				<div class="input select">
					<?php echo Html::dropDownList('q_'.$question_id,'',$select, ["prompt"=>"Please select","class"=>"selectpicker","data-size"=>"5"]); ?>
				</div>
				<div class="btn btn-success btn-confirm">Confirm</div>
				<?php unset($select);?>
			<?php endif?>
		</div>
	</div>
<?php endforeach?>
