<?php

use yii\helpers\Html;
use yii\helpers\CHtml;
/* @var $this yii\web\View */
$this->title = 'Payment Info';
?>
<div class="row content payment-info">
  <div class="head-block">
    <div class="text">Proposed Insured Information</div>
    <div class="q-mark"></div>
  </div>
  <div class="form-block clearfix">

    <!-- <div class="left-bar">
      <div class="vertical-line">
        <div class="inner-line"></div>
      </div>
    </div> -->


    <form action="">
      <div class="payment-block clearfix">

        <div class="inner clearfix">
          <div class="payment-method clearfix">
            <div class="title">Payment Method</div>
            <div class="input checkbox">
              <div class="input radio">
                  
                <?php echo Html::radio('payment-method',true,['id'=>'payment-method-eft','value'=>'eft']); ?>
                <label for="payment-method-eft">EFT Checking Account</label>
              </div>
              <div class="input radio">
                <?php echo Html::radio('payment-method',false,['id'=>'payment-method-card','value'=>'card']); ?>
                <label for="payment-method-card">Credit Card</label>
              </div>
            </div>
          </div> 
          
          <div class="payment-frequency clearfix">
            <div class="title">Payment Frequency</div>
            <div class="input checkbox">
              <div class="input radio">
                <?php  echo Html::radio('payment_frequency',false,['id'=>'monthly', 'value'=>'monthly']); ?>
                <label for="monthly">Monthly ($93.62)</label>
              </div>
              <div class="input radio">
                <?php  echo Html::radio('payment_frequency',true,['id'=>'annual', 'value'=>'annual']); ?>
                <label for="annual">Annual ($1,123.44)</label>
              </div>
            </div>
          </div>
        </div>
      
      </div>
      <div class="row-input clearfix hovered">
    <!--     <div class="sign">
      <div class="picutre bank-name"></div>
    </div> -->
     <!--    <div class="nonhowered">
       Bank Name
     </div> -->
       <div class="onhowered">
          <div class="input bank-name">
           <label for="first-name">Bank Name</label>
           <?php echo Html::textInput('bank-name','',['placeholder'=>'Bank Name', 'autocomplete'=>'off']); ?>
         </div>
       </div>
      </div>
      
      <div class="row-input clearfix hovered">
      <!--   <div class="sign">
        <div class="picutre bank-account-numberr"></div>
      </div> -->
       <!--  <div class="nonhowered">
         Bank Account Number
       </div> -->
       <div class="onhowered">
          <div class="input bank-account-number">
           <label for="city">Bank Account Number</label>
           <?php echo Html::textInput('bank-account-number','',['placeholder'=>'Bank Account Number', 'autocomplete'=>'off']); ?>
         </div>
       </div>
      </div>

      <div class="row-input clearfix hovered">
     <!--    <div class="sign">
       <div class="picutre email"></div>
     </div> -->
     <!--    <div class="nonhowered">
       Email Address
     </div> -->
       <div class="onhowered">
          <div class="input email">
           <label for="city">Email Addressr</label>
           <?php echo Html::input('email','email','',['placeholder'=>'Email Address', 'autocomplete'=>'off']); ?>
         </div>
       </div>
      </div>
    </form>
  </div>
</div>
<div class="row bottom-bar">
  <div class="back-button">Back</div>
   <div class="bar-progress-wrapper">
      <div class="bar-progress">
       <div class="bar-line"></div>
     </div>
   </div>
  <div class="next-button">Next</div>
</div>

