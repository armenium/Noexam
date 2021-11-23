<?php

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\JqueryAsset;
use yii\web\View;

$page_id = 'online-app-questions';

/* @var $this yii\web\View */
$this->title = 'Questions';
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$this->registerCssFile('@web/v2/my-application/css/online-app.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-application/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-application/js/online-app.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
?>

<div class="main-wrapp">
	<div class="wrapp">
		<div class="online-app-questions my-quote-steps">
			<div class="my-quote-steps__steps">
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">1</div>
				<span class="my-quote-steps__decor-line my-quote-steps__decor-line--active"></span>
				<div class="my-quote-steps__steps-item my-quote-steps__steps-item--active">2</div>
				<span class="my-quote-steps__decor-line my-quote-steps__decor-line--active"></span>
				<div class="my-quote-steps__steps-item">3</div>
			</div>
		</div>

		<form class="online-app-questions__form">
			<div class="online-app-questions__box">
				<?php if(count($subquestions)):?>
					<h1 class="online-app-questions__title heading-5 question" data-type="<?=$question->type;?>" data-question-id="<?=$question->id;?>" data-num="<?=$question->num;?>">
						<?=$question->text;?>
					</h1>
					<?=Html::hiddenInput($question->xml_num);?>
				<?php endif?>

				<div class="sub-questions">
					<?php if(count($subquestions)):?>
					
					<?php else:?>
					
					<?php endif?>
					<div class="online-app-questions__item">
						<div class="online-app-questions__item-header">
							<span class="online-app-questions__item-num">1</span>
							<p class="online-app-questions__text fontBodyM">Does the Proposed Insured currently receive health care at home, or require assistance with activities of daily living such as bathing, dressing, feeding, taking medications or use of toilet?</p>
						</div>

						<div class="online-app-questions__btns">
							<a class="online-app-questions__btn" href="#">yes</a>
							<a class="online-app-questions__btn" href="#">no</a>
						</div>
					</div>
					<div class="online-app-questions__item">
						<div class="online-app-questions__item-header">
							<span class="online-app-questions__item-num">2</span>
							<p class="online-app-questions__text fontBodyM">Is the Proposed Insured currently in a Hospital, Psychiatric, Extended or Assisted Care, Nursing Facility?</p>
						</div>
						<div class="online-app-questions__btns">
							<a class="online-app-questions__btn" href="#">yes</a>
							<a class="online-app-questions__btn" href="#">no</a>
						</div>
					</div>
					<div class="online-app-questions__item">
						<div class="online-app-questions__item-header">
							<span class="online-app-questions__item-num">3</span>
							<p class="online-app-questions__text fontBodyM">Is the Proposed Insured currently in a Prison or Correctional facility due to a misdemeanor or felony conviction?</p>
						</div>
						<div class="online-app-questions__btns">
							<a class="online-app-questions__btn" href="#">yes</a>
							<a class="online-app-questions__btn" href="#">no</a>
						</div>
					</div>
				</div>
			</div>

			<div class="online-app-questions__form-btns">
				<button type="submit" class="online-app-questions__form-btn main-btn button-big" href="#">Back</button>
				<button type="submit" class="online-app-questions__form-btn main-btn button-big" href="#">next</button>
			</div>

		</form>

	</div>
</div>

<img class="bg-section__img1" src="/v2/common/images/online-app/online-app-bg-1.png" alt="">
<img class="bg-section__img2" src="/v2/common/images/online-app/online-app-bg-2.png" alt="">
<img class="bg-section__img3" src="/v2/common/images/online-app/online-app-bg-3.png" alt="">

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
