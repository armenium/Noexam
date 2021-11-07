<?php
use yii\helpers\Html;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */

$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->title = 'Questions';

//VarDumper::dump($question, 10, 1);
?>

<div class="row top-bar">
	<div class="head-block">
		<div class="iconbar">
			<div id="current_step_icon" class="icon-name active"></div>
			<div class="icon-heart"></div>
		</div>
		<div class="text"></div>
		<a href="#" class="q-mark" data-toggle="tooltip" data-placement="left" title="Please enter the information for the person who is applying for life insurance."></a>
	</div>
</div>

<div class="row content questions">
	<div class="scroll-bar">
		<?php if(count($subquestions)):?>
			<div class="question" data-type="<?=$question->type;?>" data-question-id="<?=$question->id;?>" data-num="<?=$question->num;?>"><?=$question->text;?></div>
			<?=Html::hiddenInput($question->xml_num);?>
		<?php endif?>
		<div class="sub-questions">
			<?php if(count($subquestions)):?>
				<?php foreach($subquestions as $question_items):?>
					<div class="q-slide">
						<?php foreach($question_items as $key => $question_item):?>
							<div class="sub-question <?=($key == 0 ? 'active' : '');?>" data-parent-id="<?=$question->id;?>" data-question-id="<?=$question_item->id;?>" data-type="<?=$question_item->type;?>" data-question-id="<?=$question_item->id;?>" data-answer="">
								<?=Html::hiddenInput($question_item->xml_num);?>
								<div class="q-num"><?=$question_item->num;?></div>
								<div class="text"><?=$question_item->text;?></div>
								<div class="buttons">
									<div class="yes-button sub-button">Yes</div>
									<div class="no-button sub-button">No</div>
								</div>
								<div class="reflex-questions"></div>
							</div>
						<?php endforeach?>
					</div>
				<?php endforeach?>
			<?php else:?>
				<div class="q-slide">
					<?=Html::hiddenInput($question_item->xml_num);?>
					<div class="sub-question active" data-question-id="<?=$question->id;?>" data-type="<?=$question->type;?>" data-num="<?=$question->num;?>" data-answer="">
						<div class="q-num"><?=$question->num;?></div>
						<div class="text"><?=$question->text;?></div>
						<div class="buttons">
							<div class="yes-button sub-button">Yes</div>
							<div class="no-button sub-button">No</div>
						</div>
						<div class="reflex-questions"></div>
					</div>
				</div>
			<?php endif?>
		</div>
	</div>
</div>

<div class="row bottom-bar">
	<div class="back-button">Back</div>
	<div class="bar-progress-wrapper">
		<div class="bar-progress">
			<div class="bar-line" data-progress="50"></div>
		</div>
	</div>
	<div class="next-button">Next</div>
</div>
