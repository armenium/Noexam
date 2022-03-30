<?php
use yii\bootstrap\Nav;
?>
<header id="js_header" class="header header--empty trans_me">
	<div class="header__col">
		<a href="/" title="Noexam.com">
			<img src="/v2/common/images/header/Logo.svg" alt="Noexam.com" title="Noexam.com" class="header__logo d-none d-md-block" width="112" height="16">
			<img src="/v2/common/images/header/Logo-w.svg" alt="Noexam.com" title="Noexam.com" class="header__logo d-md-none" width="112" height="16">
		</a>
	</div>
	<div class="header__col">
		<div class="header__imgWrapp">
			<div class="header__imgBox"><img src="/v2/common/images/logo-ab.gif" alt="icon" width="75" height="28"></div>
			<div class="header__imgBox"><img src="/v2/common/images/logo-sa.gif" alt="icon" width="80" height="28"></div>
		</div>
		<div class="header__help-wrapp" data-toggle="popover">
			<a role="button" class="question-mark" tabindex="-1"
			   data-content="Please enter the information for the person who is applying for life insurance.">?</a>
		</div>
		<?=$this->render('../common/mobile/burger', ['color' => 'black']);?>
	</div>
</header>
<?=$this->render('../common/mobile/nav');?>

