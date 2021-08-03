<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Questions';
?>
<div class="approved-block center-block">
  <div class="heart">
  <?= Html::img('@web/img/q-heart.png', ['alt'=>'Success']);?>
  </div>
  <div class="message-top">Approved other than applied.</div>
  <div class="refinements center-block">
    <div class="refinement-title center-block">Your application for life insurance has been approved other than applied for one of the following reasons.</div>
    <div class="inner-refinement center-block">
      <div class="refinement center-block">
        <div class="text">Information obtained in your MIB Report.</div>
      </div>
      <div class="refinement center-block">
        <div class="text">Information obtained in your Prescription Report.</div>
      </div>
      <div class="refinement center-block">
       <div class="text">Information in your Mother Vehicile Report.</div>
      </div>
    </div>
    <div class="green-area center-block">
      <div class="price">$53.74</div>
      <div class="description">20 Year Term Life Insurance</div>
      <div class="buttons-block clearfix center-block">
        <div class="button-accept">Accept</div>
        <div class="button-decline">Decline</div>
      </div>
    </div>
  </div>
</div>
