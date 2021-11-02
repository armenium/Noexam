<?php
use yii\bootstrap\Nav;
?>
<header id="js_header" class="header header--empty trans_me">
	<div class="header__col">
		<a href="/"><img src="/v2/common/images/header/Logo.svg" alt="" title="" class="header__logo" width="112" height="16"></a>
	</div>
	<div class="header__col">
		<div class="header__imgWrapp">
			<div class="header__imgBox"><img src="/v2/common/images/logo-ab.gif" alt="icon" width="75" height="28"></div>
			<div class="header__imgBox"><img src="/v2/common/images/logo-sa.gif" alt="icon" width="80" height="28"></div>
		</div>
		<?=$this->render('../common/mobile/burger', ['color' => 'black']);?>
	</div>
</header>
<?=$this->render('../common/mobile/nav');?>

