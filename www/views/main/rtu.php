<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Questions';
?>
<div class="declined-block center-block">
  <div class="heart">
  <?= Html::img('@web/img/q-heart-red.png', ['alt'=>'Declined']);?>
  </div>
  <div class="message-top">Unfortunately, we cannot process your request for this policy based on your answers to the Health and Lifestyle questions. You may still qualify for coverage so please contact our customer fulfillment center to continue with your application. Thank you for your interest in individual term life Insurance.</div>
  <div class="refinements">
    <div class="refinement-title center-block">Please call 888-407-0714 so that we can help you explore other options.</div>
  </div>
</div>
