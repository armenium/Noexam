<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
use app\models\CustomerData;

$page_id = 'online-app-intermediary-questions';

/* @var $this yii\web\View */
$this->title = 'Questions';
$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$isMobile = Yii::$app->params['devicedetect']['isMobile'];

$this->registerCssFile('@web/v2/plugins/css/slick.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
#$this->registerCssFile('@web/v2/plugins/css/jquery.jscrollpane.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-application/css/online-app.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/my-application/css/online-app-questions.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/plugins/js/slick.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
#$this->registerJsFile('@web/v2/plugins/js/jquery.jscrollpane.min.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-application/js/online-app.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/my-application/js/'.$page_id.'.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

?>
<div class="main-wrapp bg0 main-questions">
	<div class="wrapp">
		<div class="online-app-questions my-quote-steps">
			<div class="my-quote-steps__steps">
				<div class="my-quote-steps__steps-item">1</div>
				<span class="my-quote-steps__decor-line"></span>
				<div class="my-quote-steps__steps-item">2</div>
				<span class="my-quote-steps__decor-line"></span>
				<div class="my-quote-steps__steps-item">3</div>
			</div>
		</div>

		<div class="online-app-questions__form content questions">
			<?php $form = ActiveForm::begin([
				'enableAjaxValidation' => false,
				'enableClientValidation' => true,
				'validationUrl' => Url::toRoute('/my-application/validation'),
				'id' => 'intermediary',
				'action' => '/my-application/post/',
				'options' => ['class' => 'online-app-step-intermediary__form'], 'fieldConfig' => ['options' => ['tag' => false]]
			]);?>
				<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'intermediary_questions', 'id' => ''])->label(false)->error(false);?>

				<div id="js_questions_container" class="online-app-questions__box scroll-bar">
					<h1 class="text-center heading-5 question mb-2">Pre Qualify</h1>
					<h5 class="small-desc text-center mb-3">Please answer the following questions</h5>
					<div class="trust-logos text-center"><img src="/img/trust_logos.jpg"></div>
	
					<div class="sub-questions">
	
						<?php foreach($questions as $question):?>
							<div class="q-slide mt-5">
								<div class="online-app-questions__item trans_all question" data-type="<?=$question->type;?>" data-question-id="<?=$question->id;?>" data-num="<?=$question->num;?>">
									<div class="online-app-questions__item-header">
										<p class="fontBodyM mb-2"><?=$question->text;?></p>
									</div>
									<?=$form->field($customer_data, 'im_questions['.$question->xml_num.']')->hiddenInput(['value' => '', 'id' => ''])->label(false)->error(false);?>
									<?php if(count($question->sub_questions)):?>
										<table class="online-app-questions__table">
											<tr>
												<?php $i=0; foreach($question->sub_questions as $key => $sub_question): $i++;?>
												<td class="sub-question"><div class="text"><?=$sub_question->text;?></div></td>
												<?php if($i%2 == 0 && $i < count($question->sub_questions)):?>
											</tr><tr>
												<?php endif;?>
												<?php endforeach;?>
											</tr>
										</table>
									<?php endif;?>
									<div class="online-app-questions__btns buttons">
										<a role="button" class="online-app-questions__btn yes-button sub-button">Yes</a>
										<a role="button" class="online-app-questions__btn no-button sub-button">No</a>
									</div>
								</div>
							</div>
						<?php endforeach;?>
	
					</div>
					
				</div>
	
				<div class="online-app-questions__form-btns">
					<button type="button" class="online-app-questions__form-btn main-btn button-big back-button">Back</button>
					<button type="submit" class="online-app-questions__form-btn main-btn button-big next-button" disabled>next</button>
				</div>
			<?php ActiveForm::end();?>

		</div>

	</div>
</div>

<img class="bg-section__img1" src="/v2/common/images/online-app/online-app-bg-1.png" alt="">
<img class="bg-section__img2" src="/v2/common/images/online-app/online-app-bg-2.png" alt="">
<img class="bg-section__img3" src="/v2/common/images/online-app/online-app-bg-3.png" alt="">

