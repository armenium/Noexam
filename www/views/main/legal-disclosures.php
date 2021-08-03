<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Paymen Info';
?>
<div class="row content legal-disclosures">

<div class="scroll-bar">
  <div class="head-block">
    <div class="text">Legal Disclosures</div>
    <div class="subtext">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
  </div>
  
  <div class="disclosures clearfix">
  
    <div class="disclosure clearfix">
      <div class="title">Consent to do buisness electronically & access information electronically</div>
      <div class="input checkbox">
        <?php echo Html::checkbox('access-info',true,['id'=>'access-info']); ?>
        <label for="access-info">I have read and agreed to the consent stated above (consent to buisness electronically)  </label>
      </div>
    </div>
  
    <div class="disclosure clearfix">
      <div class="title">Review the buyers guide</div>
      <div class="input checkbox">
        <?php echo Html::checkbox('buyers-guide',false,['id'=>'buyers-guide']); ?>
        <label for="buyers-guide">I have read and consent to the buyers guide</label>
      </div>
    </div>
  
    <div class="disclosure clearfix">
      <div class="title">Review the privacy notice</div>
      <div class="input checkbox">
        <?php echo Html::checkbox('privacy-notice',false,['id'=>'privacy-notice']); ?>
        <label for="privacy-notice">Review the privacy notice</label>
      </div>
    </div>
  
    <div class="disclosure clearfix">
      <div class="title">Review the HIPPA authorization</div>
      <div class="input checkbox">
        <?php echo Html::checkbox('hippa',false,['id'=>'hippa']); ?>
        <label for="hippa">I have read and agreed to the consent stated above (consent to buisness electronically)  </label>
      </div>
    </div>
    <div class="disclosure clearfix">
      <div class="title">Review the HIPPA authorization</div>
      <div class="input checkbox">
        <?php echo Html::checkbox('hippa',false,['id'=>'hippa']); ?>
        <label for="hippa">I have read and agreed to the consent stated above (consent to buisness electronically)  </label>
      </div>
    </div>
    <div class="disclosure clearfix">
      <div class="title">Review the HIPPA authorization</div>
      <div class="input checkbox">
        <?php echo Html::checkbox('hippa',false,['id'=>'hippa']); ?>
        <label for="hippa">I have read and agreed to the consent stated above (consent to buisness electronically)  </label>
      </div>
    </div>
    <div class="disclosure clearfix">
      <div class="title">Review the HIPPA authorization</div>
      <div class="input checkbox">
        <?php echo Html::checkbox('hippa',false,['id'=>'hippa']); ?>
        <label for="hippa">I have read and agreed to the consent stated above (consent to buisness electronically)  </label>
      </div>
    </div>
  
  </div>
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

