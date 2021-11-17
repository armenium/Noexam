<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Questions';
?>
<div class="declined-block center-block">
  <div class="heart">
  <?= Html::img('@web/img/q-heart-red.png', ['alt'=>'Declined']);?>
  </div>
  <div class="message-top">Unfortunately you do not qualify for this plan. </div>
  <div class="refinements">
    <div class="refinement-title center-block">Thank you for interest in individual term life insurance.</div>
    <div class="refinement-title center-block">Please call 888-407-0714 so that we can help you explore other options.</div>
  </div>
</div>
