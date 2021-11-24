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

$this->registerCssFile('@web/v2/plugins/css/slick.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
#$this->registerCssFile('@web/v2/plugins/css/jquery.jscrollpane.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-application/css/online-app.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-application/css/'.$page_id.'.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/plugins/js/slick.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
#$this->registerJsFile('@web/v2/plugins/js/jquery.jscrollpane.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-application/js/online-app.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-application/js/'.$page_id.'.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
?>

<div class="main-wrapp main-questions">
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

		<div class="online-app-questions__form content questions">
			<div id="js_questions_container" class="online-app-questions__box scroll-bar">
				<?php if(count($subquestions)):?>
					<h1 class="online-app-questions__title heading-5 question" data-type="<?=$question->type;?>" data-question-id="<?=$question->id;?>" data-num="<?=$question->num;?>">
						<?=$question->text;?>
					</h1>
					<?=Html::hiddenInput($question->xml_num);?>
				<?php endif?>

				<div class="sub-questions">

					<?php if(count($subquestions)):?>
						<?php foreach($subquestions as $question_items):?>
							<div class="q-slide">
								<?php foreach($question_items as $key => $question_item):?>
									<div class="online-app-questions__item trans_all sub-question <?=($key == 0 ? 'active' : '');?>" data-parent-id="<?=$question->id;?>" data-question-id="<?=$question_item->id;?>" data-type="<?=$question_item->type;?>" data-question-id="<?=$question_item->id;?>" data-answer="">
										<?=Html::hiddenInput($question_item->xml_num);?>
										<div class="online-app-questions__item-header">
											<span class="online-app-questions__item-num q-num"><?=$question_item->num;?></span>
											<p class="online-app-questions__text fontBodyM text"><?=$question_item->text;?></p>
										</div>
										<div class="online-app-questions__btns buttons">
											<a role="button" class="online-app-questions__btn yes-button sub-button">Yes</a>
											<a role="button" class="online-app-questions__btn no-button sub-button">No</a>
										</div>
										<div class="reflex-questions"></div>
									</div>
								<?php endforeach?>
							</div>
						<?php endforeach?>
					<?php else:?>
						<div class="q-slide">
							<?=Html::hiddenInput($question_item->xml_num);?>
							<div class="online-app-questions__item trans_all sub-question active" data-question-id="<?=$question->id;?>" data-type="<?=$question->type;?>" data-num="<?=$question->num;?>" data-answer="">
								<div class="online-app-questions__item-header">
									<span class="online-app-questions__item-num q-num"><?=$question->num;?></span>
									<p class="online-app-questions__text fontBodyM text"><?=$question->text;?></p>
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
			</div>

			<div class="online-app-questions__form-btns">
				<button type="button" class="online-app-questions__form-btn main-btn button-big back-button">Back</button>
				<button type="button" class="online-app-questions__form-btn main-btn button-big next-button" disabled>next</button>
			</div>

		</div>

	</div>
</div>

<img class="bg-section__img1" src="/v2/common/images/online-app/online-app-bg-1.png" alt="">
<img class="bg-section__img2" src="/v2/common/images/online-app/online-app-bg-2.png" alt="">
<img class="bg-section__img3" src="/v2/common/images/online-app/online-app-bg-3.png" alt="">

