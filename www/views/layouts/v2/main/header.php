<?php
use yii\bootstrap\Nav;
?>
<header id="js_header" class="header trans_me">
	<div class="header__col">
		<a href="/" title="Noexam.com"><img src="/v2/common/images/header/Logo.svg" alt="Noexam.com" title="Noexam.com" class="header__logo" width="112" height="16"></a>
		<nav class="header__nav">
			<?=Nav::widget(['options' => ['class' => 'header__list'], 'items' => Yii::$app->params['nav']]);?>
		</nav>
	</div>
	<div class="header__col">
		<a href="tel:8884070714" class="header__link header__link--tel">888-407-0714</a>
		<a href="/start-quote/" class="header__link header__link--start">Start my Quote</a>
		<?=$this->render('../common/mobile/burger', ['color' => 'black']);?>
	</div>
</header>
<?=$this->render('../common/mobile/nav');?>
