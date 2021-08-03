<?php

use yii\helpers\Html;

$isMobile = Yii::$app->params['devicedetect']['isMobile'];
$p = [];
for($i = 100; $i >= 0; $i -= 10){
	$p[$i] = $i.'%';
}
?>
<div class="beneficiary_item bf_item">
	<div class="beneficiary-id clearfix">
		<div class="picture"></div>
		<div class="icon-name active"></div>
		<div class="icon-heart"></div>
		<div class="text">Beneficiary #<span class="number"><?=$bf_id?></span></div>
		<div class="remove-bf hide"></div>
	</div>
	<div class="benef-info-title">Beneficiary Information</div>
	<div class="row-input clearfix active">
		<div class="input first-name">
			<?=$form->field($customer_data, "beneficiary[$bf_id][first-name]")->textInput(['class' => false, 'placeholder' => 'First Name', 'autocomplete' => 'on', 'autofocus ' => ''])->label('First Name');?>
		</div>
		<div class="input last-name">
			<?=$form->field($customer_data, "beneficiary[$bf_id][last-name]")->textInput(['class' => false, 'placeholder' => 'Last Name', 'autocomplete' => 'on', 'autofocus ' => ''])->label('Last Name');?>
		</div>
	</div>
	<div class="row-input clearfix">
		<div class="input select relationship">
			<?=$form->field($customer_data, "beneficiary[$bf_id][relationship]")->dropDownList($customer_data::$relationships, ['class' => 'selectpicker', 'id' => '', 'data-style' => 'btn-info', 'data-title' => 'Relationship', 'data-size'  => '5', 'data-mobile' => (string)$isMobile])->label('Relationship');?>
		</div>
		<div class="input select percentage">
			<?=$form->field($customer_data, "beneficiary[$bf_id][percentage]")->textInput(['class' => false, 'placeholder' => 'Percentage', 'autocomplete' => 'on', 'autofocus ' => ''])->label('Percentage');?>
		</div>

	</div>
</div>