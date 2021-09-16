<?php
use yii\bootstrap\Nav;
?>
<header id="js_header" class="header header--empty trans_me">
	<div class="header__col">
		<a href="/"><img src="/v2/common/images/header/Logo.svg" alt="" title="" class="header__logo" width="112" height="16"></a>
	</div>
	<div class="header__col">
		<div class="header__burger-wrapp">
			<a href="javascript:void(0);" id="menu-btn" class="menu-btn menu-icon button" data-trigger="js_action_click" data-action="toggle_mobile_nav" data-target=".mob-menu">
				<span></span>
				<span></span>
				<span></span>
			</a>
		</div>
	</div>
</header>
<div class="mob-menu trans_all">
	<?=Nav::widget(['options' => ['class' => 'navbar-nav'], 'items' => Yii::$app->params['nav']]);?>
	<div class="phone">888-407-0714</div>
</div>
