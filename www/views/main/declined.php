<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Questions';
?>
<div class="declined-block center-block">
  <div class="heart">
  <?= Html::img('@web/img/q-heart-red.png', ['alt'=>'Declined']);?>
  </div>
  <div class="message-top">Unfortunately your policy has been declined. </div>
  <div class="refinements">
    <div class="refinement-title center-block">Thank you for interest in individual term life insurance. At this time inelgibility may have happened due to one of the reasons below:</div>
    <div class="refinement center-block">
      <div class="text">Information provided by the medical information bereau.</div>
    </div>
    <div class="refinement center-block">
      <div class="text">Information provided in your perscription report.</div>
    </div>
    <div class="refinement center-block">
      <div class="text">Information in your identification verification report.</div>
    </div>
  </div>
  <div class="gray-line center-block"></div>
  <div class="message-bottom center-block">Thank you for your buisness, we look forward to serving you!</div>
</div>
