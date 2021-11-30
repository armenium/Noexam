<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;

#VarDumper::dump($bf_id, 10, 1);
?>
<div class="beneficiary_item bf_item">
	<a role="button" class="remove-bf icon-trash d-none" data-trigger="js_action_click" data-action="remove_beneficiary"></a>
	<h3 class="beneficiary-id online-app-step-3__form-title main-title">Beneficiary #<span class="number"><?=$bf_id?></span></h3>
	
	<div class="row mb-4">
		<div class="col-6">
			<label for="first-name" class="online-app-step-3__label online-app-main-label tags">First Name</label>
			<?=$form->field($customer_data, "beneficiary[$bf_id][first-name]")->textInput(['required' => 'required', 'class' => 'online-app-step-3__input online-app-main-input', 'placeholder' => 'First Name', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false) ->error(false);?>
		</div>
		<div class="col-6">
			<label for="last-name" class="online-app-step-3__label online-app-main-label tags">Last Name</label>
			<?=$form->field($customer_data, "beneficiary[$bf_id][last-name]")->textInput(['required' => 'required', 'class' => 'online-app-step-3__input online-app-main-input', 'placeholder' => 'Last Name', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
		</div>
	</div>
	
	<div class="row mb-4">
		<div class="col-6">
			<label for="relationship_<?=$bf_id;?>" class="online-app-step-3__label online-app-main-label tags">Relationship</label>
			<?=$form->field($customer_data, "beneficiary[$bf_id][relationship]")->dropDownList($customer_data::$relationships, [
					'class' => 'js_selectpicker online-app-step-3__select',
					'id' => 'relationship_'.$bf_id,
					'required' => 'required',
					'data-dropup-auto' => true,
					'data-style' => '',
					'data-title' => 'Relationship',
					'data-size'  => 5,
					'data-mobile' => (string)$isMobile
			])->label(false)->error(false);?>
		</div>
		<div class="col-6">
			<label for="percentage" class="online-app-step-3__label online-app-main-label tags">Percentage</label>
			<?=$form->field($customer_data, "beneficiary[$bf_id][percentage]")->textInput(['required' => 'required', 'class' => 'online-app-step-3__input online-app-main-input', 'placeholder' => 'Percentage', 'autocomplete' => 'on', 'autofocus ' => ''])->label(false)->error(false);?>
		</div>
	</div>
</div>


