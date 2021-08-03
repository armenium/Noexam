<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
// use yii\widgets\MaskedInput;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Url;

$js = '
jQuery(".beneficiaryform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".beneficiaryform_wrapper .beneficiary-id").each(function(index) {
        jQuery(this).find(".text").html("Beneficiary # " + (index + 1))
        if( index > 0 ) jQuery(this).find(".remove-bf").removeClass("hide");

    });
});
jQuery(".beneficiaryform_wrapper").on("afterDelete", function(e) {
    jQuery(".beneficiaryform_wrapper .beneficiary-id").each(function(index) {
        jQuery(this).html("Beneficiary # " + (index + 1))
        if( index > 0 ) jQuery(this).find(".remove-bf").removeClass("hide");
    });
});
';

$this->registerJs($js);
?>
<?php $form = ActiveForm::begin([
  'id' => 'beneficiary-form',
  // 'enableAjaxValidation' => true,
  // 'enableClientValidation'=>true,
  // 'validationUrl' => Url::toRoute('/validation'),
]); 
?>


  <?php DynamicFormWidget::begin([
    'widgetContainer' => 'beneficiaryform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.bf_container', // required: css class selector
    'widgetItem' => '.bf_item', // required: css class
    'limit' => 5, // the maximum times, an element can be cloned (default 999)
    'min' => 1, // 0 or 1 (default 1)
    'insertButton' => '.add-bf', // css class
    'deleteButton' => '.remove-bf', // css class
    'model' => $beneficiaryModels[0],
    'formId' => 'beneficiary-form',
    'formFields' => [
        'first_name',
        'last_name',
        'relationship',
        'percentage',
        'street_address',
        'city',
        'state',
        'zip',
    ],
  ]); 
  ?>

    <div class="beneficiary_container bf_container">

      <?php foreach ($beneficiaryModels as $index => $beneficiaryModel): ?>

      <div class="beneficiary_item bf_item">

            <div class="beneficiary-id clearfix">
              <div class="picture"></div>
              <div class="text">Beneficiary # <?= ($index +1) ?></div>
               <div class="remove-bf hide"></div>
            </div>

            <?php
                // necessary for update action.
                // if (! $modelAddress->isNewRecord) {
                //     echo Html::activeHiddenInput($beneficiaryModel, "[{$i}]id");
                // }
            ?>
            <div class="row-input clearfix active">

                
                <?= $form->field($beneficiaryModel, '['.$index.']first_name',['options'=>['class'=>'input first-name']])->textInput(['maxlength' => true,  'placeholder'=>'First Name', 'autocomplete'=>'nope', 'autofocus '=>'']) ?>
                <?= $form->field($beneficiaryModel, '['.$index.']last_name',['options'=>['class'=>'input last-name']])->textInput(['maxlength' => true,  'placeholder'=>'Last Name', 'autocomplete'=>'nope', 'autofocus '=>'']) ?>

            </div>
            <div class="row-input clearfix">
             
                <?= $form->field($beneficiaryModel, '['.$index.']relationship',['options'=>['class'=>'input select relationship']])->dropDownList(["r1"=>"Relation1","r2"=>"Relation2"], ["prompt"=>"Relationship","class"=>"selectpicker"]) ?>
                <?= $form->field($beneficiaryModel, '['.$index.']percentage',['options'=>['class'=>'input percentage-bf']])->textInput(['maxlength' => true,  'placeholder'=>'Percentage', 'autocomplete'=>'nope', 'autofocus '=>''])->label('Percentage - %') ?>

            </div>
            <div class="row-input clearfix ">

                <?= $form->field($beneficiaryModel, '['.$index.']street_address',['options'=>['class'=>'input street-address']])->textInput(['maxlength' => true,  'placeholder'=>'Street Address', 'autocomplete'=>'nope', 'autofocus '=>'']) ?>
                      
            </div>
            <div class="row-input clearfix ">
             <!--  <div class="sign">
               <div class="picutre street-address"></div>
             </div> -->

                <?= $form->field($beneficiaryModel, '['.$index.']city',['options'=>['class'=>'input city']])->textInput(['maxlength' => true,  'placeholder'=>'City', 'autocomplete'=>'nope', 'autofocus '=>'']) ?>
                <?= $form->field($beneficiaryModel, '['.$index.']state',['options'=>['class'=>'input select state']])->dropDownList(["AK"=>"AK","AZ"=>"AZ"], ["prompt"=>"State","class"=>"selectpicker"]) ?>
              
                <?= $form->field($beneficiaryModel, '['.$index.']zip',['options'=>['class'=>'input zip']])->textInput(['maxlength' => true,  'placeholder'=>'Zip Code', 'autocomplete'=>'nope', 'autofocus '=>'']) ?>
              

            </div>
         
      </div>

      <?php endforeach; ?>


    </div>


    <div class="add-beneficiary add-bf clearfix">
      <div class="picture"></div>
      <div class="text">Add Beneficiary</div>
    </div>
  <?php DynamicFormWidget::end(); ?>


<?php ActiveForm::end(); ?>