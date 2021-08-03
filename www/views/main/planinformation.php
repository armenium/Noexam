<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\VarDumper;

$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->title = 'Plan Information';

?>
<div class="plan-info-index">
	<div class="head-block">
		
		<div class="title">Your Plan Information</div>
		<div class="small-desc text-center">Please verify this information is accurate.</div>
		<?php #VarDumper::dump($customer_data, 1, true);?>
		<div class="trust-logos visible-xs"><img src="/img/trust_logos.jpg"></div>
		<div class="list-block">
			<ul>
				<li>I am a <?=$customer_data->view_data->age;?> Year Old <?=$customer_data->view_data->gender;?></li>
				<li><?=$customer_data->view_data->amount;?> of Life Insurance</li>
				<li><?=$customer_data->term;?> Year Term</li>
				<li><?=$customer_data->view_data->tobaco;?></li>
				<li>Residing in <?=$customer_data->view_data->state;?></li>
			</ul>
		</div>
		<div class="button-block">
			<?php $form = ActiveForm::begin([
			   'enableAjaxValidation' => false,
			   'enableClientValidation'=>true,
			   'validationUrl' => Url::toRoute('/validation'),
			   'id' => 'plan-form',
			   'action' => '/post/',
			   'options' => ['class' => 'plan-information'],
			 ]);?>
			 <?=$form->field($customer_data,'form_name')->hiddenInput(['value'=>'plan','id'=>''])->label(false);?>
			<div class="input checkbox">
				 <?=$form->field($customer_data,'agree', ['template'=>'{input}{label}{error}{hint}'])->checkbox([],false)->label('I have read and agree to the information');?>
			</div>
			<div class="button">
				<!-- <button type="button" class="btn btn-info" disabled="">Apply Online</button> -->
				<?= Html::submitButton('Apply Online', ['class' => 'btn btn-info']) ?>
			</div>
			 <?php ActiveForm::end() ?>
		</div>
	</div>

	<div class="footer-block">
		<div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit dicta facere nihil placeat pariatur repellendus, ratione delectus consectetur provident ipsam ad enim praesentium hic. Aut beatae libero cupiditate sint deleniti consectetur, eaque totam voluptate, maiores sit aspernatur, ipsam iure odit sunt nam labore delectus impedit. Error, amet architecto, quaerat veniam sapiente vitae quia pariatur esse tempora dolores, nesciunt optio natus. Dolorum officiis, eos! Accusamus quos commodi non atque ratione harum cum voluptas expedita, error consequatur, suscipit voluptate quisquam reiciendis fugit optio repellat omnis voluptatibus vitae! Impedit, enim, accusamus excepturi eum eos, amet praesentium exercitationem voluptates dicta minus cupiditate ea quo?</div>
		<div class="met-logo text-center"><img src="/img/metlife-logo.png" alt=""></div>
	</div>
</div>