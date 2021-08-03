<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\CustomerData;

$customer_data = new CustomerData();

$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->title = 'Questions';

?>
<section class="container second w830 intermediary">
	<?php $form = ActiveForm::begin(['enableAjaxValidation' => false, 'enableClientValidation' => true, 'validationUrl' => Url::toRoute('/validation'), 'id' => 'intermediary', 'action' => '/post/', 'options' => ['class' => 'questions-nq']]); ?>
		<? //=Html::hiddenInput('form_name', 'CustomerData[intermediary_questions]');?>
		<?=$form->field($customer_data, 'form_name')->hiddenInput(['value' => 'intermediary_questions', 'id' => ''])->label(false);?>
		<div class="head-block">
			<div class="title">Pre Qualify</div>
			<div class="small-desc text-center">Please answer the following questions</div>
			<div class="trust-logos visible-xs"><img src="/img/trust_logos.jpg"></div>
		</div>
		<div class="button-block">
			<? //=$form->field($customer_data,'form_name')->hiddenInput(['value'=>'plan','id'=>''])->label(false);?>
			<?php //VarDumper::dump($questions, 100, true);?>
			<?php foreach($questions as $question):?>
			<div class="question active">
				<div class="text" data-type="<?=$question->type;?>" data-question-id="<?=$question->id;?>" data-num="<?=$question->num;?>"><?=$question->text;?></div>
				<? //=Html::hiddenInput('im_questions['.$question->id.']');?>
				<?=$form->field($customer_data, 'im_questions['.$question->xml_num.']')->hiddenInput(['value' => '', 'id' => ''])->label(false);?>
				<?php if(count($question->sub_questions)):?>
				<table class="sub-questions">
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
				<div class="buttons">
					<div class="yes-button sub-button">Yes</div>
					<div class="no-button sub-button">No</div>
				</div>
			</div>
			<?php endforeach;?>
		</div>

		<div class="footer-block">
			<div class="button">
				<?=Html::submitButton('Next', ['class' => 'btn btn-info', 'disabled' => 'disabled']);?>
			</div>
		</div>
	<?php ActiveForm::end() ?>
</section>