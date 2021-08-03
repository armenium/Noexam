<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Processing';
?>
<div class="processing-block center-block">
  <div class="heart">
  <?= Html::img('@web/img/processing.png', ['alt'=>'Success']);?>
  </div>
  <div class="message-top">Please stand by while your descision is being made. </div>
  <div class="refinements center-block">
    <div class="refinement-title center-block">This can happen instantly or could take up to 24 hours to process. you don’t need to keep this page open, we will email you as soon as a decision is reached.</div>
  </div>
</div>
