<?php

use yii\bootstrap\Nav;

?>
<div class="mob-menu trans_all">
	<?=Nav::widget(['options' => ['class' => 'navbar-nav'], 'items' => Yii::$app->params['nav']]);?>
	<div class="phone">888-407-0714</div>
</div>
